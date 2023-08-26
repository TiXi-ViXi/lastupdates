<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class Donar extends Controller
{
    public function DonarIndex()
    {   

        $user = auth()->user();
        if($user->type === 'donar'){
        return view ('donar');
        }
        else{
            return view('restricted_permission_message');
        }
    }
    
    public function storeDonar(Request $request)
{
    // Get the authenticated user's ID
    $userId = Auth::id();

    $data = array(
        'user_id' => $userId, // Associate the user ID with the donor record
        'Name' => $request->name,
        'Age' => $request->age,
        'gender' => $request->gender,
        'City' => $request->city,
        'Phone_No' => $request->phone,
        'Blood_Group' => $request->bloodgroup,
        'Last_Donation' => $request->lastdonation,
        'Availabilty' => $request->availablity,
    );

    DB::table('_donar')->insert($data);
    return redirect()->route('donar_info_page')->with('success', 'Successfully inserted!');



}

public function checkDonarInfo()
{
    $user = auth()->user();

    $donarInfo = DB::table('_donar')->where('user_id', $user->id)->first();

    if (!$donarInfo) {
        // Donor information doesn't exist for the user, redirect to input page
        return redirect()->route('donar_route');
    }

    // Donor information exists, perform your logic here
    // For example, you could redirect to a page to view/edit donor information
    return redirect()->route('donar_info_page');
}

public function donarInfoPage()
{
    $user = auth()->user();

    $donarInfo = DB::table('_donar')->where('user_id', $user->id)->first();

    return view('donarinfo', compact('donarInfo'));
}
public function updateDonarInfo(Request $request)
{
    $user = Auth::user();

    // Update donor information based on the form fields
    DB::table('_donar')
        ->where('user_id', $user->id)
        ->update([
            'Name' => $request->input('name'),
            'Age' => $request->input('age'),
            'Gender' => $request->input('gender'),
            'City' => $request->input('city'),
            'Phone_No' => $request->input('phone_no'),
            'Blood_Group' => $request->input('blood_group'),
            'Last_Donation' => $request->input('last_donation'),
            'Availabilty' => $request->input('availability'),
            // Update other fields here
        ]);

    return redirect()->route('donar_info_page')->with('success', 'Donor information updated successfully.');
}
}