<?php 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChanceController 
   {
      //la route vers ce contrôleur est définie dans config/routes.yaml
      public function getNumber() {
         $number = rand(0, 100);
         return new Response ("
            <html>
               <body>
                  <h2>Le numéro de la chance est $number</h2>
               </body>
            </html>
         ");
      }

      /**
       * @Route("/chance/analyse/", name="chance_analyse")
       */
      public function analyseRequete(Request $requete) {

         dump($requete);
         return new Response ("
            <html>
            <body>
               <p>Contenu de la requête dans le dump</p>
               <form method=\"POST\" action=\"/requete_post\">
               <input type=\"text\" value=\"Asaad\" name=\"prenom\">
               <input type=\"submit\">
               </form>
            </body>
            </html>
         ");
      }

   }
   
 