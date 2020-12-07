<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use Illuminate\Http\Request;
use App\Exports\UmkmDesaExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportDesa(Request $request, $id)
    {
        return Excel::download(new UmkmDesaExport($id), 'umkm-desa-'.$id.'.xlsx');
    }

    /*
    private $kecamatan_id;
    private $desa_id;
    private $kriteria;
    */
    public function exportAdmin(Request $request, $kecamatan_id, $desa_id, $kriteria)
    {
        return Excel::download(new AdminExport($kecamatan_id, $desa_id, $kriteria), 'umkm-'.$kecamatan_id.'.xlsx');
    }
}
