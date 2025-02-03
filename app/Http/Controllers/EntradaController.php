<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        return view('erp.entradas.index');
    }

    public function create()
    {
        return view('erp.entradas.create');
    }


    public function teste()
    {
        $user = auth()->user();  // Recupera o usuário autenticado da sessão
        return response()->json($user);
    }
}
