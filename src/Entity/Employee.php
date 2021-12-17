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
    #[ORM\GeneratedValue(strategy:"NONE")]
    #[ORM\OneToOne(targetEntity: Profile::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $profile;

    #[ORM\Column(type: 'date')]
    private $employeeAt;

    #[ORM\Column(type: 'integer')]
    private $salary;



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

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(Profile $profile): self
    {
        $this->profile = $profile;

        return $this;
    }


}
