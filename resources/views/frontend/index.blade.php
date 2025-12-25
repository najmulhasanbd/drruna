@extends('frontend.layouts.master')
@section('title')
    Home Page || {{ config('settings.name') }}
@endsection
@section('meta')
    {{-- Primary Meta Tags --}}
    <meta name="description"
        content="{{ config('settings.name') }} is a highly experienced Gynaecologist & Fetal Medicine specialist in Dhaka. Assistant Professor at Mitford Hospital with 18+ years of expertise in High-Risk Pregnancy. বিশেষজ্ঞ গাইনি ও প্রসূতি সেবা।">
    <meta name="keywords"
        content="{{ config('settings.name') }}, Best Gynaecologist in Dhaka, High Risk Pregnancy Specialist, Fetal Medicine Specialist Bangladesh, SS Ratnam Award Winner, Mitford Hospital Gynae Doctor, Normal Delivery Expert, ইনফার্টিলিটি বিশেষজ্ঞ, ডা. রুনা আক্তার দোলা, গাইনি ডাক্তার ঢাকা">
    <meta name="author" content="{{ config('settings.name') }}">
    <link rel="canonical" href="{{ url('/') }}">

    {{-- Open Graph / Facebook (Social Media SEO) --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="{{ config('settings.name') }} | Expert in Gynaecology & Fetal Medicine">
    <meta property="og:description"
        content="SS Ratnam Award-winning specialist and Assistant Professor at Sir Salimullah Medical College. 18 years of excellence in women's healthcare.">
    <meta property="og:image" content="{{ asset(config('settings.logo')) }}">

    {{-- Twitter SEO --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ config('settings.name') }} | Women's Health & Maternity Specialist">
    <meta name="twitter:description"
        content="Dedicated to providing advanced medical care for high-risk pregnancies and gynecological issues.">
    <meta name="twitter:image" content="{{ asset(config('settings.logo')) }}">

    {{-- Local SEO & Verification --}}
    <meta name="geo.region" content="BD">
    <meta name="geo.placename" content="Dhaka">
    <meta name="geo.position" content="23.8103;90.4125">
    <meta name="ICBM" content="23.8103, 90.4125">
@endsection

@section('title')
    {{ config('settings.name') }} | Best Gynaecologist & Fetal Medicine Specialist in Dhaka
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
