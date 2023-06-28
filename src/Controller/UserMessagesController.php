<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserMessagesController extends AbstractController
{
    #[Route('/', name: 'app_user_messages')]
    public function index(): Response
    {
        return $this->render('user_messages/index.html.twig', [
            'controller_name' => 'UserMessagesController',
        ]);
    }
}
