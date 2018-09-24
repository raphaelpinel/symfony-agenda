<?php

namespace App\Controller;

use App\Entity\Newsletter;
use App\Form\Newsletter1Type;
use App\Repository\NewsletterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/newsletter")
 */
class NewsletterController extends Controller
{
    /**
     * @Route("/", name="newsletter_index", methods="GET")
     */
    public function index(NewsletterRepository $newsletterRepository): Response
    {
        return $this->render('newsletter/index.html.twig', ['newsletters' => $newsletterRepository->findAll()]);
    }

    /**
     * @Route("/new", name="newsletter_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(Newsletter1Type::class, $newsletter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($newsletter);
            $em->flush();

            return $this->redirectToRoute('newsletter_index');
        }

        return $this->render('newsletter/new.html.twig', [
            'newsletter' => $newsletter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="newsletter_show", methods="GET")
     */
    public function show(Newsletter $newsletter): Response
    {
        return $this->render('newsletter/show.html.twig', ['newsletter' => $newsletter]);
    }

    /**
     * @Route("/{id}/edit", name="newsletter_edit", methods="GET|POST")
     */
    public function edit(Request $request, Newsletter $newsletter): Response
    {
        $form = $this->createForm(Newsletter1Type::class, $newsletter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('newsletter_edit', ['id' => $newsletter->getId()]);
        }

        return $this->render('newsletter/edit.html.twig', [
            'newsletter' => $newsletter,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="newsletter_delete", methods="DELETE")
     */
    public function delete(Request $request, Newsletter $newsletter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newsletter->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($newsletter);
            $em->flush();
        }

        return $this->redirectToRoute('newsletter_index');
    }
}
