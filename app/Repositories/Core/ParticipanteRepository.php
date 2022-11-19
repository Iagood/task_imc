<?php

namespace App\Repositories\Core;

use App\Models\Participante;
use Illuminate\Database\Eloquent\Collection;

class ParticipanteRepository
{
    private $entity;

    public function __construct(Participante $entity)
    {
        $this->entity = $entity;
    }

    public function listagem(): Collection
    {
        return $this->entity->get();
    }

    public function gravar(array $data): void
    {
        $this->entity->Create($data);
    }

}
