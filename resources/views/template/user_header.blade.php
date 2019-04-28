<!-- HEADER DESKTOP-->

<header class="header-desktop2 d-none d-lg-block">
    <div class="section__content section__content--p35">
        <div class="header3-wrap">
            <div class="header__logo">
                <a href="{{url('/')}}">
                    <img src="{{asset('assets')}}/images/icon/logo_panjang.png" alt="Apa Resepnya" />
                </a>
            </div>
            <div class="header__navbar">
                <ul class="list-unstyled">
                    <li class="{{ Request::is('/')? 'active' : ''}}">
                        <a href="{{url('/')}}">Beranda</a>    
                    </li>
                    <li class="{{ Request::is('masakan/*') || Request::is('masakan')  || Request::path()=='filterMasakan' ? 'active' : ''}}" >
                        <a href="{{url('masakan')}}">Masakan</a>
                    </li>
                    <li class="{{ Request::is('minuman/*') || Request::is('minuman')  || Request::path()=='filterMinuman'? 'active' : ''}}">
                        <a href="{{url('minuman')}}">Minuman</a>
                    </li>
                    <li class="{{ Request::is('cemilan/*') || Request::is('cemilan')  || Request::path()=='filterCemilan'? 'active' : ''}}">
                        <a href="{{url('cemilan')}}">Cemilan</a>
                    </li>
                    <li class="{{ Request::is('artikel/*') || Request::is('artikel')  || Request::path()=='filterArtikel'? 'active' : ''}}">
                        <a href="{{url('artikel')}}">Artikel</a>
                    </li>
                </ul>
            </div>
            <div class="header__tool header-button2">
                <div class="header-button-item js-item-menu">
                    <i class="zmdi zmdi-search"></i>
                    <div class="search-dropdown js-dropdown">
                        <form action="{{route('search.all')}}" autocomplete="off" method="get" id="allSearch">
                            <input class="au-input au-input--full au-input--h65" ID="search" name="cari" type="text" placeholder="Cari resep &amp; artikel..." />
                            <span class="search-dropdown__icon">
                                <a href="javascript:{}" onclick="document.getElementById('allSearch').submit();""><i class="zmdi zmdi-search"></i></a>
                            </span>
                        </form>
                    </div>
                </div>
                
                @if(!empty(Auth::User()))
                <?php   $cek = [];
                    $cek2 = [];
                    $nama = \App\DataUser::where('username',Auth::User()->username)->first();
                    foreach(\App\AktivitasUser::all() as $row){
                        if($row->id_tutorial != null){
                            $cek[] = \App\Post::where('id_tutorial',$row->id_tutorial)->first();

                        }
                        if($row->idartikel != null){
                            $cek2[] = \App\Artikel::where('id_artikel',$row->id_artikel)->first();
                        }
                    }
                    $hitung = 0;
                    foreach($cek2 as $row){
                        if($cek2->id_data_user == $nama->id_data_user){
                            $hitung +=1;
                        }
                    }
                    foreach($cek as $row){
                        if($cek->id_data_user == $nama->id_data_user){
                            $hitung +=1;
                        }
                    }
                ?>
                    <div class="header-button-item has-noti js-item-menu">
                        <i class="zmdi zmdi-notifications"></i>
                        <div class="notifi-dropdown js-dropdown">
                            <div class="notifi__title">
                                <p>Kamu Punya {{$hitung}} Pemberitahuan</p>
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
                                            <i class="zmdi zmdi-account"></i>Profil
                                        </a>
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
                                            <i class="zmdi zmdi-power"></i>Logout
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="header-button-item js-item-menu">
                        <i class="fa fa-ellipsis-v"></i>
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
                                    <div class="account-dropdown__item">
                                        <a href="{{url('riwayat_laporan')}}">Riwayat Laporan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            @if(Request::is('login'))
                                <div class="account-wrap">
                                    <a href="{{url('register')}}" class="btn btn-sm btn-white">&numsp; Daftar &numsp;</a>
                                </div>
                            @else
                                <div class="account-wrap">
                                    <a href="{{url('login')}}" class="btn btn-sm btn-white">&numsp; Masuk &numsp;</a>
                                </div>
                            @endif
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
                <a href="{{url('/')}}">Beranda</a>    
            </li>
            <li class="{{ Request::is('masakan/*') || Request::is('masakan') ? 'active' : ''}}" >
                <a href="{{url('masakan')}}">Masakan</a>
            </li>
            <li class="{{ Request::is('minuman/*') || Request::is('minuman') ? 'active' : ''}}">
                <a href="{{url('minuman')}}">Minuman</a>
            </li>
            <li class="{{ Request::is('cemilan/*') || Request::is('cemilan') ? 'active' : ''}}">
                <a href="{{url('cemilan')}}">Cemilan</a>
            </li>
            <li class="{{ Request::is('artikel/*') || Request::is('artikel') ? 'active' : ''}}">
                <a href="{{url('artikel')}}">Artikel</a>
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
                    <i class="fa fa-ellipsis-v"></i>
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
                        <div class="account-wrap">
                            <a href="{{url('login')}}" class="btn btn-sm btn-white">&numsp; Masuk &numsp;</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<?php  
$tutorial=DB::table('tutorial')->select('tutorial.judul');
$dataPost=DB::table('artikel')->select('artikel.judul')->union($tutorial)->get();
$a=null;
?>
<script>
var data = [@foreach($dataPost as $row)<?php $a != 1 ? $a = 1: $a++;?>{!!$a == count($dataPost) ? "\"$row->judul\"" : "\"$row->judul\","!!}@endforeach];
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items au-input au-input--full au-input--h65");
      a.setAttribute('style',"background:ghostwhite")
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

autocomplete(document.getElementById("search"), data);
</script>

