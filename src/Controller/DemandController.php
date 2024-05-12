<?php

namespace App\Controller;

use App\Entity\Demand;
use App\Entity\User;
use App\Form\DemandType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DemandController extends AbstractController
{
    #[Route('/', name: 'send_demand')]
    public function SendDemand(Request $request, EntityManagerInterface $entityManager): Response
    {
        $demand = new Demand();
        $form = $this->createForm(DemandType::class, $demand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $request->files->get('demand')['image'];
            $image_name = time() . '-' . $image->getClientOriginalName();
            $image->move($this->getParameter('image_directory'), $image_name);
            $demand->setImage($image_name);

            $entityManager->persist($demand);
            $entityManager->flush();

            // Log success message
            $this->addFlash('success', 'Demand sent successfully.');

           /*  return $this->redirectToRoute('app_demand'); */
        }

        // Rendering the form
        return $this->render('demand/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
