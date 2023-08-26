<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class Patient extends Controller
{
    public function PatientIndex()
    {
        $user = auth()->user();
        if($user->type === 'patient'){
        return view ('patient');
        }
        else{
            return view('restricted_permission_message');
        }
    }
    
   

    public function storePatient(Request $request)
{
    // Get the authenticated user's ID
    $userId = Auth::id();

    $data = array(
        'user_id' => $userId, // Associate the user ID with the patient record
        'Name' => $request->name,
        'Gender' => $request->gender,
        'City' => $request->city,
        'Age' => $request->age,
        'Phone_No' => $request->phone,
        'Blood_Group' => $request->bloodgroup,
        'Current_Platelet' => $request->currentplat,
        'Lowest_Platelet' => $request->lowestplat,
        'rating' => $request->rating,
        'Hospital' => $request->admitted_hospital,
    );

    DB::table('_patient')->insert($data);
    return redirect()->route('patient_info_page')->with('success', 'Successfully inserted!');

}

public function checkPatientInfo()
{
    $user = auth()->user();

    $patientInfo = DB::table('_patient')->where('user_id', $user->id)->first();

    if (!$patientInfo) {
        // Donor information doesn't exist for the user, redirect to input page
        return redirect()->route('patient_route');
    }

    // Donor information exists, perform your logic here
    // For example, you could redirect to a page to view/edit donor information
    return redirect()->route('patient_info_page');
}

public function patientInfoPage()
{
    $user = auth()->user();

    $patientInfo = DB::table('_patient')->where('user_id', $user->id)->first();

    return view('patientinfo', compact('patientInfo'));
}
public function updatePatientInfo(Request $request)
{
    $user = Auth::user();

    // Update patient information based on the form fields
    DB::table('_patient')
        ->where('user_id', $user->id)
        ->update([
            'Name' => $request->input('name'),
            'Age' => $request->input('age'),
            'Gender' => $request->input('gender'),
            'City' => $request->input('city'),
            'Phone_No' => $request->input('phone_no'),
            'Blood_Group' => $request->input('blood_group'),
            'Current_Platelet' => $request->input('current_platelet'),
            'Lowest_Platelet' => $request->input('lowest_platelet'),
            // Update other fields here
        ]);

    return redirect()->route('patient_info_page')->with('success', 'Patient information updated successfully.');
}
}

