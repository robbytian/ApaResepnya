@extends('template.user_layout')

@section('title')
  Buat Artikel | Apa Resepnya
@endsection

@section('styles')
@endsection

@section('contents')
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                        @include('template.feedback')
                            <p><b>Buat Artikel</b></p>
                        </div>
                        <hr>
                        <form action="" method="post" id="form" autocomplete='off'  enctype='multipart/form-data'>
                        {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-sm-3">
                                    <label class="control-label mb-1">Judul</label>
                                    <label class="text-red">*</label>
                                </div>
                                <div class="col-sm-9">
                                    <input  type="text" class="form-control" name="judul" placeholder="Judul" value="{{old('judul')}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-3">
                                    <label for="select" class=" form-control-label mb-1">Kategori</label>
                                    <label class="text-red">*</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="rs-select2--dark rs-select2--lg m-r-10 rs-select2--border">
                                        <select name="sub_artikel" id="select" class="form-control select2">
                                           <option disabled selected>Kategori</option>
                                           @foreach(\App\SubArtikel::all() as $row)
                                           <option value="{{$row->id_sub_artikel}}">{{$row->nama}}</option>
                                           @endforeach
                                       </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-3">
                                    <label class=" form-control-label mb-1">Cover</label>
                                    <label class="text-red">*</label>
                                </div>
                                <div class="col-sm-9">
                                    <div class="au-form-icon">
                                        <input class=" form-control au-input au-input--full" type="text" name="cover-link" class="form-control" placeholder="https://">
                                        <div style="display:none">
                                                <input type="file" name="cover" onchange="return onChangeImg(event, this)" class="form-control-file foto" accept=".jpg,.png,.jpeg .JPG" id="file-input" >
                                            </div>
                                            <img id="foto" src="#" class="imgResep" style="display:none" />
                                                <div class="input-group-addon"  id="remove">
                                                    <button type="button" name="remove2" class="resetImg">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </div>
                                        <button class="au-input-icon" type="button" id="btnFoto">
                                            <i class="zmdi zmdi-camera"></i>
                                        </button>
                                        {{-- Cover dapat mengambil dari cover <a href="https://www.youtube.com" target="_blank"><u>youtube</u></a>, <a href="https://www.slideshare.net" target="_blank"><u>slideshare</u></a>, <a href="https://drive.google.com/" target="_blank"><u>google drive</u></a>, ataupun image address dari website pribadi Anda dengan cara memasukan url terkait kedalam kolom ini --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-3">
                                    <label class=" form-control-label mb-1">Artikel</label>
                                    <label class="text-red">*</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="editor1" name="isiText" placeholder="Enter text ...">{{old('isiText')}}</textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer" >
            <a href="javascript:{}" id="submit" onclick="document.getElementById('form').submit();" style="float:right;"class="btn btn-orange m-b-19">Posting
                <a href="{{url('artikel')}}" style="float:left;" class="btn btn-outline-orange m-b-19" type="submit">Kembali</a>
            </div>
                </div>
                  
            </div>
            
        </div>
    </div>
</section>
@endsection

@section('modals')
@endsection

@section('scripts')
<script>
function onChangeImg(event,fileInput){
    var filePath = fileInput.value;
    var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
    if(ext == "jpg"  || ext == "JPG"|| ext == "png" || ext=="jpeg" || ext == "gif"){
        document.getElementById('foto').src = URL.createObjectURL(event.target.files[0]);
        document.getElementById("foto").style.display = "block";
        document.getElementById("remove").style.display = "block";
        return true;
    }else{
        alert("Hanya Bisa Memasukan Gambar");
        fileInput.focus();
        return false;
    }
}
$(document).ready(function(e) {
    $('#btnFoto').click(function() {
        $('.foto').click();
    });
    $('#btnVideo').click(function() {
        $('.video').click();
    });
});

$(document).ready(function(){  
$(document).on('click', '.resetImg', function(){  
    document.getElementById("file-input").value='';
    document.getElementById("foto").style.display = "none";
    document.getElementById("remove").style.display = "none";
    
});
});

$(document).ready(function(e) {
    $file =  document.getElementById("file-input").value;
    console.log($file);
    if($file==''){
    document.getElementById("foto").style.display = "none";
    document.getElementById("remove").style.display = "none";
    }
});

$("input").change(function () {
    window.onbeforeunload = function () {
        return 'You have unsaved changes on this page!';
    }
});
$("select").change(function () {
    window.onbeforeunload = function () {
        return 'You have unsaved changes on this page!';
    }
});
$(function () {
    $('#submit').click(function (e) {
        window.onbeforeunload = null;
    });
});
</script>
@endsection
