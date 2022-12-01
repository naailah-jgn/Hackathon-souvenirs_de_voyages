<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Desire::class, inversedBy: 'countries')]
    private Collection $Desire;

    #[ORM\OneToMany(mappedBy: 'Country', targetEntity: Trip::class)]
    private Collection $trips;

    public function __construct()
    {
        $this->Desire = new ArrayCollection();
        $this->trips = new ArrayCollection();
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

    /**
     * @return Collection<int, Desire>
     */
    public function getDesire(): Collection
    {
        return $this->Desire;
    }

    public function addDesire(Desire $desire): self
    {
        if (!$this->Desire->contains($desire)) {
            $this->Desire->add($desire);
        }

        return $this;
    }

    public function removeDesire(Desire $desire): self
    {
        $this->Desire->removeElement($desire);

        return $this;
    }

    /**
     * @return Collection<int, Trip>
     */
    public function getTrips(): Collection
    {
        return $this->trips;
    }

    public function addTrip(Trip $trip): self
    {
        if (!$this->trips->contains($trip)) {
            $this->trips->add($trip);
            $trip->setCountry($this);
        }

        return $this;
    }

    public function removeTrip(Trip $trip): self
    {
        if ($this->trips->removeElement($trip)) {
            // set the owning side to null (unless already changed)
            if ($trip->getCountry() === $this) {
                $trip->setCountry(null);
            }
        }

        return $this;
    }
}
