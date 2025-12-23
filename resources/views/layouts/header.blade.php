 <nav class="app-header navbar navbar-expand bg-body">
     <!--begin::Container-->
     <div class="container-fluid">
         <!--begin::Start Navbar Links-->
         <ul class="navbar-nav">
             <li class="nav-item">
                 <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                     <i class="bi bi-list"></i>
                 </a>
             </li>
         </ul>

         <ul class="navbar-nav ms-auto d-flex align-items-center">
             <li class="nav-item">
                 <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                     <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                     <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                 </a>
             </li>

             <li class="nav-item dropdown user-menu">
                 <form method="POST" action="{{ route('logout') }}">
                     @csrf
                     <a href="{{ route('logout') }}" class="dropdown-item text-danger btn btn-success"
                         onclick="event.preventDefault(); this.closest('form').submit();">
                         Log Out
                     </a>
                 </form>
             </li>
         </ul>
     </div>
 </nav>
