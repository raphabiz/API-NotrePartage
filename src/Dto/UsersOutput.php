<?php

namespace App\Dto;

use Doctrine\ORM\Mapping as ORM;

final class UsersOutput {
    /**
     * @ORM\Column(type="json")
     */
    public $user;

    public function getUser(): ?array
    {
        return $this->user;
    }

    public function setUser(array $user): self
    {
        $this->user = $user;

        return $this;
    }
}