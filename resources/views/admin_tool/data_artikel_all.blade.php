@extends('template.admin_layout')

@section('title')
  Data Artikel | Apa Resepnya
@endsection

@section('contents')
<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35">Data Artikel</h3>
    </div>
</div>
    <div class="col-xl-12 table-responsive top-campaign">
    @include('template.feedback')
        <table class="table tabledata table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama User</th>
                    <th>Judul Artikel</th>
                    <th>Kategori</th>
                    <th>Komentar</th>
                    <th>Aksi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($semua_artikel as $row)
                <?php 
                $nama = \App\DataUser::where('id_data_user',$row->id_data_user)->first();
                $user = \App\User::where('username',$nama->username)->first();
                $category = \App\SubArtikel::where('id_sub_artikel',$row->id_sub_artikel)->first();
                $block = \App\BlockPost::where('id_artikel',$row->id_artikel)->first();
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
                        <button class="item blockData" data-toggle="modal" data-target="#blockModal" data-artikel2="{{$row->id_artikel}}">
                            <i class="fa fa-lock"></i>
                        </button>
                        @elseif($row->status =='-1')
                        <button class="item unblockData" data-toggle="modal" data-target="#unblockModal" data-artikel3="{{$block->id_block}}" data-judul3="{{$row->judul}}">
                            <i class="fa fa-unlock"></i>
                        </button>
                        @endif
                        {{-- <button class="item deleteData" data-toggle="modal" data-target="#deleteModal"  data-nama="{{$nama->nama_lengkap}}" data-artikel="{{$row->id_artikel}}" data-judul="{{$row->judul}}">
                            <i class="fa fa-trash"></i>
                        </button> --}}
                        <a class="item" href="{{url('detailArtikel/'.$row->id_artikel.'')}}">
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
</div>

@endsection

@section('modals')
<div class="modal fade" id="deleteModal"  role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
        <form action="{{route('artikel_delete_all')}}" method="POST">
               {{ method_field('delete') }}
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Hapus artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Anda Yakin ingin Hapus artikel</p>
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
        <form action="{{route('artikel_block')}}" method="POST">
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Block artikel</h5>
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
        <form action="{{route('artikel_unblock')}}" method="POST">
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Unblock artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Anda Yakin ingin Unblock artikel</p>
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
    var userID=$(this).attr('data-artikel');
    var Judul = $(this).attr('data-judul');
    var Nama = $(this).attr('data-nama');
    $('#app_id').val(userID); 
    $('#judul').text('"'+Judul+'"'+' ?');
    $('#deleteModal').modal('show'); 
    $('#oleh').text(Nama);
});

$(document).on('click','.blockData',function(){
    var userID2=$(this).attr('data-artikel2');
    $('#app_id2').val(userID2); 
    $('#blockModal').modal('show'); 
});

$(document).on('click','.unblockData',function(){
    var userID3=$(this).attr('data-artikel3');
    var Judul = $(this).attr('data-judul3');
    $('#app_id3').val(userID3); 
    $('#judul3').text('"'+Judul+'"'+' ?');
    $('#unblockModal').modal('show'); 
});
</script>
@endsection