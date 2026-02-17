<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Visit;
use  App\Models\Vital;

use function Laravel\Prompts\alert;

// create()   → show vitals form
// store()    → save vitals
// edit()     → edit vitals
// update()   → update vitals





class VitalsController extends Controller
{

    public function create(Visit $visit)
    {

        return view('vitals.create', compact('visit'));
        // return redirect()->route('vitals.create',   compact('visit'));
    }

    //   return redirect()->route('customers.index')->with('success', 'Patient created');

    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'visit_id' => 'required|exists:visits,id',
            'temperature' => 'required|numeric',
            'bp_systolic' => 'required|integer',
            'bp_diastolic' => 'required|integer',
            'heart_rate' => 'required|integer',
            'respiratory_rate' => 'required|integer',
            'oxygen_saturation' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        Vital::create($validated);


        return redirect()->route('customers.index')->with('success', 'Vitals saved successfully');

        //  return redirect()->route('vitals.create')->with('success', 'Vital created');

    }
}
