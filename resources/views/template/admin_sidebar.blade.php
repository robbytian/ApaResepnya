<aside class="menu-sidebar d-none d-lg-block">
    <br><br>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{Request::is('admin/dashboard') ? 'active' : ''}}">
                    <a href="{{url('admin/dashboard')}}">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span> 
                    </a>
                </li>
                <li class="{{Request::is('admin/category') ? 'active' : ''}}">
                    <a href="{{url('admin/category')}}">
                        <i class="fa fa-plus"></i>
                        <span>Tambah Kategori</span>
                    </a>
                </li>
                <li  class="{{Request::is('admin/data_masakan') ? 'active' : ''}}">
                    <a href="{{url('admin/data_masakan')}}">
                        <i class="fa fa-cutlery"></i>
                        <span>Masakan</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/data_minuman') ? 'active' : ''}}"> 
                    <a href="{{url('admin/data_minuman')}}">
                        <i class="fa fa-coffee"></i>
                        <span>Minuman</span> 
                    </a>
                </li>
                <li class="{{Request::is('admin/data_cemilan') ? 'active' : ''}}">
                    <a href="{{url('admin/data_cemilan')}}">
                        <i class="fa fa-cutlery"></i>
                        <span>Cemilan</span>
                    </a>
                </li>
                <li class="{{Request::is('admin/data_artikel') ? 'active' : ''}}">
                    <a href="{{url('admin/data_artikel')}}">
                        <i class="fa fa-files-o"></i>
                        <span>Artikel</span> 
                    </a>
                </li>
                <li class="{{Request::is('admin/data_user') ? 'active' : ''}}">
                    <a href="{{url('admin/data_user')}}">
                        <i class="fa fa-user"></i>
                        <span>User</span> 
                    </a>
                </li>
                <li class="{{Request::is('admin/riwayat_laporan') ? 'active' : ''}}">
                    <a href="{{url('admin/riwayat_laporan')}}">
                        <i class="fa fa-file-text"></i>
                        <span>Riwayat Laporan</span> 
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>