<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoEntradaController extends Controller
{
    public function index()
    {
        return view('erp.entradas.tipoentrada');
    }
}
