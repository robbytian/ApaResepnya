@extends('template.user_layout')

@section('title')
  Beranda | Apa Resepnya
@endsection

@section('contents')
<!-- Carousel -->

<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <?php
                        $user1 = \App\DataUser::where('id_data_user',@$carousel_masakan->id_data_user)->first();
                        $user2 = \App\DataUser::where('id_data_user',@$carousel_minuman->id_data_user)->first();
                        $user3 = \App\DataUser::where('id_data_user',@$carousel_cemilan->id_data_user)->first();
                        $kategori1 =\App\Category::where('id_category',@$carousel_masakan->id_category)->first();
                        $kategori2 =\App\Category::where('id_category',@$carousel_minuman->id_category)->first();
                        $kategori3 =\App\Category::where('id_category',@$carousel_cemilan->id_category)->first();
                        $subCategory1 = \App\SubCategory::where('id_sub_post',@$carousel_masakan->id_sub_post)->first();
                        $subCategory2 = \App\SubCategory::where('id_sub_post',@$carousel_minuman->id_sub_post)->first();
                        $subCategory3 = \App\SubCategory::where('id_sub_post',@$carousel_cemilan->id_sub_post)->first();
                    
                ?>
                <div id="demo" class="carousel slide" data-ride="carousel" >
                    <ul class="carousel-indicators">
                    @if(!empty('carousel_masakan'))
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                    @endif
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>    
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src='{{empty($carousel_masakan) ? "assets/images/icon/logo-oren.png" : @$carousel_masakan->thumbnail}}' alt="" class="carousel-beranda" >
                            <div class="carousel-caption">
                                <span class="badge badge-secondary" style="opacity:0.5;border-radius:10px"> 
                                    <h3>{{empty($carousel_masakan) ? 'Belum Ada Resep Masakan' : @$carousel_masakan->judul}}</h3>
                                </span> <br>
                                <span class="badge badge-secondary text-capitalize">{{@$kategori1->deskripsi}}</span>
                                <span class="badge badge-primary">{{@$subCategory1->nama}}</span>
                                <p class="text-black font-11 profile-name">
                                    @if(empty($user1->foto))
                                        @if(empty($user1->jenkel) || $user1->jenkel=='L')
                                            <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                        @else
                                            <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                        @endif
                                    @else
                                        <img src="{{asset('assets')}}/images/icon/{{$user1->foto}}" class="rounded-circle profile" />
                                    @endif
                                    {{@$user1->nama_lengkap}}
                                    @if(@$user1->level=='1')
                                        <i class="fa fa-check-circle text-info" ></i>
                                    @endif
                                </p>
                            </div>   
                        </div>
                    
                        <div class="carousel-item">
                            <img src='{{empty($carousel_minuman) ? "assets/images/icon/logo-oren.png" : @$carousel_minuman->thumbnail}}' alt="" class="carousel-beranda">
                            <div class="carousel-caption">
                                <span class="badge badge-secondary" style="opacity:0.5;border-radius:10px"> 
                                    <h3>{{empty($carousel_minuman) ? 'Belum Ada Resep Minuman' : @$carousel_minuman->judul}}</h3>
                                </span><br>
                                <span class="badge badge-secondary text-capitalize">{{@$kategori2->deskripsi}}</span>
                                <span class="badge badge-primary">{{@$subCategory2->nama}}</span>
                                    <p class="text-black font-11 profile-name">
                                        @if(empty($user2->foto))
                                            @if(empty($user2->jenkel) || $user2->jenkel=='L')
                                                <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                            @else
                                                <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                            @endif
                                        @else
                                            <img src="{{asset('assets')}}/images/icon/{{$user2->foto}}" class="rounded-circle profile" />
                                        @endif
                                        {{$user2->nama_lengkap}}
                                        @if($user2->level=='1')
                                            <i class="fa fa-check-circle text-info" ></i>
                                        @endif
                                    </p>
                            </div>   
                        </div>

                        <div class="carousel-item">
                            <img src='{{empty($carousel_cemilan) ? "assets/images/icon/logo-oren.png" : @$carousel_cemilan->thumbnail}}' alt="" class="carousel-beranda">
                            <div class="carousel-caption">
                                <span class="badge badge-secondary" style="opacity:0.5;border-radius:10px"> 
                                    <h3>{{empty($carousel_cemilan) ? 'Belum Ada Resep Cemilan' : @$carousel_cemilan->judul}}</h3>
                                </span><br>
                                <span class="badge badge-secondary text-capitalize">{{@$kategori3->deskripsi}}</span>
                                <span class="badge badge-primary">{{@$subCategory3->nama}}</span>
                                <p class="text-black font-11 profile-name">
                                    @if(empty($user3->foto))
                                        @if(empty($user3->jenkel) || $user3->jenkel=='L')
                                            <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                        @else
                                            <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                        @endif
                                    @else
                                        <img src="{{asset('assets')}}/images/icon/{{$user3->foto}}" class="rounded-circle profile" />
                                    @endif
                                    {{$user3->nama_lengkap}}
                                    @if($user3->level=='1')
                                        <i class="fa fa-check-circle text-info" ></i>
                                    @endif
                                </p>
                            </div>   
                        </div>
                    </div>
               
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END Carousel-->
<!-- Terbaru-->
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="title-5 m-b-35">Terbaru</h3>
            </div>
        </div>
        @if($semua->count('id_post') == '0')
            <h2 class="text-center text-middle">Belum Ada Resep</h2>
        @endif
        <div class="row">
            @foreach($semua as $row)
                @php
                $subCategory = \App\SubCategory::where('id_sub_post',$row->id_sub_post)->first();
                $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first(); 
                $user = App\User::where('username',$nama->username)->first();
                $kategori =\App\Category::where('id_category',$row->id_category)->first();
                $jumlah_like = \App\Like::where('id_tutorial',$row->id_tutorial)->get();
                @endphp
                <div class="col-md-6">
                    <aside class="profile-nav alt ">
                        <section class="card">
                            <div class="card-header user-header alt bg-white">
                                <a href="{{url('detailPost/'.$row->id_tutorial.'')}}">
                                    <div class="media">
                                        <img class="card-img-top terbaru-img" src="{{@$row->thumbnail}}" alt="">
                                        <div class="card-body">
                                            <div class="mb-3 text-black font-12-5">
                                                <p class="judul"><b>{{@$row->judul}}</b></p>
                                                <span class="badge badge-secondary text-capitalize">{{$kategori->deskripsi}}</span>
                                                <span class="badge badge-primary">{{$subCategory->nama}}</span>
                                            </div>
                                            <p class="text-black font-11 profile-name">
                                                @if(empty($nama->foto))
                                                    @if(empty($nama->jenkel) || $nama->jenkel=='L')
                                                        <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                                    @else
                                                        <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                                    @endif
                                                @else
                                                    <img src="{{asset('assets')}}/images/icon/{{$nama->foto}}" class="rounded-circle profile" />
                                                @endif
                                                {{$nama->nama_lengkap}}
                                                @if($user->level=='1')
                                                    <i class="fa fa-check-circle text-info" ></i>
                                                @endif
                                            </p>
                                            <span>
                                            <small class="text-lightgray"><i class="fa fa-heart"></i> {{$jumlah_like->count('id_like_post')}}</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa fa-comments"></i> 1</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa  fa-calendar"></i> {{date('d M Y', strtotime($row->created_at))}}</small>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>                
                        </section>
                    </aside>
                </div>
            @endforeach
            @foreach($semua2 as $row)
            @php
                $subCategory = \App\ArtikelCategory::where('id_sub_artikel',$row->id_sub_artikel)->first();
                $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first(); 
                $user = App\User::where('username',$nama->username)->first();
                $jumlah_like_artikel = \App\LikeArtikel::where('id_artikel',$row->id_artikel)->get();
            @endphp
            <div class="col-md-6">
                <aside class="profile-nav alt ">
                    <section class="card">
                        <div class="card-header user-header alt bg-white">
                            <a href="{{url('detailArtikel/'.$row->id_artikel.'')}}">
                                <div class="media">
                                    <img class="card-img-top terbaru-img" src="{{@$row->thumbnail}}" alt="">
                                    <div class="card-body">
                                        <div class="mb-3 text-black font-12-5">
                                            <p class="judul"><b>{{@$row->judul}}</b></p>
                                            <span class="badge badge-secondary text-capitalize">Artikel</span>
                                            <span class="badge badge-primary">{{$subCategory->nama}}</span>
                                        </div>
                                        <p class="text-black font-11 profile-name">
                                            @if(empty($nama->foto))
                                                @if(empty($nama->jenkel) || $nama->jenkel=='L')
                                                    <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                                @else
                                                    <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                                @endif
                                            @else
                                                <img src="{{asset('assets')}}/images/icon/{{$nama->foto}}" class="rounded-circle profile" />
                                            @endif
                                            {{$nama->nama_lengkap}}
                                            @if($user->level=='1')
                                                <i class="fa fa-check-circle text-info" ></i>
                                            @endif
                                        </p>
                                        <span>
                                        <small class="text-lightgray"><i class="fa fa-heart"></i> {{$jumlah_like_artikel->count('id_like_artikel')}}</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa fa-comments"></i> 1</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa  fa-calendar"></i> {{date('d M Y', strtotime($row->created_at))}}</small>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>                
                    </section>
                </aside>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END Terbaru-->
<!-- Masakan-->
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="title-5 m-b-35">Masakan</h3>
            </div>
            <div class="col-6">
                <p class=" m-b-35 text-right">
                    <a href="{{url('masakan')}}">Lihat Lainnya ></a>
                </p>
            </div>
        </div>
        @if($masakan->count('id_post') == '0')
            <h2 class="text-center text-middle">Data Resep Tidak Ada</h2>
        @endif
        <div class="row">
            @foreach($masakan as $row)
                @php $subCategory = \App\SubCategory::where('id_sub_post',$row->id_sub_post)->first();
                    $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first(); 
                    $user = App\User::where('username',$nama->username)->first();
                    $kategori =\App\Category::where('id_category',$row->id_category)->first();
                    $jumlah_like = \App\Like::where('id_tutorial',$row->id_tutorial)->get();
                @endphp
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <a href="{{url('detailPost/'.$row->id_tutorial.'')}}">
                            <img class="card-img-top beranda-img" src="{{@$row->thumbnail}}" alt="">
                            <div class="card-body">
                                <div class="mb-1 text-black font-12-5">
                                    <p class="judul"><b>{{@$row->judul}}</b></p>
                                    <span class="badge badge-secondary text-capitalize">{{$kategori->deskripsi}}</span>
                                    <span class="badge badge-warning">{{$subCategory->nama}}</span>
                                </div>                        
                                <p class="text-black font-11">
                                    @if(empty($nama->foto))
                                        @if(empty($nama->jenkel) || $nama->jenkel=='L')
                                            <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                        @else
                                            <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                        @endif
                                    @else
                                        <img src="{{asset('assets')}}/images/icon/{{$nama->foto}}" class="rounded-circle profile" />
                                    @endif
                                    {{$nama->nama_lengkap}}
                                    @if($user->level=='1')
                                        <i class="fa fa-check-circle text-info" ></i>
                                    @endif
                                </p>    
                                <span>
                                <small class="text-lightgray"><i class="fa fa-heart"></i> {{$jumlah_like->count('id_like_post')}}</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa fa-comments"></i> 1</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa  fa-calendar"></i> {{date('d M Y', strtotime($row->created_at))}}</small>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- END Masakan-->
<!-- Minuman-->
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="title-5 m-b-35">Minuman</h3>
            </div>
            <div class="col-6">
                <p class=" m-b-35 text-right">
                    <a href="{{url('minuman')}}">Lihat Lainnya ></a>
                </p>
            </div>
        </div>
        @if($minuman->count('id_post') == '0')
        <h2 class="text-center text-middle">Data Resep Tidak Ada</h2>
        @endif
        <div class="row">
        @foreach($minuman as $row)
        @php 
            $subCategory = \App\SubCategory::where('id_sub_post',$row->id_sub_post)->first();
            $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first(); 
            $user = App\User::where('username',$nama->username)->first();
            $kategori =\App\Category::where('id_category',$row->id_category)->first();
            $jumlah_like = \App\Like::where('id_tutorial',$row->id_tutorial)->get();
        @endphp
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <a href="{{url('detailPost/'.$row->id_tutorial.'')}}">
                        <img class="card-img-top beranda-img" src="{{@$row->thumbnail}}" alt="">
                        <div class="card-body">
                            <div class="mb-1 text-black font-12-5">
                                <p class="judul"><b>{{@$row->judul}}</b></p>
                                <span class="badge badge-secondary text-capitalize">{{$kategori->deskripsi}}</span>
                                <span class="badge badge-warning">{{$subCategory->nama}}</span>
                            </div>                        
                            <p class="text-black font-11">
                                @if(empty($nama->foto))
                                    @if(empty($nama->jenkel) || $nama->jenkel=='L')
                                        <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                    @else
                                        <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                    @endif
                                @else
                                    <img src="{{asset('assets')}}/images/icon/{{$nama->foto}}" class="rounded-circle profile" />
                                @endif
                                {{$nama->nama_lengkap}}
                                @if($user->level=='1')
                                    <i class="fa fa-check-circle text-info" ></i>
                                @endif
                            </p>    
                            <span>
                            <small class="text-lightgray"><i class="fa fa-heart"></i> {{$jumlah_like->count('id_like_post')}}</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa fa-comments"></i> 1</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa  fa-calendar"></i> {{date('d M Y', strtotime($row->created_at))}}</small>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
<!-- END Minuman-->
<!-- Cemilan-->
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="title-5 m-b-35">Cemilan</h3>
            </div>
            <div class="col-6">
                <p class=" m-b-35 text-right">
                    <a href="{{url('cemilan')}}">Lihat Lainnya ></a>
                </p>
            </div>
        </div>
        @if($cemilan->count('id_post') == '0')
        <h2 class="text-center text-middle">Data Resep Tidak Ada</h2>
        @endif
        <div class="row">
        @foreach($cemilan as $row)
            @php $subCategory = \App\SubCategory::where('id_sub_post',$row->id_sub_post)->first();
                $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first(); 
                $user = App\User::where('username',$nama->username)->first();
                $kategori =\App\Category::where('id_category',$row->id_category)->first();
                $jumlah_like = \App\Like::where('id_tutorial',$row->id_tutorial)->get();
            @endphp
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <a href="{{url('detailPost/'.$row->id_tutorial.'')}}">
                        <img class="card-img-top beranda-img" src="{{@$row->thumbnail}}" alt="">
                        <div class="card-body">
                            <div class="mb-1 text-black font-12-5">
                                <p class="judul"><b>{{@$row->judul}}</b></p>
                                <span class="badge badge-secondary text-capitalize">{{$kategori->deskripsi}}</span>
                                <span class="badge badge-warning">{{$subCategory->nama}}</span>
                            </div>                        
                            <p class="text-black font-11">
                                @if(empty($nama->foto))
                                    @if(empty($nama->jenkel) || $nama->jenkel=='L')
                                        <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                    @else
                                        <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                    @endif
                                @else
                                    <img src="{{asset('assets')}}/images/icon/{{$nama->foto}}" class="rounded-circle profile" />
                                @endif
                                {{$nama->nama_lengkap}}
                                @if($user->level=='1')
                                    <i class="fa fa-check-circle text-info" ></i>
                                @endif
                            </p>    
                            <span>
                            <small class="text-lightgray"><i class="fa fa-heart"></i> {{$jumlah_like->count('id_like_post')}}</small>
                            <i class="fa fa-circle dot"></i>
                            <small class="text-lightgray"><i class="fa fa-comments"></i> 1</small>
                            <i class="fa fa-circle dot"></i>
                            <small class="text-lightgray"><i class="fa  fa-calendar"></i> {{date('d M Y', strtotime($row->created_at))}}</small>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
<!-- END Cemilan-->
<!-- Artikel-->
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="title-5 m-b-35">Artikel</h3>
            </div>
            <div class="col-6">
                <p class=" m-b-35 text-right">
                    <a href="{{url('artikel')}}">Lihat Lainnya ></a>
                </p>
            </div>
        </div>
        @if($artikel->count('id_artikel') == '0')
        <h2 class="text-center text-middle">Belum Ada Artikel</h2>
        @endif
        <div class="row">
            
       @foreach($artikel as $row)        
        @php
        $subCategory = \App\ArtikelCategory::where('id_sub_artikel',$row->id_sub_artikel)->first();
        $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first(); 
        $user = App\User::where('username',$nama->username)->first();
        $jumlah_like_artikel = \App\LikeArtikel::where('id_artikel',$row->id_artikel)->get();
        @endphp
            <div class="col-md-6">
                <aside class="profile-nav alt ">
                    <section class="card">
                        <div class="card-header user-header alt bg-white">
                            <a href="{{url('detailArtikel/'.$row->id_artikel.'')}}">
                                <div class="media">
                                    <img class="card-img-top terbaru-img" src="{{@$row->thumbnail}}" alt="">
                                    <div class="card-body">
                                        <div class="mb-3 text-black font-12-5">
                                            <p class="judul"><b>{{@$row->judul}}</b></p>
                                            <span class="badge badge-secondary text-capitalize">Artikel</span>
                                            <span class="badge badge-primary">{{$subCategory->nama}}</span>
                                        </div>
                                        <p class="text-black font-11 profile-name">
                                            @if(empty($nama->foto))
                                                @if(empty($nama->jenkel) || $nama->jenkel=='L')
                                                    <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                                @else
                                                    <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                                @endif
                                            @else
                                                <img src="{{asset('assets')}}/images/icon/{{$nama->foto}}" class="rounded-circle profile" />
                                            @endif
                                            {{$nama->nama_lengkap}}
                                            @if($user->level=='1')
                                            <i class="fa fa-check-circle text-info" ></i>
                                            @endif
                                        </p>
                                        <span>
                                        <small class="text-lightgray"><i class="fa fa-heart"></i> {{$jumlah_like_artikel->count('id_like_artikel')}}</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa fa-comments"></i> 1</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa  fa-calendar"></i> {{date('d M Y', strtotime($row->created_at))}}</small>
                                        </span>
                                    </div>
                                </div>
                            </a>
                        </div>                
                    </section>
                </aside>
            </div>
        @endforeach
        </div>   
    </div>
</section>
<!-- END Artikel-->
@include('template.footer')
@endsection
