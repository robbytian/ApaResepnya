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
                <form action="{{route('lupaPassword')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label>Username</label>
                        <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                    </div>
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