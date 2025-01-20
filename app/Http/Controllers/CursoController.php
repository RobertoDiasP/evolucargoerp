<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCurso;
use App\Models\SubtipoCurso;
use App\Models\Curso;

class CursoController extends Controller
{
    public function cursoindex()
    {
        return view("adm.cursos");
    }

    public function subtipoindex()
    {
        $tipos = TipoCurso::all(); // Busca todos os registros
        $subtipo = SubtipoCurso::with('tipoCurso')->get(); 
        return view('cursos.subtipo.index', compact('tipos','subtipo'));
    }

    public function subtipostore(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'tipo_curso_id' => 'required|exists:tipos_curso,id', // Valida se o tipo de curso existe na tabela tipos_curso
        ]);

        // Criação do SubtipoCurso
        SubtipoCurso::create([
            'nome' => $validatedData['nome'],
            'tipo_curso_id' => $validatedData['tipo_curso_id'],
        ]);

        // Redireciona com uma mensagem de sucesso
        return redirect()->route('subtipo.index')->with('success', 'Subtipo de curso registrado com sucesso!');
    }

    public function subtipodestroy($id)
    {
        $subtipo = SubtipoCurso::findOrFail($id); // Busca o registro pelo ID
        $subtipo->delete(); // Exclui o registro

        return redirect()->route('subtipo.index')->with('success', 'Subtipo de curso excluído com sucesso!');
    }


    public function tipoindex()
    {
        $tipos = TipoCurso::all(); // Busca todos os registros
        return view('cursos.tipo.index', compact('tipos'));
    }

    public function tipostore(Request $request)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Criação do tipo de curso
        TipoCurso::create([
            'nome' => $validatedData['nome'],
        ]);

        // Redirecionar ou exibir uma mensagem
        return redirect()->route('tipo.index')->with('success', 'Tipo de curso registrado com sucesso!');
    }

    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.curso.index', compact('cursos'));
    }

}
