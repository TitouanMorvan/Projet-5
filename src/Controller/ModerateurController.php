<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ModerateurController extends AbstractController
{
    /**
     * @Route("/moderateur", name="moderateur")
     */
    public function moderateur()
    {

        //Affiche la liste des commentaires de chaque article


        return $this->render('moderateur/index.html.twig', [
            'controller_name' => 'ModerateurController',
        ]);
    }

    /**
     * @Route("/moderateur/comm/delete/{id}", name="comm_delete")
     */
    public function moderateur_comm_delete()
    {

        //Supprimer un commentaire


        return $this->render('moderateur/index.html.twig', [
            'controller_name' => 'ModerateurController',
        ]);
    }

    /**
     * @Route("/moderateur/banIp/{id}", name="comm_delete")
     */
    public function moderateur_ban_ip()
    {

        //Bannir un ID en fonction d'un commentaire


        return $this->render('moderateur/index.html.twig', [
            'controller_name' => 'ModerateurController',
        ]);
    }



}
