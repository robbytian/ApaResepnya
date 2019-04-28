@extends('template.user_layout')

@section('title')
  Artikel Saya | Apa Resepnya
@endsection

@section('styles')
@endsection

@section('contents')
<!-- Masakan-->
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="title-5 m-b-35">Data Artikel</h3>
            </div>
            <div class="col-md-6">
                <p class=" m-b-35" style="text-align:right;">
                    <a href="{{url('artikel/buat_artikel')}}" class="btn" style="background-color:#e44d26;color:white;">
                    Buat Artikel</a>
                </p>
            </div>
        </div>
        @if($artikelku->count('id_post')=='0')
        <h1><center>Belum ada data </center></h1>
        @else
        <div class="row">
            <div class="col-xl-12 table-responsive top-campaign">
            @include('template.feedback')
                <table class="table tabledata table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Artikel</th>
                            <th>Kategori</th>
                            <th>Komentar</th>
                            <th>Like</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($artikelku as $row)
                       <?php 
                       $category = \App\SubArtikel::where('id_sub_artikel',$row->id_sub_artikel)->first(); 
                       if($row->status=='-1'){$cek_block = \App\BlockPost::where('id_artikel',$row->id_artikel)->first(); $id_block = $cek_block->alasan; } else{$id_block='';}
                       ?>
                        <tr>
                            <td class="{{$row->status!='1' ? 'alasanBlock' : ''}}" data-toggle="{{$row->status!='1' ? 'modal' : ''}}" data-target="{{$row->status!='1' ? '#modalDetail' : ''}}" data-alasan="{{$id_block}}">{{ !empty($i) ? ++$i : $i = 1}}</td>
                            <td class="{{$row->status!='1' ? 'alasanBlock' : ''}}" data-toggle="{{$row->status!='1' ? 'modal' : ''}}" data-target="{{$row->status!='1' ? '#modalDetail' : ''}}" data-alasan="{{$id_block}}">@if($row->status =='1'){{$row->judul}}@else {{$row->judul}} <label style="color:red">[Blocked]</label> @endif</td>
                            <td class="{{$row->status!='1' ? 'alasanBlock' : ''}}" data-toggle="{{$row->status!='1' ? 'modal' : ''}}" data-target="{{$row->status!='1' ? '#modalDetail' : ''}}" data-alasan="{{$id_block}}">{{$category->nama}}</td>
                            <td class="{{$row->status!='1' ? 'alasanBlock' : ''}}" data-toggle="{{$row->status!='1' ? 'modal' : ''}}" data-target="{{$row->status!='1' ? '#modalDetail' : ''}}" data-alasan="{{$id_block}}">-</td>
                            <td class="{{$row->status!='1' ? 'alasanBlock' : ''}}" data-toggle="{{$row->status!='1' ? 'modal' : ''}}" data-target="{{$row->status!='1' ? '#modalDetail' : ''}}" data-alasan="{{$id_block}}">-</td>
                            <td>
                                <div class="table-data-feature">
                                @if($row->status=='1')
                                    <a class="item" data-toggle="tooltip" data-placement="top" title="View" href="detailArtikel/{{$row->id_artikel}}" >
                                        <i class="zmdi zmdi-eye"></i>
                                    </a>
                                @endif
                                    <a href="{{url('edit_artikel/'.$row->id_artikel .'')}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="zmdi zmdi-edit"></i>
                                    </a>
                                    <button class="item deleteData"  data-artikel="{{$row->id_artikel}}" data-judul="{{$row->judul}}">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>   
                    @endforeach
                    </tbody>
                </table>
                <div style="float:right;size:20px"></div>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>

<!-- END Masakan-->

@include('template.footer')
@endsection

@section('modals')
<div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <form action="{{route('artikel_delete')}}" method="POST">
               {{ method_field('delete') }}
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Hapus Artikel</h5>
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

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Alasan Diblock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p id="alasan"> </p>
            </div>
            <div class="modal-footer">
            <button type="close" class="btn btn-outline-orange" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).on('click','.deleteData',function(){
    var userID=$(this).attr('data-artikel');
    var Judul = $(this).attr('data-judul');
    $('#app_id').val(userID); 
    $('#judul').text('"'+Judul+'"'+' ?');
    $('#deleteModal').modal('show'); 
});

$(document).on('click','.alasanBlock',function(){
    var alasan=$(this).attr('data-alasan'); 
    $('#alasan').text(alasan);
    $('#modalDetail').modal('show'); 
});
</script>
@endsection