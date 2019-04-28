@extends('template.user_layout')

@section('title')
  Artikel | Apa Resepnya
@endsection

@section('contents')
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-xl-2">
                @include('template.sub_artikel')
            </div>
            <div class="col-xl-8 scroll-post">
                <div class="page-content">
                    @if($artikel_filter->count('id_post') == '')
                        <h1 class="text-center align-middle">Belum Ada Artikel</h1>
                    @endif
                    <div class="row">
                        @foreach($artikel_filter as $row)
                            @php 
                                $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first(); 
                                $subCategory = \App\ArtikelCategory::where('id_sub_artikel',$row->id_sub_artikel)->first(); 
                                $user = App\User::where('username',$nama->username)->first();
                                $jumlah_like = \App\LikeArtikel::where('id_artikel',$row->id_artikel)->get();
                            @endphp
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="{{url('detailPost/'.$row->id_tutorial.'')}}">
                                        <img class="card-img-top beranda-img" src="{{@$row->thumbnail}}" alt="">
                                        <div class="card-body">
                                            <div class="mb-1 text-black font-12-5">
                                                <p class="judul-post"><b>{{@$row->judul}}</b></p>
                                                <span class="badge badge-secondary text-capitalize">Artikel</span>
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
                                               <small class="text-lightgray"><i class="fa fa-heart"></i> {{$jumlah_like->count('id_like_artikel')}}</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa fa-comments"></i> 1000</small>
                                            <i class="fa fa-circle dot"></i>
                                            <small class="text-lightgray"><i class="fa  fa-calendar"></i> {{date('d M Y', strtotime($row->created_at))}}</small>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$artikel_filter->render()}}
                </div>
            </div>
            <div class="col-xl-2">
                @include('template.share_sosmed')
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 position-fixed">
                @include('template.footer')
            </div>
        </div>
    </div>
</section>
@endsection