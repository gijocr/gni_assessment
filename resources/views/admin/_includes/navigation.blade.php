<nav class="col-md-3 col-lg-2 d-none d-md-block bg-light sidebar shadow-sm py-3">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.dashboard') }}">
          Dashboard
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.pageTypes.index') }}">
          Page Types
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.pages.index') }}">
          Pages
        </a>
      </li>
    </ul>
  </div>
</nav>