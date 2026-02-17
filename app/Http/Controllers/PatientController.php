<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

use  App\Models\Visit;
use Symfony\Component\Mime\Email;

class PatientController extends Controller
{


    public function index(Request $request)
    {

        $query = Patient::orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('name', 'like', "%$search%")
                ->orWhere('phone', 'like', "%$search%");
        }

        $patients = $query->paginate(10);

        return view('customers.index', compact('patients'));
    }
    //   return view('customers.index', ["patients" => $patients]);


    public function show($id)
    {

        $patient = Patient::findOrFail($id);
        return view('customers.show', ["patient" => $patient]);
    }
    public function meetings($id)
    {


        $patient = Patient::with('visits.vital')->findOrFail($id);

        return view('customers.meetings', compact('patient'));
    }

    
    public function createVisit($id)
    {
        $patient = Patient::findOrFail($id); // Fetch patient from DB
        return view('customers.visit', compact('patient'));
    }

    public function visit(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $validated = $request->validate(
            [
                'prescription' => 'required|string',
                'patient_id'   => 'required|exists:patients,id',
                'visit_date'   => 'required|date',
                'diagnosis'    => 'required|string|max:255',
                'notes'        => 'required|string|max:255',
            ],
            [
                'visit_date.unique' => 'This patient already has a visit on this date.'
            ]
        );



        // {{ dd($validated) }}

        $visit = Visit::create($validated);

        return redirect()->route('vitals.create', $visit->id);
        // return redirect()->route('customers.index');
    }



    public function create(Request $request)
    {
        return view('customers.create');
        return redirect()->route('customers.index')->with('success', 'Patient created');
    }
    public function edit( $id)
    {
       
        $patient = Patient::findOrFail($id);
         return view('customers.edit' , compact('patient'));
        // return redirect()->route('customers.index')->with('success', 'Patient created');
    }
    public function storeupdate(Request $request,$id)
    {
        $patient = Patient::findOrFail($id);

        $patient->update($request->all());

          return redirect()->route('customers.index')
              ->with('success', 'Patient updated');

    }
    public function destroy($id)
    {

        $patient = Patient::findOrFail($id);
        $patient->delete();
        $patients = Patient::all();

        return redirect()->route('customers.index')
            ->with('success', 'Patient deleted');
    }
    public function store(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'phone' => 'nullable|string|max:15',
            'email' => 'email'

        ]);

        Patient::create($validated);
        return redirect()->route('customers.index')->with('success', 'Patient created');;
    }

    public function update(Request $request, $id)
    {   dd($request);
        $patient = Patient::findOrFail($id);

        $patient->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Patient updated');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $patients = Patient::where('name', 'like', "%$query%")
            ->orWhere('phone', 'like', "%$query%")
            ->orWhere('email', 'like', "%$query%")
            ->get();

        return view('customers.search', compact('patients', 'query'));
    }
}
