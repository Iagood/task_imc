<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipanteFormRequest;
use App\Services\ParticipanteService;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    private  $service;

    public function  __construct(ParticipanteService $service)
    {
        $this->service = $service;
    }

    public function novo()
    {
        return view('participante.form');
    }

    public function gravar(ParticipanteFormRequest $request)
    {
        $request->validated();
        $this->service->gravar($request->all());

        $participantes = $this->service->listagem();
        return view('participante.table', ['participantes' => $participantes, 'cadastro_sucesso' => true]);
    }

    public function listagem()
    {
        $participantes = $this->service->listagem();
        return view('participante.table', ['participantes' => $participantes, 'cadastro_sucesso' => false]);
    }

}
