<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tasks
 *
 * @ORM\Table(name="tasks", indexes={@ORM\Index(name="id_taskgroup", columns={"id_taskgroup"})})
 * @ORM\Entity
 */
class Tasks
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_task", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTask;

    /**
     * @var string
     *
     * @ORM\Column(name="task_name", type="string", length=250, nullable=false)
     */
    private $taskName;

    /**
     * @var \TaskGroup
     *
     * @ORM\ManyToOne(targetEntity="TaskGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_taskgroup", referencedColumnName="id_taskgroup")
     * })
     */
    private $idTaskgroup;

    public function getIdTask(): ?int
    {
        return $this->idTask;
    }

    public function getTaskName(): ?string
    {
        return $this->taskName;
    }

    public function setTaskName(string $taskName): self
    {
        $this->taskName = $taskName;

        return $this;
    }

    public function getIdTaskgroup(): ?TaskGroup
    {
        return $this->idTaskgroup;
    }

    public function setIdTaskgroup(?TaskGroup $idTaskgroup): self
    {
        $this->idTaskgroup = $idTaskgroup;

        return $this;
    }


}
