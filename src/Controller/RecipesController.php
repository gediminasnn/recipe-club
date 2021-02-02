<?php

namespace App\Controller;

use App\Entity\Recipe;
use App\Form\NewRecipeType;
use App\Repository\RecipeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class RecipesController extends AbstractController
{
    private $recipeRepository;

    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }
    /**
     * @Route("/", name="recipes")
     */
    public function showAll(): Response
    {
        $recipes = $this->recipeRepository->findAll();
        return $this->render('recipes/index.html.twig', [
            'controller_name' => 'RecipesController',
            'recipes' => $recipes,
        ]);
    }

    /**
     * @Route("/recipes/new", name="app_new_recipe")
     */
    public function new(Request $request, UserInterface $user, UserRepository $repository): Response
    {
        $recipe = new Recipe();
        $form = $this->createForm(NewRecipeType::class, $recipe);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $recipe->setPublisher($repository->findOneByUsername($user->getUsername()));

            $date = new \DateTime('now');
            $recipe->setPublishedAt($date);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($recipe);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('recipes');
        }

        return $this->render('recipes/newrecipe.html.twig', ['newRecipeForm' => $form->createView()]);
    }

    /**
     * @Route("/recipes/{id}", name="recipe")
     */
    public function showOne($id): Response
    {
        return $this->render();
    }





}
