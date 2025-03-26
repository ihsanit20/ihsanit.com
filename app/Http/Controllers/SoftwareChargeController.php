<?php

namespace App\Http\Controllers;

use App\BkashPayment;
use App\Models\SoftwareCharge;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SoftwareChargeController extends Controller
{
    use BkashPayment; 

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $softwareCharges = SoftwareCharge::query()
            ->select([
                'id',
                'website',
                'month',
                'paid_amount',
                'trx_id',
                'paid_at',
            ])
            ->when(request('website'), function ($query, $website) {
                return $query->where('website', $website);
            })
            ->when(request('month'), function ($query, $month) {
                return $query->where('month', $month);
            })
            ->latest()
            ->get();

        return Inertia::render('software-charges/Index', [
            'softwareCharges' => $softwareCharges,
        ]);
    }

    public function payment($month, $amount, $website = null)
    {
        $this->setAccount('primary');

        $website = $website ?? $this->getClientDomainFromRequest(request());
        $month = date('Y-m', strtotime($month)); // Ensure the month is in 'YYYY-MM' format
        $amount = number_format($amount, 2, '.', '');

        // return [$website, $month, $amount];

        $invoice_number = strtoupper(preg_replace('/[.\-:]/', '', sprintf('%s-M%s-T%s', $website, $month, (string) microtime(true))));
        
        $paymentID = request()->paymentID;

        if(!$paymentID) {
            $callback_url = route('software-charges.payment', [$month, $amount, $website]);
            
            try {
                $data = $this->createPayment($amount, $invoice_number, $callback_url);

                return redirect($data["bkashURL"]);
            } catch (\Exception $e) {
                dd($e->getMessage());
            }
        }

        $status = request()->status;

        if($paymentID && $status == 'success') {
            $response = $this->executePayment($paymentID);

            if(($response->transactionStatus ?? '') == 'Completed') {
                $trxID = $response->trxID ?? $invoice_number;

                SoftwareCharge::create([
                    'website' => $website,
                    'month' => $month,
                    'paid_amount' => $amount,
                    'paid_at' => now(),
                    'trx_id' => $trxID,
                    'response' => $response,
                ]);
            }
        }

        return redirect('http://' . $website . '/finance/software-charge');
    }

    public function history($website = null)
    {
        $softwareCharges = SoftwareCharge::query()
            ->select([
                'id',
                'website',
                'month',
                'paid_amount',
                'trx_id',
                'paid_at',
            ])
            ->where('website', $website ?? $this->getClientDomainFromRequest(request()))
            ->when(request('month'), function ($query, $month) {
                return $query->where('month', $month);
            })
            ->latest()
            ->get();

        return response()->json($softwareCharges);
    }
}
