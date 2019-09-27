<nav class="col-md-3 col-lg-2 d-none d-md-block bg-white sidebar shadow-sm py-3">
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

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.questionTypes.index') }}">
          Question Type
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.questions.index') }}">
          Questions
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.answers.index') }}">
          Answers
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.assessmentUsers.index') }}">
          Assessment Users
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.resultTexts.index') }}">
          Result Texts
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="{{ route('admin.configs.index') }}">
          General Settings
        </a>
      </li>
    </ul>
  </div>
</nav>