@extends('layout.master')

@section('title', 'Proses Perhitungan')

@push('css')
@endpush
    
@section('content')
    <div class="card border-top-primary shadow mb-4">
        <div class="card-body pt-3">
            <h4 class="text-gray-900">1. Data Masing Masing Guru Terhadap Kriteria</h4>
            <div class="table-responsive">
                <table class="table table-striped table-sm" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" rowspan="2" style="vertical-align: middle">Kode (Ai)</th>
                            <th class="text-center" rowspan="2" style="vertical-align: middle">Keterangan</th>
                            <th class="text-center" colspan="{{ count($kriteria) }}">Kode Kriteria</th>
                        </tr>
                        <tr>
                            @foreach ($kriteria as $item)
                                <th class="text-center">{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    {{-- <tbody>
                        
                        @foreach ($alternatif as $alt)
                        <tr>
                            <td class="text-center">{{ $alt->kode_alternatif }}</td>
                            <td>{{ $alt->guru['nama_guru'] }}</td>
                            @foreach ($alt->penilaian as $nilai)
                            <td class="text-center">{{ $nilai->id_sub }}</td>
                            <?php
                                $minMaxKriteria[$nilai->kriteria->kode_kriteria]['min'] > $nilai->id_sub && $minMaxKriteria[$nilai->kriteria->kode_kriteria]['min'] = $nilai->id_sub;
                                $minMaxKriteria[$nilai->kriteria->kode_kriteria]['max'] < $nilai->id_sub && $minMaxKriteria[$nilai->kriteria->kode_kriteria]['max'] = $nilai->id_sub
                            ?>
                            @endforeach
                        </tr>
                        @endforeach
                        
                    </tbody> --}}
                    <tbody>
                        @forelse ($alternatif as $alt => $valt)
                            <tr>
                                <td class="text-center">{{ $valt->kode_alternatif }}</td>
                                <td>{{ $valt->guru['nama_guru'] }}</td>
                                @foreach ($valt->penilaian as $nilai)
                                    <td class="text-center">{{ $nilai->subKriteria['bobot'] }}</td>
                                @endforeach
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="{{ count($kriteria) +2 }}">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th colspan="2">Nilai Maks</th>
                            @foreach ($kriteria as $key => $vkriteria)
                                <th class="bg-secondary text-white">{{ max($minMax[$vkriteria->id]) }}</th>
                            @endforeach
                        </tr>
                        <tr class="text-center">
                            <th colspan="2">Nilai Min</th>
                            @foreach ($kriteria as $key => $vkriteria)
                                <th class="bg-secondary text-white">{{ min($minMax[$vkriteria->id]) }}</th>
                            @endforeach
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <h4 class="text-gray-900 mt-4">2. Menghitung Nilai Normalisasi</h4> 
            <div class="table-responsive">
                <table class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" rowspan="2" style="vertical-align: middle;">Alternatif</th>
                            <th class="text-center" colspan="{{ count($kriteria) }}">Kode Kriteria</th>
                        </tr>
                        <tr>
                            @foreach ($kriteria as $item)
                                <th class="text-center">{{ $item->kode_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($normalisasi as $key => $value)
                            <tr>
                                <td width="20%">{{ $key }}</td>
                                @foreach ($value as $key_1 => $value_1)
                                    <td class="text-center">{{ number_format($value_1 ,2) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <h4 class="text-gray-900 mt-4">3. Perankingan</h4> 
            <div class="table-responsive">
                <table class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th>Kode Kriteria</th>
                            @foreach ($kriteria as $item)
                                <th class="text-center">{{ $item->kode_kriteria }}</th>
                            @endforeach
                            <th rowspan="2" style="vertical-align: middle">Total</th>
                            <th rowspan="2" style="vertical-align: middle">Rank</th>
                        </tr>
                        <tr>
                            <th>Bobot</th>
                            @foreach ($kriteria as $item)
                                <th class="text-center">{{ $item->bobot_kriteria }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rank as $key => $value)
                            <tr>
                                <td width="20%">{{ $key }}</td>
                                @foreach ($value as $key_1 => $value_1)
                                    <td class="text-center">{{ number_format($value_1 ,2) }}</td>
                                @endforeach
                                <td>{{ $loop->iteration }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush