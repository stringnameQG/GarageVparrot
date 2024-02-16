<?php
namespace App\Controller;

use App\Entity\Contactform;
use App\Form\ContactformType;
use App\Repository\ServeRepository;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MentionsLegaleController extends AbstractController
{
  #[Route('/mentionslegale', name: 'app_mentionslegale', methods: ['GET', 'POST'])]
  public function MentionsLegale(
    ServeRepository $serveRepository, 
    Request $request, 
    EntityManagerInterface $entityManager,
    ScheduleRepository $scheduleRepository) : Response
  {
    $Contacte = new Contactform();
    $formulaireContacte = $this->createForm(ContactformType::class, $Contacte);
    $formulaireContacte->handleRequest($request);

    if ($formulaireContacte->isSubmitted() && $formulaireContacte->isValid()) {
      $entityManager->persist($Contacte);
      $entityManager->flush();

      return $this->redirectToRoute('app_mentionslegale', [], Response::HTTP_SEE_OTHER);
    }

    return $this->render('mentionLegale/MentionsLegale.html.twig', [
      'serves' => $serveRepository->findAll(),
      'schedules' => $scheduleRepository->findAll(),
      'form' => $formulaireContacte->createView()
    ]);
  }
}
