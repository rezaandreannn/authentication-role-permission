   <header class='mb-3'>
       <nav class="navbar navbar-expand navbar-light ">
           <div class="container-fluid">
               <a href="#" class="burger-btn d-block">
                   <i class="bi bi-justify fs-3"></i>
               </a>

               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarSupportedContent">

                   <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                       <li class="nav-item dropdown me-3">
                           <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                               <i class="fas fa-language fs-4  text-gray-600"></i>
                           </a>
                           <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                               <form action="{{ route('set.language') }}" method="POST">
                                   @csrf
                                   <li>
                                       <button type="submit" name="locale" value="id" class="dropdown-item">
                                           Indonesia
                                           @if (app()->getLocale() == 'id')
                                           <i class="fas fa-check text-primary"></i>
                                           @endif
                                       </button>
                                   </li>
                               </form>
                               <form action="{{ route('set.language') }}" method="POST">
                                   @csrf
                                   <li>
                                       <button type="submit" name="locale" value="en" class="dropdown-item">
                                           English
                                           @if (app()->getLocale() == 'en')
                                           <i class="fas fa-check text-primary"></i>
                                           @endif
                                       </button>
                                   </li>
                               </form>
                           </ul>
                       </li>
                   </ul>
                   <div class="dropdown">
                       <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                           <div class="user-menu d-flex">
                               <div class="user-name text-end me-3">
                                   <h6 class="mb-0 text-gray-600">{{ Auth::user()->full_name }}</h6>
                                   <p class="mb-0 text-sm text-gray-600">Administrator</p>
                               </div>
                               <div class="user-img d-flex align-items-center">
                                   <div class="avatar avatar-md">
                                       <img src="{{ Avatar::create(Auth::user()->full_name)->toBase64() }}" />
                                       {{-- <img src="{{ asset('mazer/dist/assets/images/faces/1.jpg')}}"> --}}
                                   </div>
                               </div>
                           </div>
                       </a>
                       <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                           <li>
                               <h6 class="dropdown-header">Hello, {{ Auth::user()->name }}!</h6>
                           </li>
                           <li><a class="dropdown-item" href="{{ route('profile.edit')}}"><i class="icon-mid bi bi-person me-2"></i>{{ __('app.header.profile')}}</a></li>
                           <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                   {{ __('app.header.setting')}}</a></li>
                           <hr class="dropdown-divider">
                           </li>
                           <form method="POST" action="{{ route('logout') }}">
                               @csrf
                               <li>
                                   <button type="submit" class="dropdown-item">
                                       <i class="icon-mid bi bi-box-arrow-left me-2"></i> {{ __('app.header.logout')}}
                                   </button>
                               </li>
                           </form>
                       </ul>
                   </div>
               </div>
           </div>
       </nav>
   </header>
