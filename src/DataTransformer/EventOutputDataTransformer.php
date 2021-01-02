<?php


namespace App\DataTransformer;
use App\Dto\EventOutput;
use App\Entity\Event;
use App\Entity\Tasks;
use App\Entity\TaskGroup;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\DataTransformer\DataTransformerInterface;

class EventOutputDataTransformer extends AbstractController implements DataTransformerInterface
{
    /**
     * @inheritDoc
     */
    public function transform($data, string $to, array $context = [])
    {
        // to select each event
        /*
        $output = new EventOutput();
        $idEvent = $data->getIdEvent();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('e.id,e.start_date, e.end_date, e.type, tg.id_taskgroup');
        $query->from(Event::class, 'e', TaskGroup::class, 'tg');
        $query->andWhere('e.id =' . $idEvent);
        $query->and('tg.id_event='. $idEvent);
        $qb = $query->getQuery();
        $result = $qb->getResult();

        // to keep in arrays user data
        $start_date = [];
        $end_date = [];
        $type = [];
        $id_taskgroup=[];

        foreach ($result as $key => $value) {

            if (!in_array($value["start_date"], $start_date)) {
                array_push($start_date, $value["start_date"]);
            }
            if (!in_array($value["end_date"], $end_date)) {
                array_push($end_date, $value["end_date"]);
            }
            if (!in_array($value["type"], $type)) {
                array_push($type, $value["type"]);
            }
            if (!in_array($value["id_taskgroup"], $id_taskgroup)) {
                array_push($id_taskgroup, $value["id_taskgroup"]);
            }

        }

        // to respect HATEOAS rules
        $prefix = "http://127.0.0.1:8001/";
        $chaine = (string)$idEvent;
        $allEvents = ['rel' => 'all-events', 'href' => $prefix . "api/event/"];
        $selfEvent = ['rel' => 'self', 'href' => $prefix . "api/event/" . $chaine];
        $links = array($allEvents, $selfEvent);


        $msg = [
            "id" => $idEvent,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "type" => $type,
            "id_taskgroup"=>$id_taskgroup,
            "links" => $links,
        ];*/
        $output = new EventOutput();
        $idEvent = $data->getId();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('e.id,e.startDate, e.endDate, e.type, tg.idTaskgroup, tg.idEvent');
        $query->from(Event::class, 'e');
        $query->from(TaskGroup::class, 'tg');
        //$query->join('tg.idEvent', 'e.id');
        $query->andWhere('tg.idEvent = e.id');
        $query->andWhere('e.id =' . $idEvent);
        $qb = $query->getQuery();
        $result = $qb->getResult();

        // to keep in arrays user data
        $startDate = [];
        $endDate = [];
        $type = [];
        $id_taskgroup=[];

        foreach ($result as $key => $value) {

            if (!in_array($value["startDate"], $startDate)) {
                array_push($startDate, $value["startDate"]);
            }
            if (!in_array($value["endDate"], $endDate)) {
                array_push($endDate, $value["endDate"]);
            }
            if (!in_array($value["type"], $type)) {
                array_push($type, $value["type"]);
            }
            if (!in_array($value["id_taskgroup"], $id_taskgroup)) {
                array_push($id_taskgroup, $value["id_taskgroup"]);
            }

        }

        // to respect HATEOAS rules
        $prefix = "http://127.0.0.1:8001/";
        $chaine = (string)$idEvent;
        $allEvents = ['rel' => 'all-events', 'href' => $prefix . "api/event/"];
        $selfEvent = ['rel' => 'self', 'href' => $prefix . "api/event/" . $chaine];
        $links = array($allEvents, $selfEvent);


        $msg = [
            "id" => $idEvent,
            "startDate" => $startDate,
            "endDate" => $endDate,
            "type" => $type,
            "id_taskgroup"=>$id_taskgroup,
            "links" => $links,
        ];


        $output->setEvent($msg);

        return $output;
    }

    /**
     * @inheritDoc
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return EventOutput::class === $to;
    }
}