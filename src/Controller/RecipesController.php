<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipesController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
//         if (!$this->getUser()) {
//             return $this->redirectToRoute('app_login');
//         }

        return $this->render('recipes/index.html.twig', [
            'controller_name' => 'RecipesController',
        ]);
    }

    /**
     * @Route("/recipes", name="recipes")
     */
    public function recipes(): Response
    {
        return $this->render();
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profiledashboard()
    {
        return $this->render('profile/profile.html.twig');
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admindashboard()
    {
        return $this->render('security/register.html.twig');
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contacts()
    {
        return $this->render('contacts/contacts.html.twig');
    }

}
