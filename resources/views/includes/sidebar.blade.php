<div class="sidebar">
    <div class="sidebar-background"></div>
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav">
                <li class="nav-item active">
                    <a href="{{route('dashboard')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employee.index') }}">
                        <i class="fas fa-address-card"></i>
                        <p>Data Karyawan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('certificate') }}">
                        <i class="fas fa-address-card"></i>
                        <p>Sertifikasi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('trainer') }}">
                        <i class="fas fa-address-card"></i>
                        <p>Trainer</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a data-toggle="collapse" href="#tables">
                        <i class="fas fa-table"></i>
                        <p>Tables</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="tables/tables.html">
                                    <span class="sub-item">Basic Table</span>
                                </a>
                            </li>
                            <li>
                                <a href="tables/datatables.html">
                                    <span class="sub-item">Datatables</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

            </ul>
        </div>
    </div>
</div>