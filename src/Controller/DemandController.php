<?php

namespace App\Controller;

use App\Entity\Candidate;
use App\Entity\Demand;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandController extends AbstractController
{
    #[Route('/', name: 'app_demand')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        try {
            // Create a new User
            $user = new User();
            $user->setUsername('new_username');
            $user->setPassword('new_password');
            // Set other properties if needed
            
            // Persist the User
            $entityManager->persist($user);
            $entityManager->flush();
            
            echo "User created successfully!";
        } catch (\Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }

        return $this->render('demand/index.html.twig', [
            'controller_name' => 'DemandController',
        ]);
    }
}
