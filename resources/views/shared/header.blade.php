<div class="header-connect">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-8  col-xs-12">
                <div class="header-half header-call">
                    <p>
                        <span><i class="pe-7s-call"></i> +1 234 567 7890</span>
                        <span><i class="pe-7s-mail"></i> garoestate043@gmail.com</span>
                    </p>
                </div>
            </div>
            <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-12">
                <div class="header-half header-social">
                    <ul class="list-inline">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-vine"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End top header -->

<nav class="navbar navbar-default ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse yamm" id="navigation">
            <div class="button navbar-right">
                @if(Auth::check())
                        <div class="dropdown show">
                            <a class="navbar-btn nav-button wow bounceInRight login dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {!! Auth::user()->first_name !!}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <a href="{!! route('profile') !!}" class="dropdown-item">Profile</a><br>
                              <a href="{!! route('favourite.list') !!}" class="dropdown-item">Favourite Property</a><br>
                              <a href="{!! route('logout') !!}" class="dropdown-item" data-confirm="Are you sure want to logout?">Sign Out</a>
                            </div>
                          </div>
                        @else
                        <a class="navbar-btn nav-button wow bounceInRight login" href="{{ route('login') }}">Login</a>
                        @endif
            </div>
            <ul class="main-nav nav navbar-nav navbar-right">
                <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="" href="{{ route('home') }}">Home</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.1s"><a class="" href="{{ route('property') }}">Property</a></li>
                <li class="wow fadeInDown" data-wow-delay="0.4s"><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!-- End of nav bar -->
