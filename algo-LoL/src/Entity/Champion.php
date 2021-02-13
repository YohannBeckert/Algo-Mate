<?php

namespace App\Entity;

use App\Repository\ChampionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChampionRepository::class)
 */
class Champion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="champions")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity=Favorite::class, mappedBy="champions")
     */
    private $favorites;

    /**
     * @ORM\ManyToMany(targetEntity=Prefer::class, mappedBy="champions")
     */
    private $prefers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $first_role;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $second_role;



    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->favorites = new ArrayCollection();
        $this->prefers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addChampion($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeChampion($this);
        }

        return $this;
    }

    /**
     * @return Collection|Favorite[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorite $favorite): self
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites[] = $favorite;
            $favorite->addChampion($this);
        }

        return $this;
    }

    public function removeFavorite(Favorite $favorite): self
    {
        if ($this->favorites->removeElement($favorite)) {
            $favorite->removeChampion($this);
        }

        return $this;
    }

    /**
     * @return Collection|Prefer[]
     */
    public function getPrefers(): Collection
    {
        return $this->prefers;
    }

    public function addPrefer(Prefer $prefer): self
    {
        if (!$this->prefers->contains($prefer)) {
            $this->prefers[] = $prefer;
            $prefer->addChampion($this);
        }

        return $this;
    }

    public function removePrefer(Prefer $prefer): self
    {
        if ($this->prefers->removeElement($prefer)) {
            $prefer->removeChampion($this);
        }

        return $this;
    }

    public function getFirstRole(): ?string
    {
        return $this->first_role;
    }

    public function setFirstRole(string $first_role): self
    {
        $this->first_role = $first_role;

        return $this;
    }

    public function getSecondRole(): ?string
    {
        return $this->second_role;
    }

    public function setSecondRole(?string $second_role): self
    {
        $this->second_role = $second_role;

        return $this;
    }
}
