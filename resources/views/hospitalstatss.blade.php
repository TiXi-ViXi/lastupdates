@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Hospital Statistics</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Total Admitted Patients</th>
                    <th>Total Released Patients</th>
                    <th>Total Daily Deaths</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $totalAdmitted }}</td>
                    <td>{{ $totalReleased }}</td>
                    <td>{{ $totalDeaths }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection