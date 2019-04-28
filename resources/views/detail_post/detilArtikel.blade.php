@extends('template.user_layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title')
    {{$detail_post->judul}} | Apa Resepnya
@endsection

@section('styles')
<style>
body{
    font-size: 14px;
}
</style>
@endsection

@section('contents')
@php  
$nama = \App\DataUser::where('id_data_user',$detail_post->id_data_user)->first(); 
$check = \App\User::where('username',$nama->username)->first();
@endphp
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            @if($detail_post->status == '1')
            <div class="col-xl-8 offset-xl-2">
                    <div class="row">
                        <div class="col-md-12">
                        @include('template.feedback')
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <h3 class="card-title mb-3 text-center"> {!! $detail_post->judul !!}</h3>
                                            <p>
                                            @if(empty($nama->foto))
                                                    @if(empty($nama->jenkel) || $nama->jenkel=='L')
                                                        <img src="{{asset('assets')}}/images/icon/male.jpg" class="rounded-circle profile"/>
                                                    @else
                                                        <img src="{{asset('assets')}}/images/icon/female.png" class="rounded-circle profile" />
                                                    @endif
                                                @else
                                                    <img src="{{asset('assets')}}/images/icon/{{$nama->foto}}" class="rounded-circle profile" />
                                                @endif
                                                <b>{{$nama->nama_lengkap}}</b>
                                                @if($check->level=='0')
                                                    <i class="fa fa-check-circle verified"></i>
                                                @elseif($check->level=='1')
                                                    <i class="fa fa-check-circle admin"></i>
                                                @endif

                                                <span class="text-lightgray">
                                                    <i class="fa fa-circle dot"></i>
                                                    {{date('d M Y', strtotime($detail_post->created_at))}}
                                                </span>
                                            </p>
                                        </div>
                                        <?php
                                            $check_pemilik = \App\Artikel::where('id_artikel',$detail_post->id_artikel)->first();
                                            if(!empty( Auth::User() )){
                                            $auth = Auth::User()->username;
                                            $check_user = \App\DataUser::where('username',$auth)->first();
                                            $like_status= \App\LikeArtikel::where('id_artikel',$detail_post->id_artikel)->where('id_data_user',$check_user->id_data_user)->get();
                                            }       
                                        ?>
                                        @if(@$user->username != @$auth)
                                            <div class="col-sm-1">  
                                            <button style="float:right" data-dismiss="modal" data-toggle="modal" data-target="#reportModal">
                                                <i class="fa fa-ellipsis-v" style="font-size:18pt;"></i>
                                            </button>
                                        </div>
                                     @else
                                        <div class="col-sm-1">    
                                            <div class="js-item-menu ">
                                                <button style="float:right">
                                                    <i class="fa fa-ellipsis-v" style="font-size:18pt;"></i>
                                                </button>
                                                <div class="account-dropdown js-dropdown">
                                                    <div class="account-dropdown__item">
                                                        <a href="{{url('edit_artikel/'.$detail_post->id_artikel .'')}}" class="text-black">Edit</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="">Hapus</a>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                        </div>
                                    </div>                                       
                                    <div class="row">
                                        <div class="col-sm-6">
                                       
                                        </div>
                                        <div class="col-sm-6 text-right">
                                        @if(empty(Auth::User()))
                                        <form action="{{url('likeArtikel/'.$detail_post->id_artikel.'')}}" method="Post" id="like">
                                                {{csrf_field()}}
                                                <a href="javascript:{}" onclick="document.getElementById('like').submit();"><i class="fa fa-heart text-secondary"></i> {{$jumlah_like->count('id_like_artikel')}} Suka &numsp;&numsp;</a>
                                            </form>
                                        @else
                                            @if($like_status->count('id_like_artikel') == '0')
                                            
                                            <form id="like" method="post" action="{{url('likeArtikel/'.$detail_post->id_artikel.'')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$check_user->id_data_user}}" id="nama" name="nama">
                                            <input type="hidden" value="{{$detail_post->id_artikel}}" id="artikel" name="artikel">
                                            <a href="javascript:{}" id="ajaxSubmit" onclick="document.getElementById('like').submit();"><i class="fa fa-heart text-secondary"></i> {{$jumlah_like->count('id_like_artikel')}} Suka &numsp;&numsp;</a>
                                            
                                            </form>
                                            @else
                                            <form action="{{url('likeArtikel/'.$detail_post->id_artikel.'')}}" method="Post" id="like2">
                                                {{csrf_field()}}
                                                {{ method_field('delete') }}
                                                <a href="javascript:{}" onclick="document.getElementById('like2').submit();"><i class="fa fa-heart text-danger"></i> {{$jumlah_like->count('id_like_tutorial')}} Suka &numsp;&numsp;</a>
                                            </form>
                                            @endif
                                        @endif
                                            <i class="fa fa-comments-o text-success"> </i>  {{$jumlah_komentar->count('id_comment_artikel')}} Komentar &numsp;&numsp;
                                            <i class="fa fa-eye text-warning"></i> 0 Dilihat &numsp;&numsp; 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12"><br></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="row">
                        <div class="col-xl-12">

                            @if(strpos(substr(strstr($detail_post->thumbnail,'assets'), 1),'/images/thumbnail'))
                                <img src="{{asset($detail_post->thumbnail)}}" class="gambar-post" id="foto">
                            @else
                                <img src="{{$detail_post->thumbnail}}" class="gambar-post" id="foto">
                            @endif

                            </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12"><br></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                        {!! $detail_post->isi_artikel !!}
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <form>
                                    <div class="row form-group">
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input placeholder="Tulis Komentar" id="komentar" name="komentar" class="form-control">
                                                <div class="input-group-btn">
                                                    <button type="submit" id="kirim-komen" class="btn btn-sm btn-orange">&numsp; Kirim &numsp;</button>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                               </form>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        @if($comments->count('id_comment_tutorial') == '0')
                                            <center><h1> Belum Ada Komentar</h1></center>
                                        @else
                                            @foreach($comments as $comment)
                                            <?php 
                                            $data_user = \App\DataUser::where('id_data_user',$comment->id_data_user)->first();
                                            ?>
                                                <div class="comment">
                                                    <b>{{$data_user->nama_lengkap}}</b><br>
                                                    {{$comment->comment}}<br><br>
                                                    {{date('H:s, d M Y ', strtotime($comment->created_at))}}
                                                </div>
                                            @endforeach
                                        @endif
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                        </div>
                    </div>

                
            </div>
            <div class="col-xl-2">
                @include('template.share_sosmed')
            </div>
            @else
                <h1><center>Data Resep Telah Di Block oleh Admin</center></h1>
            @endif
        </div>
    </div>
</section>
@endsection

@section('modals')
<div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="reportModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Laporkan Resep "{{$detail_post->judul}}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('detailArtikel/'.$detail_post->id_artikel.'/Laporkan')}}" method="post"  id="form-lapor">
                    {{csrf_field()}}
                    <table class="table table-hover">
                        <tbody>
                            @foreach($keterangan as $row)
                            <tr>
                                <td width="5%"><input type="radio" id="radio1" name="alasan" value="{{$row->keterangan}}" class="form-control"></td>
                                <td>{{$row->keterangan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-outline-orange" class="close" data-dismiss="modal" aria-label="Close">Kembali</button>
                <button type="button" class="btn btn-sm btn-orange" onclick="document.getElementById('form-lapor').submit();">Laporkan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}

});
$('#kirim-komen').click(function(e) {
    e. preventDefault();
    //setting variables based on the input fields
    var komentar = $('input[name="komentar"]').val();
    var data = {komentar:komentar};

    $.ajax({
        url: "{{url('detailArtikel/'.$id.'/comment')}}",
        type: "POST",
        data: data,
        success: function( msg ) {
                console.log("berhasil");
                document.getElementById('komentar').value='';
                $('.tampil-comment').append("</br>"+msg);
            }
        });

    });

</script>
@endsection
