<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class Hospital extends Controller
{
    public function HospitalIndex()
    {   
        $user = auth()->user();
        if($user->type === 'hospital'){
        return view ('hospital');
        }
        else{
            return view('restricted_permission_message');
        }

        return view ('hospital');
    }
    public function survey(){
        return view ('dailystats');
    }
    
    public function storeHospital(Request $request)
{
    // Get the authenticated user's ID
    $userId = Auth::id();

    $data = array(
        'user_id' => $userId, // Associate the user ID with the Hpspital record
        'Name' => $request->hospitalname,
        'City' => $request->city,
        'TotalSeat' => $request->totalseat,
        'Phone_No' => $request->phone,
    );

    DB::table('_hospital')->insert($data);
    return redirect()->route('home')->with('success', 'Successfully inserted!');

}

public function checkHospitalInfo()
{
    $user = auth()->user();

    $hospitalInfo = DB::table('_hospital')->where('user_id', $user->id)->first();

    if (!$hospitalInfo) {
        // Donor information doesn't exist for the user, redirect to input page
        return redirect()->route('hospital_route');
    }

    // Donor information exists, perform your logic here
    // For example, you could redirect to a page to view/edit donor information
    return redirect()->route('hospital_info_page');
}

public function hospitalInfoPage()
{
    $user = auth()->user();

    $hospitalInfo = DB::table('_hospital')->where('user_id', $user->id)->first();

    return view('hospitalinfo', compact('hospitalInfo'));
}

public function updateHospitalInfo(Request $request)
{
    $user = Auth::user();

    // Update hospital information based on the form fields
    DB::table('_hospital')
        ->where('user_id', $user->id)
        ->update([
            'Name' => $request->input('name'),
            'City' => $request->input('city'),
            'Hospital_Rating' => $request->input('hospital_rating'),
            'TotalSeat' => $request->input('total_seat'),
            'Phone_No' => $request->input('phone_no'),
            // Update other fields here
        ]);

    return redirect()->route('hospital_info_page')->with('success', 'Hospital information updated successfully.');

}

public function bloodrequest()
{
    $user = auth()->user();

    if ($user->type === 'hospital') {
        $matchingDonors = DB::table('_donar')->get();
    }
    elseif($user->type === 'patient'){
        $bloodInfo = DB::table('_patient')->where('user_id', $user->id)->first();
        $bloodgroup = $bloodInfo->Blood_Group;
        $matchingDonors = DB::table('_donar')
        ->where('Blood_Group',  $bloodgroup) // Exclude the user from the list
        ->select('Name', 'Phone_No','Blood_Group')
        ->get();
    }
    elseif($user->type === 'donar'){
        $bloodInfo = DB::table('_donar')->where('user_id', $user->id)->first();
        $bloodgroup = $bloodInfo->Blood_Group;
        $matchingDonors = DB::table('_donar')
        ->where('Blood_Group', $bloodgroup)// Filter by availability
        ->where('id', '<>', $user->id) // Exclude the user from the list
        ->select('Name', 'Phone_No','Blood_Group')
        ->get();
    }
    return view('donarlist')->with('donars', $matchingDonors);
}
public function hospitalrating(){
    $hospitals = DB::table('_hospital')->get(); 
    
    foreach ($hospitals as $hospital) {
        $usersWithMatchingHospital = DB::table('_patient')
            ->where('Hospital', $hospital->Name) 
            ->pluck('id');
        
        if ($usersWithMatchingHospital->count() > 0) {
            $averageRating = DB::table('_patient')
                ->whereIn('id', $usersWithMatchingHospital)
                ->avg('rating'); 
            
            
            DB::table('_hospital')
                ->where('id', $hospital->id) 
                ->update(['Hospital_Rating' => $averageRating]);
        }
    }
    $hospitals = DB::table('_hospital')
    ->orderBy('Hospital_Rating', 'desc')
    ->get();
    return view('hospitallist')->with('hospitals', $hospitals);
}
public function hospitalstatistics(Request $request)
{
    $user = auth()->user();
    $hospitalInfo = DB::table('_hospital')->where('user_id', $user->id)->first();
    $data = [
        'Admitted_Paitents' => $request->input('Admitted_Paitents'),
        'Released_paitents' => $request->input('Released_paitents'),
        'Daily_Deaths' => $request->input('Daily_Deaths'),
        'hospital_id' => $user->id,
    ];

    // Insert the data into the hospital_statistics table
    DB::table('_daily_stats_h')->insert($data);

    return redirect()->back()->with('success', 'Hospital statistics added successfully.');
}
public function showStatistics()
{
    $totalAdmitted = DB::table('_daily_stats_h')->sum('Admitted_Paitents');
    $totalReleased = DB::table('_daily_stats_h')->sum('Released_paitents');
    $totalDeaths = DB::table('_daily_stats_h')->sum('Daily_Deaths');

    return view('hospitalstatss', compact('totalAdmitted', 'totalReleased', 'totalDeaths'));
}
}