@extends('layout.master')

@section('title', 'Proses Perhitungan')

@push('css')
@endpush
    
@section('content')
    <div class="card border-top-primary shadow mb-4">
        <div class="card-body pt-3">
            <h4 class="text-gray-900">1. Data Masing Masing Guru Terhadap Kriteria</h4>
            <div class="table-responsive">
                <table class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alternatif</th>
                            <th>Daya Tahan</th>
                            <th>Umur</th>
                            <th>Harga</th>
                            <th>Layanan Purna Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-left">Guru 1</td>
                            <td>4</td>
                            <td>5</td>
                            <td>3</td>
                            <td>7</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Nilai Maks</th>
                            <th class="bg-secondary text-white">5</th>
                            <th class="bg-secondary text-white">5</th>
                            <th class="bg-secondary text-white">4</th>
                            <th class="bg-secondary text-white">7</th>
                        </tr>
                        <tr>
                            <th colspan="2">Nilai Min</th>
                            <th class="bg-secondary text-white">2</th>
                            <th class="bg-secondary text-white">3</th>
                            <th class="bg-secondary text-white">3</th>
                            <th class="bg-secondary text-white">3</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <h4 class="text-gray-900 mt-4">2. Menghitung Nilai Normalisasi</h4> 
            <div class="table-responsive">
                <table class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alternatif</th>
                            <th>Daya Tahan</th>
                            <th>Umur</th>
                            <th>Harga</th>
                            <th>Layanan Purna Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-left">Guru 1</td>
                            <td>4/5</td>
                            <td>5/5</td>
                            <td>3/4</td>
                            <td>7/7</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <h4 class="text-gray-900 mt-4">3. Hasil Normalisasi</h4> 
            <div class="table-responsive">
                <table class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alternatif</th>
                            <th>Daya Tahan</th>
                            <th>Umur</th>
                            <th>Harga</th>
                            <th>Layanan Purna Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-left">Guru 1</td>
                            <td>0.8</td>
                            <td>1</td>
                            <td>0.8</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <h4 class="text-gray-900 mt-4">4. Menghitung Nilai Refrensi</h4> 
            <div class="table-responsive">
                <table class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alternatif</th>
                            <th>Daya Tahan</th>
                            <th>Umur</th>
                            <th>Harga</th>
                            <th>Layanan Purna Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-left">Guru 1</td>
                            <td>0.8 x 0.2</td>
                            <td>1 x 0.3</td>
                            <td>0.8 x 0.35</td>
                            <td>1 x 0.15</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Bobot Kriteria</th>
                            <th class="bg-secondary text-white">0.2</th>
                            <th class="bg-secondary text-white">0.3</th>
                            <th class="bg-secondary text-white">0.35</th>
                            <th class="bg-secondary text-white">0.15</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <h4 class="text-gray-900 mt-4">5. Hasil Prefrensi</h4> 
            <div class="table-responsive">
                <table class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Alternatif</th>
                            <th>Daya Tahan</th>
                            <th>Umur</th>
                            <th>Harga</th>
                            <th>Layanan Purna Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-left">Guru 1</td>
                            <td>0.16</td>
                            <td>0.3</td>
                            <td>0.28</td>
                            <td>0.15</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <h4 class="text-gray-900 mt-4">6. Menghitung Total Nilai Prefrensi</h4> 
            <div class="table-responsive">
                <table class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Daya Tahan</th>
                            <th>Umur</th>
                            <th>Harga</th>
                            <th>Layanan Purna Jual</th>
                            <th>Total Nilai Prefrensi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-left">Guru 1</td>
                            <td>0.16</td>
                            <td>0.3</td>
                            <td>0.28</td>
                            <td>0.15</td>
                            <td class="bg-secondary text-white">0.89</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <h4 class="text-gray-900 mt-4">7. Perankingan</h4> 
            <div class="table-responsive">
                <table class="table table-striped text-center" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alternatif</th>
                            <th>Nilai Prefrensi</th>
                            <th>Ranking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="text-left">Guru 1</td>
                            <td>0.89</td>
                            <td class="bg-secondary text-white">1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush