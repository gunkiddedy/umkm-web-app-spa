<?php

namespace App\Http\Controllers;

use App\Exports\ExportKK;
use App\Exports\ExportKDK;
use App\Exports\DesaExport;
use Illuminate\Http\Request;
use App\Exports\ExportKecamatan;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportDesa(Request $request, $id)
    {
        return Excel::download(new DesaExport($id), 'umkm-desa-'.$id.'.xlsx');
    }
     
    // kecamatan + desa + kriteria (all required)  //clear
    public function exportKDK(Request $request, $kecamatan_id, $desa_id, $kriteria)
    {
        return Excel::download(new ExportKDK($kecamatan_id, $desa_id, $kriteria), 'umkm-'.$kecamatan_id.'.xlsx');
    }

    // kecamatan //clear
    public function exportKecamatan(Request $request, $kecamatan_id)
    {
        return Excel::download(new ExportKecamatan($kecamatan_id), 'umkm-'.$kecamatan_id.'.xlsx');
    }

    public function exportKK(Request $request, $kecamatan_id, $kriteria)
    {
        return Excel::download(new ExportKK($kecamatan_id, $kriteria), 'umkm-'.$kriteria.'.xlsx');
    }
}
