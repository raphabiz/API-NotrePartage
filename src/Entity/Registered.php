<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registered
 *
 * @ORM\Table(name="registered", indexes={@ORM\Index(name="id_event", columns={"id_event"}), @ORM\Index(name="id_volunteer", columns={"id_volunteer"})})
 * @ORM\Entity
 */
class Registered
{
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
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_volunteer", referencedColumnName="id")
     * })
     */
    private $idVolunteer;

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
