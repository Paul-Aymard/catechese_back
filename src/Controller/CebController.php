<?php

namespace App\Controller;

use App\Entity\Ceb;
use App\Form\CebType;
use App\Repository\CebRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/ceb')]
final class CebController extends AbstractController
{
    #[Route(name: 'app_ceb_index', methods: ['GET'])]
    public function index(CebRepository $cebRepository): Response
    {
        return $this->render('ceb/index.html.twig', [
            'cebs' => $cebRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ceb_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ceb = new Ceb();
        $form = $this->createForm(CebType::class, $ceb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ceb);
            $entityManager->flush();

            return $this->redirectToRoute('app_ceb_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ceb/new.html.twig', [
            'ceb' => $ceb,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ceb_show', methods: ['GET'])]
    public function show(Ceb $ceb): Response
    {
        return $this->render('ceb/show.html.twig', [
            'ceb' => $ceb,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ceb_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ceb $ceb, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CebType::class, $ceb);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ceb_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('ceb/edit.html.twig', [
            'ceb' => $ceb,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ceb_delete', methods: ['POST'])]
    public function delete(Request $request, Ceb $ceb, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ceb->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($ceb);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ceb_index', [], Response::HTTP_SEE_OTHER);
    }
}
