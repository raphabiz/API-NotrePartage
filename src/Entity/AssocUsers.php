<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Dto\UsersOutput;

/**
 * AssocUsers
 * @ORM\Entity(repositoryClass="App\UsersRepository")
 * @ORM\Table(name="assoc_users")
 *
 * @ApiResource(
 *      output=UsersOutput::class,
 *      collectionOperations={"get"={"path"="user"}},
 *      itemOperations={"get"={"path"="user/{id}"}},
 *      shortName="user",
 *      formats={"json"}
 * )
 */
class AssocUsers
{
    /**
     * @var int
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string|null
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phoneNumber", type="string", length=100, nullable=true)
     */
    private $phonenumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="text", length=65535, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="isVolunteer", type="string", length=255, nullable=true)
     */
    private $isvolunteer;

    /**
     * @var string|null
     *
     * @ORM\Column(name="emailAdress", type="string", length=255, nullable=true)
     */
    private $emailadress;

    public function getIduser(): ?int
    {
        return $this->iduser;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhonenumber(): ?string
    {
        return $this->phonenumber;
    }

    public function setPhonenumber(?string $phonenumber): self
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIsvolunteer(): ?string
    {
        return $this->isvolunteer;
    }

    public function setIsvolunteer(?string $isvolunteer): self
    {
        $this->isvolunteer = $isvolunteer;

        return $this;
    }

    public function getEmailadress(): ?string
    {
        return $this->emailadress;
    }

    public function setEmailadress(?string $emailadress): self
    {
        $this->emailadress = $emailadress;

        return $this;
    }


}
