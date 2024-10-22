<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $username;

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
    private $favoriteChampion = [];

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $hatedChampion = [];

    /**
     * @ORM\Column(type="simple_array", nullable=true)
     */
    private $goal = [];

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $soloDivision;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $flexDivision;

    /**
     * @ORM\OneToMany(targetEntity=Availability::class, mappedBy="user")
     */
    private $availabilities;

    /**
     * @ORM\OneToMany(targetEntity=Search::class, mappedBy="user")
     */
    private $searches;

    public function __construct()
    {  
        $this->favoriteChampion = [];
        $this->hatedChampion = [];
        $this->availabilities = new ArrayCollection();
        $this->searches = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->availabilities;
        return $this->searches;
    } 
    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): ?string
    {
        return $this->username;      
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function setUsername(?string $username): self
    {
        $this->username = $username;

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

    public function getFavoriteChampion(): ?array
    {
        return $this->favoriteChampion;
    }

    public function setFavoriteChampion(?array $favoriteChampion): self
    {
        $this->favoriteChampion = $favoriteChampion;

        return $this;
    }

    public function getHatedChampion(): ?array
    {
        return $this->hatedChampion;
    }

    public function setHatedChampion(?array $hatedChampion): self
    {
        $this->hatedChampion = $hatedChampion;

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

    public function getSoloDivision(): ?string
    {
        return $this->soloDivision;
    }

    public function setSoloDivision(?string $soloDivision): self
    {
        $this->soloDivision = $soloDivision;

        return $this;
    }

    public function getFlexDivision(): ?string
    {
        return $this->flexDivision;
    }

    public function setFlexDivision(?string $flexDivision): self
    {
        $this->flexDivision = $flexDivision;

        return $this;
    }

    /**
     * @return Collection|Availability[]
     */
    public function getAvailabilities(): Collection
    {
        return $this->availabilities;
    }

    public function addAvailability(Availability $availability): self
    {
        if (!$this->availabilities->contains($availability)) {
            $this->availabilities[] = $availability;
            $availability->setUser($this);
        }

        return $this;
    }

    public function removeAvailability(Availability $availability): self
    {
        if ($this->availabilities->removeElement($availability)) {
            // set the owning side to null (unless already changed)
            if ($availability->getUser() === $this) {
                $availability->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Search[]
     */
    public function getSearches(): Collection
    {
        return $this->searches;
    }

    public function addSearch(Search $search): self
    {
        if (!$this->searches->contains($search)) {
            $this->searches[] = $search;
            $search->setUser($this);
        }

        return $this;
    }

    public function removeSearch(Search $search): self
    {
        if ($this->searches->removeElement($search)) {
            // set the owning side to null (unless already changed)
            if ($search->getUser() === $this) {
                $search->setUser(null);
            }
        }

        return $this;
    }

}
