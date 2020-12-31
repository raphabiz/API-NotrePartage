<?php


namespace App\Dto;

use Doctrine\ORM\Mapping as ORM;
final class EventOutput
{
    /**
     * @ORM\Column(type="json")
     */
    public $event;

    public function getEvent(): ?array
    {
        return $this->event;
    }

    public function setEvent(array $event): self
    {
        $this->event = $event;

        return $this;
    }
}