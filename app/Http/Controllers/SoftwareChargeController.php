<?php

namespace App\Http\Controllers;

use App\Models\SoftwareCharge;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SoftwareChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SoftwareCharge $softwareCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoftwareCharge $softwareCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SoftwareCharge $softwareCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoftwareCharge $softwareCharge)
    {
        //
    }
}
