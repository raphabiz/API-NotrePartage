<?php

namespace App\DataTransformer;

use App\Dto\RegisteredOutput;
use App\Entity\Registered;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\DataTransformer\DataTransformerInterface;

class RegisteredOutputDataTransformer extends AbstractController implements DataTransformerInterface
{
    /**
     * @inheritDoc
     */
    public function transform($data, string $to, array $context = [])
    {
        $output = new RegisteredOutput;
        $idEvent = $data->getId();
        $registered=[];
        $em = $this->getDoctrine()->getManager();
        $conn = $em->getConnection();

        $sql = '
            SELECT * FROM user u
            INNER JOIN registered r
            WHERE r.id_event = :idEvent AND
            u.id = r.id_volunteer

        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['idEvent' => $idEvent]);
        $id = [];
        $username = [];
        $firstname = [];
        $lastname = [];
        $phonenumber = [];
        $isadmin = [];
        $email = [];

        foreach ($stmt as $key => $value) {
            if (!in_array($value["id"], $id)) {
                array_push($id, $value["id"]);
            }
            if (!in_array($value["username"], $username)) {
                array_push($username, $value["username"]);
            }
            
            array_push($firstname, $value["first_name"]);
            
            array_push($lastname, $value["last_name"]);
            
            
            array_push($phonenumber, $value["phone_number"]);
            
            array_push($isadmin, $value["is_admin"]);
            
            if (!in_array($value["email"], $email)) {
                array_push($email, $value["email"]);
            }
        }

        // to respect HATEOAS rules
        $prefix = "http://127.0.0.1:8000/";
        $chaine = (string)$idEvent;
        $selfEvent = ['rel' => 'the-event', 'href' => $prefix . "api/event/" . $chaine];
        $links = array($selfEvent);

        $msg = [
            "id"=> $id,
            "username" => $username,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "phonenumber" => $phonenumber,
            "isadmin" => $isadmin,
            "emailadress" => $email,
            "links" => $links,
        ];
        $output->setRegistered($msg);

        return $output;



        
    }

    /**
     * @inheritDoc
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return RegisteredOutput::class === $to;
    }
}