@extends('layouts.app')

@section('content')
    <style>
        /* 1. Medical Mesh Gradient Background */
        body {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #f0fdf4 100%);
            min-height: 100vh;
            position: relative;
        }

        /* 2. Floating Animation for Medical Vibe */
        .plus-bg {
            position: fixed;
            font-size: 80px;
            color: rgba(99, 102, 241, 0.04);
            z-index: -1;
            animation: floatMedical 15s infinite ease-in-out;
            user-select: none;
        }

        @keyframes floatMedical {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-30px) rotate(90deg);
            }
        }

        /* 3. Slim Glass Header */
        .header-slim {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 18px 25px;
            margin-bottom: 25px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
        }

        /* 4. Slim & Sharp Gradient Card */
        .slim-gradient-card {
            text-decoration: none !important;
            display: block;
            border-radius: 14px;
            padding: 18px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: none;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .slim-gradient-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
            filter: contrast(1.1);
        }

        .card-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-box {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.22);
            backdrop-filter: blur(4px);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            flex-shrink: 0;
        }

        .text-box h3 {
            color: white;
            margin: 0;
            font-size: 1.5rem;
            font-weight: 800;
            line-height: 1;
        }

        .text-box p {
            color: rgba(255, 255, 255, 0.9);
            margin: 3px 0 0 0;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Gradient Color Palettes */
        .bg-g1 {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
        }

        .bg-g2 {
            background: linear-gradient(135deg, #0ea5e9, #2563eb);
        }

        .bg-g3 {
            background: linear-gradient(135deg, #10b981, #059669);
        }

        .bg-g4 {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .bg-g5 {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        .bg-g6 {
            background: linear-gradient(135deg, #ec4899, #be185d);
        }

        .bg-g7 {
            background: linear-gradient(135deg, #8b5cf6, #6d28d9);
        }

        .bg-g8 {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        .bg-g9 {
            background: linear-gradient(135deg, #64748b, #334155);
        }

        .bg-g10 {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
        }

        .bg-g11 {
            background: linear-gradient(135deg, #6366f1, #4338ca);
        }

        .bg-g12 {
            background: linear-gradient(135deg, #f97316, #ea580c);
        }
    </style>

    <div class="plus-bg" style="top:15%; left:10%;">✚</div>
    <div class="plus-bg" style="bottom:15%; right:10%; animation-delay: -5s;">✚</div>

    <div class="py-4 container-fluid">
        <div class="header-slim">
            <div>
                <h4 class="mb-0 fw-bold text-dark">
                    <i class="bi bi-activity text-primary me-2"></i>Admin Dashboard
                </h4>
                <p class="mb-0 text-muted small">Medical Module Management Control</p>
            </div>
            {{-- <div class="d-none d-md-block">
                <span class="px-3 py-2 bg-white border badge rounded-pill text-dark">
                    <i class="bi bi-calendar-event me-1"></i> {{ date('l, d M Y') }}
                </span>
            </div> --}}
        </div>

        <div class="row g-3">
            @php
                $modules = [
                    [
                        'count' => $slider_count,
                        'label' => 'Sliders',
                        'icon' => 'bi-images',
                        'color' => 'bg-g1',
                        'route' => 'slider.index', // শুধুমাত্র নাম
                    ],
                    [
                        'count' => $service_count,
                        'label' => 'Services',
                        'icon' => 'bi-heart-pulse',
                        'color' => 'bg-g2',
                        'route' => 'service.index',
                    ],
                    [
                        'count' => $award_count,
                        'label' => 'Awards',
                        'icon' => 'bi-award',
                        'color' => 'bg-g3',
                        'route' => 'award.index',
                    ],
                    [
                        'count' => $review_count,
                        'label' => 'Reviews',
                        'icon' => 'bi-star',
                        'color' => 'bg-g4',
                        'route' => 'review.list',
                    ],
                    [
                        'count' => $youtube_count,
                        'label' => 'Videos',
                        'icon' => 'bi-play-btn',
                        'color' => 'bg-g5',
                        'route' => 'youtube.index',
                    ],
                    [
                        'count' => $experience_count,
                        'label' => 'Experience',
                        'icon' => 'bi-briefcase',
                        'color' => 'bg-g6',
                        'route' => 'experience.index',
                    ],
                    [
                        'count' => $chamber_count,
                        'label' => 'Chambers',
                        'icon' => 'bi-geo-alt',
                        'color' => 'bg-g7',
                        'route' => 'chamber.index',
                    ],
                    [
                        'count' => $faq_count,
                        'label' => 'FAQs',
                        'icon' => 'bi-question-circle',
                        'color' => 'bg-g8',
                        'route' => 'faq.index',
                    ],
                    [
                        'count' => $gallery_count,
                        'label' => 'Gallery',
                        'icon' => 'bi-camera',
                        'color' => 'bg-g9',
                        'route' => 'gallery.index',
                    ],
                    [
                        'count' => $feature_count,
                        'label' => 'Features',
                        'icon' => 'bi-lightning',
                        'color' => 'bg-g10',
                        'route' => 'featured.index',
                    ],
                    [
                        'count' => $education_count,
                        'label' => 'Education',
                        'icon' => 'bi-mortarboard',
                        'color' => 'bg-g11',
                        'route' => 'education.index',
                    ],
                    [
                        'count' => $specialist_count,
                        'label' => 'Specialists',
                        'icon' => 'bi-person-badge',
                        'color' => 'bg-g12',
                        'route' => 'specialist.index',
                    ],
                ];
            @endphp

            @foreach ($modules as $module)
                <div class="col-xl-3 col-md-4 col-6">
                    <a href="{{ route($module['route']) }}" class="slim-gradient-card {{ $module['color'] }}">
                        <div class="card-content">
                            <div class="icon-box">
                                <i class="bi {{ $module['icon'] }}"></i>
                            </div>
                            <div class="text-box">
                                <h3>{{ $module['count'] }}</h3>
                                <p>{{ $module['label'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
