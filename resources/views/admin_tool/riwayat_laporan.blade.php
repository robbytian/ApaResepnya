@extends('template.admin_layout')

@section('title')
  Riwayat Laporan | Apa Resepnya
@endsection

@section('contents')
<div class="row">
    <div class="col-lg-12">
        <h3 class="title-5 m-b-35">Riwayat Laporan</h3>
        <div class="card">
            <div class="card-body">                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <span class="nav-link active" data-toggle="tab" href="#masakan">Laporan Masakan</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" data-toggle="tab" href="#minuman">Laporan Minuman</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" data-toggle="tab" href="#cemilan">Laporan Cemilan</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" data-toggle="tab" href="#artikel">Laporan Artikel</span>
                    </li>
                </ul>
                <div class="tab-content pl-3 p-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="masakan" role="tabpanel" aria-labelledby="masakan-tab"> <br>
                        <table class="table tabledata table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pelapor</th>
                                    <th>Item</th>
                                    <th>Pemilik</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan_resep as $row)
                                    @if($row->id_tutorial != null)
                                        <?php
                                            $check = \App\Post::where('id_tutorial',$row->id_tutorial)->first();
                                            $nama = \App\DataUser::where('username',$row->username)->first();
                                            $pemilik = \App\DataUser::where('id_data_user',$check->id_data_user)->first();
                                        ?>
                                        @if($check->id_category =='2')
                                            <tr data-toggle="modal" data-target="#editModal">
                                                <td>{{ !empty($i) ? ++$i : $i = 1}}</td>
                                                <td>{{$nama->nama_lengkap}}</td>
                                                <td>{{$check->judul}}</td>
                                                <td>{{$pemilik->nama_lengkap}}</td>
                                                <td>{{$row->alasan}}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="minuman" role="tabpanel" aria-labelledby="minuman-tab"><br> 
                        <table class="table tabledata table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pelapor</th>
                                    <th>Item</th>
                                    <th>Pemilik</th>
                                    <th>Alasan</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan_resep as $row)
                                    @if($row->id_tutorial != null)
                                        <?php
                                            $check = \App\Post::where('id_tutorial',$row->id_tutorial)->first();
                                            $nama = \App\DataUser::where('username',$row->username)->first();
                                            $pemilik = \App\DataUser::where('id_data_user',$check->id_data_user)->first();
                                        ?>
                                        @if($check->id_category =='1')
                                        <tr data-toggle="modal" data-target="#editModal">
                                            <td>{{ !empty($a) ? ++$a : $a = 1}}</td>
                                            <td>{{$nama->nama_lengkap}}</td>
                                            <td>{{$check->judul}}</td>
                                            <td>{{$pemilik->nama_lengkap}}</td>
                                            <td>{{$row->alasan}}</td>
                                        </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="cemilan" role="tabpanel" aria-labelledby="cemilan-tab"><br>
                         <table class="table tabledata table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pelapor</th>
                                    <th>Item</th>
                                    <th>Pemilik</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan_resep as $row)
                                    @if($row->id_tutorial != null)
                                        <?php
                                            $check = \App\Post::where('id_tutorial',$row->id_tutorial)->first();
                                            $nama = \App\DataUser::where('username',$row->username)->first();
                                            $pemilik = \App\DataUser::where('id_data_user',$check->id_data_user)->first();
                                        ?>
                                        @if($check->id_category =='3')
                                            <tr data-toggle="modal" data-target="#editModal">
                                                <td>{{ !empty($u) ? ++$u : $u = 1}}</td>
                                                <td>{{$nama->nama_lengkap}}</td>
                                                <td>{{$check->judul}}</td>
                                                <td>{{$pemilik->nama_lengkap}}</td>
                                                <td>{{$row->alasan}}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="artikel" role="tabpanel" aria-labelledby="artikel-tab"><br>
                        <table class="table tabledata table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Pelapor</th>
                                    <th>Item</th>
                                    <th>Pemilik</th>
                                    <th>Alasan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporan_artikel as $row)
                                    @if($row->id_artikel != null)
                                        <?php
                                            $check = \App\Artikel::where('id_artikel',$row->id_artikel)->first();
                                            $nama = \App\DataUser::where('username',$row->username)->first();
                                            $pemilik = \App\DataUser::where('id_data_user',$check->id_data_user)->first();                
                                        ?>
                                        <tr data-toggle="modal" data-target="#editModal">
                                            <td>{{ !empty($ir) ? ++$ir : $ir = 1}}</td>
                                            <td>{{$nama->nama_lengkap}}</td>
                                            <td>{{$check->judul}}</td>
                                            <td>{{$pemilik->nama_lengkap}}</td>
                                            <td>{{$row->alasan}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>      

@endsection

@section('modals')
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Artikel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary">Block</button>
                <button type="button" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection