<?php


namespace App\DataTransformer;


use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Dto\TasksOutput;
use App\Entity\Event;
use Doctrine\ORM\Query\Expr\Join;

use App\Entity\TaskGroup;
use App\Entity\Tasks;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TasksOutputDataTransformer extends AbstractController implements DataTransformerInterface
{
    public function transform($data, string $to, array $context = [])
    {



        $output = new TasksOutput();
        $idEvent = $data->getIdTask();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select(' t.idTask, t.taskName, tg.idTaskgroup, e.id, e.startDate, e.endDate, e.type');
        $query->from(Tasks::class, 't');
        $query->from(TaskGroup::class, 'tg');
        $query->from(Event::class, 'e');
        $query->andWhere('tg.idEvent = e.id');
        $query->andWhere('t.idTaskgroup = tg.idTaskgroup');
        $query->andWhere('e.id =' . $idEvent);
        $qb = $query->getQuery();
        $result = $qb->getResult();

        $qb = $query->getQuery();
        $result = $qb->getResult();

        // to keep in arrays user data

        $idTask=[];
        $taskName=[];
        $startDate=[];
        $endDate=[];
        $idTaskgroup=[];
        $type=[];

        foreach ($result as $key => $value) {


            if (!in_array($value["idTask"], $idTask)) {
                array_push($idTask, $value["idTask"]);
            }
            if (!in_array($value["taskName"], $taskName)) {
                array_push($taskName, $value["taskName"]);
            }
            if (!in_array($value["startDate"], $startDate)) {
                array_push($startDate, $value["startDate"]);
            }
            if (!in_array($value["endDate"], $endDate)) {
                array_push($endDate, $value["endDate"]);
            }
            if (!in_array($value["idTaskgroup"], $idTaskgroup)) {
                array_push($idTaskgroup, $value["idTaskgroup"]);
            }
            if (!in_array($value["type"], $type)) {
                array_push($type, $value["type"]);
            }

        }

        // to respect HATEOAS rules
        $prefix = "http://127.0.0.1:8001/";
        $chaine = (string)$idEvent;
        $allTasks = ['rel' => 'all-tasks', 'href' => $prefix . "api/tasks/"];
        $selfTasks = ['rel' => 'self', 'href' => $prefix . "api/tasks/" . $chaine];
        $links = array($allTasks, $selfTasks);


        $msg = [
            "idEvent"=>$idEvent,
            "type"=>$type,
            "startDate"=>$startDate,
            "endDate"=>$endDate,
            "idTaskgroup"=>$idTaskgroup,
            "idtask"=>$idTask,
            "taskName"=>$taskName,
            "links" => $links,
        ];

        $output->setTasks($msg);

        return $output;
    }

    /**
     * @inheritDoc
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return TasksOutput::class === $to;
    }
}