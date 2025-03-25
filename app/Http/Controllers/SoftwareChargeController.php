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

    public function payment($website, $month, $amount)
    {
        $this->setAccount('primary');

        $paymentID = request()->paymentID;

        $amount = number_format($amount, 2);
        $invoice_number = sprintf('%s - %s-%s', $website, $month, str_replace(['.', '-'], '', microtime(true)));
        $callback_url = route('software-charges.payment', [$website, $month, $amount]);

        if(!$paymentID) {
            
            $data = $this->createPayment($amount, $invoice_number, $callback_url);

            return redirect($data->bkashURL);
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

        return redirect('https://' . $website . '/finance/software-charge');
    }
}
