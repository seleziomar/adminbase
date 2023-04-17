@foreach (config('admin.sidebar') as $menu)

<h6 class="navbar-heading">
    {{ $menu['heading'] }}
    <ul class="navbar-nav mb-md-4">
        @foreach ($menu['actions'] as $action)
            <li class="nav-item">
                <a class="nav-link {!! Route::is($action['route'].'*') ? 'active' : null !!}" href="{{ route($action['route']) }}">
                <i class="fe fe-{{ $action['icon'] }}"></i> {{ $action['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</h6>

@endforeach


{{-- <!-- Divider -->
<hr class="navbar-divider my-3">

<!-- Heading -->
<h6 class="navbar-heading">
  Documentation
</h6>

<!-- Navigation -->
<ul class="navbar-nav mb-md-4">
  <li class="nav-item">
    <a class="nav-link " href="./docs/changelog.html">
      <i class="fe fe-git-branch"></i> Changelog <span class="badge bg-primary ms-auto">v2.1.0</span>
    </a>
  </li>
</ul> --}}
