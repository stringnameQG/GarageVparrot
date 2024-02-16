<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class AdminGestionController extends AbstractController
{
  #[Route('/admingestion', name: 'app_admingestion')]
  public function AdminGestion() : Response
  {
    $nomPage = "AdminGestion";
    return $this->render('adminGestion/AdminGestion.html.twig', [
      'nomPage' => $nomPage,
    ]);
  }
}