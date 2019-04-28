<aside class="menu-sidebar3 js-spe-sidebar">
    <div class="table-responsive table-data">
        <nav class="navbar-sidebar2 navbar-sidebar3">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a href="{{url('buat_resep/masakan')}}">Buat Resep</a>
                </li>
            </ul>
        </nav>
        <br>
        Masakan
        <nav class="navbar-sidebar2 navbar-sidebar3">
            <ul class="list-unstyled navbar__list">
                <li name="search-option" id="top" value="top" class="{{Request::path()=='masakan' ? 'sub-cat' : ''}}">
                    <a href="{{url('masakan')}}">Top</a>
                </li>
                <form action="{{route('masakan.filter')}}" method="get" id="form2">
                    <li class="@if(!empty($filter)) {{$filter=='populer' ? 'sub-cat' : ''}} @endif">
                        <a href="javascript:{}" onclick="document.getElementById('form2').submit();"><input type="hidden" value="populer" name="filter">Populer</a>
                    </li>
                </form>
                <form action="{{route('masakan.filter')}}" method="get" id="form3">
                    <li class="@if(!empty($filter)) {{$filter=='terbaru' ? 'sub-cat' : ''}} @endif">
                        <a href="javascript:{}" onclick="document.getElementById('form3').submit();"><input type="hidden" value="terbaru" name="filter">Terbaru</a>
                    </li>
                </form>
            </ul>
        </nav>
        <br>
        Kategori
        <nav class="navbar-sidebar2 navbar-sidebar3">        
            <ul class="list-unstyled navbar__list">
                <?php $category = \App\SubCategory::where('id_Category','2')->get()?>
                @foreach($category as $row)
                    <?php $i = 0?>
                    <form action="{{route('masakan.filter')}}" method="get" id='form-{{$row->id_sub_post}}'>
                        <li style="width:140px" class="@if(!empty($filter)) {{$filter==$row->nama ? 'sub-cat' : ''}} @endif">
                            <a href="javascript:{}" onclick="document.getElementById('form-{{$row->id_sub_post}}').submit();"><input type="hidden" value="{{$row->nama}}" name="filter">{{$row->nama}}</a>
                        </li>
                    </form>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>