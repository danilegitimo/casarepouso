<nav class="col-md-2 d-none d-md-flex sidebar flex-column">
  <div class="mb-4 p-2">
    <h5 class="fw-bold">São Expedito</h5>
  </div>
  <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
    </li>

    @if ( request()->user()->role->permissions->contains('name', 'view_permissions') && Route::has('responsibles.index') )
    <li class="nav-item">
      <a  class="nav-link {{ request()->is('responsibles/*') || request()->routeIs('responsibles.index') ? 'active' : '' }}" href="{{ route('responsibles.index') }}">Responsáveis</a>
    </li>
    @endif

    @if ( Route::has('patients.index') )
    <li class="nav-item">
      <a class="nav-link {{ request()->is('patients/*') || request()->routeIs('patients.index') ? 'active' : '' }}" href="{{ route('patients.index') }}">Pacientes</a>
    </li>
    @endif

    @if ( Route::has('medications.index') )
    <li class="nav-item">
    <a  class="nav-link {{ request()->is('medications/*') || request()->routeIs('medications.index') ? 'active' : '' }}" href="{{ route('medications.index') }}">Medicações</a>
    </li>
    @endif

    @if ( Route::has('activities.index') )
    <li class="nav-item">
      <a  class="nav-link {{ request()->is('activities/*') || request()->routeIs('activities.index') ? 'active' : '' }}" href="{{ route('activities.index') }}">Atividades</a>
    </li>
    @endif

    @if ( request()->user()->role->permissions->contains('name', 'view_permissions') && Route::has('diseases.index') )
    <li class="nav-item">
      <a  class="nav-link {{ request()->is('diseases/*') || request()->routeIs('diseases.index') ? 'active' : '' }}" href="{{ route('diseases.index') }}">Doenças</a>
    </li>
    @endif

    @if ( request()->user()->role->permissions->contains('name', 'view_permissions') && Route::has('permissions.index') )
    <li class="nav-item">
      <a  class="nav-link {{ request()->is('permissions/*') || request()->routeIs('permissions.index') ? 'active' : '' }}" href="{{ route('permissions.index') }}">Permissões</a>
    </li>
    @endif

  </ul>
  <div class="mt-auto p-2">
    <!-- <p>{{ auth()->user()->name }}</p> -->
  </div>
</nav>