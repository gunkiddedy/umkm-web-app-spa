<table style="border:1px dashed #cccc">
    <thead class="header">
        <tr>
            <th colspan="45" class="judul">DATA UMKM KABUPATEN GUNUNGKIDUL</th>
        </tr>
        <tr>
            <td colspan="2">Periode</td>
            <td>:</td>
            <td>2020</td>
        </tr>
        <tr>
            <td colspan="2">Kriteria</td>
            <td>:</td>
            <td>Usaha Mikro</td>
        </tr>
        <tr>
            <th rowspan="4" style="border: black 1px solid">No.</th>
            <th rowspan="4" style="border: black 1px solid">Nama Usaha.</th>
            <th rowspan="4" style="border: black 1px solid">Kelembagaan</th>
            <th rowspan="4" style="border: black 1px solid">Nama Pemilik</th>
            <th rowspan="4" style="border: black 1px solid">NIK</th>
            <th rowspan="4" style="border: black 1px solid">Jenis Kelamin</th>
            <th rowspan="4" style="border: black 1px solid">Disabilitas</th>
            <th rowspan="4" style="border: black 1px solid">SIU</th>
            <th rowspan="4" style="border: black 1px solid">NPWP</th>

            <th rowspan="4">Tahun Usaha</th>

            <th colspan="2">Alamat Usaha</th>
            
            
            <th rowspan="4">No.Telp</th>
            <th rowspan="4">Email</th>

            <th colspan="11">Usaha Pokok</th>

            <th rowspan="4">Jenis bahan baku jika kerajinan/makanan olahan</th>

            <th colspan="4">Indikator</th>

            <th colspan="14">Indikator Usaha</th>
            <th rowspan="4">kriteria</th>

        </tr>
        <tr>
            <td rowspan="3">Jalan, rt/rw</td>
            <td rowspan="3">Kelurahan Desa</td>
            <td rowspan="3">Makanan Olahan/Industri Pertanian</td>
            <td rowspan="3">Kerajinan/Industri non Pertanian</td>
            <td rowspan="3">Jasa Swasta</td>
            <td rowspan="3">Perdagangan</td>
            <td rowspan="3">Usaha Lainnya/Aneka Usaha</td>
            <td rowspan="3">Pertanian, Peternakan, Kehutanan, Perikanan</td>
            <td rowspan="3">Pertambangan dan Penggalian</td>
            <td rowspan="3">Industri Pengolahan</td>
            <td rowspan="3">Listrik, Gas dan Air Bersih</td>
            <td rowspan="3">Bangunan</td>
            <td rowspan="3">Perdagangan, Hotel dan Restoran/WM</td>
            <td colspan="4">Tenaga Kerja</td>
            <td colspan="2" rowspan="2">Kapasitas produksi/bulan</td>
            <td colspan="2" rowspan="2">Omset/tahun</td>
            <td colspan="10">Aset</td>
        </tr>
        <tr>
            <td colspan="2">2016</td>
            <td colspan="2">2017</td>
            <td colspan="2">Modal Sendiri</td>
            <td colspan="2">Bantuan Pemerintah</td>
            <td colspan="2">Pinjaman Koperasi</td>
            <td colspan="2">Pinjaman Perorangan</td>
            <td colspan="2">Pinjaman Bank</td>
        </tr>
        <tr>
            <td>P</td>
            <td>L</td>
            <td>P</td>
            <td>L</td>

            <td>2016</td>
            <td>2017</td>
            <td>2016</td>
            <td>2017</td>

            <td>2016</td>
            <td>2017</td>
            <td>2016</td>
            <td>2017</td>
            <td>2016</td>
            <td>2017</td>
            <td>2016</td>
            <td>2017</td>
            <td>2016</td>
            <td>2017</td>

        </tr>
    </thead>
    <tbody style="align-items: center;justify-items: center;">
        {{ $no = 1 }}
        @foreach ($umkms as $umkm)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $umkm->nama_usaha }}</td>
            <td>{{ $umkm->kelembagaan }}</td>
            <td>{{ $umkm->nama_pemilik }}</td>
            <td>{{ $umkm->nik }}</td>
            <td>{{ $umkm->jenis_kelamin }}</td>
            <td>{{ $umkm->disabilitas }}</td>
            <td>{{ $umkm->siu }}</td>
            <td>{{ $umkm->npwp }}</td>
            <td>{{ $umkm->tmu }}</td>
            <td>{{ $umkm->alamat }}</td>
            <td>{{ $umkm->desa }}</td>
            <td>{{ $umkm->tlp }}</td>
            <td>{{ $umkm->email }}</td>
            <td>{{ $umkm->up1 }}</td>
            <td>{{ $umkm->up2 }}</td>
            <td>{{ $umkm->up3 }}</td>
            <td>{{ $umkm->up4 }}</td>
            <td>{{ $umkm->up5 }}</td>
            <td>{{ $umkm->up6 }}</td>
            <td>{{ $umkm->up7 }}</td>
            <td>{{ $umkm->up8 }}</td>
            <td>{{ $umkm->up9 }}</td>
            <td>{{ $umkm->up10 }}</td>
            <td>{{ $umkm->up11 }}</td>
            <td>{{ $umkm->bahan_baku }}</td>
            <td>{{ $umkm->tk1_l }}</td>
            <td>{{ $umkm->tk1_p }}</td>
            <td>{{ $umkm->tk2_l }}</td>
            <td>{{ $umkm->tk2_p }}</td>
            <td>{{ $umkm->kp1 }}</td>
            <td>{{ $umkm->kp2 }}</td>
            <td>{{ $umkm->omset1 }}</td>
            <td>{{ $umkm->omset2 }}</td>
            <td>{{ $umkm->ms1 }}</td>
            <td>{{ $umkm->ms2 }}</td>
            <td>{{ $umkm->bp1 }}</td>
            <td>{{ $umkm->bp2 }}</td>
            <td>{{ $umkm->pk1 }}</td>
            <td>{{ $umkm->pk2 }}</td>
            <td>{{ $umkm->pp1 }}</td>
            <td>{{ $umkm->pp2 }}</td>
            <td>{{ $umkm->pb1 }}</td>
            <td>{{ $umkm->pb2 }}</td>
            <td>{{ $umkm->kriteria }}</td>
        </tr>
        {{ $no++ }}
        @endforeach
        <tr class="jumlah" style="background-color: #f2f2f2;">
            <td></td>
            <td>JUMLAH</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $totals['total_tk1_l'] }}</td>
            <td>{{ $totals['total_tk1_p'] }}</td>
            <td>{{ $totals['total_tk2_l'] }}</td>
            <td>{{ $totals['total_tk2_p'] }}</td>
            <td>NAN</td>
            <td>NAN</td>
            <td>{{ $totals['total_omset1'] }}</td>
            <td>{{ $totals['total_omset2'] }}</td>
            <td>{{ $totals['total_ms1'] }}</td>
            <td>{{ $totals['total_ms2'] }}</td>
            <td>{{ $totals['total_bp1'] }}</td>
            <td>{{ $totals['total_bp2'] }}</td>
            <td>{{ $totals['total_pk1'] }}</td>
            <td>{{ $totals['total_pk2'] }}</td>
            <td>{{ $totals['total_pp1'] }}</td>
            <td>{{ $totals['total_pp2'] }}</td>
            <td>{{ $totals['total_pb1'] }}</td>
            <td>{{ $totals['total_pb2'] }}</td>
            <td></td>
        </tr>
    </tbody>
</table>

<style>
    table{
        align-items: center;
        justify-content: center;
        justify-items: center;
        text-align: center;
    }
    table th, td{
        align-items: center;
        justify-items: center;
    }
    .jumlah{
        background-color: #f2f2f2;
    }
    .judul{
        font-weight: bold;
        align-items: center;
        justify-content: center;
    }
</style>