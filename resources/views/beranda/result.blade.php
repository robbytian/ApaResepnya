@extends('template.user_layout')

@section('title')
  Hasil Pencarian | Apa Resepnya
@endsection

@section('contents')
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-xl-2">

            </div>
            <div class="col-xl-8 scroll-post">
                <div class="page-content">
                @if($hasil_pencarian!='0')
                    @if($hasil_pencarian->count('id_post') == '0' || $hasil_pencarian=='0')
                        <h1 class="text-center align-middle">Data Resep/Artikel Tidak Ada</h1>
                    @endif
                    <h3>Data Yang Anda Cari : {{$cari}}</h3><br>
                    <div class="row">
                        @foreach($hasil_pencarian as $row)
                            <?php 
                            if(!empty($row->id_sub_post)) {$subCategory = \App\SubCategory::where('id_sub_post',$row->id_sub_post)->first();}else{$subCategory = \App\SubArtikel::where('id_sub_artikel',$row->id_sub_artikel)->first();}
                            if(!empty($row->id_category)){$category =\App\Category::where('id_category',$row->id_category)->first();}else{$category = 'Artikel';}
                
                                $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first(); 
                                $user = App\User::where('username',$nama->username)->first();
                               
                            ?>
                             
                            <div class="col-md-4">
                                <div class="card">
                                @if(!empty($row->id_tutorial))
                                    <a href="{{url('detailPost/'.$row->id_tutorial.'')}}">
                                @else
                                <a href="{{url('detailArtikel/'.$row->id_artikel.'')}}">
                                @endif
                                        <img class="card-img-top beranda-img" src="{{@$row->thumbnail}}" alt="">
                                        <div class="card-body">
                                            <div class="mb-1 text-black font-12-5">
                                                <p class="judul-post"><b>{{@$row->judul}}</b></p>
                                                <span class="badge badge-secondary text-capitalize">{{!empty($row->id_category) ? $category->deskripsi : 'Artikel' }}</span>
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
                                            <small class="text-lightgray"><i class="fa fa-heart"></i> 3</small>
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
                    @else
                    <h1 class="text-center align-middle">Data Resep/Artikel Tidak Ada</h1>
                    @endif
                </div>
            </div>
            <div class="col-xl-2">
                @include('template.share_sosmed')
            </div>
        </div>
    </div>
</section>
@endsection