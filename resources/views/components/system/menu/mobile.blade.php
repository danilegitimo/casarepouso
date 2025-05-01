<div class="d-md-none bg-white border-bottom p-4 d-flex align-items-center justify-content-between">
  <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="mx-auto flex-grow-1 ps-2">
    <strong>Casa de Repouso</strong>
  </div>
</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="nav flex-column">
    @if ( Auth::user()->is_admin || Route::has('dashboard') )
    <li class="nav-item">
      <a  class="nav-link {{ request()->is('dashboard/*') || request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Painel</a>
    </li>
    @endif

    @if ( Auth::user()->is_admin || Route::has('responsibles.index') )
    <li class="nav-item">
      <a  class="nav-link {{ request()->is('responsibles/*') || request()->routeIs('responsibles.index') ? 'active' : '' }}" href="{{ route('responsibles.index') }}">Responsáveis</a>
    </li>
    @endif

    @if ( Auth::user()->is_admin || Route::has('patients.index') )
    <li class="nav-item">
      <a class="nav-link {{ request()->is('patients/*') || request()->routeIs('patients.index') ? 'active' : '' }}" href="{{ route('patients.index') }}">Pacientes</a>
    </li>
    @endif

    @if ( Auth::user()->is_admin || Route::has('medications.index') )
    <li class="nav-item">
    <a  class="nav-link {{ request()->is('medications/*') || request()->routeIs('medications.index') ? 'active' : '' }}" href="{{ route('medications.index') }}">Medicações</a>
    </li>
    @endif

    @if ( Auth::user()->is_admin || Route::has('activities.index') )
    <li class="nav-item">
      <a  class="nav-link {{ request()->is('activities/*') || request()->routeIs('activities.index') ? 'active' : '' }}" href="{{ route('activities.index') }}">Atividades</a>
    </li>
    @endif

    @if ( Auth::user()->is_admin || Route::has('diseases.index') )
    <li class="nav-item">
      <a  class="nav-link {{ request()->is('diseases/*') || request()->routeIs('diseases.index') ? 'active' : '' }}" href="{{ route('diseases.index') }}">Doenças</a>
    </li>
    @endif
    </ul>
  </div>
</div>