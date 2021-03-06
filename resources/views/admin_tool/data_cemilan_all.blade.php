@extends('template.admin_layout')

@section('title')
  Data Cemilan | Apa Resepnya
@endsection

@section('contents')
<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35">Data Cemilan</h3>
    </div>
</div>
<div class="col-xl-12 table-responsive top-campaign">
@include('template.feedback')
    <table class="table tabledata table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama User</th>
                <th>Judul Resep</th>
                <th>Kategori</th>
                <th>Komentar</th>
                <th>Aksi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            
                @foreach($semua_cemilan as $row)
            <?php 
            $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first();
            $user = \App\User::where('username',$nama->username)->first();
            $category = \App\SubCategory::where('id_sub_post',$row->id_sub_post)->first();
            $block = \App\BlockPost::where('id_tutorial',$row->id_tutorial)->first();
            ?>
            <tr>
                <td>{{ !empty($i) ? ++$i : $i = 1}}</td>
                <td>{{$nama->nama_lengkap}}
                    @if($user->level=='0')
                        <i class="fa fa-check-circle verified"></i>
                    @elseif($user->level=='1')
                        <i class="fa fa-check-circle admin"></i>
                    @endif                    
                </td>
                <td>{{$row->judul}}</td>
                <td>{{$category->nama}}</td>
                <td>0</td>
                <td>
                <div class="table-data-feature">
                        @if($row->status =='1')
                        <button class="item blockData" data-toggle="modal" data-target="#blockModal" data-resep2="{{$row->id_tutorial}}">
                            <i class="fa fa-lock"></i>
                        </button>
                        @elseif($row->status =='-1')
                        <button class="item unblockData" data-toggle="modal" data-target="#unblockModal" data-resep3="{{$block->id_block}}" data-judul3="{{$row->judul}}">
                            <i class="fa fa-unlock"></i>
                        </button>
                        @endif
                        {{-- <button class="item deleteData" data-toggle="modal" data-target="#deleteModal"  data-nama="{{$nama->nama_lengkap}}" data-resep="{{$row->id_tutorial}}" data-judul="{{$row->judul}}">
                            <i class="fa fa-trash"></i>
                        </button> --}}
                        <a class="item" href="{{url('detailPost/'.$row->id_tutorial.'')}}">
                            <i class="zmdi zmdi-eye"></i>
                        </a>
                    </div>
                </td>
                <td>
                @if($row->status =='1')
                <p style="color:blue;">Available</p>
                @elseif($row->status =='-1')
                <p style="color:red;">Blocked</p>
                @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('modals')
<div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <form action="{{route('resep_delete_all')}}" method="POST">
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
                <center><p style="display:inline">Oleh : <p id="oleh" style="display:inline"></p></p></center>
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

<div class="modal fade " id="blockModal"  role="dialog" aria-labelledby="blockModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content">
        <form action="{{route('resep_block')}}" method="POST">
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Block Resep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Alasan Block :</p>
                <div class="form-group">              
                    <textarea class="form-control" name="alasan" required></textarea>
                    <input type="hidden" name="blockKey" id="app_id2">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-outline-orange" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-orange"> Block </a>
            </div> 
            </form>
        </div>
    </div>
</div>

<div class="modal fade " id="unblockModal"  role="dialog" aria-labelledby="unblockModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content">
        <form action="{{route('resep_unblock')}}" method="POST">
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Unblock Resep</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Anda Yakin ingin Unblock Resep</p>
                <p id="judul3" class="text-center"></p>
                <input type="hidden" name="unblock" id="app_id3">
                
            </div>
            <div class="modal-footer">
                <button type="close" class="btn btn-outline-orange" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-outline-orange"> Unblock </a>
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
    var Nama = $(this).attr('data-nama');
    $('#app_id').val(userID); 
    $('#judul').text('"'+Judul+'"'+' ?');
    $('#deleteModal').modal('show'); 
    $('#oleh').text(Nama);
});

$(document).on('click','.blockData',function(){
    var userID2=$(this).attr('data-resep2');
    $('#app_id2').val(userID2); 
    $('#blockModal').modal('show'); 
});

$(document).on('click','.unblockData',function(){
    var userID3=$(this).attr('data-resep3');
    var Judul = $(this).attr('data-judul3');
    $('#app_id3').val(userID3); 
    $('#judul3').text('"'+Judul+'"'+' ?');
    $('#unblockModal').modal('show'); 
});
</script>
@endsection