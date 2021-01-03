<?php


namespace App\Dto;
use Doctrine\ORM\Mapping as ORM;

class TasksOutput
{
    /**
     * @ORM\Column(type="json")
     */
    public $tasks;

    public function getTasks(): ?array
    {
        return $this->tasks;
    }

    public function setTasks(array $tasks): self
    {
        $this->tasks = $tasks;

        return $this;
    }
}