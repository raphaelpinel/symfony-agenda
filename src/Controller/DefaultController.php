<?php

namespace App\Controller;

use App\Repository\EventRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Subscriber;
use App\Form\SubscriberType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('home.html.twig');
    }
    
    /**
     * @Route("/events", name="events")
     */
    public function events(EventRepository $er, Request $request): Response
    {
        
        // testing if there is a request (for the search)
        
        if($request->request){
            //dump($request->request);
            $date = null;
            $event = null;
            $venue = null;
            
            
            //checks if the request with the 'date' parameter exists to put it in a variable
            if(!empty($request->request->get('date'))){
                $date = $request->get('date');
            }
            //checks if the request with the 'event' parameter exists to put it in a variable
            if(!empty($request->request->get('event'))){
                $event = $request->get('event');
            }
            //checks if the request with the 'venue' parameter exists to put it in a variable
            if(!empty($request->request->get('venue'))){
                $venue = $request->get('venue');
            }
            //makes a search request in the database
            $result = $er->findBySearchTerm($date, $event, $venue);
            
            //returns the result or an error message
            if($result){
                return $this->render('events.html.twig', ['events' => $result]);
            } else {
                $this->addFlash('warning', 'Sorry, no event could be found');
            }
        }
        // if there is no request, return all events
        
        return $this->render('events.html.twig', ['events' => $er->findAll()]);
    }
    
  
    
    /**
     * @Route("/news", name="news")
     */
    public function news()
    {
        return $this->render('news.html.twig');
    }
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        //dump($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            //dump($contactFormData);
            $message = (new \Swift_Message('from the Agenda Contact Form: ' . $contactFormData['subject']))
            ->setFrom($contactFormData['email'])
            ->setTo('raphaelpinel8@gmail.com')
            ->setBody(
                $contactFormData['message'],
                'text/html'
                );
                $mailer->send($message);
                
                $this->addFlash('success', 'Your message has successfully been sent! We will reply to you shortly');
                
                return $this->render('contact.html.twig', [
                    'contactform' => $form->createView(),
                ]);
            
        }
        return $this->render('contact.html.twig', [
            'contactform' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/newsletter", name="newsletter")
     */
    public function newsletter(Request $request, \Swift_Mailer $mailer) {
        $subscriber = new Subscriber();
        $form = $this->createForm(SubscriberType::class, $subscriber);
        
        
        //handle the submit
        $form->handleRequest($request);
       // dump($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            // record subscriber data in the database
            $entitymanager =$this->getDoctrine()->getManager();
            $entitymanager->persist($subscriber);
            $entitymanager->flush();
            $formData = $form->getData();
            dump($formData);
            
            $message = (new \Swift_Message('Thank you for subscribing to the Agenda newsletter'))
            ->setFrom('raphaelpinel8@gmail.com')
            ->setTo($subscriber->getEmail())
            ->setBody(
                'Thank you so much dear ' . $subscriber->getName() . ' for registering to our newsletter!',
                'text/plain'
                );
            $mailer->send($message);
            
            $this->addFlash('success', 'Your message has successfully been sent! We will reply to you shortly');
            

            return $this->redirectToRoute('home');
        }
        
        return $this->render('form/newsletterform.html.twig', [
            'newsletterform' => $form->createView(),
        ]);
    }
    
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('admin/admin.html.twig');
    }
}
