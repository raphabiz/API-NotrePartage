<?php

namespace App\Dto;

use Doctrine\ORM\Mapping as ORM;

final class UserEventsOutput
{
    /**
     * @ORM\Column(type="json")
     */
    public $UserEvents;


    public function setUserEvents(array $UserEvents): self
    {
        $this->UserEvents = $UserEvents;

        return $this;
    }

}