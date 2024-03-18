<td class="text-center">{{ $loop->iteration }}</td>
<td>{{ $penilaian->alternatif->guru['nama_guru'] }}</td>
<td>{{ $penilaian->kriteria['nama_kriteria'] }}</td>
<td class="text-center">{{ $penilaian->subKriteria['sub_kriteria'] }}</td>
<td class="text-center">
    <a href="{{ route('edit_penilaian', $penilaian->id) }}" class="btn btn-sm btn-warning">Edit</a>
    <button class="btn btn-sm btn-danger" onclick="deletePenilaian({{ $penilaian->id }})">Hapus</button>
</td>
