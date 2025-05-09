<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Validator;
use DataTables;
use App\Guru;
use App\User;
use Image;
use File;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('auth');
    }

    public function index()
    {
        $data['nav_active'] = 'guru';
        $data['title'] = 'Data Guru';
        $data['result'] = Guru::all();

        return view('guru.data_guru', $data);
    }

}
