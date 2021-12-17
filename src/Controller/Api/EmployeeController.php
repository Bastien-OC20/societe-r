<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EmployeeRepository;

#[Route('/employee')]
class EmployeeController extends AbstractController
{
    #[Route('/more-than-40-old', name: '')]
    public function index(): Response
    {
        return new Response();
    }

    #[Route('/best-salary', name: '')]
    public function index1(): Response
    {
        return new Response();
    }

    #[Route('/salary', name: 'test')]
    public function getBestSalary(EmployeeRepository $employeeRepository): Response
    {
        $salary = $employeeRepository->findAll();

        return $this->render('homepage/test.html.twig', [
            'salary' => $salary,
        ]);
    }
}
