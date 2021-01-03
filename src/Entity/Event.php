<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Dto\RegisteredOutput;

/**
 * Event
 * 
 * @ApiResource(
 *      itemOperations={
 *             "getRegisteredEvent"={
 *              "method"="GET",
 *              "path"="registeredEvent/{id}",
 *              "output"=RegisteredOutput::class,
 *              },
 *          "get"={"path"="event/{id}"},
 *          "put"={"path"="event/put/{id}"},
 *          "delete"={"path"="event/delete/{id}"}
 *            },
 * 
 *      collectionOperations={
 *              "post"={
 *              "method"="POST",
 *              "path"="registered/post" 
 *              }
 *         },
 * 
 *              shortname="event",
 *              formats={"json"}            
 *              
 * )
 *
 * @ORM\Table(name="event")
 * @ORM\Entity
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=false)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=false)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=false)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }


}
