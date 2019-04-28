@extends('template.user_layout')

@section('title')
  Register | Apa Resepnya
@endsection

@section('styles')
<style>
.margin-t-10{
    margin-top:10px;
}
</style>
@endsection

@section('contents')
<div class="container">
    <div class="login-wrap">
        <div class="login-content">
            @include('template.feedback')
            <div class="login-logo">
                <img src="assets/images/icon/logo-oren.png" alt="logo">
            </div>
            <div class="login-form">
                <div>
                    <a href="{{ URL('social-media/register/google') }}" class="btn btn-default btn-block">
                        <svg aria-hidden="true" class="svg-icon native iconGoogle" width="18" height="18" viewBox="0 0 18 18">
                            <g>
                                <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path><path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17z" fill="#34A853"></path><path d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07z" fill="#FBBC05"></path>
                                <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3z" fill="#EA4335"></path>
                            </g>
                            </svg>&numsp;
                        Login dengan Google
                    </a>
                    <a href="{{ URL('social-media/register/facebook') }}" class="btn btn-default btn-block btn-facebook text-white">
                        <svg aria-hidden="true" class="svg-icon iconFacebook" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M1.88 1C1.4 1 1 1.4 1 1.88v14.24c0 .48.4.88.88.88h7.67v-6.2H7.46V8.4h2.09V6.61c0-2.07 1.26-3.2 3.1-3.2.88 0 1.64.07 1.87.1v2.16h-1.29c-1 0-1.19.48-1.19 1.18V8.4h2.39l-.31 2.42h-2.08V17h4.08c.48 0 .88-.4.88-.88V1.88c0-.48-.4-.88-.88-.88H1.88z" fill="#3C5A96" style="fill:  #fff !important;"></path>
                        </svg> &numsp;
                        Login dengan Facebook
                    </a><br>    
                </div>
                <form action="" autocomplete="off" method="post">
                {{ csrf_field() }}
                <p class="text-center">Atau</p>
                <div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input class="au-input au-input--full" type="text" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input class="au-input au-input--full" type="number" name="telp" placeholder="No Telepon"value="{{ old('telp') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input class="au-input au-input--full" type="password" name="password2" placeholder="Konfirmasi Password" required>
                    </div>
                    <div class="row form-group">
                        <div class="col-1 margin-t-10">
                            <label class="au-checkbox">
                                <input type="checkbox" id="checkme">
                                <span class="au-checkmark"></span>
                            </label>
                        </div>
                        <div class="col-8">
                            <label class="font-10">
                                Dengan mendaftar, anda setuju dengan kebijakan privasi dan ketentuan pelayanan. 
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-block btn-orange inputButton" type="submit" disabled name="sendNewSms" id="sendNewSms">Daftar</button>
                </div>
                </form>
                <div class="register-link">
                    <p>
                        Sudah punya akun ?
                        <a href="{{url('login')}}">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @include('template.footer')
</div>
@endsection
@section('scripts')

<script src="https://www.gstatic.com/firebasejs/5.8.1/firebase.js"></script>
<script>
  // Initialize Firebase
var config = {
    apiKey: "AIzaSyDjdhwat3n_QMfh6S5DfTX-zePL5VqGIR0",
    authDomain: "aparesepnya.firebaseapp.com",
    databaseURL: "https://aparesepnya.firebaseio.com",
    projectId: "aparesepnya",
    storageBucket: "aparesepnya.appspot.com",
    messagingSenderId: "769587404656"
};

firebase.initializeApp(config);
firebase.auth().signOut().then(function() {
    // alert("You're just loged out!");
}).catch(function(error) {
    alert("Something error..");
});

function logGoogle(){
    console.log('logingoogle');
    var provider = new firebase.auth.GoogleAuthProvider();
    
    firebase.auth().signInWithPopup(provider).then(function(result) {
        // This gives you a Google Access Token. You can use it to access the Google API.
        var token = result.credential.accessToken;
        // The signed-in user info.
        var user = result.user;
        firebase.auth().currentUser.getIdToken(/* forceRefresh */ true).then(function(idToken) {
            // Send token to your backend via HTTPS
            // ...
            console.log('name: '+ user.displayName);
            console.log('email: '+ user.email);
            // console.log('idtoken: '+ idToken);
            console.log('uid: '+ user.uid);
            // console.log("test");
            $.post("/registersosmed",
            {
                name: user.displayName,
                email: user.email,
                uid: user.uid
                // access_token: idToken,
                // _token: '{{ csrf_token()}}'
            },
            function(data){
                console.log(data);
                if (data == 'success'){
                window.location.replace("./");
            }
        });
    }).catch(function(error) {
        alert("Something error..");
    });

}).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;
    // ...
    });
}

function logFacebook(){
    console.log('loginfacebook');
    var provider = new firebase.auth.FacebookAuthProvider();

    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Facebook Access Token. You can use it to access the Facebook API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      firebase.auth().currentUser.getIdToken(/* forceRefresh */ true).then(function(idToken) {
        // Send token to your backend via HTTPS
        // ...
        console.log('nama: '+ user.displayName);
        console.log('email: '+ user.email);
        // console.log('idtoken: '+ idToken);
        // console.log('uid: '+ user.uid);

        $.post("https://localhost:8000/register",
        {
          nama: user.displayName,
          email: user.email
        //   uid: user.uid,
        //   access_token: idToken,
        //   _token: '{{ csrf_token()}}'
        },
        function(data){
          console.log(data);
          if (data == 'success'){
            window.location.replace("https://localhost:8000");
          }
        });

      }).catch(function(error) {
        alert("Something error..");
      });

    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });
}
</script>
<script>
    var checker = document.getElementById('checkme');
    var sendbtn = document.getElementById('sendNewSms');
    checker.onchange = function(){
        sendbtn.disabled = !!this.checked == false;
    }
</script>
@endsection