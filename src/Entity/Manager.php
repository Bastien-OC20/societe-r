<?php

namespace App\Entity;

use App\Repository\ManagerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManagerRepository::class)]
class Manager
{

    #[ORM\Id]
    #[ORM\OneToOne(targetEntity: Employee::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: 'profile_id')]
    private $employee;

    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    public function setEmployee(Employee $employee): self
    {
        $this->employee = $employee;

        return $this;
    }
}
