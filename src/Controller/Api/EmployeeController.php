<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EmployeeRepository;

#[Route('/employee')]
class EmployeeController extends AbstractController
{
    #[Route('/best-salary', name: '')]
    public function bestSalary(EmployeeRepository $employeeRepository): Response
    {
        $salary = $employeeRepository->getBestSalary();
        return new JsonResponse($salary);
    }
}
