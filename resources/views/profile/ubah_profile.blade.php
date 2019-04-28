@extends('template.user_layout')

@section('title')
  Edit Profile | Apa Resepnya
@endsection

@section('styles')
@endsection

@section('contents')

<div class="container">
    <div class="login-wrap">
        <div class="login-content">
            <div class="login-logo">
            @include('template.feedback')
                <div class="card-title">
                    <h3 class="text-center title-2">Edit Profil</h3>
                </div>
            </div>
            <div class="login-form">
                <form action="{{url('ubah_profile')}}" method="post" id="form" autocomplete="false"enctype="multipart/form-data"> 
                {{csrf_field()}}     
                {{ method_field('patch') }} 
                    
                <div class="ubah_profile account-item--style2 offset-4">
                    <div class="image">
                        @if(empty($profile->foto))
                            @if(empty($profile->jenkel) || $profile->jenkel=='L')
                                <img id="foto" src="{{asset('assets')}}/images/icon/male.jpg" alt="profile" class="rounded-circle avatar"/>
                            @else
                                <img id="foto" src="{{asset('assets')}}/images/icon/female.png" alt="profile"  class="rounded-circle avatar" />
                            @endif
                        @else
                                <img id="foto" src="{{asset('assets')}}/images/icon/{{$profile->foto}}" alt="profile" class="rounded-circle avatar" />
                        @endif
                    </div>
                        <div class="image-upload">
                            <label for="file-input">
                                <i class="fa fa-camera"></i>
                            </label>

                            <input id="file-input"  onchange="return onChangeImg(event, this)"  type="file" accept=".jpg,.png,.jpeg .JPG"  name="foto" />
                        </div>
                    
                </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="au-input au-input--full" type="text" name="nama" placeholder="Nama" value="{{@$profile->nama_lengkap}}">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <div class="input-group-addon">@
                            </div>
                            <input type="text" id="input1-group1" name="username" placeholder="Username" class="form-control" value="{{@$profile->username}}" readonly>
                        </div>                    
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input class="au-input au-input--full" type="text" name="telp" placeholder="No Telepon" value="{{@$profile->no_hp}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="{{@$profile->email}}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-check-inline form-check">
                            <label for="inline-radio1" class="form-check-label ">
                                <input type="radio" id="inline-radio1" name="jenkel" value="L" class="form-check-input" {{@$profile->jenkel=='L' ? 'checked' : ''}}>L
                            </label>
                            <label for="inline-radio2" class="form-check-label ">
                                <input type="radio" id="inline-radio2" name="jenkel" value="P" class="form-check-input" {{@$profile->jenkel=='P' ? 'checked' : ''}}>P
                            </label>
                        </div>
                    </div>                
                    <hr>
                    <div class="form-group">
                        <label for="select" class=" form-control-label mb-1">Hint</label>
                        <div class="rs-select2--dark rs-select2--lg m-r-10 rs-select2--border">
                            <select name="id_hint" id="select" class="form-control select2">
                            <option disabled selected>Pilih Pertanyaan Hint</option>
                                @foreach($data_hint as $row)
                                <option value="{{$row->id_hint}}" {{ @$profile->id_hint == $row->id_hint ? 'selected' : '' }}>{{$row->pertanyaan}}</option>
                                @endforeach
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jawaban Hint</label>
                        <input class="au-input au-input--full" type="text" name="jawab_hint" placeholder="Jawaban Hint" value="{{@$profile->jawab_hint}}">
                    </div>
                    
                </form>
            </div>  
        </div>
        <div class="card-footer" >
                        <a href="javascript:{}" onclick="document.getElementById('form').submit();"style="float:right;" class="btn btn-orange btn-sm">Simpan
                        </a>
                        <a href="{{url('profile')}}" class="btn btn-outline-orange btn-sm">Kembali</a>
                    </div>
    </div>

    @include('template.footer')
</div>

@endsection

@section('modals')
@endsection

@section('scripts')
<script>
    function onChangeImg(event,fileInput){

        var filePath = fileInput.value;
        var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
        if(ext == "jpg"  || ext == "JPG"|| ext == "png" || ext=="jpeg" || ext == "gif")
        {
            document.getElementById('foto').src = URL.createObjectURL(event.target.files[0]);
            return true;

        }else
        {
            alert("Hanya Bisa Memasukan Gambar");
            fileInput.focus();
            return false;
        }
    }
    </script>    

@endsection
