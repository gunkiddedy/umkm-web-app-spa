<?php

namespace App\Http\Controllers;

use App\Exports\AdminExport;
use Illuminate\Http\Request;
use App\Exports\DesaExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportDesa(Request $request, $id)
    {
        return Excel::download(new DesaExport($id), 'umkm-desa-'.$id.'.xlsx');
    }

    /*
    private $kecamatan_id;
    private $desa_id;
    private $kriteria;
    */
    public function exportAdminKriteria(Request $request, $kecamatan_id, $desa_id, $kriteria)
    {
        return Excel::download(new AdminExportKriteria($kecamatan_id, $desa_id, $kriteria), 'umkm-'.$kecamatan_id.'.xlsx');
    }

    public function exportAdminKecamatan(Request $request, $kecamatan_id)
    {
        return Excel::download(new AdminExportKecamatan($kecamatan_id), 'umkm-'.$kecamatan_id.'.xlsx');
    }

    public function exportAdminUsahaPokok(Request $request, $usahaPokok)
    {
        return Excel::download(new AdminExportUsahaPokok($usahaPokok), 'umkm-'.$usahaPokok.'.xlsx');
    }
}
