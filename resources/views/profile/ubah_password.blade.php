@extends('template.user_layout')

@section('title')
  Ubah Password | Apa Resepnya
@endsection

@section('styles')
@endsection

@section('contents')
<section class="statistic statistic2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                    @include('template.feedback')
                        <div class="card-title">
                            <h3 class="text-center title-2">Ubah Password</h3>
                        </div>
                        <hr>
                        <form action="" method="post" id="form">
                            {{csrf_field()}}
                            {{ method_field('patch') }}       
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input class="au-input au-input--full" type="password" name="password_lama" required>
                            </div>  
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input class="au-input au-input--full" type="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label>Konsfirmasi Password</label>
                                <input class="au-input au-input--full" type="password" name="password2" requied>
                            </div>        
                        </form>
                    </div>
                    
                    <div class="card-footer" >
                        <a href="javascript:{}" onclick="document.getElementById('form').submit();"style="float:right;" class="btn btn-orange btn-sm">Simpan
                        </a>
                        <a href="{{url('profile')}}" class="btn btn-outline-orange btn-sm">Kembali</a>
                    </div>
                    
                    


                </div>  <br><br>
            </div>
        </div>
    </div>
</section>

@endsection

@section('modals')
@endsection

@section('scripts')
@endsection