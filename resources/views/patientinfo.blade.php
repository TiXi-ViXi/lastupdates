@extends('layouts.app')

@section('content')
<div class="background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0">Patient Information</h1>
                    </div>
                    <div class="card-body">
                        @if($patientInfo)
                        <form method="POST" action="{{ route('patient_info_update') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $patientInfo->Name }}">
                </div>
                <div class="form-group">
                    <label for="age">Age:</label>
                    <input type="number" class="form-control" name="age" value="{{ $patientInfo->Age }}">
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select class="form-control" name="gender">
                        <option value="male" {{ $patientInfo->Gender === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $patientInfo->Gender === 'female' ? 'selected' : '' }}>Female</option>
                        <option value="others" {{ $patientInfo->Gender === 'others' ? 'selected' : '' }}>Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <select class="form-control" name="city">
                        <option value="Dhaka" {{ $patientInfo->City === 'Dhaka' ? 'selected' : '' }}>Dhaka</option>
                        <option value="Khulna" {{ $patientInfo->City === 'Khulna' ? 'selected' : '' }}>Khulna</option>
                        <option value="Chittagong">Chittagong</option>
                                    <option value="Rajshahi" {{ $patientInfo->City === 'Rajshahi' ? 'selected' : '' }}>Rajshahi</option>
                                    <option value="Barishal" {{ $patientInfo->City === 'Barishal' ? 'selected' : '' }}>Barishal</option>
                                    <option value="Mymensingh" {{ $patientInfo->City === 'Mymensingh' ? 'selected' : '' }}>Mymensingh</option>
                                    <option value="Sylhet" {{ $patientInfo->City === 'Sylhet' ? 'selected' : '' }}>Sylhet</option>
                                    <option value="Rangpur" {{ $patientInfo->City === 'Rangpur' ? 'selected' : '' }}>Rangpur</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="phone_no">Phone Number:</label>
                    <input type="text" class="form-control" name="phone_no" value="{{ $patientInfo->Phone_No }}">
                </div>
                <div class="form-group">
                    <label for="blood_group">Blood Group:</label>
                    <select class="form-control" name="blood_group">
                    <option value="A+" {{ $patientInfo->Blood_Group === 'A+' ? 'selected' : '' }}>A+</option>
                    <option value="A-" {{ $patientInfo->Blood_Group === 'A-' ? 'selected' : '' }}>A-</option>
                    <option value="B+" {{ $patientInfo->Blood_Group === 'B+' ? 'selected' : '' }}>B+</option>
                    <option value="B-" {{ $patientInfo->Blood_Group === 'B-' ? 'selected' : '' }}>B-</option>
                    <option value="AB+" {{ $patientInfo->Blood_Group === 'AB+' ? 'selected' : '' }}>AB+</option>
                    <option value="AB-" {{ $patientInfo->Blood_Group === 'AB-' ? 'selected' : '' }}>AB-</option>
                    <option value="O+" {{ $patientInfo->Blood_Group === 'O+' ? 'selected' : '' }}>O+</option>
                    <option value="O-" {{ $patientInfo->Blood_Group === 'O-' ? 'selected' : '' }}>O-</option>
                </select>
                </div>
                <div class="form-group">
                    <label for="current_platelet">Current Platelet:</label>
                    <input type="number" class="form-control" name="current_platelet" value="{{ $patientInfo->Current_Platelet }}">
                </div>
                <div class="form-group">
                    <label for="lowest_platelet">Lowest Platelet:</label>
                    <input type="number" class="form-control" name="lowest_platelet" value="{{ $patientInfo->Lowest_Platelet }}">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
                        @else
                        <p>No patient information available.</p>
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