<?php

namespace App\Entity;

use App\Repository\SearchRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SearchRepository::class)
 */
class Search
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
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $countryInGame;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $soloRank;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $flexRank;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstRole;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondRole;

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $goal = [];

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="searches")
     */
    private $user;

    public function __toString()
    {
        return $this->user;
    } 
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCountryInGame(): ?string
    {
        return $this->countryInGame;
    }

    public function setCountryInGame(?string $countryInGame): self
    {
        $this->countryInGame = $countryInGame;

        return $this;
    }

    public function getSoloRank(): ?string
    {
        return $this->soloRank;
    }

    public function setSoloRank(?string $soloRank): self
    {
        $this->soloRank = $soloRank;

        return $this;
    }

    public function getFlexRank(): ?string
    {
        return $this->flexRank;
    }

    public function setFlexRank(?string $flexRank): self
    {
        $this->flexRank = $flexRank;

        return $this;
    }

    public function getFirstRole(): ?string
    {
        return $this->firstRole;
    }

    public function setFirstRole(?string $firstRole): self
    {
        $this->firstRole = $firstRole;

        return $this;
    }

    public function getSecondRole(): ?string
    {
        return $this->secondRole;
    }

    public function setSecondRole(?string $secondRole): self
    {
        $this->secondRole = $secondRole;

        return $this;
    }

    public function getGoal(): ?array
    {
        return $this->goal;
    }

    public function setGoal(?array $goal): self
    {
        $this->goal = $goal;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
