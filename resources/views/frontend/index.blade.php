@extends('frontend.layouts.master')
@section('title')
    Home Page || Dr Runa Akter Dola
@endsection
@section('content')
    {{-- hero --}}
    @include('frontend.home.hero')

    {{-- service --}}
    @include('frontend.home.service')

    {{-- about me --}}
    @include('frontend.home.about')

    {{-- process --}}
    @include('frontend.home.process')

    {{-- youtube video --}}
    @include('frontend.home.youtube')

    {{-- experience --}}
    @include('frontend.home.experience')

    {{-- help --}}
    <div class="container my-5">
        <div class="p-1 shadow-lg help-section-wrapper rounded-4" data-aos="zoom-in">
            <div
                class="p-4 help-banner-premium d-flex flex-column flex-md-row align-items-center justify-content-between p-md-5">
                <div class="mb-4 text-center content-side text-md-start mb-md-0">
                    <h2 class="mb-2 fw-bold">Do You Have Health Concerns?</h2>
                    <p class="mb-0 opacity-75">
                        Need Immediate Medical Attention? Get Expert Help From <strong>Dr. Runa Akter Dola</strong> —
                        <span class="text-success-light fw-semibold">Specialist in High-Risk Pregnancy & Feto-Maternal
                            Medicine.</span>
                    </p>
                </div>
                <div class="button-side">
                    <button class="btn-help-pulse">
                        <span>I NEED HELP</span>
                        <i class="fas fa-hand-holding-medical ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- review --}}
    @include('frontend.home.review')

    {{-- education & award --}}
    @include('frontend.home.educaton')
@endsection
