<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-text mx-3">SPK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Master Data</div>
    <li class="nav-item">
        <a class="nav-link {{ request()->segment(1) == 'data-guru' ||
                              request()->segment(1) == 'data-alternatif' ||
                              request()->segment(1) == 'data-kriteria' ||
                              request()->segment(1) == 'data-sub-kriteria' ? '' : 'collapsed'}}" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">
            <i class="fas fa-fw fa-list"></i>
            <span>Data</span>
        </a>
        <div id="collapse2" class="collapse {{ request()->segment(1) == 'data-guru' ||
                                               request()->segment(1) == 'data-alternatif' ||
                                               request()->segment(1) == 'data-kriteria' ||
                                               request()->segment(1) == 'data-sub-kriteria' ? 'show' : ''}}" aria-labelledby="heading2" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ request()->segment(1) == 'data-guru' ? 'active' : ''}}" href="{{ route('data_guru') }}">Guru</a>

                <a class="collapse-item {{ request()->segment(1) == 'data-alternatif' ? 'active' : ''}}" href="{{ route('data_alternatif') }}">Alternatif</a>
                @if (Auth::user()->roles =="admin")
                <a class="collapse-item {{ request()->segment(1) == 'data-kriteria' ? 'active' : ''}}" href="{{ route('data_kriteria') }}">Kriteria</a>
                <a class="collapse-item {{ request()->segment(1) == 'data-sub-kriteria' ? 'active' : ''}}" href="{{ route('data_sub_kriteria') }}">Sub Kriteria</a>
                @endif
            </div>
        </div>
    </li>
    {{-- <li class="nav-item {{ request()->segment(1) == 'bobot-kriteria' ? 'active' : ''}}">
    <a class="nav-link" href="{{ route('data_bobot') }}">
        <i class="fas fa-fw fa-balance-scale"></i>
        <span>Data Bobot Kriteria</span></a>
    </li>
    <li class="nav-item {{ request()->segment(1) == 'data-kriteria' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('data_kriteria') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Data Kriteria</span></a>
    </li> --}}
    <hr class="sidebar-divider">
    <div class="sidebar-heading">Main Navigation</div>
    @if (Auth::user()->roles == "penguji")
    <li class="nav-item {{ request()->segment(1) == 'penilaian-alternatif' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('penilaian_alternatif') }}">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Penilaian Alternatif</span>
        </a>
    </li>
    @endif
    @if (Auth::user()->roles == "admin")
    <li class="nav-item {{ request()->segment(1) == 'penilaian-alternatif' ? 'active' : ''}}">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#alternatif">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Penilaian Alternatif</span>
        </a>
    </li>
    @endif
    <div class="modal fade" id="alternatif" tabindex="-1" role="dialog" aria-labelledby="alternatifLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alternatifLabel">Penilaian Alternatif</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('penilaian_alternatif') }}" method="GET" id="formPeriodePenguji3">
                        <div class="form-group">
                            <label for="penguji">Penguji:</label>
                            <select name="penguji" id="penguji3" class="form-control">
                                <option value="">Pilih Penguji</option>
                                @foreach ($penguji as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" id="submitBtn3" disabled>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var pengujiSelect = document.getElementById("penguji3");
            var submitBtn = document.getElementById("submitBtn3");

            pengujiSelect.addEventListener("change", toggleSubmitBtn);

            function toggleSubmitBtn() {
                if (pengujiSelect.value) {
                    submitBtn.disabled = false;
                } else {
                    submitBtn.disabled = true;
                }
            }
        });
        document.getElementById("formPeriodePenguji3").addEventListener("submitBtn3", function() {
            // Membersihkan nilai input periode
            document.getElementById("periode3").value = "";
        });
    </script>

    <!-- Link untuk memicu Modal 1 -->
    <li class="nav-item {{ request()->segment(1) == 'proses-saw' ? 'active' : ''}}">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#periodeModal">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Proses Perhitungan</span>
        </a>
    </li>

    <!-- Modal 1 -->
    <div class="modal fade" id="periodeModal" tabindex="-1" role="dialog" aria-labelledby="periodeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="periodeModalLabel">Proses Perhitungan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('proses_saw') }}" method="GET" id="formPeriodePenguji">
                        <div class="form-group">
                            <label for="periode">Periode:</label>
                            <select name="periode" id="periode" class="form-control">
                                <option value="">Pilih Periode</option>
                                @foreach ($periode as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (Auth::user()->roles == "admin")
                        <div class="form-group">
                            <label for="penguji">Penguji:</label>
                            <select name="penguji" id="penguji" class="form-control">
                                <option value="">Pilih Penguji</option>
                                @foreach ($penguji as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Submit</button>
                    </form>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var periodeSelect = document.getElementById("periode");
                            var pengujiSelect = document.getElementById("penguji");
                            var submitBtn = document.getElementById("submitBtn");

                            periodeSelect.addEventListener("change", toggleSubmitBtn);
                            if (pengujiSelect) {
                                pengujiSelect.addEventListener("change", toggleSubmitBtn);
                            }

                            function toggleSubmitBtn() {
                                if (periodeSelect.value && (!pengujiSelect || pengujiSelect.value)) {
                                    submitBtn.disabled = false;
                                } else {
                                    submitBtn.disabled = true;
                                }
                            }
                        });
                        document.getElementById("formPeriodePenguji").addEventListener("submitBtn", function() {
                            // Membersihkan nilai input periode
                            document.getElementById("periode").value = "";

                            // Jika opsi penguji ada, membersihkan nilai input penguji
                            var pengujiSelect = document.getElementById("penguji");
                            if (pengujiSelect) {
                                pengujiSelect.value = "";
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>

    <!-- Link untuk memicu Modal 2 -->
    <li class="nav-item {{ request()->segment(1) == 'laporan-hasil' ? 'active' : ''}}">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#periodeModal2">
            <i class="fas fa-fw fa-arrow-right"></i>
            <span>Data Hasil Keputusan</span>
        </a>
    </li>

    <!-- Modal 2 -->
    <div class="modal fade" id="periodeModal2" tabindex="-1" role="dialog" aria-labelledby="periodeModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="periodeModalLabel2">Data Hasil Keputusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('laporan_hasil') }}" method="GET" id="formPeriodePenguji2">
                        <div class="form-group">
                            <label for="periode">Periode:</label>
                            <select name="periode" id="periode2" class="form-control">
                                <option value="">Pilih Periode</option>
                                @foreach ($periode as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if (Auth::user()->roles == "admin")
                        <div class="form-group">
                            <label for="penguji">Penguji:</label>
                            <select name="penguji" id="penguji2" class="form-control">
                                <option value="">Pilih Penguji</option>
                                @foreach ($penguji as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary" id="submitBtn2" disabled>Submit</button>
                    </form>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            var periodeSelect = document.getElementById("periode2");
                            var pengujiSelect = document.getElementById("penguji2");
                            var submitBtn = document.getElementById("submitBtn2");

                            periodeSelect.addEventListener("change", toggleSubmitBtn);
                            if (pengujiSelect) {
                                pengujiSelect.addEventListener("change", toggleSubmitBtn);
                            }

                            function toggleSubmitBtn() {
                                if (periodeSelect.value && (!pengujiSelect || pengujiSelect.value)) {
                                    submitBtn.disabled = false;
                                } else {
                                    submitBtn.disabled = true;
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->roles == "admin")
    <hr class="sidebar-divider m-0">
    <li class="nav-item {{ request()->segment(1) == 'data-pengguna' ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('data_pengguna') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Manajemen Pengguna</span>
        </a>
    </li>
    @endif
</ul>