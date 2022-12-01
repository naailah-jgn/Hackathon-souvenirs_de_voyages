<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Repository\UserRepository;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(UserRepository $userRepository): Response
    {

        return $this->render('index.html.twig', 
        [
            'users' => $userRepository->findAll()
        ]);
    }
}
