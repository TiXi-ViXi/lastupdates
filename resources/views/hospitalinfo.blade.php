@extends('layouts.app')

@section('content')
<div class="background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0">Hospital Information</h1>
                    </div>
                    <div class="card-body">
                        @if($hospitalInfo)
                        <form method="POST" action="{{ route('hospital_info_update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" value="{{ $hospitalInfo->Name }}">
                            </div>
                            <div class="form-group">
                                <label for="city">City:</label>
                                <select class="form-control" name="city">
                                    <option value="Dhaka" {{ $hospitalInfo->City === 'Dhaka' ? 'selected' : '' }}>Dhaka</option>
                                    <option value="Khulna" {{ $hospitalInfo->City === 'Khulna' ? 'selected' : '' }}>Khulna</option>
                                    <!-- Add other city options here -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hospital_rating">Hospital Rating:</label>
                                <input type="number" class="form-control" name="hospital_rating" value="{{ $hospitalInfo->Hospital_Rating }}">
                            </div>
                            <div class="form-group">
                                <label for="total_seat">Total Seat:</label>
                                <input type="number" class="form-control" name="total_seat" value="{{ $hospitalInfo->TotalSeat }}">
                            </div>
                            <div class="form-group">
                                <label for="phone_no">Phone Number:</label>
                                <input type="text" class="form-control" name="phone_no" value="{{ $hospitalInfo->Phone_No }}">
                            </div>
                            <!-- Add other form fields here -->
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>
                        @else
                        <p>No hospital information available.</p>
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




