@extends('frontend.layouts.master')
@section('title')
    Home Page || Dr Runa Akter Dola
@endsection
@section('content')
    {{-- hero --}}
    @include('frontend.home.hero')

    {{-- trused --}}
    @include('frontend.home.trusted')

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
                        Need Immediate Medical Attention? Get Expert Help From
                        <strong>{{ config('settings.name') ?? 'Dr Runa Akter Dola' }}</strong> —
                        <span class="text-success-light fw-semibold">Specialist in High-Risk Pregnancy & Feto-Maternal
                            Medicine.</span>
                    </p>
                </div>
                <div class="button-side">
                    <a href="mailto:{{ config('settings.email') ?? '' }}"
                        class="btn-help-pulse text-decoration-none d-inline-flex align-items-center"
                        title="Get medical help via email">
                        <span>I NEED HELP</span>
                        <i class="fas fa-hand-holding-medical ms-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- review --}}
    @include('frontend.home.review')

    {{-- education & award --}}
    @include('frontend.home.educaton')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log("jQuery is working!");

            $('#reviewForm').on('submit', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                let form = $(this);
                let submitBtn = $('#reviewSubmitBtn');
                let btnText = $('#btnText');
                let btnSpinner = $('#btnSpinner');

                submitBtn.prop('disabled', true);
                btnText.text('Saving...');
                btnSpinner.removeClass('d-none');

                $.ajax({
                    url: "{{ route('review.store') }}",
                    type: "POST",
                    data: form.serialize(),
                    dataType: 'json',
                    success: function(response) {
                        $('#reviewMessage').html('<div class="mt-2 alert alert-success">' +
                            response.message + '</div>');
                        form[0].reset();

                        submitBtn.prop('disabled', false);
                        btnText.text('Submit Review');
                        btnSpinner.addClass('d-none');
                    },
                    error: function(xhr) {
                        submitBtn.prop('disabled', false);
                        btnText.text('Submit Review');
                        btnSpinner.addClass('d-none');

                        alert("Error: " + xhr.status + " - " + xhr.statusText);
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
