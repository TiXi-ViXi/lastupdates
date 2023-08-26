@extends('layouts.app')
<style>
    .top-left-corner {
        position: fixed;
        bottom: 20;
        left: 109;
    }
    .top-right-corner {
        position: fixed;
        bottom: 20;
        right: 109;
    }
    .topp-right-corner{
        position: fixed;
        top: 10;
        right: 109;
    }
    .toppp-right-corner{
        position: fixed;
        top: 10;
        left: 109;
    }
    #video-background {
            position: fixed;
            top: 0%;
            left: 5%;
            width: 90%;
            z-index: -1; /* Place behind other content */
            opacity: 100%;
        }
</style>
@section('content')
@if(auth()->user()->type === 'patient') 
<video autoplay muted loop id="video-background">
        <source src="image/denguepatient.mp4" type="video/mp4">
        <!-- Add more source elements for different video formats (WebM, etc.) -->
    </video>
    @elseif(auth()->user()->type === 'hospital') 
<video autoplay muted loop id="video-background">
        <source src="image/denguepatient.mp4" type="video/mp4">
        <!-- Add more source elements for different video formats (WebM, etc.) -->
    </video>
@else
<video autoplay loop id="video-background">
        <source src="image/denguedonar.mp4" type="video/mp4">
        <!-- Add more source elements for different video formats (WebM, etc.) -->
    </video>
@endif

<div class="container">
    <div class="row justify-content-center">
    <div class="top-left-corner">
    @if(auth()->user()->type === 'patient')
    
        <a href="{{ route('checkpatientinfo') }}" class="btn btn-primary">Edit Details</a>
    @elseif(auth()->user()->type === 'donar')
        <a href="{{ route('checkdonarinfo') }}" class="btn btn-primary">Edit Details</a>
    @elseif(auth()->user()->type === 'hospital')
        <a href="{{ route('checkhospitalinfo') }}" class="btn btn-primary">Edit Details</a>
    @endif
</div>
</div>

<div class="top-right-corner">
    
        <a href="{{ route('bloodrequest') }}" class="btn btn-danger">Blood Request</a>
    
    
</div>
<div class="topp-right-corner">
    
<a href="{{ route('hospitalrating') }}" class="btn btn-success">Hospital Rating</a>

@if(auth()->user()->type === 'hospital')
    </div>
<div class="toppp-right-corner">
<a href="{{ route('survey') }}" class="btn btn-success">Survey Form</a>

@endif
    
</div>
</div>
@endsection
