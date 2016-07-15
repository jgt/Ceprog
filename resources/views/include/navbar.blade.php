<nav class="navbar navbar-default">
  <div class="container-fluid optimal">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      @if(Auth::check())
      <a class="navbar-brand" href="{{ url('/home')}}"><i class="fa fa-user "></i>  {{ Auth::user()->name }}</a>
      @endif

    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      {!! Menu::make($items, 'nav navbar-nav') !!}
      <ul class="nav navbar-nav navbar-right">
           <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out"></i> {{ trans('validation.attributes.logout') }}</a></li>
      </ul>
    </div>
  </div>
</nav>