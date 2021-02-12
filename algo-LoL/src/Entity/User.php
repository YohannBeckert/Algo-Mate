<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $solo_rank;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $flex_rank;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $first_lane;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $second_lane;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Champion::class, inversedBy="users")
     */
    private $champion;

    /**
     * @ORM\ManyToMany(targetEntity=Champion::class, inversedBy="users")
     */
    private $champions;

    public function __construct()
    {
        $this->champions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getSoloRank(): ?string
    {
        return $this->solo_rank;
    }

    public function setSoloRank(?string $solo_rank): self
    {
        $this->solo_rank = $solo_rank;

        return $this;
    }

    public function getFlexRank(): ?string
    {
        return $this->flex_rank;
    }

    public function setFlexRank(?string $flex_rank): self
    {
        $this->flex_rank = $flex_rank;

        return $this;
    }

    public function getFirstLane(): ?string
    {
        return $this->first_lane;
    }

    public function setFirstLane(?string $first_lane): self
    {
        $this->first_lane = $first_lane;

        return $this;
    }

    public function getSecondLane(): ?string
    {
        return $this->second_lane;
    }

    public function setSecondLane(?string $second_lane): self
    {
        $this->second_lane = $second_lane;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Champion[]
     */
    public function getChampions(): Collection
    {
        return $this->champions;
    }

    public function addChampion(Champion $champion): self
    {
        if (!$this->champions->contains($champion)) {
            $this->champions[] = $champion;
        }

        return $this;
    }

    public function removeChampion(Champion $champion): self
    {
        $this->champions->removeElement($champion);

        return $this;
    }

}
