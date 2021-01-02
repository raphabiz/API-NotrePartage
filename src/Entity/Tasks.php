<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use App\Dto\TasksOutput;
/**
 * Tasks
 *
 * @ApiResource(
 *     output=TasksOutput::class,
 *     itemOperations={
 *          "get"={"path"="tasks/{id}"},
 *          "put"={"path"="tasks/put/{id}"},
 *          "delete"={"path"="tasks/delete/{id}"}
 *     },
 *     collectionOperations={
 *            "get"={"path"="tasks"},
 *            "post"={"path"="tasks/post"}
 *     },
 *     shortname="tasks"
 * )
 *
 *
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
