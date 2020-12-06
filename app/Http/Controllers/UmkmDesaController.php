<?php

namespace App\Http\Controllers;
use App\Ukm;
use Illuminate\Http\Request;
use App\Exports\UmkmDesaExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class UmkmDesaController extends Controller
{
    public function index(Request $request, $id)
    {   
        $ukm_desa = Ukm::where('dfdesa_id', $id)->paginate(8);
        
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

    public function getDataKecamatanDesa(Request $request, $id)
    {
        // $kecDesa = Ukm::where('dfdesa_id', $id)->orderBy('id', 'desc')->paginate();

        $data = DB::table('ukms')
                     ->select(DB::raw('count(*) as jumlah_umkm, desa, dfdesa_id'))
                     ->where('dfkecamatan_id', '=', $id)
                     ->groupBy('dfdesa_id')
                     ->paginate(8);
        
        $kecamatan = DB::table('dfkecamatan')->where('dfkecamatan_id', $id)->get();
        
        return response()->json(['data' => $data, 'kecamatan' => $kecamatan]);
        // return $data->toArray();
    }

    public function getDataUmkmById(Request $request, $id)
    {
        $ukm_desa = Ukm::find($id);
        
        return response()->json($ukm_desa);
    }

    public function deleteDataUmkmById($id)
    {
        $data = Ukm::find($id)->delete();
        // $data =Ukm::where('id', $id);

        return response()->json('Data berhasil dihapus!');
    }

    public function updateDataUmkmById(Request $request, $id)
    {
        $umkm = Ukm::find($id);
        $umkm->nama_pemilik = $request->get('nama_pemilik');
        $umkm->nama_usaha = $request->get('nama_usaha');
        $umkm->kelembagaan = $request->get('kelembagaan');
        $umkm->nik = $request->get('nik');
        $umkm->jenis_kelamin = $request->get('jenis_kelamin');
        $umkm->siu = $request->get('siu');
        $umkm->npwp = $request->get('npwp');
        $umkm->tmu = $request->get('tmu');
        $umkm->alamat = $request->get('alamat');
        $umkm->desa = $request->get('desa');
        $umkm->tlp = $request->get('tlp');
        $umkm->email = $request->get('email');
        $umkm->up1 = $request->get('up1');
        $umkm->up2 = $request->get('up2');
        $umkm->up3 = $request->get('up3');
        $umkm->up4 = $request->get('up4');
        $umkm->up5 = $request->get('up5');
        $umkm->up6 = $request->get('up6');
        $umkm->up7 = $request->get('up7');
        $umkm->up8 = $request->get('up8');
        $umkm->up9 = $request->get('up9');
        $umkm->up10 = $request->get('up10');
        $umkm->up11 = $request->get('up11');
        $umkm->bahan_baku = $request->get('bahan_baku');
        $umkm->tk1_l = $request->get('tk1_l');
        $umkm->tk1_p = $request->get('tk1_p');
        $umkm->tk2_l = $request->get('tk2_l');
        $umkm->tk2_p = $request->get('tk2_p');
        $umkm->kp1 = $request->get('kp1');
        $umkm->kp2 = $request->get('kp2');
        $umkm->omset1 = $request->get('omset1');
        $umkm->omset2 = $request->get('omset2');
        $umkm->ms1 = $request->get('ms1');
        $umkm->ms2 = $request->get('ms2');
        $umkm->bp1 = $request->get('bp1');
        $umkm->bp2 = $request->get('bp2');
        $umkm->pk1 = $request->get('pk1');
        $umkm->pk2 = $request->get('pk2');
        $umkm->pp1 = $request->get('pp1');
        $umkm->pp2 = $request->get('pp2');
        $umkm->pb1 = $request->get('pb1');
        $umkm->pb2 = $request->get('pb2');

        $omset = $request->get('omset2');
        $asset = $request->get('ms2') + $request->get('bp2') + $request->get('pk2') + $request->get('pp2') + $request->get('pb2');
        
        if($omset>2500000000 && $omset<=50000000000 && $asset>500000000 && $asset<=10000000000)
            $kriteria = 'Usaha Menengah';
        elseif($omset>300000000 && $omset<=2500000000 && $asset>50000000 && $asset<=500000000)
            $kriteria = 'Usaha Kecil';
        elseif($omset<=300000000 && $asset<=50000000)
            $kriteria = 'Usaha Mikro';
        else
            $kriteria = 'Undefined';

        $umkm->kriteria = $kriteria;
        
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
