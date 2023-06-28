<?php

namespace App\Controller;

use App\Entity\UserMessages;
use App\Form\UserMessagesType;
use App\Repository\UserMessagesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserMessagesController extends AbstractController
{
    #[Route('/success', name: 'success_page')]
    
    public function index() : Response {
        return $this->render('user_messages/success.html.twig');
    }

    #[Route('/', name: 'app_index')]
    public function add(Request $request, UserMessagesRepository $usermsg) : Response {

        
        $form = $this->createForm(UserMessagesType::class, new UserMessages() );

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {

                $msg = $form->getData();
                $usermsg->save($msg, true);

                $this->addFlash('success', 'Köszönjük szépen a kérdésedet. Válaszunkkal hamarosan keresünk a megadott e-mail címen.');

                return $this->redirectToRoute('success_page');
            }
            if ($form->isSubmitted() && (!$form->get('name')->getData() || !$form->get('email')->getData() || !$form->get('message')->getData())) {
                $this->addFlash('error', 'Hiba! Kérjük töltsd ki az összes mezőt!');
                
            }
        
            return $this->renderForm('user_messages/index.html.twig', 
            [
                'form' =>$form
            ]
        );
    }


}
