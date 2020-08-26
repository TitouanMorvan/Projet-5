<?php
// src/Controller/mainController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Entity\Competences;
use App\Repository\CompetencesRepository;
use App\Entity\Competences1;
use App\Repository\Competences1Repository;
use App\Entity\Projets;
use App\Repository\ProjetsRepository;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{

    /**
    * @Route("/", name="index")
    */
    public function index(CompetencesRepository $competencesrepository, ProjetsRepository $projetsrepository)
    {
        $competences = $competencesrepository->findAll();
        $projets = $projetsrepository->findAll();

        return $this->render('pages/accueil.html.twig',['competences' => $competences, 'projets' => $projets]);
    }

    /**
    * @Route("/contact", name="contact", methods={"GET","POST"})
    */
    public function contact(Request $request)
    {
        
        return $this->render('pages/contact.html.twig');
    }

    /**
    * @Route("/sendmail", name="sendmail", methods={"GET","POST"})
    */
    public function sendmail(Request $request, \Swift_Mailer $mailer)
    {
        $name = $request->get('name');
        $mail = $request->get('mail');
        $msg = $request->get('msg');
        $message = (new \Swift_Message('Contact Titouan'))
        ->setFrom('projet.titouan@gmail.com')
        ->setTo('projet.titouan@gmail.com')
        ->setBody(
           $name."---". $mail."---". $msg 
        )
    ;
    $mailer->send($message);
        return $this->render('pages/sendmail.html.twig');
    }

    

}
