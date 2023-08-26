@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Hospital Statistics</h1>
        <form action="{{ route('hospitalstatistics') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="admittedPatients" class="form-label">Admitted Patients</label>
                <input type="number" class="form-control" id="admittedPatients" name="Admitted_Paitents" required>
            </div>
            <div class="mb-3">
                <label for="releasedPatients" class="form-label">Released Patients</label>
                <input type="number" class="form-control" id="releasedPatients" name="Released_paitents" required>
            </div>
            <div class="mb-3">
                <label for="dailyDeaths" class="form-label">Daily Deaths</label>
                <input type="number" class="form-control" id="dailyDeaths" name="Daily_Deaths" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Statistics</button>
        </form>
    </div>
@endsection