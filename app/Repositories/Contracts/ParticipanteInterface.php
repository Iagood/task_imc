<?php

namespace App\Repositories\Contracts;

interface ParticipanteInterface
{
    public function listagem();

    public function gravar(array $data);
}
