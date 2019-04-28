<header class="header-desktop2 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="{{url('/admin/dashboard')}}">
                    <img src="{{asset('assets')}}/images/icon/logo_panjang.png" alt="Apa Resepnya" />
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="{{ Request::is('/') ? 'active' : ''}}">
                        <a href="{{url('/')}}">
                            Beranda
                        </a>    
                    </li>
                    <li class="{{ Request::is('masakan/*') || Request::is('masakan') ? 'active' : ''}}" >
                        <a href="{{url('masakan')}}">
                            Masakan
                        </a>
                    </li>
                    <li class="{{ Request::is('minuman/*') || Request::is('minuman') ? 'active' : ''}}">
                        <a href="{{url('minuman')}}">
                            Minuman
                        </a>
                    </li>
                    <li class="{{ Request::is('cemilan/*') || Request::is('cemilan') ? 'active' : ''}}">
                        <a href="{{url('cemilan')}}">
                            Cemilan
                        </a>
                    </li>
                    <li class="{{ Request::is('artikel/*') || Request::is('artikel') ? 'active' : ''}}">
                        <a href="{{url('artikel')}}">
                            Artikel
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header__tool header-button2">
            <div class="header-button-item js-item-menu">
                <i class="zmdi zmdi-search"></i>
                <div class="search-dropdown js-dropdown">
                    <form action="" autocomplete="off" method="get">
                        <input class="au-input au-input--full au-input--h65" ID="search" name="cari" type="text" placeholder="Cari resep &amp; artikel..." />
                        <span class="search-dropdown__icon">
                            <a href="{{url('/')}}"><i class="zmdi zmdi-search"></i></a>
                        </span>
                    </form>
                </div>
            </div>
                @if(!empty(Auth::User()))
                    <div class="header-button-item has-noti js-item-menu">
                        <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>Kamu Punya 3 Pemberitahuan</p>
                                </div>
                            <div class="notifi__item">
                                <div class="bg-success img-cir img-40">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                                <div class="content">
                                    <p>Rian mengomentari resep anda</p>
                                    <span class="date">April 12, 2018 06:50</span>
                                </div>
                            </div>
                            <div class="notifi__item">
                                <div class="bg-warning img-cir img-40">
                                    <i class="fa fa-ban"></i>
                                </div>
                                <div class="content">
                                    <p>Robby melaporkan artikel ini</p>
                                    <span class="date">April 12, 2018 06:50</span>
                                </div>
                            </div>
                            <div class="notifi__item">
                                <div class="bg-danger img-cir img-40">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <div class="content">
                                    <p>Robby menyukai resep anda</p>
                                    <span class="date">April 12, 2018 06:50</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            <div class="image">
                                @php 
                                    $user = \App\DataUser::where('username',Auth::User()->username)->first();
                                @endphp  
                                @if(empty($user->foto))
                                    @if(empty($user->jenkel) || $user->jenkel=='L')
                                        <img src="{{asset('assets')}}/images/icon/male.jpg" alt="profile" class="rounded-circle avatar"/>
                                    @else
                                        <img src="{{asset('assets')}}/images/icon/female.png" alt="profile"class="rounded-circle avatar" />
                                    @endif
                                @else
                                    <img src="{{asset('assets')}}/images/icon/{{$user->foto}}" alt="profile"class="rounded-circle avatar" />
                                @endif
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{url('profile')}}">
                                        <i class="zmdi zmdi-account"></i>Profil</a>
                                    </div>
                                    @if(Auth::User()->level=='1')
                                        <div class="account-dropdown__item">
                                            <a href="{{url('admin/dashboard')}}">
                                            <i class="zmdi zmdi-menu"></i>Admin Tool</a>
                                        </div>
                                    @endif
                                </div>
                                <div class="account-dropdown__footer">
                                    <form id="my_form" action="{{url('logout')}}" method="POST">
                                    {{csrf_field()}}
                                        <a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="header-button-item js-item-menu">
                        <i class="fa  fa-ellipsis-v"></i>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="acFcount-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{url('data_masakan')}}">Data Masakan</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{url('data_minuman')}}">Data Minuman</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{url('data_cemilan')}}">Data Cemilan</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{url('data_artikel')}}">Data Artikel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{asset('assets')}}/images/icon/male.jpg" alt="John Doe" />
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="{{url('register')}}">
                                                <i class="fa fa-users"></i>Daftar
                                            </a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{url('login')}}">
                                            <i class="fa fa-sign-in"></i>Login
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="./">
                    <img src="{{asset('assets')}}/images/icon/logo_panjang.png" alt="Apa Resepnya" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <ul class="navbar-mobile__list list-unstyled">
            <li class="{{ Request::is('/') ? 'active' : ''}}">
                <a href="{{url('/')}}">
                    Beranda
                </a>    
            </li>
            <li class="{{ Request::is('masakan/*') || Request::is('masakan') ? 'active' : ''}}" >
                <a href="{{url('masakan')}}">
                    Masakan
                </a>
            </li>
            <li class="{{ Request::is('minuman/*') || Request::is('minuman') ? 'active' : ''}}">
                <a href="{{url('minuman')}}">
                    Minuman
                </a>
            </li>
            <li class="{{ Request::is('cemilan/*') || Request::is('cemilan') ? 'active' : ''}}">
                <a href="{{url('cemilan')}}">
                    Cemilan
                </a>
            </li>
            <li class="{{ Request::is('artikel/*') || Request::is('artikel') ? 'active' : ''}}">
                <a href="{{url('artikel')}}">
                    Artikel
                </a>
            </li>
        </ul>
    </nav>
</header>
<div class="sub-header-mobile-2 d-block d-lg-none">
    <div class="header__tool header-button2">
        <div class="header-button-item js-item-menu">
            <i class="zmdi zmdi-search"></i>
            <div class="search-dropdown js-dropdown">
                <form action="">
                    <input class="au-input au-input--full au-input--h65" type="text" placeholder="Cari resep &amp; artikel..." />
                    <span class="search-dropdown__icon">
                        <i class="zmdi zmdi-search"></i>
                    </span>
                </form>
            </div>
        </div>
        @if(!empty(Auth::User()))
            <div class="header-button-item has-noti js-item-menu">
                <i class="zmdi zmdi-notifications"></i>
                    <div class="notifi-dropdown js-dropdown">
                        <div class="notifi__title">
                            <p>Kamu Punya 3 Pemberitahuan</p>
                        </div>
                    <div class="notifi__item">
                        <div class="bg-success img-cir img-40">
                            <i class="fa fa-comments-o"></i>
                        </div>
                        <div class="content">
                            <p>Rian mengomentari resep anda</p>
                            <span class="date">April 12, 2018 06:50</span>
                        </div>
                    </div>
                    <div class="notifi__item">
                        <div class="bg-warning img-cir img-40">
                            <i class="fa fa-ban"></i>
                        </div>
                        <div class="content">
                            <p>Robby melaporkan artikel ini</p>
                            <span class="date">April 12, 2018 06:50</span>
                        </div>
                    </div>
                    <div class="notifi__item">
                        <div class="bg-danger img-cir img-40">
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="content">
                            <p>Robby menyukai resep anda</p>
                            <span class="date">April 12, 2018 06:50</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="account-wrap">
                <div class="account-item account-item--style2 clearfix js-item-menu">
                    <div class="image">
                        @php 
                            $user = \App\DataUser::where('username',Auth::User()->username)->first();
                        @endphp  
                        @if(empty($user->foto))
                            @if(empty($user->jenkel) || $user->jenkel=='L')
                                <img src="{{asset('assets')}}/images/icon/male.jpg" alt="profile" class="rounded-circle avatar"/>
                            @else
                                <img src="{{asset('assets')}}/images/icon/female.png" alt="profile"class="rounded-circle avatar" />
                            @endif
                        @else
                            <img src="{{asset('assets')}}/images/icon/{{$user->foto}}" alt="profile"class="rounded-circle avatar" />
                        @endif
                    </div>
                    <div class="account-dropdown js-dropdown">
                        <div class="account-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="{{url('profile')}}">
                                <i class="zmdi zmdi-account"></i>Profil</a>
                            </div>
                            @if(Auth::User()->level=='1')
                                <div class="account-dropdown__item">
                                    <a href="{{url('admin/dashboard')}}">
                                    <i class="zmdi zmdi-menu"></i>Admin Tool</a>
                                </div>
                            @endif
                        </div>
                        <div class="account-dropdown__footer">
                            <form id="my_form" action="{{url('logout')}}" method="POST">
                            {{csrf_field()}}
                                <a href="javascript:{}" onclick="document.getElementById('my_form').submit();">
                                <i class="zmdi zmdi-power"></i>Logout</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="header-button-item js-item-menu">
                <i class="fa  fa-ellipsis-v"></i>
                    <div class="notifi-dropdown js-dropdown">
                        <div class="acFcount-dropdown__body">
                            <div class="account-dropdown__item">
                                <a href="{{url('data_masakan')}}">Data Masakan</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="{{url('data_minuman')}}">Data Minuman</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="{{url('data_cemilan')}}">Data Cemilan</a>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="{{url('data_artikel')}}">Data Artikel</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="account-wrap">
                    <div class="account-item account-item--style2 clearfix js-item-menu">
                        <div class="image">
                            <img src="{{asset('assets')}}/images/icon/male.jpg" alt="John Doe" />
                        </div>
                        <div class="account-dropdown js-dropdown">
                            <div class="account-dropdown__body">
                                <div class="account-dropdown__item">
                                    <a href="{{url('register')}}">
                                        <i class="fa fa-users"></i>Daftar
                                    </a>
                                </div>
                            </div>
                            <div class="account-dropdown__item">
                                <a href="{{url('login')}}">
                                    <i class="fa fa-sign-in"></i>Login
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
<!-- END HEADER MOBILE -->
