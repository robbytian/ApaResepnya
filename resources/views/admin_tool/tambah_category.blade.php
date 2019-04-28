@extends('template.admin_layout')

@section('title')
  Tambah Kategori | Apa Resepnya
@endsection

@section('contents')
<div class="row">
    <div class="col-sm-12">
    @include('template.feedback')
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <h3 class="title-5 m-b-35">Kategori Resep</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/addcategory')}}" method="post">
                    {{csrf_field()}}
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="control-label mb-1">Nama</label>
                            <label class="text-red">*</label>
                        </div>
                        <div class="col-sm-9">
                            <input  type="text" class="au-input au-input--full form-control" placeholder="Nama" name="nama">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label for="select" class=" form-control-label mb-1">Jenis</label>
                            <label class="text-red">*</label>
                        </div>
                        <div class="col-sm-9">
                            <div class="rs-select2--dark rs-select2--lg m-r-10 rs-select2--border">
                                <select name="sub_category" id="select" class="form-control select2">
                                    <option disabled selected>Jenis Resep</option>
                                    @foreach($category as $categories)
                                    <option value="{{$categories->id_category}}">{{$categories->deskripsi}}</option>
                                    @endforeach
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3 offset-9">
                            <button class="btn btn-orange">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <h3 class="title-5 m-b-35">Kategori Artikel</h3>
        <div class="card">
            <div class="card-body">
                <form action="{{url('admin/addcategoryArtikel')}}" method="POST">
                    {{csrf_field()}}
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="control-label mb-1">Nama</label>
                            <label class="text-red">*</label>
                        </div>
                        <div class="col-sm-9">
                            <input  type="text" class="au-input au-input--full form-control" placeholder="Nama" name="nama">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3 offset-9">
                            <button class="btn btn-orange">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>   

<div class="row">
    <div class="col-lg-12">
        <h3 class="title-5 m-b-35">Data Kategori</h3>
        <div class="card">
            <div class="card-body">                
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <span class="nav-link active" data-toggle="tab" href="#masakan">Masakan</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" data-toggle="tab" href="#minuman">Minuman</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" data-toggle="tab" href="#cemilan">Cemilan</span>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link" data-toggle="tab" href="#artikel">Artikel</span>
                    </li>
                </ul>
                <div class="tab-content pl-3 p-1" id="myTabContent">
                    <div class="tab-pane fade show active" id="masakan" role="tabpanel" aria-labelledby="masakan-tab"> <br>
                        <table class="table tabledata table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th >No.</th>
                                    <th>Nama</th>
                                    <th >Aksi</th>
                                    <th >Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1?>
                                    @foreach($ctgr_makanan as $row )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="item">
                                                    <i class="fa fa-lock"></i>
                                                </button>
                                            </div>
                                        </td>   
                                        <td></td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="minuman" role="tabpanel" aria-labelledby="minuman-tab"><br> 
                        <table class="table tabledata table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th >No.</th>
                                    <th>Nama</th>
                                    <th >Aksi</th>
                                    <th >Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1?>
                                    @foreach($ctgr_minuman as $row )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="item">
                                                    <i class="fa fa-lock"></i>
                                                </button>
                                            </div>
                                        </td>   
                                        <td></td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="cemilan" role="tabpanel" aria-labelledby="cemilan-tab"><br>
                        <table class="table tabledata table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th >No.</th>
                                    <th>Nama</th>
                                    <th >Aksi</th>
                                    <th >Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1?>
                                    @foreach($ctgr_cemilan as $row )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="item">
                                                    <i class="fa fa-lock"></i>
                                                </button>
                                            </div>
                                        </td>   
                                        <td></td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="artikel" role="tabpanel" aria-labelledby="artikel-tab"><br>
                        <table class="table tabledata table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th >No.</th>
                                    <th>Nama</th>
                                    <th >Aksi</th>
                                    <th >Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php $i=1?>
                                    @foreach($ctgr_artikel as $row )
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                                <button class="item">
                                                    <i class="fa fa-lock"></i>
                                                </button>
                                            </div>
                                        </td>   
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tr>
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

@endsection