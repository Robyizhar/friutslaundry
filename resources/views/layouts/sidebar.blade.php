<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div class="user-box text-center">
            {{-- <img src="{{ ('assets/images/users/user-1.jpg') }}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md"> --}}
            <div class="dropdown">
                <!-- <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-toggle="dropdown">{{ Auth::user()->name }}</a> -->
                <div class="dropdown-menu user-pro-dropdown">
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>My Account</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>Settings</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>Lock Screen</span>
                    </a>
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            <!-- <p class="text-muted">Admin Head</p> -->
        </div>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('home') }}">
                        <i class="dripicons-home"></i>
                        {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('infogram') }}">
                        <i class="fe-tv"></i>
                        {{-- <span class="badge badge-success badge-pill float-right">4</span> --}}
                        <span>Infogram</span>
                    </a>
                </li>
                <li class="menu-title mt-2">Apps</li>
                <li>
                    <a href="{{ route('kasir') }}">
                        <i class="dripicons-document-edit"></i>
                        <span>Kasir</span>
                    </a>
                </li>
                <li>
                    <a href="#member" data-toggle="collapse">
                        <i class="fe-user-check"></i>
                        <span>Member</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="member">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('user-member') }}">
                                    <span>Data Member</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('top-up') }}">
                                    <span>Top Up Member</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('qc') }}">
                        <i class="fe-check-square"></i>
                        <span>QC</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cuci') }}">
                        <i class="fe-instagram"></i>
                        <span>Cuci</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengeringan') }}">
                        <i class="dripicons-brightness-max"></i>
                        <span>Pengeringan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('setrika') }}">
                        <i class="fe-triangle"></i>
                        <span>Setrika</span>
                    </a>
                </li>
                <li>
                    <a href="#expedisi" data-toggle="collapse">
                        <i class="fe-truck"></i>
                        <span>Expedisi</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="expedisi">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('expedisi-jadwal-jemput') }}">
                                    <span>Jadwal Jemput</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('expedisi-jemput') }}">
                                    <span>Jemput Barang</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Jadwal Antar</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Antar Barang</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#">
                        <i class="dripicons-graph-pie"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('master-data') }}">
                        <i class="dripicons-toggles"></i>
                        <span>Master Data</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
