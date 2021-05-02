<?php 
namespace App\Controller;

use App\Entity\Demo;
use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
   {
   /**
    * @Route("/articles/", name="articles_index")
    */
      public function index(ArticlesRepository $articlesRepository) {
         $articles = $articlesRepository->findAll();
         
         return $this->render('articles/index.html.twig', ['posts' => $articles]);
      }
      
   }
