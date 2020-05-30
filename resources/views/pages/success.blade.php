{{-- extends from layouts/success.blade.php --}}
@extends('layouts.success')
@section('title', 'Checkout Success')

@section('content')
<main>
    <section class="section-success d-flex align-items-center">
        <div class="col text-center">
        <img src="{{ url('frontend/images/ic_email.png') }}" alt="" class="mb-3">
            <h1>Yeay! Success</h1>
            <p>
                We’ve sent you email for trip instruction
                <br>
                please read it as well
            </p>
            <a href="{{ url('/') }}" class="btn btn-home-page mt-4 px-5">Home Page</a>
        </div>
    </section>
</main>
@endsection
