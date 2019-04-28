@if(session('success'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {!! session('success') !!}
  </div>
{{-- <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
    <i class="zmdi zmdi-check-circle"></i>
    <span class="content">{!! session('success') !!}</span>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            <i class="zmdi zmdi-close-circle"></i>
        </span>
    </button>
</div> --}}
@endif

@if(session('success2'))
<div class="alert alert-success" role="alert">
      <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      {!! session('success2') !!}
    </div>
{{-- <div class="alert au-alert-success alert-dismissible fade show au-alert au-alert--70per" role="alert">
    <i class="zmdi zmdi-check-circle"></i>
    <span class="content">{!! session('success2') !!}</span>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            <i class="zmdi zmdi-close-circle"></i>
        </span>
    </button>
</div> --}}
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">
  <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    {!! session('error') !!}
  </div>
{{-- <div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert--70per" role="alert">
    <i class="fa fa-times-circle error"></i>
    <span class="content">{!! session('error') !!}</span>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            <i class="zmdi zmdi-close-circle"></i>
        </span>
    </button>
</div> --}}
@endif

@if(count($errors) > 0)
  <div class="alert alert-danger">
    <button type="button" class="close pull-right" data-dismiss="alert" aria-label="Close">
      <span aria-hidden ="true">&times;</span>
    </button>
    <p>Perhatian.</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div>
{{-- <div class="alert au-alert-danger alert-dismissible fade show au-alert au-alert--70per" role="alert">
    <i class="fa fa-times-circle error"></i>
    <span class="content">
          <p>Perhatian.</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    </span>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            <i class="zmdi zmdi-close-circle"></i>
        </span>
    </button>
</div> --}}
@endif
