@extends('layouts.app')

@section('content')
<style>
    .donor-list {
        margin: 0 auto;
        max-width: 800px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
    }

    .table th,
    .table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
    }

    .table th {
        background-color: #f8f8f8;
        font-weight: bold;
    }

    .no-donors {
        text-align: center;
        color: #777;
        margin-top: 20px;
    }
</style>

<div class="donor-list">
    <h1>All Donors</h1>
    @if ($donars->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Blood Group</th>
                    <th>Contact Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donars as $donar)
                    <tr>
                        <td>{{ $donar->Name }}</td>
                        <td>{{ $donar->Blood_Group }}</td>
                        <td>{{ $donar->Phone_No }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-donors">No donors found.</p>
    @endif
</div>
@endsection