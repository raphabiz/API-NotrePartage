<?php

/*************
 *    RAB
 *************/

namespace App\DataTransformer;

use App\Dto\FactureOutput;
use App\Entity\Facture;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ApiPlatform\Core\DataTransformer\DataTransformerInterface;

class FactureOutputDataTransformer extends AbstractController implements DataTransformerInterface
{
    /**
     * @inheritDoc
     */
    public function transform($data, string $to, array $context = [])
    {
        // to select each user
        $output = new FactureOutput();
        $idF = $data->getIdFacture();
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('f.idFacture,f.link,f.date,u.id');
        $query->from(Facture::class, 'f');
        $query->from(User::class, 'u');
        $query->AndWhere('f.idUser=u.id');
        $query->AndWhere('f.idFacture =' . $idF);
        $qb = $query->getQuery();
        $result = $qb->getResult();

        // to keep in arrays user data
        $idFacture = [];
        $link = [];
        $date = [];
        $idUser = [];

        foreach ($result as $key => $value) {

            if (!in_array($value["idFacture"], $idFacture)) {
                array_push($idFacture, $value["idFacture"]);
            }
            if (!in_array($value["link"], $link)) {
                array_push($link, $value["link"]);
            }
            if (!in_array($value["date"], $date)) {
                array_push($date, $value["date"]);
            }
            if (!in_array($value["id"], $idUser)) {
                array_push($idUser, $value["id"]);
            }
        }

        // to respect HATEOAS rules
        $prefix = "http://127.0.0.1:8000/";
        $chaine = (string)$idF;
        $allFactures = ['rel' => 'all-factures', 'href' => $prefix . "api/facture/"];
        $selfFacture = ['rel' => 'self', 'href' => $prefix . "api/facture/" . $chaine];
        $links = array($allFactures, $selfFacture);


        $msg = [
            "id" => $idFacture,
            "link" => $link,
            "date" => $date,
            "idUser" => $idUser,
            "links" => $links,
        ];
        $output->setFacture($msg);

        return $output;
    }

    /**
     * @inheritDoc
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return FactureOutput::class === $to;
    }
}