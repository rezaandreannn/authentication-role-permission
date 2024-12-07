 <div id="sidebar" class="active">
     <div class="sidebar-wrapper active">
         <div class="sidebar-header">
             <div class="d-flex justify-content-between">
                 <div class="logo">
                     <a href="index.html"><img src="{{ asset('mazer/dist/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                 </div>
                 <div class="toggler">
                     <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                 </div>
             </div>
         </div>
         <div class="sidebar-menu">
             <ul class="menu">
                 <li class="sidebar-title">Menu</li>
                 @can('read dashboard')
                 <li class="sidebar-item  ">
                     <a href="index.html" class='sidebar-link'>
                         <i class="bi bi-grid-fill"></i>
                         <span>{{ __('app.sidebar.dashboard')}}</span>
                     </a>
                 </li>
                 @endcan

                 @can('read user')
                 <li class="sidebar-item  ">
                     <a href="index.html" class='sidebar-link'>
                         <i class="bi bi-grid-fill"></i>
                         <span>Users</span>
                     </a>
                 </li>
                 @endcan

                 <li class="sidebar-title">{{ __('app.sidebar.header.authentication_authoriztion')}}</li>

                 <li class="sidebar-item {{ Request::is('user*') || Request::is('role*') || Request::is('permission*') ? 'active' : '' }}  has-sub">
                     <a href="#" class='sidebar-link'>
                         <i class="bi bi-person-badge-fill"></i>
                         <span>{{ __('app.sidebar.auth') }}</span>
                     </a>
                     <ul class="submenu {{ Request::is('user*') || Request::is('role*') || Request::is('permission*') ? 'active' : '' }}">
                         <li class="submenu-item {{ Request::is('user*') ? 'active' : '' }}">
                             <a href="{{ route('user.index') }}">{{ __('app.sidebar.user') }}</a>
                         </li>
                         <li class="submenu-item {{ Request::is('role') ? 'active' : '' }}">
                             <a href="{{ route('role.index') }}">{{ __('app.sidebar.role') }}</a>
                         </li>
                         <li class="submenu-item {{ Request::is('permission') ? 'active' : '' }}">
                             <a href="{{ route('permission.index') }}">{{ __('app.sidebar.permission') }}</a>
                         </li>
                         <li class="submenu-item {{ Request::is('role-has-permission') ? 'active' : '' }}">
                             <a href="{{ route('role-has-permission.index') }}">{{ __('app.sidebar.role_has_permission') }}</a>
                         </li>
                     </ul>
                 </li>

                 <li class="sidebar-item  has-sub">
                     <a href="#" class='sidebar-link'>
                         <i class="bi bi-x-octagon-fill"></i>
                         <span>Errors</span>
                     </a>
                     <ul class="submenu ">
                         <li class="submenu-item ">
                             <a href="error-403.html">403</a>
                         </li>
                         <li class="submenu-item ">
                             <a href="error-404.html">404</a>
                         </li>
                         <li class="submenu-item ">
                             <a href="error-500.html">500</a>
                         </li>
                     </ul>
                 </li>

             </ul>
         </div>
         <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
     </div>
 </div>
