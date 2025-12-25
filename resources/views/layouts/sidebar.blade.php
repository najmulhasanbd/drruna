<aside class="shadow app-sidebar bg-body-secondary" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}" class="brand-link">
            <img src="{{ asset('admin') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="shadow opacity-75 brand-image" />
            <span class="brand-text fw-light">{{ ucwords(Auth::user()->name) }}</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('slider.index') }}" class="nav-link {{ Route::is('slider.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Slider</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('featured.index') }}"
                        class="nav-link {{ Route::is('featured.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-star-fill"></i>
                        <p>Featured</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('service.index') }}"
                        class="nav-link {{ Route::is('service.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-heart-pulse"></i>
                        <p>Services</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('review.list') }}" class="nav-link {{ Route::is('review.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-chat-left-quote"></i>
                        <p>Review</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('education.index') }}"
                        class="nav-link {{ Route::is('education.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-mortarboard"></i>
                        <p>Education</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('award.index') }}" class="nav-link {{ Route::is('award.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-trophy"></i>
                        <p>Award</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('gallery.index') }}"
                        class="nav-link {{ Route::is('gallery.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-camera"></i>
                        <p>Gallery</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('faq.index') }}" class="nav-link {{ Route::is('faq.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-question-circle"></i>
                        <p>Faq</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('youtube.index') }}"
                        class="nav-link {{ Route::is('youtube.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-play-btn"></i>
                        <p>Youtube Video</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('experience.index') }}"
                        class="nav-link {{ Route::is('experience.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-briefcase"></i>
                        <p>Experience</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('chamber.index') }}"
                        class="nav-link {{ Route::is('chamber.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-geo-alt"></i>
                        <p>Chamber</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('process.index') }}"
                        class="nav-link {{ Route::is('process.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Process</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('specialist.index') }}"
                        class="nav-link {{ Route::is('specialist.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-badge"></i>
                        <p>Specialist</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('setting.index') }}"
                        class="nav-link {{ Route::is('setting.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-sliders"></i>
                        <p>Settings</p>
                    </a>
                </li>
                <li class="nav-item btn btn-danger">
                    <a href="{{ route('clear.cache') }}"
                        class="nav-link ">
                       <i class="fas fa-sync-alt"></i>
                        <p>Clear Cache</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<style>
    .app-sidebar .nav-link.active {
        background: linear-gradient(45deg, #198754, #20c997) !important;
        color: white !important;
    }
</style>
