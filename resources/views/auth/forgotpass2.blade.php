@extends('template.user_layout')

@section('title')
  Lupa Password | Apa Resepnya
@endsection

@section('contents')
<div class="container">
    <div class="login-wrap">
        <div class="login-content">
        @include('template.feedback')
            <div class="login-logo">
                <img src="assets/images/icon/logo-oren.png">
            </div>
            <div class="login-form">
                <form action="{{route('lupaPassword2')}}" method="post">
                {{csrf_field()}}
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
                    
                    
                </div>
                <center><h2>{{$profile->nama_lengkap}}</h2></center>
                    <div class="form-group">
                        <label>Pertanyaan Hint</label>
                        <select name="id_hint" id="select" class="form-control select2">
                            <option disabled selected>Pilih Pertanyaan Hint</option>
                                @foreach($data_hint as $row)
                                <option value="{{$row->id_hint}}">{{$row->pertanyaan}}</option>
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Jawaban Hint</label>
                        <input class="au-input au-input--full" type="text" name="jawab_hint" placeholder="Jawaban Hint">
                    </div>
                    <input type="hidden" name='username' value="{{$username}}">
                    <input type="hidden" name='email' value="{{$email}}">
                    <button class="btn btn-block btn-orange" type="submit">Submit</button>
                    </form>
                    <div class="register-link">
                    <p>
                        Belum punya akun ?
                        <a href="{{url('register')}}">Daftar</a>
                    </p>
                    <p>
                        Sudah punya akun ?
                        <a href="{{url('login')}}">Login</a>
                    </p>
                    </div>
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>
    @include('template.footer')
</div>
@endsection