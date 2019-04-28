@extends('template.admin_layout')

@section('title')
  Data User | Apa Resepnya
@endsection

@section('styles')
@endsection

@section('contents')

<div class="row">
    <div class="col-md-12">
        <h3 class="title-5 m-b-35">Data User</h3>
    </div>
</div>

    <div class="col-xl-12 table-responsive top-campaign">
    <table class="table tabledata table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($semua_user as $row)
            <?php 
            $nama = \App\DataUser::where('username',$row->username)->first();
            $block = \App\BlockUser::where('username',$row->username)->first();
            ?>
            <tr>
                <td>{{ !empty($i) ? ++$i : $i = 1}}</td>
                <td>{{$nama->nama_lengkap}} 
                    @if($row->level=='0')
                        <i class="fa fa-check-circle verified"></i>
                    @elseif($row->level=='1')
                        <i class="fa fa-check-circle admin"></i>
                    @endif
                </td>
                <td>{{$row->username}}</td>
                <td>{{$nama->no_hp}}</td>
                <td>{{$nama->email}}</td>
                <td>
                    @if($row->level=='0')
                        <span class="role verified">Verified</span>
                    @elseif($row->level=='1')
                        <span class="role admin">Admin</span>
                    @else
                        <span class="role user">User</span>
                    @endif
                </td>
                <td>
                <div class="table-data-feature">
                @if($row->level !='1')
                    @if($row->status =='1')
                    <button class="item blockData" data-toggle="modal" data-target="#blockModal" data-akun="{{$row->username}}" data-judul="{{$nama->nama_lengkap}}">
                        <i class="fa fa-lock"></i>
                    </button>
                    @else
                    <button class="item unblockData" data-toggle="modal" data-target="#unblockModal" data-judul2="{{$nama->nama_lengkap}}" data-akun2="{{$block->id_block}}">
                        <i class="fa fa-unlock"></i>
                    </button>
                    @endif
                @endif
                    </div>
                </td>
                <td>
                @if($row->status =='1')
                <p style="color:blue;">Available</p>
                @elseif($row->status =='0')
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
<div class="modal fade " id="blockModal"  role="dialog" aria-labelledby="blockModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-sm " role="document">
        <div class="modal-content">
        <form action="{{route('akun_block')}}" method="POST">
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Block Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Anda Yakin ingin Block Akun</p>
                <p id="akun" class="text-center"></p>
                <p class="text-center">Alasan Block :</p>
                <div class="form-group">              
                    <textarea class="form-control" name="alasan" required></textarea>
                    <input type="hidden" name="blockKey" id="app_id">
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
        <form action="{{route('akun_unblock')}}" method="POST">
               {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title text-center" id="editModalLabel">Unblock Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="text-center">Anda Yakin ingin Unblock Akun</p>
                <p id="akun2" class="text-center"></p>
                <input type="hidden" name="unblock" id="app_id2">
                
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
$(document).on('click','.blockData',function(){
    var Nama=$(this).attr('data-judul');
    var userID=$(this).attr('data-akun');
    $('#akun').text(Nama+' ?'); 
    $('#app_id').val(userID); 
    $('#blockModal').modal('show'); 
    
});

$(document).on('click','.unblockData',function(){
    var Nama=$(this).attr('data-judul2');
    var userID2=$(this).attr('data-akun2');
    $('#akun2').text(Nama+' ?'); 
    $('#app_id2').val(userID2); 
    $('#unblockModal').modal('show'); 
    
});
</script>
@endsection