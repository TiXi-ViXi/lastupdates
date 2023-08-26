@extends('layouts.app')

@section('content')
<div class="background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0">Donor Information</h1>
                    </div>
                    <div class="card-body">
                        @if($donarInfo)
                        <form method="POST" action="{{ route('donar_info_update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $donarInfo->Name }}">
                            </div>
                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input type="number" class="form-control" name="age" value="{{ $donarInfo->Age }}">
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select class="form-control" name="gender">
                                    <option value="male" {{ $donarInfo->Gender === 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ $donarInfo->Gender === 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="others" {{ $donarInfo->Gender === 'others' ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <select class="form-control" name="city">
                        <option value="Dhaka" {{ $donarInfo->City === 'Dhaka' ? 'selected' : '' }}>Dhaka</option>
                        <option value="Khulna" {{ $donarInfo->City === 'Khulna' ? 'selected' : '' }}>Khulna</option>
                        <option value="Chittagong">Chittagong</option>
                                    <option value="Rajshahi" {{ $donarInfo->City === 'Rajshahi' ? 'selected' : '' }}>Rajshahi</option>
                                    <option value="Barishal" {{ $donarInfo->City === 'Barishal' ? 'selected' : '' }}>Barishal</option>
                                    <option value="Mymensingh" {{ $donarInfo->City === 'Mymensingh' ? 'selected' : '' }}>Mymensingh</option>
                                    <option value="Sylhet" {{ $donarInfo->City === 'Sylhet' ? 'selected' : '' }}>Sylhet</option>
                                    <option value="Rangpur" {{ $donarInfo->City === 'Rangpur' ? 'selected' : '' }}>Rangpur</option>
                    </select>
                            </div>
                            <div class="form-group">
                                <label for="phone_no">Phone Number:</label>
                                <input type="text" class="form-control" name="phone_no" value="{{ $donarInfo->Phone_No }}">
                            </div>
                            <div class="form-group">
                                <label for="blood_group">Blood Group:</label>
                                <select class="form-control" name="blood_group">
                                <option value="A+" {{ $donarInfo->Blood_Group === 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ $donarInfo->Blood_Group === 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ $donarInfo->Blood_Group === 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ $donarInfo->Blood_Group === 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="AB+" {{ $donarInfo->Blood_Group === 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ $donarInfo->Blood_Group === 'AB-' ? 'selected' : '' }}>AB-</option>
                                <option value="O+" {{ $donarInfo->Blood_Group === 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ $donarInfo->Blood_Group === 'O-' ? 'selected' : '' }}>O-</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="last_donation">Last Donation:</label>
                                <input type="date" class="form-control" name="last_donation" value="{{ $donarInfo->Last_Donation }}">
                            </div>
                            <div class="form-group">
                                <label for="availability">Availability:</label>
                                <input type="text" class="form-control" name="availability" value="{{ $donarInfo->Availabilty }}">
                            </div>
                            <!-- Add other form fields here -->
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                        @else
                        <p>No donor information available.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .background {
        background-image: url('path/to/your/background-image.jpg');
        background-size: cover;
        background-position: center;
        padding: 80px 0;
        color: #fff;
    }

    .card {
        background: rgba(255, 255, 255, 0.9);
    }

    .card-header {
        border-radius: 0;
    }
</style>
@endsection