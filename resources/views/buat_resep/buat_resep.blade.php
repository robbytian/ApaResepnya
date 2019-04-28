@extends('template.user_layout')

@section('title')
  Buat Resep | Apa Resepnya
@endsection

@section('styles')
@endsection

@if($check == 'masakan' || $check == 'minuman' || $check == 'cemilan' )

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
                            <p><b>Buat Resep 
                            @if($check =='masakan')
                            Masakan</b></p>
                            @elseif($check =='minuman')
                            Minuman</b></p>
                            @elseif($check =='cemilan')
                            Cemilan</b></p>
                            @endif
                        </div>
                        <form action="" method="post" id="form" autocomplete='off' enctype='multipart/form-data'>
                            {{csrf_field()}}
                            <div class="row form-group">
                                <div class="col-sm-3">
                                    <label class="control-label mb-1">Judul</label>
                                    <label class="text-red">*</label>
                                </div>
                                <div class="col-sm-9">
                                    <input  type="text" class="au-input au-input--full form-control" name="judul" placeholder="Judul">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-3">
                                    <label class="control-label mb-1">Deskripsi</label>
                                    <label class="text-red">*</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea  id="editor1" class="au-input au-input--full form-control" name="deskripsi"></textarea>
                                </div>
                            </div>
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="select" class=" form-control-label mb-1">Kategori</label>
                                        <label class="text-red">*</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="rs-select2--dark rs-select2--lg m-r-10 rs-select2--border">
                                            <select name="sub_category" id="select" class="form-control select2">
                                                <option disabled selected>Kategori</option>
                                                @foreach($sub_category as $row)
                                                <option value="{{$row->id_sub_post}}">{{$row->nama}}</option>
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
                                    <div class="col sm-9">
                                        <div class="au-form-icon">
                                            <input class=" form-control au-input au-input--full" type="text" name="cover-link" class="form-control" placeholder="https://">
                                            <div style="display:none">
                                                    <input type="file" name="cover" onchange="return onChangeImg(event, this)" class="form-control-file foto" accept=".jpg,.png,.jpeg .JPG" id="file-input" >
                                                </div>
                                                <img id="foto" src="#" class="imgResep" style="display:none" />
                                                <div class="input-group-addon" id="remove">
                                                    <button type="button" name="remove2" class="resetImg col-sm-1">
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
                                        <label class="form-control-label mb-1">Video</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="au-form-icon">
                                            <input class=" form-control au-input au-input--full" type="text" class="form-control" name="video-link" placeholder="https://www.youtube.com/watch?v=xxxxxxxxxx">
                                            <div style="display:none;">
                                                <input type="file" id="file-video" onchange="return onChangeVid(event, this)" name="video" class="form-control-file video" accept=".mp4,.mp3,.amv,.avi,.3gp">
                                            </div>
                                            <div id="div-nama-video" style="display:none">
                                                <div class="input-group">
                                                    <input type="text" readonly class="au-input au-input--full form-control" id="nama-video">
                                                    <div class="input-group-addon">
                                                        <button type="button" name="remove-nama-video" class="remove-video">
                                                            <i class="fa fa-close"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="au-input-icon" type="button" id="btnVideo">
                                                <i class="zmdi zmdi-camera"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class=" form-control-label">Bahan-bahan</label>
                                        <label class="text-red">*</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row" id="bahan">
                                            <div class="col-sm-1">
                                                <span class="badge badge-secondary">1</span>
                                            </div>
                                            <div class="col-sm-11">
                                                <input type="text" name="bahan[]" class="au-input au-input--full form-control" placeholder="Bahan Ke 1">
                                            </div>
                                        </div>
                                        <p id="add"class="button-tambah text-center">
                                            <i class="fa fa-plus"></i> Tambah Bahan
                                        </p> 
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class=" form-control-label">Langkah-langkah</label>
                                        <label class="text-red">*</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="row" id="langkah">
                                            <div class="col-sm-1">
                                                <span class="badge badge-secondary">1</span>
                                            </div>
                                            <div class="col-sm-11">
                                                <input type="text" name="langkah[]" placeholder="Langkah Ke 1" class="au-input au-input--full form-control">
                                                </div>
                                            </div>
                                            <p id="add2" class="button-tambah text-center">
                                                <i class="fa fa-plus"></i> Tambah Langkah-Langkah
                                            </p> 
                                        </div>
                                    </div>
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label mb-1">Porsi</label>
                                        <label class="text-red">*</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input class="au-input au-input--full form-control" type="text" name="porsi" placeholder="Porsi">
                                            <div class="input-group-addon">
                                                Orang
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label class="control-label mb-1">Waktu Memasak</label>
                                        <label class="text-red">*</label>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="au-input au-input--full form-control" name='waktu' placeholder="Waktu Memasak">
                                            <div class="input-group-addon">
                                                Menit
                                            </div>
                                        </div>
                                    </div>
                                <div>
                        </form>
                    </div>
                </div>  
            </div>
            <div class="card-footer" >
            <a href="javascript:{}" onclick="document.getElementById('form').submit();return checkVidYt()"style="float:right;"class="btn btn-orange m-b-19" id="submit" >Posting
                <a href="{{url('masakan')}}" style="float:left;" class="btn btn-outline-orange m-b-19" type="submit">Kembali</a>
            </div>
        </div>
    </div>
</section>

@endsection

@section('modals')
@endsection

@section('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  --}}
<script>  
$(document).ready(function(){  
    var i=1;  
    $('#add').click(function(){  
    i++;  
    $('#bahan').append( 
        '<div class="col-sm-1" id="row'+i+'">'+
            '<span class="badge badge-secondary">'+i+'</span>'+
        '</div>'+
        '<div class="input-group col-sm-11" id="row2'+i+'">'+
            '<div class="input-group">'+
                '<input type="text" name="bahan[]" class="au-input au-input--full form-control" placeholder="Bahan Ke '+i+'">'+
                '<div class="input-group-addon">'+
                    '<button type="button" name="remove" id="'+i+'" class="btn_remove">'+
                        '<i class="fa fa-close"></i>'+
                    '</button>'+
                '</div>'+
            '</div>'+
        '</div>'
    );  
});  
$(document).on('click', '.btn_remove', function(){  
    var button_id = $(this).attr("id");   
        $('#row'+button_id+'').remove();
        $('#row2'+button_id+'').remove();  
        i--;
    });   
});   
$(document).ready(function(){  
    var a=1;  
    $('#add2').click(function(){  
    a++;  
    $('#langkah').append(
        '<div class="col-sm-1" id="rowlangkah'+a+'">'+
            '<span class="badge badge-secondary">'+a+'</span>'+
        '</div>'+
        '<div class=" input-group col-sm-11" id="rowlangkah2'+a+'">'+
            '<div class="input-group">'+
                '<input type="text" name="langkah[]"  class="au-input au-input--full form-control" placeholder="Langkah Ke '+a+'">'+   
'           <div class="input-group-addon">'+
                '<button type="button" name="remove2" id="'+a+'" class="btn_remove2">'+
                    '<i class="fa fa-close"></i>'+
                '</button>'+
            '</div>'+
            '</div>'+
        '</div>'
    );  
});  
$(document).on('click', '.btn_remove2', function(){  
    var button_id = $(this).attr("id");   
        $('#rowlangkah'+button_id+'').remove();
        $('#rowlangkah2'+button_id+'').remove();  
        a--;
    });   
});

$(document).ready(function(){  
$(document).on('click', '.resetImg', function(){  
    document.getElementById("file-input").value='';
    document.getElementById('foto').src = "{{asset('assets')}}/images/icon/preview.png";
    
});
});

function onChangeImg(event,fileInput){

    var filePath = fileInput.value;
    var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
    if(ext == "jpg"  || ext == "JPG"|| ext == "png" || ext=="jpeg" || ext == "gif")
    {
        document.getElementById('foto').src = URL.createObjectURL(event.target.files[0]);
        document.getElementById("foto").style.display = "block";
        document.getElementById("remove").style.display = "block";
        return true;
    }else
    {
        alert("Hanya Bisa Memasukan Gambar");
        fileInput.focus();
        return false;
    }
}

function onChangeVid(event,fileInput){

    var filePath = fileInput.value;
    var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
    if(ext == "mp4")
    {
        document.getElementById('nama-video').value = filePath;
        document.getElementById("div-nama-video").style.display = "block";
        return true;
    }else
    {
        alert("Hanya Bisa Memasukan Video (Format mp4)");
        fileInput.focus();
        return false;
    }
}
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

$(document).ready(function(e) {
    $('#btnFoto').click(function() {
        $('.foto').click();
    });
    $('#btnVideo').click(function() {
        $('.video').click();
    });
    $('#btnLangkah').click(function() {
        $('.langkah').click();
    });
});    

$(document).on('click', '.remove-video', function(){  
    document.getElementById("file-video").value='';
    document.getElementById("div-nama-video").style.display = "none";
    
});
</script>
@endsection
@else

@endif