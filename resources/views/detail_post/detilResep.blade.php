@extends('template.user_layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title')
{{@$detail_post->judul}} | Apa Resepnya
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
$check = \App\User::where('username',$nama->username)->first() 
@endphp
@php
$i = 1;
$a = 1;
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
                                            <h3 class="card-title mb-3 text-center">{{@$detail_post->judul}}</h3>     
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
                                            $check_pemilik = \App\Post::where('id_tutorial',$detail_post->id_tutorial)->first();
                                            if(!empty( Auth::User() )){
                                            $auth = Auth::User()->username;
                                            $check_user = \App\DataUser::where('username',$auth)->first();
                                            $like_status= \App\Like::where('id_tutorial',$detail_post->id_tutorial)->where('id_data_user',$check_user->id_data_user)->get();
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
                                                        <a href="{{url('edit_resep/'.$detail_post->id_tutorial.'')}}" class="text-black">Edit</a>
                                                    </div>
                                                    <div class="account-dropdown__item">
                                                        <a href="javascript:{}" class="item deleteResep" data-resep="{{$detail_post->id_tutorial}}" data-judul="{{$detail_post->judul}}">Hapus</a>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            &numsp;&numsp;&nbsp;
                                            <i class="fa fa-cutlery text-info"></i> {{@$detail_post->porsi}} Orang &numsp;&numsp;
                                            <i class="fa fa-clock-o text-primary"></i> {{@$detail_post->waktu_masak}} Menit
                                        </div>
                                        <div class="col-sm-6 text-right">
                                            @if(empty(Auth::User()))
                                                <form action="{{url('likePost/'.$detail_post->id_tutorial.'')}}" method="Post" id="like">
                                                    {{csrf_field()}}
                                                    <a href="javascript:{}" onclick="document.getElementById('like').submit();">
                                                        <i class="fa fa-heart text-secondary"></i> 
                                                        {{$jumlah_like->count('id_like_tutorial')}} Suka &numsp;&numsp;
                                                    </a>
                                                </form>  
                                            @else
                                                @if($like_status->count('id_like_tutorial') == '0')                      
                                                    <form id="like" method="post" action="{{url('likePost/'.$detail_post->id_tutorial.'')}}">
                                                        {{csrf_field()}}
                                                        <input type="hidden" value="{{$check_user->id_data_user}}" id="nama" name="nama">
                                                        <input type="hidden" value="{{$detail_post->id_tutorial}}" id="tutorial" name="tutorial">
                                                        <a href="javascript:{}" id="ajaxSubmit" onclick="document.getElementById('like').submit();"><i class="fa fa-heart text-secondary"></i> {{$jumlah_like->count('id_like_tutorial')}} Suka &numsp;&numsp;</a>
                                                    </form>
                                                @else
                                                    <form action="{{url('likePost/'.$detail_post->id_tutorial.'')}}" method="Post" id="like2">
                                                        {{csrf_field()}}
                                                        {{ method_field('delete') }}
                                                        <a href="javascript:{}" onclick="document.getElementById('like2').submit();"><i class="fa fa-heart text-danger"></i> {{$jumlah_like->count('id_like_tutorial')}} Suka &numsp;&numsp;</a>
                                                    </form>
                                                @endif
                                            @endif   
                                            <i class="fa fa-comments-o text-success"> </i>  {{$jumlah_komentar->count('id_comment_tutorial')}} Komentar &numsp;&numsp;
                                            <i class="fa fa-eye text-warning"></i> 0 Dilihat &numsp;&numsp;                                
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-12"><br></div>
                                        <div class="col-xl-12">
                                            @if(!empty($detail_post->video_header))
                                                @if(strpos(substr(strstr($detail_post->video_header,'assets'), 1),'/images/video'))
                                                    <video class="detResepVid" controls>
                                                        <source src="{{asset($detail_post->video_header)}}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video> 
                                                @else
                                                    <iframe class="detResepVid" src="http://www.youtube.com/embed/{{$detail_post->video_header}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                @endif
                                            
                                                
                                            @else
                                                @if(strpos(substr(strstr($detail_post->thumbnail,'assets'), 1),'/images/thumbnail'))
                                                    <img src="{{asset($detail_post->thumbnail)}}" class="gambar-post" id="foto">
                                                @else
                                                    <img src="{{$detail_post->thumbnail}}" class="gambar-post" id="foto">
                                                @endif
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card table-responsive" style="margin-top:0.2cm;min-height:5cm;max-height:7.5cm;">
                                        <div class="card-header text-center">Menu</div>
                                        <div class="card-body">
                                            <nav>
                                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                    <a class="btn btn-outline-orange btn-sm btn-block active" id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi"
                                                        aria-selected="true" >Deskripsi Resep</a>
                                                    <a class="btn btn-outline-orange btn-sm btn-block" id="bahan-tab" data-toggle="tab" href="#bahan" role="tab" aria-controls="bahan"
                                                        aria-selected="true" >Bahan - bahan</a>
                                                        
                                                    @foreach($langkah as $row)
                                                    <a class="btn btn-outline-orange btn-sm btn-block" id="langkah-{{$row->id_langkah}}-tab" data-toggle="tab" href="#langkah-{{$row->id_langkah}}" role="tab" aria-controls="langkah-{{$row->id_langkah}}"
                                                        aria-selected="true">Langkah {{$a++}}</a>
                                                    @endforeach
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="deskripsi" role="tabpanel" aria-labelledby="deskripsi-tab">
                                            <div class="card table-responsive" style="height:7.5cm;">
                                                <div class="card-header text-center">Deskripsi Resep</div>
                                                <div class="card-body">
                                                    {!! @$detail_post->deskripsi !!}
                                                    {{-- <nav>
                                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                            <a class="btn btn-outline-orange btn-sm " id="deskripsi-tab" data-toggle="tab" href="#deskripsi" role="tab" aria-controls="deskripsi"
                                                                aria-selected="true" >Sebelumnya</a>
                                                            <a class="btn btn-outline-orange btn-sm " id="bahan-tab" data-toggle="tab" href="#bahan" role="tab" aria-controls="bahan"
                                                                aria-selected="true" >Berikutnya</a>
                                                        </div>
                                                    </nav> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="bahan" role="tabpanel" aria-labelledby="bahan-tab">
                                            <div class="card table-responsive" style="height:7.5cm;">
                                                <div class="card-header text-center">Bahan - Bahan</div>
                                                <div class="card-body">
                                                <ol type="1">
                                                    @foreach($bahan as $row)
                                                        <li>{{$row->bahan}}</li>
                                                    @endforeach
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($langkah as $row)
                                        <div class="tab-pane fade" id="langkah-{{$row->id_langkah}}" role="tabpanel" aria-labelledby="langkah-{{$row->id_langkah}}-tab">
                                            <div class="card table-responsive" style="height:7.5cm;">
                                                <div class="card-header text-center">
                                                    Langkah {{$i++}}
                                                </div>
                                                <div class="card-body">
                                                    {{$row->langkah}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">       
                                <div class="card-header">
                        
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
                                <div class="card-body tampil-comment">
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
<div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <form action="{{route('masakan_delete')}}" method="POST">
               {{ method_field('delete') }}
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Hapus Masakan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Anda Yakin ingin Hapus Resep</p>
                <p id="judul" class="text-center"></p>
                <input type="hidden", name="konfirmasiDelete" id="app_id">
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-outline-orange" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-orange"> Hapus </a>
            </div> 
            </form>
        </div>
    </div>
</div>

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
                <form action="{{url('detailPost/'.$detail_post->id_tutorial.'/Laporkan')}}" method="post" id="form-lapor">
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
<script>
$(document).on('click','.deleteResep',function(){
// var userID=$(this).attr('data-resep');
// var Judul = $(this).attr('data-judul');
// $('#app_id').val(userID); 
// $('#judul').text('"'+Judul+'"'+' ?');
console.log("berhasil");
$('#deleteModal').modal('show'); 
});
</script>

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
        url: "{{url('detailPost/'.$id.'/comment')}}",
        type: "POST",
        data: data,
        success: function( msg ) {
                console.log("berhasil");
                document.getElementById('komentar').value='';
                
            }
        });

    });

</script>
@endsection



