<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registered
 *
 * @ORM\Table(name="registered", indexes={@ORM\Index(name="id_volunteer", columns={"id_volunteer"}), @ORM\Index(name="id_event", columns={"id_event"})})
 * @ORM\Entity
 */
class Registered
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_registered", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegistered;

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_event", referencedColumnName="id")
     * })
     */
    private $idEvent;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_volunteer", referencedColumnName="id")
     * })
     */
    private $idVolunteer;

    public function getIdRegistered(): ?int
    {
        return $this->idRegistered;
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

    public function getIdVolunteer(): ?User
    {
        return $this->idVolunteer;
    }

    public function setIdVolunteer(?User $idVolunteer): self
    {
        $this->idVolunteer = $idVolunteer;

        return $this;
    }


}
