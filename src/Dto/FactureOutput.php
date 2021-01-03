<?php

/*************
 *    RAB
 *************/

namespace App\Dto;

use Doctrine\ORM\Mapping as ORM;

final class FactureOutput {
    /**
     * @ORM\Column(type="json")
     */
    public $facture;

    public function getFacture(): ?array
    {
        return $this->facture;
    }

    public function setFacture(array $facture): self
    {
        $this->facture = $facture;

        return $this;
    }
}