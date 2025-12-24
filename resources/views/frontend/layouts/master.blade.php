<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
</head>

<body>
  {{-- <div id="preloader">
    <div class="loader-content">
        <div class="icon-container">
            <svg class="bloom-icon" viewBox="0 0 100 100">
                <path class="petal" d="M50 50 Q70 10 90 50 T50 90 T10 50 T50 10" />
                <circle class="center-core" cx="50" cy="50" r="5" />
                <path class="petal-inner" d="M50 50 Q60 25 75 50 T50 75 T25 50 T50 25" />
            </svg>
        </div>

        <div class="text-reveal">
            <h1 class="doc-name">Dr. Runa Akter Dola</h1>
            <div class="line-divider"></div>
            <p class="specialty">Feto-Maternal Medicine Specialist</p>
            <p class="hospitals">Sir Salimullah Medical College</p>
        </div>
    </div>
    <div class="reg-number">BMDC Reg. D32OV01</div>
</div> --}}

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>

</body>

</html>
