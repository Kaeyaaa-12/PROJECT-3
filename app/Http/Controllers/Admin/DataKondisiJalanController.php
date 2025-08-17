<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataKondisiJalanController extends Controller
{
    public function index()
    {
        return view('admin.data_kondisi_jalan');
    }
}