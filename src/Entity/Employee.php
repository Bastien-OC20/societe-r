<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $employeeAt;

    #[ORM\Column(type: 'integer')]
    private $salary;

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'teammates')]
    #[ORM\JoinColumn(name: 'employee_id')]
    private $work;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'work')]
    private $teammates;

    public function __construct()
    {
        $this->work = new ArrayCollection();
        $this->teammates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeAt(): ?\DateTimeInterface
    {
        return $this->employeeAt;
    }

    public function setEmployeeAt(\DateTimeInterface $employeeAt): self
    {
        $this->employeeAt = $employeeAt;

        return $this;
    }

    public function getSalary(): ?int
    {
        return $this->salary;
    }

    public function setSalary(int $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getWork(): Collection
    {
        return $this->work;
    }

    public function addWork(self $work): self
    {
        if (!$this->work->contains($work)) {
            $this->work[] = $work;
        }

        return $this;
    }

    public function removeWork(self $work): self
    {
        $this->work->removeElement($work);

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getTeammates(): Collection
    {
        return $this->teammates;
    }

    public function addTeammate(self $teammate): self
    {
        if (!$this->teammates->contains($teammate)) {
            $this->teammates[] = $teammate;
            $teammate->addWork($this);
        }

        return $this;
    }

    public function removeTeammate(self $teammate): self
    {
        if ($this->teammates->removeElement($teammate)) {
            $teammate->removeWork($this);
        }

        return $this;
    }
}
