<?php

namespace App\Http\Controllers;
use App\Ukm;
use Illuminate\Http\Request;
use App\Exports\UmkmDesaExport;
use Maatwebsite\Excel\Facades\Excel;

class UmkmDesaController extends Controller
{
    public function index(Request $request, $id)
    {   
        $ukm_desa = Ukm::where('dfdesa_id', $id)->paginate();
        
        return response()->json($ukm_desa);
        //ORDER BY NYA BERDASARKAN PARAMETER YANG DIKIRIM DARI VUEJS
        //SEHINGGA PENGURUTAN DATANYA SESUAI DENGAN KOLOM YG DIINGINKAN OLEH USER
        // $umkms = Ukm::where('dfdesa_id', $id)->orderBy($request->sortby, $request->sortbydesc)
        //     //JIKA Q ATAU PARAMETER PENCARIAN INI TIDAK KOSONG
        //     ->when($request->q, function($umkms) {
        //         //MAKA FUNGSI FILTER AKAN DIJALANKAN
        //         $umkms = $umkms->where([['nama_usaha', 'LIKE', '%' . $request->q . '%'],['dfdesa_id', $id]])
        //             ->orWhere([['nama_pemilik', 'LIKE', '%' . $request->q . '%'],['dfdesa_id', $id]])
        //             ->orWhere([['nik', 'LIKE', '%' . $request->q . '%'],['dfdesa_id', $id]]);
        // })->paginate($request->per_page); //KEMUDIAN LOAD PAGINATIONNYA BERDASARKAN LOAD PER_PAGE YANG DIINGINKAN OLEH USER
        // return response()->json(['status' => 'success', 'data' => $umkms]);
    }

    public function getDataUmkmById(Request $request, $id)
    {
        $ukm_desa = Ukm::find($id);
        
        return response()->json($ukm_desa);
    }

    public function updateDataUmkmById(Request $request, $id)
    {
        $umkm = Ukm::find($id);
        $umkm->nama_pemilik = $request->get('nama_pemilik');
        $umkm->save();
        
        return response()->json('data successfuly updated');
    }

    // public function getRecords( Request $request, $id) 
    // {
    //     $search_nama_usaha = $request->searchTerm;

    //     $ukm_desa = Ukm::where([
    //         ['nama_usaha', 'LIKE', '%' . $search_nama_usaha . '%'],
    //         ['dfdesa_id', $id]
    //     ])->paginate()->toArray();

    //     if ( $search_nama_usaha ) 
    //         $ukm_desa['searchTerm'] = $search_nama_usaha ?: '';
    //     else
    //         $ukm_desa['searchTerm'] = $search_nama_usaha ? null : '';
     
    //     return response()->json($ukm_desa);
    // }

    public function export(Request $request, $id)
    {
        return Excel::download(new UmkmDesaExport($id), 'umkm-desa-'.$id.'.xlsx');
    }

    public function testtable()
    {       
        return view('exports.test-table');
    }

    public function testtableTotal(Request $request, $id)
    {
        $ukm = Ukm::where('dfdesa_id', $id)->get();
        $total_tk1_l = 0;
        $total_tk1_p = 0;
        $total_tk2_l = 0;
        $total_tk2_p = 0;
        // $total_kp1 = 0;
        // $total_kp2 = 0;
        $total_omset1 = 0;
        $total_omset2 = 0;
        $total_ms1 = 0;
        $total_ms2 = 0;
        $total_bp1 = 0;
        $total_bp2 = 0;
        $total_pk1 = 0;
        $total_pk2 = 0;
        $total_pp1 = 0;
        $total_pp2 = 0;
        $total_pb1 = 0;
        $total_pb2 = 0;

        foreach($ukm as $v){
            $tk1_l = $v['tk1_l'];
            $tk1_p = $v['tk1_p'];
            $tk2_l = $v['tk2_l'];
            $tk2_p = $v['tk2_p'];
            // $kp1 = $v['kp1'];
            // $kp2 = $v['kp2'];
            $omset1 = $v['omset1'];
            $omset2 = $v['omset2'];
            $ms1 = $v['ms1'];
            $ms2 = $v['ms2'];
            $bp1 = $v['bp1'];
            $bp2 = $v['bp2'];
            $pk1 = $v['pk1'];
            $pk2 = $v['pk2'];
            $pp1 = $v['pp1'];
            $pp2 = $v['pp2'];
            $pb1 = $v['pb1'];
            $pb2 = $v['pb2'];

            $total_tk1_l += $tk1_l;
            $total_tk1_p += $tk1_p;
            $total_tk2_l += $tk2_l;
            $total_tk2_p += $tk2_p;
            // $total_kp1 += $kp1;
            // $total_kp2 += $kp2;
            $total_omset1 += $omset1;
            $total_omset2 += $omset2;
            $total_ms1 += $ms1;
            $total_ms2 += $ms2;
            $total_bp1 += $bp1;
            $total_bp2 += $bp2;
            $total_pk1 += $pk1;
            $total_pk2 += $pk2;
            $total_pp1 += $pp1;
            $total_pp2 += $pp2;
            $total_pb1 += $pb1;
            $total_pb2 += $pb2;
        }

        $totals = [
            'total_tk1_l' => $total_tk1_l,
            'total_tk1_p' => $total_tk1_p,
            'total_tk2_l' => $total_tk2_l,
            'total_tk2_p' => $total_tk2_p,
            'total_omset1' => $total_omset1,
            'total_omset2' => $total_omset2,
            'total_ms1' => $total_ms1,
            'total_ms2' => $total_ms2,
            'total_bp1' => $total_bp1,
            'total_bp2' => $total_bp2,
            'total_pk1' => $total_pk1,
            'total_pk2' => $total_pk2,
            'total_pp1' => $total_pp1,
            'total_pp2' => $total_pp2,
            'total_pb1' => $total_pb1,
            'total_pb2' => $total_pb2,
        ];

        return view('exports.test-table', [
            'umkms' => $ukm,
            'totals' => $totals
        ]);
    }
}
