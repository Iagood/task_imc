<?php

namespace App\Services;

use App\Repositories\Core\ParticipanteRepository;
use App\Repositories\Contracts\ParticipanteInterface;

class ParticipanteService implements ParticipanteInterface
{
    private $repository;

    public function __construct(ParticipanteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function listagem()
    {
        return $this->repository->listagem();
    }

    public function gravar(array $data): void
    {
        $this->repository->gravar($data);
    }

}
