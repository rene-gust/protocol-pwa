<?php

namespace App\Controller;

use App\Entity\ProtocolEntry;
use App\Form\ProtocolEntryType;
use App\Repository\ProtocolEntryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/client/protocoll/entry")
 */
class ClientProtocolEntryController extends AbstractController
{
    /**
     * @Route("/", name="client_protocol_entry_index", methods={"GET"})
     */
    public function index(ProtocolEntryRepository $ProtocolEntryRepository): Response
    {
        return $this->render('client_protocol_entry/index.html.twig', [
            'protocoll_entries' => $ProtocolEntryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="client_protocol_entry_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ProtocolEntry = new ProtocolEntry();
        $form = $this->createForm(ProtocolEntryType::class, $ProtocolEntry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ProtocolEntry);
            $entityManager->flush();

            return $this->redirectToRoute('client_protocol_entry_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_protocol_entry/new.html.twig', [
            'protocoll_entry' => $ProtocolEntry,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="client_protocol_entry_show", methods={"GET"})
     */
    public function show(ProtocolEntry $ProtocolEntry): Response
    {
        return $this->render('client_protocol_entry/show.html.twig', [
            'protocoll_entry' => $ProtocolEntry,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="client_protocol_entry_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProtocolEntry $ProtocolEntry): Response
    {
        $form = $this->createForm(ProtocolEntryType::class, $ProtocolEntry);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('client_protocol_entry_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_protocol_entry/edit.html.twig', [
            'protocoll_entry' => $ProtocolEntry,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="client_protocol_entry_delete", methods={"POST"})
     */
    public function delete(Request $request, ProtocolEntry $ProtocolEntry): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ProtocolEntry->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ProtocolEntry);
            $entityManager->flush();
        }

        return $this->redirectToRoute('client_protocol_entry_index', [], Response::HTTP_SEE_OTHER);
    }
}
