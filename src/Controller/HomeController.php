<?php
namespace App\Controller;

use App\Entity\Contactform;
use App\Entity\View;
use App\Form\ContactformType;
use App\Form\ViewType;
use App\Repository\ServeRepository;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  #[Route('', name: 'app_accueil', methods: ['GET', 'POST'])]
  public function Accueil(
  ServeRepository $serveRepository,
  Request $request, 
  EntityManagerInterface $entityManager, 
  ScheduleRepository $scheduleRepository
  ) : Response
  {
    $view = new View();
    $formulaireAvis = $this->createForm(ViewType::class, $view);
    $formulaireAvis->handleRequest($request);

    if ($formulaireAvis->isSubmitted() && $formulaireAvis->isValid()) {
      $entityManager->persist($view);
      $entityManager->flush();

      return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
    }

    $Contacte = new Contactform();
    $formulaireContacte = $this->createForm(ContactformType::class, $Contacte);
    $formulaireContacte->handleRequest($request);

    if ($formulaireContacte->isSubmitted() && $formulaireContacte->isValid()) {
      $entityManager->persist($Contacte);
      $entityManager->flush();

      return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('accueil/Accueil.html.twig', [
      'serves' => $serveRepository->findAll(),
      'view' => $view,
      'formulaireAvis' => $formulaireAvis->createView(), // Ajout formulaire avis
      'form' => $formulaireContacte->createView(), // Ajout formulaire de contacte
      'schedules' => $scheduleRepository->findAll(),
    ]);
  }
}