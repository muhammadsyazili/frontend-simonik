<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-light-danger">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset('icon-brand.png') }}" alt="icon-brand" class="brand-image">
    <span class="brand-text font-weight-light" style="color: white;">SIMONIK</span>
  </a>
  <!-- End Brand Logo -->

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <h1 class="text-center"><i class="fas fa-user-circle"></i></h1>
        </div>
        <div class="info">
            <a href="#" class="d-block"><small><i class="fas fa-at"></i> {{ request()->cookie('X-Username') }}</small></a>
            <a href="#" class="d-block"><small>Role: {{ request()->cookie('X-Role') }}</small></a>
            @if (request()->cookie('X-Role') !== 'super-admin')
            <a href="#" class="d-block"><small>Unit Kerja: {{ request()->cookie('X-Unit') }}</small></a>
            @endif
            <a href="{{ route('simonik.user.password.change.form', ['id' => request()->cookie('X-User-Id')]) }}" class="badge badge-danger text-light">Ubah Password</a>
        </div>
    </div>
    <!-- End Sidebar User Panel -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview" role="menu" data-accordion="false">

        @if (request()->cookie('X-App') === 'simonik')
            <li class="nav-header">SIMONIK</li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon text-warning"></i>
                    <p>Kertas Kerja <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin', 'data-entry']))
                        <li class="nav-item">
                            <a href="{{ route('simonik.indicators.paper-work.index') }}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Indikator</p>
                            </a>
                        </li>
                    @endif
                    @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                        <li class="nav-item">
                            <a href="{{ route('simonik.targets.paper-work.index') }}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Target</p>
                            </a>
                        </li>
                    @endif
                    @if (in_array(request()->cookie('X-Role'), ['super-admin', 'admin', 'data-entry']))
                        <li class="nav-item">
                            <a href="{{ route('simonik.realizations.paper-work.index') }}" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Realisasi</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            @if (request()->cookie('X-Role') === 'super-admin')
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon text-warning"></i>
                    <p>Supporting <i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('simonik.user.index') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('simonik.level.index') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Level</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('simonik.unit.index') }}" class="nav-link">
                        <i class="nav-icon far fa-circle text-warning"></i>
                        <p>Unit Kerja</p>
                        </a>
                    </li>
                </ul>
            </li>
            @endif

            <li class="nav-item">
                <a href="{{ route('simonik.monitoring') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon text-warning"></i>
                    <p>Monitoring</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('simonik.rangking') }}" class="nav-link">
                    <i class="fas fa-circle nav-icon text-warning"></i>
                    <p>Ranking</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon text-warning"></i>
                    <p>Comparing</p>
                </a>
            </li>
        @endif
      </ul>
    </nav>
    <!-- End Sidebar Menu -->
  </div>
  <!-- End Sidebar -->
</aside>
