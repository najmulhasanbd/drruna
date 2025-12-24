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
                     <a href="{{ route('dashboard') }}" class="nav-link">
                         <i class="nav-icon bi bi-palette"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('slider.index') }}" class="nav-link">
                         <i class="nav-icon bi bi-palette"></i>
                         <p>Slider</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('featured.index') }}" class="nav-link">
                         <i class="nav-icon bi bi-palette"></i>
                         <p>Featured</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('service.index') }}" class="nav-link">
                         <i class="nav-icon bi bi-palette"></i>
                         <p>Services</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('review.list') }}" class="nav-link">
                         <i class="nav-icon bi bi-palette"></i>
                         <p>Review</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('education.index') }}" class="nav-link">
                         <i class="nav-icon bi bi-palette"></i>
                         <p>Education</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('award.index') }}" class="nav-link">
                         <i class="nav-icon bi bi-palette"></i>
                         <p>Award</p>
                     </a>
                 </li>
                 {{-- <li class="nav-item menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>
                             Dashboard
                             <i class="nav-arrow bi bi-chevron-right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="./index.html" class="nav-link active">
                                 <i class="nav-icon bi bi-circle"></i>
                                 <p>Dashboard v1</p>
                             </a>
                         </li>
                     </ul>
                 </li> --}}
             </ul>
         </nav>
     </div>
 </aside>
