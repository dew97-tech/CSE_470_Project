<div class="c-sidebar-brand">
    <a href="{{ route('home') }}">
        <img class="c-sidebar-brand-full" src="{{asset('assets/img/Banner.png')}}" height="50" width="100"
            alt="Augmenta Logo">
    </a>
    <a href="{{ route('home') }}">
        <img class="c-sidebar-brand-minimized" src="{{asset('assets/img/demo.png')}}" height="46" alt="Augmenta Logo">
    </a>
</div>
<ul class="c-sidebar-nav my-2">
    <li class="c-sidebar-nav-item">
        @role('admin')
        <a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
            <i class="c-sidebar-nav-icon fas fa-user"></i>
            Users
        </a>
        @endrole
    </li>
    <li class="c-sidebar-nav-item">
        @role('admin')
        <a class="c-sidebar-nav-link" href="{{ route('subjects.index') }}">
            <i class="c-sidebar-nav-icon fas fa-book"></i>
            Subjects
        </a>
        @endrole
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('teachers.index') }}">
            <i class="c-sidebar-nav-icon fas fa-chalkboard-teacher"></i>
            Teachers
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('potentials.index') }}">
            <i class="c-sidebar-nav-icon fas fa-book-reader"></i>
            Potential Students
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('students.index', 1)}}">
            <i class="c-sidebar-nav-icon fas fa-book-reader"></i>
            Students
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('batches.index') }}">
            <i class="c-sidebar-nav-icon fas fa-chalkboard"></i>
            Batches
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('cashins.index') }}">
            <i class="c-sidebar-nav-icon fas fa-money-bill-wave"></i>
            Cash Ins
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="{{ route('cashouts.index') }}">
            <i class="c-sidebar-nav-icon fas fa-money-bill-wave"></i>
            Cash Outs
        </a>
    </li>
    <li class="c-sidebar-nav-item">
        <a class="c-sidebar-nav-link" href="#">
            <i class="c-sidebar-nav-icon fas fa-chart-bar"></i>
            Reports
        </a>
    </li>
</ul>
<button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
    data-class="c-sidebar-minimized"></button>
</div>