@extends('layouts.appp')



@section('content')
<main>
    <section class="section-details-header"></section>
    <div class="card text-center">
        <div class="card-body">
            <img src="{{ url('frontend/images/success.png') }}" alt="" style="width: 100px;">
            <h5 class="card-title">Succsessful</h5>
            <p class="card-text">Thank You For Booking in HOTELS.</p>
            <a href="#" class="btn btn-primary">Go to HOTELS</a>
        </div>
    </div>
</main>
@endsection