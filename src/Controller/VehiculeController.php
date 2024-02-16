<?php
namespace App\Controller;

use App\Entity\Contactform;
use App\Form\ContactformType;
use App\Entity\Car;
use App\Repository\CarRepository;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/vehicule')]
class VehiculeController extends AbstractController
{
    #[Route('/', name: 'app_vehicule', methods: ['GET', 'POST'])]
    public function index(
    Request $request, 
    EntityManagerInterface $entityManager, 
    ScheduleRepository $scheduleRepository
    ): Response
    {
        
        $Contacte = new Contactform();
        $formulaireContacte = $this->createForm(ContactformType::class, $Contacte);
        $formulaireContacte->handleRequest($request);

        if ($formulaireContacte->isSubmitted() && $formulaireContacte->isValid()) {
        $entityManager->persist($Contacte);
        $entityManager->flush();

        return $this->redirectToRoute('app_vehicule', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('vehicule/Vehicule.html.twig', [
            'form' => $formulaireContacte->createView(),
            'schedules' => $scheduleRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_vehicule_show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        return $this->render('vehicule/Vehicule.html.twig', [
            'car' => $car,
        ]);
    }
}