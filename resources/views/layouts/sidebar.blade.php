<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{-- {{ Auth::user()->name }} --}} Admin
                            <span class="user-level">
                                {{ Auth::user()->pengguna }}
                            </span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            {{--  <li>
                                <a href="#profile">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#edit">
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li>  --}}
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                              <span class="link-collapse">Logout</span>
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-danger">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>


                <li class="nav-item {{ Request::is('pendapatan-bank', 'pendapatan-piutang') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pendapatan">
                        <i class="flaticon-store"></i>
                        <p>Pendapatan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('pendapatan-bank', 'pendapatan-piutang','pendapatan-tunai') ? 'show' : '' }}" id="pendapatan">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('pendapatan-bank') ? 'active' : '' }}">
                                <a href="{{ url('pendapatan-bank') }}">
                                    <span class="sub-item">Pendapatan Bank</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('pendapatan-tunai') ? 'active' : '' }}">
                                <a href="{{ url('pendapatan-tunai') }}">
                                    <span class="sub-item">Pendapatan Tunai</span>
                                </a>
                            </li>
                            <li class="{{ Request::is('pendapatan-piutang') ? 'active' : '' }}">
                                <a href="{{ url('pendapatan-piutang') }}">
                                    <span class="sub-item">Pendapatan Piutang</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item {{ Request::is('pengeluaran-bank') ? 'active' : '' }}">
                    <a data-toggle="collapse" href="#pengeluaran">
                        <i class="flaticon-graph"></i>
                        <p>Pengeluaran</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ Request::is('pengeluaran-bank') ? 'show' : '' }}" id="pengeluaran">
                        <ul class="nav nav-collapse">
                            <li class="{{ Request::is('pengeluaran-bank') ? 'active' : '' }}">
                                <a href="{{ url('pengeluaran-bank') }}">
                                    <span class="sub-item">Pengeluaran Bank</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->