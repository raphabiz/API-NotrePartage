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
        $idTasks = $data->getIdTask();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select(' t.idTask, t.idTaskgroup, tg.idTaskgroup');
        $query->from(Tasks::class, 't');
        //$query->from(TaskGroup::class, 'tg');
        //$query-> innerJoin(TaskGroup::class, 'tg', Join::WITH, 'tg.idTaskgroup =t.idTaskgroup');
        $query->innerJoin('t.idTaskgroup', 'tg', 'WITH', 'tg.idTaskgroup=t.idTaskgroup');
        //$query->from(Event::class, 'e');
        //$query->andWhere('tg.idEvent = e.id');
        //$query->andWhere('t.idTaskgroup =tg.idTaskgroup');
        $query->andWhere('t.idTask =' . $idTasks);


        $qb = $query->getQuery();
        $result = $qb->getResult();

        // to keep in arrays user data

        $idTask=[];

        foreach ($result as $key => $value) {


            if (!in_array($value["idTask"], $idTask)) {
                array_push($idTask, $value["idTask"]);
            }

        }

        // to respect HATEOAS rules
        $prefix = "http://127.0.0.1:8001/";
        $chaine = (string)$idTasks;
        $allTasks = ['rel' => 'all-tasks', 'href' => $prefix . "api/tasks/"];
        $selfTasks = ['rel' => 'self', 'href' => $prefix . "api/tasks/" . $chaine];
        $links = array($allTasks, $selfTasks);


        $msg = [
            "idtask"=>$idTask,
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