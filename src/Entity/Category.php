<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $name;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: WorkStation::class)]
    private Collection $workStations;

    public function __toString()
    {
        return $this->getName();
    }
    public function __construct()
    {
        $this->workStations = new ArrayCollection();
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
     * @return Collection|WorkStation[]
     */
    public function getWorkStations(): Collection
    {
        return $this->workStations;
    }

    public function addWorkStation(WorkStation $workStation): self
    {
        if (!$this->workStations->contains($workStation)) {
            $this->workStations[] = $workStation;
            $workStation->setCategory($this);
        }

        return $this;
    }

    public function removeWorkStation(WorkStation $workStation): self
    {
        if ($this->workStations->removeElement($workStation)) {
            // set the owning side to null (unless already changed)
            if ($workStation->getCategory() === $this) {
                $workStation->setCategory(null);
            }
        }

        return $this;
    }
}
