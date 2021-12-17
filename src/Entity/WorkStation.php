<?php

namespace App\Entity;

use App\Repository\WorkStationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkStationRepository::class)]
class WorkStation
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy:"IDENTITY")]
    #[ORM\Column(type: 'string', length: 50)]
    private string $code;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $label = null;

    #[ORM\Column(type: 'text')]
    private ?string $description = null;

    #[ORM\Column(type: 'boolean')]
    private boolean $enable;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'workStations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category;

    public function setCode(string $code): WorkStation
    {
        $this->code = $code;
        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEnable(): ?bool
    {
        return $this->enable;
    }

    public function setEnable(bool $enable): self
    {
        $this->enable = $enable;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
