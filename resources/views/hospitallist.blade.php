@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hospital List</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Hospital Rating</th>
                    <th scope="col">Total Seat</th>
                    <th scope="col">Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($hospitals as $hospital)
                    <tr>
                        <th scope="row">{{ $hospital->id }}</th>
                        <td>{{ $hospital->Name }}</td>
                        <td>{{ $hospital->City }}</td>
                        <td>{{ $hospital->Hospital_Rating }}</td>
                        <td>{{ $hospital->TotalSeat ?? 'N/A' }}</td>
                        <td>{{ $hospital->Phone_No }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No hospitals found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection