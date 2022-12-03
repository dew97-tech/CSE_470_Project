<div class="c-wrapper">
  <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
      <span class="c-header-toggler-icon"></span>
    </button>
    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
      <span class="c-header-toggler-icon"></span>
    </button>
    <ul class="c-header-nav ml-auto mr-4">
      <li class="c-header-nav-item dropdown"><a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="c-avatar">
            <img class="c-avatar-img" src="{{ asset('assets/img/default_user_image.png') }}" alt="">
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right pt-0">
          <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
            {{-- <a class="dropdown-item" href="#">
            <svg class="c-icon mr-2">
              <use xlink:href="{{ url('/icons/sprites/free.svg#cil-user') }}"></use>
            </svg> Profile</a><a class="dropdown-item" href="#">
            <svg class="c-icon mr-2">
              <use xlink:href="{{ url('/icons/sprites/free.svg#cil-settings') }}"></use>
            </svg> Settings</a> --}}
            <a class="dropdown-item" href="{{route('users.changePassword', auth()->user()->id)}}">
              <svg class="c-icon mr-2">
                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-settings') }}"></use>
              </svg>
              Change Password
            </a>
            <a class="dropdown-item" href="#">
              <svg class="c-icon mr-2">
                <use xlink:href="{{ url('/icons/sprites/free.svg#cil-account-logout') }}"></use>
              </svg>
              <form action="{{ url('/logout') }}" method="POST"> @csrf
                <button type="submit" class="btn btn-ghost-dark btn-block">Logout</button>
              </form>
            </a>
        </div>
      </li>
    </ul>
    <div class="c-subheader px-3">
      <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <?php $segments = ''; ?>
        {{-- For Dynamic Back Links --}}
        <?php $prev_link = ''; ?>
        @for($i = 1; $i <= count(Request::segments()); $i++)
            <?php $segments .= '/'. Request::segment($i); ?>
            @if($i < count(Request::segments()))
                <?php $prev_link .= '/'. Request::segment($i); ?>
                <li class="breadcrumb-item"><a href="{{ $prev_link }}">{{ Request::segment($i)}}</a></li>                  
                @break
            @else
                <li class="breadcrumb-item active">{{ Request::segment($i)}}</li>                   
            @endif
        @endfor
        {{-- END --}}
      </ol>
    </div>
  </header>
