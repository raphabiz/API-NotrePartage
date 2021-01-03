<?php

namespace App\DataTransformer;

use App\Dto\UserEventsOutput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\DataTransformer\DataTransformerInterface;

class UserEventsOutputDataTransformer extends AbstractController implements DataTransformerInterface
{
    /**
     * @inheritDoc
     */
    public function transform($data, string $to, array $context = [])
    {
        $output = new UserEventsOutput;
        $idUser = $data->getId();
        $registered=[];
        $em = $this->getDoctrine()->getManager();
        $conn = $em->getConnection();

        $sql = '
            SELECT * FROM event e
            INNER JOIN registered r
            WHERE e.id = r.id_Event AND
            r.id_volunteer = :idUser

        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['idUser' => $idUser]);
        $id = [];
        $start_date = [];
        $end_date = [];
        $type = [];
        

        foreach ($stmt as $key => $value) {
            if (!in_array($value["id"], $id)) {
                array_push($id, $value["id"]);
            }
            
            array_push($start_date, $value["start_date"]);
            
            array_push($end_date, $value["end_date"]);
            
            array_push($type, $value["type"]);

        }
        // to respect HATEOAS rules
        $prefix = "http://127.0.0.1:8000/";
        $chaine = (string)$idUser;
        $allUsers = ['rel' => 'UserAtEvent', 'href' => $prefix . "api/registeredEvent/" . $chaine];
        $selfUser = ['rel' => 'self', 'href' => $prefix . "api/user/" . $chaine];
        $links = array($allUsers, $selfUser);

        

        $msg = [
            "id"=> $id,
            "start_date" => $start_date,
            "end_date" => $end_date,
            "type" => $type,
            "links" => $links
        ];
        $output->setUserEvents($msg);

        return $msg;



        
    }

    /**
     * @inheritDoc
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return UserEventsOutput::class === $to;
    }
}