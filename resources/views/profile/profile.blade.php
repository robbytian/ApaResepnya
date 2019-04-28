@extends('template.user_layout')

@section('title')
  Profile | Apa Resepnya
@endsection

@section('styles')
@endsection

@section('contents')

<!-- Profile -->
<section class="statistic statistic2">
    <div class="container">
        <br>
        <div class="row">
            <div class="col-sm-9 offset-2">
            @include('template.feedback')
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35 text-md-center">Profile</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-2">
                                <div class="profile account-item--style2">
                                    <div class="image">
                                    @if(empty($data_profile->foto))
                                        @if(empty($data_profile->jenkel) || $data_profile->jenkel=='L')
                                        <img src="{{asset('assets')}}/images/icon/male.jpg" alt="profile" class="rounded-circle avatar"/>
                                        @else
                                        <img src="{{asset('assets')}}/images/icon/female.png" alt="profile" class="rounded-circle avatar" />
                                        @endif
                                    @else
                                        <img src="{{asset('assets')}}/images/icon/{{$data_profile->foto}}" alt="profile"class="rounded-circle avatar" />
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-10">
                                <div class="row">
                                    <div class="col-md-4">Username</div>
                                        <div class="col-md-8">{{$data_profile->username}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Nama</div>
                                        <div class="col-md-8">{{$data_profile->nama_lengkap}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Email</div>
                                        <div class="col-md-8">{{$data_profile->email}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">No telp</div>
                                        <div class="col-md-8">{{$data_profile->no_hp}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Jenis Kelamin</div>
                                        <div class="col-md-8">
                                        @if(!empty($data_profile->jenkel))
                                            @if($data_profile->jenkel=='L')
                                                Laki-Laki
                                            @elseif($data_profile->jenkel=='P')
                                                Perempuan
                                            @else
                                                -
                                            @endif
                                        @else
                                            -
                                        @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">Bergabung Sejak</div>
                                        <div class="col-md-8">{{$data_profile->created_at->format('d M Y')}}</div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <a class="btn btn-outline-orange btn-sm" href="{{url('ubah_profile')}}" role="button">Ubah Profile</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a class="btn btn-outline-orange btn-sm" href="{{url('ubah_password')}}" role="button">Ubah Password</a>
                                        </div>
                                    </div>
                                    @if(empty($data_profile->id_hint))
                                    <p style="color:red">*Hint Belum Disetting. <a href="ubah_profile">Setting Disini</a></p> 
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="title-5 m-b-35 text-md-center">Data Posting</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <a href="{{url('data_masakan')}}">
                                        Masakan
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <span class="badge badge-orange">{{$data_masakan->count('id_tutorial')}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <a href="{{url('data_minuman')}}">
                                        Minuman
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <span class="badge badge-orange">{{$data_minuman->count('id_tutorial')}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <a href="{{url('data_cemilan')}}">
                                        Cemilan
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <span class="badge badge-orange">{{$data_cemilan->count('id_tutorial')}}</span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <a href="{{url('data_artikel')}}">
                                        Artikel
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <span class="badge badge-orange">{{$data_artikel->count('id_artikel')}}</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        <!-- Footer-->
        @include('template.footer')
        <!-- END Footer-->
    </div>
</section>
<!-- END Profile-->

@endsection

@section('modals')
@endsection

@section('scripts')
@endsection