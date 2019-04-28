@extends('template.user_layout')

@section('title')
  Data Laporan | Apa Resepnya
@endsection

@section('styles')
@endsection

@section('contents')

<!-- Masakan-->
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="title-5 m-b-35">Data Laporan</h3>
            </div>
        </div>
        @if($laporanku->count('id_laporan')=='0')
        <h1><center>Anda Tidak Melaporkan Post Apapun</center></h1>
        @else
        <div class="row">
            <div class="col-xl-12 table-responsive top-campaign">
            @include('template.feedback')
                <table class="table tabledata table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Post</th>
                            <th>Pemilik</th>
                            <th>Category</tH>
                            <th>Alasan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i =1;?>
                        @foreach($laporanku as $row)
                        @if($row->id_tutorial==null && $row->id_artikel==null)
                        @else

                            @if($row->id_tutorial!=null)
                            <?php 
                            $judul = \App\Post::where('id_tutorial',$row->id_tutorial)->first();
                            $nama= \App\DataUser::where('id_data_user',$judul->id_data_user)->first();
                            $category = \App\Category::where('id_category',$judul->id_category)->first();
                            $category2 = $category->deskripsi;
                            ?>
                            @elseif($row->id_tutorial==null)
                            <?php 
                            $judul = \App\Artikel::where('id_artikel',$row->id_artikel)->first();
                            $nama= \App\DataUser::where('id_data_user',$judul->id_data_user)->first();
                            $category2 = "Artikel";
                            ?>
                            @endif
                            <tr>
                                <td>{{ !empty($i) ? ++$i : $i = 1}}</td>
                                <td>{{$judul->judul}}</td>
                                <td>{{$nama->nama_lengkap}}</td>
                                <td>{{$category2}}</td>
                                <td>{{$row->alasan}}</td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item deleteData"  data-resep="{{$row->id_laporan}}" data-judul="{{$judul->judul}}">
                                            <i class="zmdi zmdi-close"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endif
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
        <form action="{{route('laporan_batal')}}" method="POST">
               {{ method_field('delete') }}
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Batalkan Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Anda Yakin ingin Membatalkan Laporan Terhadap Post </p>
                <p id="judul" class="text-center"></p>
                <input type="hidden", name="konfirmasiDelete" id="app_id">
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-outline-orange" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-orange"> Yakin </a>
            </div> 
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).on('click','.deleteData',function(){
    var userID=$(this).attr('data-resep');
    var Judul = $(this).attr('data-judul');
    $('#app_id').val(userID); 
    $('#judul').text('"'+Judul+'"'+' ?');
    $('#deleteModal').modal('show'); 
});
</script>
@endsection