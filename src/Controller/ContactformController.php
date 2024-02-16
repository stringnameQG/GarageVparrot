<?php

namespace App\Controller;

use App\Entity\Contactform;
use App\Form\ContactformType;
use App\Repository\ContactformRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Doctrine\Common\Collections\Criteria;

#[IsGranted('ROLE_USER')]
#[Route('/contactform')]
class ContactformController extends AbstractController
{
    #[Route('/{page<\d+>?1}', name: 'app_contactform_index', methods: ['GET'])]
    public function index(ContactformRepository $contactformRepository, int $page): Response
    {   // On défini le nombre de voiture par page dans une variable
        $contactFormPerPage = 9;
        // On crée ensuite une variable qui contien les paramétres de notre méthode critéria
        $criteria = Criteria::create()
            ->setFirstResult(($page - 1) * $contactFormPerPage)  // Défine la premiére voiture affiché
            ->setMaxResults($contactFormPerPage);  // Définie le nombre de voiture affiché

        $contactForms = $contactformRepository->matching($criteria);

        $totalcontactForms = count($contactformRepository->matching(Criteria::create()));

        $totalPages = ceil($totalcontactForms / $contactFormPerPage);

        return $this->render('contactform/index.html.twig', [
            'contactforms' => $contactForms,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }

    #[Route('/new', name: 'app_contactform_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contactform = new Contactform();
        $form = $this->createForm(ContactformType::class, $contactform);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contactform);
            $entityManager->flush();

            return $this->redirectToRoute('app_contactform_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contactform/new.html.twig', [
            'contactform' => $contactform,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contactform_show', methods: ['GET'])]
    public function show(Contactform $contactform): Response
    {
        return $this->render('contactform/show.html.twig', [
            'contactform' => $contactform,
        ]);
    }


    /*
    #[Route('/{id}/edit', name: 'app_contactform_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contactform $contactform, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactformType::class, $contactform);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contactform_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contactform/edit.html.twig', [
            'contactform' => $contactform,
            'form' => $form,
        ]);
    }
    */

    #[Route('/{id}', name: 'app_contactform_delete', methods: ['POST'])]
    public function delete(Request $request, Contactform $contactform, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactform->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contactform);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contactform_index', [], Response::HTTP_SEE_OTHER);
    }
}
