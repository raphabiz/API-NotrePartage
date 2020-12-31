<?php

/*************
 *    RAB
 *************/

namespace App\DataTransformer;

use App\Dto\UsersOutput;
use App\Entity\AssocUsers;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\DataTransformer\DataTransformerInterface;

class UsersOutputDataTransformer extends AbstractController implements DataTransformerInterface
{
    /**
     * @inheritDoc
     */
    public function transform($data, string $to, array $context = [])
    {
        // to select each user
        $output = new UsersOutput();
        $idUser = $data->getIdUser();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('e.iduser,u.firstname,u.lastname,u.phonenumber,u.password,u.isvolunteer,u.emailadress');
        $query->from(AssocUsers::class, 'u');
        $query->andWhere('u.iduser =' . $idUser);
        $qb = $query->getQuery();
        $result = $qb->getResult();

        // to keep in arrays user data
        $firstname = [];
        $lastname = [];
        $phonenumber = [];
        $password = [];
        $isvolunteer = [];
        $emailadress = [];

        foreach ($result as $key => $value) {

            if (!in_array($value["firstname"], $firstname)) {
                array_push($firstname, $value["firstname"]);
            }
            if (!in_array($value["lastname"], $lastname)) {
                array_push($lastname, $value["lastname"]);
            }
            if (!in_array($value["phonenumber"], $phonenumber)) {
                array_push($phonenumber, $value["phonenumber"]);
            }
            if (!in_array($value["password"], $password)) {
                array_push($password, $value["password"]);
            }
            if (!in_array($value["isvolunteer"], $isvolunteer)) {
                array_push($isvolunteer, $value["isvolunteer"]);
            }
            if (!in_array($value["emailadress"], $emailadress)) {
                array_push($emailadress, $value["emailadress"]);
            }
        }

        // to respect HATEOAS rules
        $prefix = "http://127.0.0.1:8001/";
        $chaine = (string)$idUser;
        $allUsers = ['rel' => 'all-users', 'href' => $prefix . "api/user/"];
        $selfUser = ['rel' => 'self', 'href' => $prefix . "api/user/" . $chaine];
        $links = array($allUsers, $selfUser);


        $msg = [
            "id" => $idUser,
            "firstname" => $firstname,
            "lastname" => $lastname,
            "phonenumber" => $phonenumber,
            "password" => $password,
            "isvolunteer" => $isvolunteer,
            "emailadress" => $emailadress,
            "links" => $links,
        ];
        $output->setUser($msg);

        return $output;
    }

    /**
     * @inheritDoc
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return UsersOutput::class === $to;
    }
}