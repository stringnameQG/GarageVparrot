<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\Common\Collections\Criteria;

#[IsGranted('ROLE_USER')]
class EmployerGestionController extends AbstractController
{
  #[Route('/employergestion', name: 'app_employergestion')]
  public function AdminGestion() : Response
  {
    $nomPage = "EmployerGestion";
    return $this->render('employerGestion/EmployerGestion.html.twig', [
      'nomPage' => $nomPage,
    ]);
  }
}
