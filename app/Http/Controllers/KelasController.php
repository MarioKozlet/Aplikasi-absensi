<?php

namespace App\Http\Controllers;

use App\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Kelas;
use App\Guru;
use Validator;
use MyHelper;
use DataTables;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }

    public function index()
    {
        $data['nav_active'] = 'kelas';  
        $data['title'] = 'Data Kelas';
        $data['kelas'] = Kelas::all();
        $data['guru'] = Guru::all();
        $data['jurusan'] = Jurusan::all();
        // $data['jenjang'] = DB::table('conf_level')->where('jenjang', MyHelper::get_jenjang_sekolah())->orderBy('urutan')->get();

        return view('kelas.data_kelas', $data);
    }

    public function ajax_get_kelas()
    {
        $data = Kelas::with('guru')->get();

        return Datatables::of($data)->make(true);
    }

    public function ajax_action_add_kelas(Request $request)
    {
        //SET ATTRIBUTE
        $attrs = [
            'kode_kelas' => 'Kode Kelas',
            'nama_kelas' => 'Nama Kelas',
            'tingkat_kelas' => 'Tingkatan Kelas',
            'jurusan_kelas' => 'Jurusan Kelas'
        ];

        //SET RULE
        $validator = Validator::make($request->all(), [
            'kode_kelas' => [
                'required',
                'without_spaces',
                Rule::unique('table_kelas')
            ],
            'nama_kelas' => [
                'required',
                Rule::unique('table_kelas')
            ],
            'tingkat_kelas' => 'required',
            'jurusan_kelas' => 'required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data);
            die();
        }


        //Mass Asignment Insert Method
        $kelas = Kelas::create([
                'kode_kelas' => $request->kode_kelas,
                'nama_kelas' => $request->nama_kelas,
                'tingkat_kelas' => $request->tingkat_kelas,
                'jurusan_kelas' => $request->jurusan_kelas,
                'wali_kelas' => $request->wali_kelas
            ]);

        if(!$kelas)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat memasukkan data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data);
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil menambahkan data kelas!'],
            'redirect' => '/kelas'
        ];

        return json_encode($json_data);
    }

    public function ajax_action_edit_kelas(Request $request)
    {
        //SET ATTRIBUTE
        $attrs = [
            'kode_kelas' => 'Kode Kelas',
            'nama_kelas' => 'Nama Kelas',
            'tingkat_kelas' => 'Tingkatan Kelas',
            'jurusan_kelas' => 'Jurusan Kelas'
        ];

        //SET RULE
        $validator = Validator::make($request->all(), [
            'kode_kelas' => [
                'required',
                'without_spaces',
                Rule::unique('table_kelas')->ignore($request->id_kelas)
            ],
            'nama_kelas' => [
                'required',
                Rule::unique('table_kelas')->ignore($request->id_kelas)
            ],
            'tingkat_kelas' => 'required',
            'jurusan_kelas' => 'required'
        ]);
        $validator->setAttributeNames($attrs);

        if($validator->fails())
        {
            $errors = $validator->errors();
            $json_data = [
                'result' => false,
                'form_error' => $errors->all(),
                'message' => ['head' => 'Gagal', 'body' => 'Mohon maaf, ada beberapa form harus diisi!'],
                'redirect' => ''
            ];

            return json_encode($json_data);
            die();
        }

        $kelas = Kelas::find($request->id_kelas);
        $kelas->kode_kelas = $request->kode_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->jurusan_kelas = $request->jurusan_kelas;
        $kelas->wali_kelas = $request->wali_kelas;
        $kelas->save();

        if(!$kelas)
        {
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat mengubah data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data);
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil mengubah data kelas!'],
            'redirect' => '/kelas'
        ];

        return json_encode($json_data);
    }

    public function ajax_action_delete_kelas(Request $request)
    {
        $delete = Kelas::destroy($request->id_kelas);

        if(!$delete)
        {   
            $json_data = [
                'result' => false,
                'form_error' => '',
                'message' => ['head' => 'Gagal', 'body' => 'Ada kesalahan saat menghapus data. Lakukan beberapa saat lagi!'],
                'redirect' => ''
            ];
            return json_encode($json_data);
            die();
        }

        $json_data = [
            'result' => true,
            'form_error' => '',
            'message' => ['head' => 'Berhasil', 'body' => 'Berhasil menghapus data kelas!'],
            'redirect' => '/kelas'
        ];

        return json_encode($json_data);
    }

    public function ajax_get_kelas_by_id(Request $request)
    {
        $row = Kelas::find($request->id);
        $json_data = [
            'result' => true,
            'data' => $row
        ];
        return json_encode($json_data);
    }
}
