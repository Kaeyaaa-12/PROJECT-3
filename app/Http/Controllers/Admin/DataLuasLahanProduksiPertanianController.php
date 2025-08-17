<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataLuasLahanProduksiPertanianController extends Controller
{
    public function index()
    {
        return view('admin.data_luas_lahan_produksi_pertanian');
    }
}