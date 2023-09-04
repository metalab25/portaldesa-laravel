<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column font-outfit" data-widget="treeview" role="menu"
        data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('dashboard') }}"
                class="nav-link {{ request()->segment(1) == 'dashboard' ? 'active' : '' }} text-white">
                <i class="nav-icon fad fa-gauge"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        @if ($user->level == 1)
            <li class="nav-item {{ request()->segment(1) == 'desa' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->segment(1) == 'desa' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-house"></i>
                    <p>
                        {{ $config->sebutan_desa }}
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('desa/identitas') }}"
                            class="nav-link {{ request()->segment(2) == 'identitas' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-id-card-clip nav-icon"></i>
                            <p>Identitas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index2.html"
                            class="nav-link {{ request()->segment(2) == 'profile' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-file-check nav-icon"></i>
                            <p>Profil {{ $config->sebutan_desa }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html"
                            class="nav-link {{ request()->segment(2) == 'pamong' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-sitemap nav-icon"></i>
                            <p>Pemerintahan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->segment(1) == 'wilayah' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->segment(1) == 'wilayah' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-map"></i>
                    <p>
                        Wilayah
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('wilayah/cluster') }}"
                            class="nav-link {{ request()->segment(2) == 'cluster' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-rectangles-mixed nav-icon"></i>
                            <p>{{ $config->sebutan_dusun }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('wilayah/rw') }}"
                            class="nav-link {{ request()->segment(2) == 'rw' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-users nav-icon"></i>
                            <p>Rukun Warga (RW)</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('wilayah/rt') }}"
                            class="nav-link {{ request()->segment(2) == 'rt' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-user-group nav-icon"></i>
                            <p>Rukun Tetangga (RT)</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->segment(1) == 'sekretariat' ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ request()->segment(1) == 'sekretariat' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-box-archive"></i>
                    <p>
                        Sekretariat
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../../index2.html"
                            class="nav-link {{ request()->segment(2) == 'keluarga' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-file-arrow-down nav-icon"></i>
                            <p>Surat Masuk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('sekretariat/surat_keluar') }}"
                            class="nav-link {{ request()->segment(2) == 'surat_keluar' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-file-arrow-up nav-icon"></i>
                            <p>Surat Keluar</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html"
                            class="nav-link {{ request()->segment(2) == 'pamong' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-file-circle-check nav-icon"></i>
                            <p>Surat Keputusan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html"
                            class="nav-link {{ request()->segment(2) == 'pamong' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-file-shield nav-icon"></i>
                            <p>Peraturan {{ $config->sebutan_desa }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('sekretariat/klasifikasi') }}"
                            class="nav-link {{ request()->segment(2) == 'klasifikasi' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-code nav-icon"></i>
                            <p>Klasifikasi Surat</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->segment(1) == 'adminduk' ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ request()->segment(1) == 'adminduk' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-users"></i>
                    <p>
                        Kependudukan
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ url('adminduk/keluarga') }}"
                            class="nav-link {{ request()->segment(2) == 'keluarga' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-user-group nav-icon"></i>
                            <p>Keluarga</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('adminduk/penduduk') }}"
                            class="nav-link {{ request()->segment(2) == 'penduduk' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-user nav-icon"></i>
                            <p>Penduduk</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->segment(1) == 'webmin' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->segment(1) == 'webmin' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-sidebar"></i>
                    <p>
                        Webmin
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('posts') }}"
                            class="nav-link {{ request()->segment(1) == 'posts' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-memo-pad nav-icon"></i>
                            <p>Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('posts/categories') }}"
                            class="nav-link {{ request()->segment(2) == 'categories' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-grid-2 nav-icon"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('webmin/documents') }}"
                            class="nav-link {{ request()->segment(2) == 'documents' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-folder nav-icon"></i>
                            <p>Dokumen Publik</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('setting/users') }}"
                            class="nav-link {{ request()->segment(2) == 'widget' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-brackets-curly nav-icon"></i>
                            <p>Widget</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->segment(1) == 'setting' ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ request()->segment(1) == 'setting' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-sliders"></i>
                    <p>
                        Pengaturan
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('setting/application') }}"
                            class="nav-link {{ request()->segment(2) == 'application' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-code-pull-request-draft nav-icon"></i>
                            <p>Aplikasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=""
                            class="nav-link {{ request()->segment(2) == 'database' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-database nav-icon"></i>
                            <p>Database</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('setting/users') }}"
                            class="nav-link {{ request()->segment(2) == 'users' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-users nav-icon"></i>
                            <p>Pengguna</p>
                        </a>
                    </li>
                </ul>
            </li>
        @elseif ($user->level == 2)
            <li class="nav-item {{ request()->segment(1) == 'desa' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link {{ request()->segment(1) == 'desa' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-house"></i>
                    <p>
                        {{ $config->sebutan_desa }}
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="../../index2.html"
                            class="nav-link {{ request()->segment(2) == 'penduduk' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-file-check nav-icon"></i>
                            <p>Profil {{ $config->sebutan_desa }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../../index3.html"
                            class="nav-link {{ request()->segment(2) == 'pamong' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-sitemap nav-icon"></i>
                            <p>Pemerintahan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->segment(1) == 'adminduk' ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ request()->segment(1) == 'adminduk' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-users"></i>
                    <p>
                        Kependudukan
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{ url('adminduk/keluarga') }}"
                            class="nav-link {{ request()->segment(2) == 'keluarga' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-user-group nav-icon"></i>
                            <p>Keluarga</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('adminduk/penduduk') }}"
                            class="nav-link {{ request()->segment(2) == 'penduduk' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-user nav-icon"></i>
                            <p>Penduduk</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->segment(1) == 'webmin' ? 'menu-open' : '' }}">
                <a href="#"
                    class="nav-link {{ request()->segment(1) == 'webmin' ? 'active' : '' }} text-white">
                    <i class="nav-icon fad fa-sidebar"></i>
                    <p>
                        Webmin
                        <i class="right fal fa-chevron-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ url('webmin/article') }}"
                            class="nav-link {{ request()->segment(2) == 'article' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-memo-pad nav-icon"></i>
                            <p>Artikel</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=""
                            class="nav-link {{ request()->segment(2) == 'category' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-grid-2 nav-icon"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('setting/users') }}"
                            class="nav-link {{ request()->segment(2) == 'widget' ? 'active' : '' }} font-weight-lighter">
                            <i class="fad fa-brackets-curly nav-icon"></i>
                            <p>Widget</p>
                        </a>
                    </li>
                </ul>
            </li>
        @endif

    </ul>
</nav>
