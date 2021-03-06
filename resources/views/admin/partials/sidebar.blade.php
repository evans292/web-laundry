<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="{{ route('admin.dashboard') }}">La</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
      @if(Auth::user()->can('manage-users'))
      <li class="menu-header">Users</li>
      <li class="{{ Request::route()->getName() == 'admin.users' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
      @endif
      @if(Auth::user()->can('view-outlets'))
      <li class="menu-header">Laundry</li>
      <li class="{{ Request::route()->getName() == 'admin.outlets' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.outlets') }}"><i class="fa fa-store"></i> <span>Outlets</span></a></li>
      <li class="{{ Request::route()->getName() == 'admin.packages' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.packages') }}"><i class="fa fa-archive"></i> <span>Packages</span></a></li>
      @endif
    </ul>
</aside>
