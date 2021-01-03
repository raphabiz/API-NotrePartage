<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskGroup
 *
 * @ORM\Table(name="task_group", indexes={@ORM\Index(name="id_event_tg", columns={"id_event"})})
 * @ORM\Entity
 */
class TaskGroup
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_taskgroup", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTaskgroup;

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_event", referencedColumnName="id")
     * })
     */
    private $idEvent;

    public function getIdTaskgroup(): ?int
    {
        return $this->idTaskgroup;
    }

    public function getIdEvent(): ?Event
    {
        return $this->idEvent;
    }

    public function setIdEvent(?Event $idEvent): self
    {
        $this->idEvent = $idEvent;

        return $this;
    }


}