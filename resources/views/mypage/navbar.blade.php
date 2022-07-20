<div class="navpage">
  <header class="mypage-header">
    <div class="header_logo">
      <a href="{{ route('home') }}"><img src="/images/kredo_logo.jpg"></a>
    </div>

    <div class="header_icon">
      @if(Request::routeIs('mypage.show'))
        <p>MYPAGE</p>
      @elseif(Request::routeIs('profile.show'))
        <i class="fas fa-user fa-3x header-icon"></i>
      @elseif(Request::routeIs('reaction.show'))
        <i class="fas fa-heart fa-3x header-icon"></i>
      @elseif(Request::routeIs('matching'))
        <i class="fas fa-comments fa-3x header-icon"></i>
      @endif
    </div>
  </header>
</div>
