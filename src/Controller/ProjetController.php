<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Projets;
use App\Repository\ProjetsRepository;
use App\Entity\Commentaires;
use App\Repository\CommentairesRepository;
use App\Repository\BanIpRepository;
use App\Entity\BanIp;
use Symfony\Component\HttpFoundation\Request;

class ProjetController extends AbstractController
{
    /**
     * @Route("/projet", name="projet")
     */
    public function index()
    {
        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }

    /**
     * @Route("/projet/{id}", name="projet-seul", methods={"GET","POST"})
     */
    public function projet(ProjetsRepository $projetRepository, CommentairesRepository $commentairesRepository, Request $request)
    {
        $id = $request->get("id");
        $projet = $projetRepository->findOneBy(['id' => $id]);

        return $this->render('pages/projet.html.twig', ['projets' => $projet]);
    }

    /**
     * @Route("/addcom/{id}", name="addcom", methods={"GET","POST"})
     */
    public function addcom(ProjetsRepository $projetRepository, CommentairesRepository $commentairesRepository, BanIpRepository $banIpRepository, Request $request)
    {
       
            $ip = $_SERVER['REMOTE_ADDR'];
            $banip = $banIpRepository->findOneBy(['ip'=>$ip]);
            if ($banip != null){
                return $this->redirect("/ipban");
            }

        
            $id = $request->get("id");
            $texte = $request->get("commentaire");
            $projet = $projetRepository->findOneBy(['id' => $id]);

            $commentaire = new Commentaires;

            $commentaire->setTexte($texte);
            $commentaire->setIp($_SERVER['REMOTE_ADDR']);
            $commentaire->setProjet($projet);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();

            return $this->redirect("/projet/".$id);




    }
    
}
