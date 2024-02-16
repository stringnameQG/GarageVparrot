<?php

namespace App\Controller;

use App\Entity\Car;
use App\Entity\Picturecar;
use App\Form\CarType;
use App\Repository\CarRepository;
use App\Service\PictureService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\Criteria;

#[IsGranted('ROLE_USER')]
#[Route('/car')]
class CarController extends AbstractController
{
    #[Route('/{page<\d+>?1}', name: 'app_car_index', methods: ['GET'])]
    public function index(CarRepository $carRepository, int $page): Response
    {   // On défini le nombre de voiture par page dans une variable
        $carPerPage = 9;
        // On crée ensuite une variable qui contien les paramétres de notre méthode critéria
        $criteria = Criteria::create()
            ->setFirstResult(($page - 1) * $carPerPage)  // Défine la premiére voiture affiché
            ->setMaxResults($carPerPage);  // Définie le nombre de voiture affiché

        $cars = $carRepository->matching($criteria);

        $totalCars = count($carRepository->matching(Criteria::create()));

        $totalPages = ceil($totalCars / $carPerPage);

        return $this->render('car/index.html.twig', [
            'cars' => $cars,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }

    #[Route('/new', name: 'app_car_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request, 
        EntityManagerInterface $entityManager,
        PictureService $pictureService
    ): Response
    {
        $car = new Car();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère les images transmises
            $pictures = $form->get('pictures')->getData();

            // On boucle sur les images 
            foreach($pictures as $picture) {

                $fichier = $pictureService->add($picture);

                // On stocke l'image dans la base de données (son nom)
                $img = new Picturecar();
                $img->setpicturecarNAME($fichier);
                $car->addPicture($img);
            }

            $entityManager->persist($car);
            $entityManager->flush();

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('car/new.html.twig', [
            'car' => $car,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_car_show', methods: ['GET'])]
    public function show(Car $car): Response
    {
        return $this->render('car/show.html.twig', [
            'car' => $car,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_car_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request, 
        Car $car, 
        EntityManagerInterface $entityManager,
        PictureService $pictureService
    ): Response
    {
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère les images transmises
            $pictures = $form->get('pictures')->getData();

            // On boucle sur les images 
            foreach($pictures as $picture) {
                
                $fichier = $pictureService->add($picture);

                // On stocke l'image dans la base de données (son nom)
                $img = new Picturecar();
                $img->setpicturecarNAME($fichier);
                $car->addPicture($img);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('car/edit.html.twig', [
            'car' => $car,
            'form' => $form
        ]);
    }

    
    #[Route('/{id}', name: 'app_car_delete', methods: ['POST'])]
    public function delete(Request $request, Car $car, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$car->getId(), $request->request->get('_token'))) {
            $entityManager->remove($car);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_car_index', [], Response::HTTP_SEE_OTHER);
    }  

    #[Route('delete/{id}', name: 'app_car_delete_image', methods: ['DELETE'])]
    public function deleteImage(Picturecar $picture, Request $request){
        $data = json_decode($request->getContent(), true);
        
        //On vérifie si le token est valide
        if($this->isCsrfTokenValid('delete'.$picture->getId(), $data['_token'])){
            // Récupération du nom de l'image
            $nom = $picture->getpicturecarNAME();
            // suppression du fichier
            unlink($this->getParameter('images_directory').'/'.$nom);

            // Supression de la bdd
            $em = $this->getDoctrine()->getManager();
            $em->remove($picture);
            $em->flush();

            // On répond en json
            return new JsonResponse(['success' => 1]);
            
        }else{
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }
}