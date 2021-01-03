<?php

namespace App\Dto;

use Doctrine\ORM\Mapping as ORM;

final class RegisteredOutput
{
    /**
     * @ORM\Column(type="json")
     */
    public $registered;

    public function getRegistered(): ?array
    {
        return $this->registered;
    }

    public function setRegistered(array $registered): self
    {
        $this->registered = $registered;

        return $this;
    }

    public function getRegisteredEvent(int $idEvent)
    {
        $registered=[];
        $em = $this->getDoctrine()->getManager();
        $conn = $em->getConnection();

        $sql = '
            SELECT User FROM user u
            INNER JOIN registered r
            WHERE r.id_event = :idEvent

        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt;
    }

}

