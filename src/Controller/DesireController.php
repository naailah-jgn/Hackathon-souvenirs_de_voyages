<?php

namespace App\Controller;

use App\Entity\Desire;
use App\Form\DesireType;
use App\Repository\DesireRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/desire')]
class DesireController extends AbstractController
{
    #[Route('/', name: 'app_desire_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('desire/index.html.twig', [
            'users' => $userRepository->findAll()
        ]);
    }

    #[Route('/new', name: 'app_desire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DesireRepository $desireRepository): Response
    {
        $desire = new Desire();
        $form = $this->createForm(DesireType::class, $desire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $desireRepository->save($desire, true);

            return $this->redirectToRoute('app_desire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('desire/new.html.twig', [
            'desire' => $desire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_desire_show', methods: ['GET'])]
    public function show(Desire $desireName, $desireRepository, $userRepository, $user_id): Response
    {
        $desire= $userRepository->findOneBy(['name'=>$desireName->getId()]);

        return $this->render('desire/show.html.twig', [
            'desire' => $desire,
        ]);
    }

   /*  #[Route('/{id}/edit', name: 'app_desire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Desire $desire, DesireRepository $desireRepository): Response
    {
        $form = $this->createForm(DesireType::class, $desire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $desireRepository->save($desire, true);

            return $this->redirectToRoute('app_desire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('desire/edit.html.twig', [
            'desire' => $desire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_desire_delete', methods: ['POST'])]
    public function delete(Request $request, Desire $desire, DesireRepository $desireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$desire->getId(), $request->request->get('_token'))) {
            $desireRepository->remove($desire, true);
        }

        return $this->redirectToRoute('app_desire_index', [], Response::HTTP_SEE_OTHER);
    } */
}
