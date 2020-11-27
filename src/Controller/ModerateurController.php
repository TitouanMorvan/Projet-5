<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Commentaires;
use App\Repository\CommentairesRepository;
use App\Repository\BanIpRepository;
use App\Entity\BanIp;
use Symfony\Component\HttpFoundation\Request;

class ModerateurController extends AbstractController
{
    /**
     * @Route("/moderateur", name="moderateur")
     */
    public function moderateur(CommentairesRepository $commentairesRepository, Request $request)
    {

        //Affiche la liste des commentaires de chaque article
        $commentaires = $commentairesRepository->findAll();

        return $this->render('moderateur/index.html.twig', ['commentaires' => $commentaires]);
    }


    /**
     * @Route("/moderateur/com/delete/{id}", name="moderateur_com_delete")
     */
    public function moderateurComDelete(CommentairesRepository $commentairesRepository, Request $request)
    {

        //Affiche la liste des commentaires de chaque article
        $commentaire = $commentairesRepository->findOneBy(["id" => $request->get('id')]);
        $em = $this->getDoctrine()->getManager();
        $em->remove($commentaire);
        $em->flush();

        return $this->redirect('/moderateur');
    }
    

    /**
     * @Route("/moderateur/banip/{id}", name="comm_delete")
     */
    public function moderateur_ban_ip(CommentairesRepository $commentairesRepository, BanIpRepository $banIpRepository, Request $request)
    {

        //Bannir un ID en fonction d'un commentaire
        $commentaire = $commentairesRepository->findOneBy(["id" => $request->get('id')]);
        $ip = $commentaire->getIp();
        $banip = new Banip;
        $banip->setIp($ip);
        $em = $this->getDoctrine()->getManager();
        $em->persist($banip);
        $em->flush();
        $em->remove($commentaire);
        $em->flush();

        return $this->redirect('/moderateur');
    }

    /**
     * @Route("/moderateur/blacklist", name="black_list")
     */
    public function blackList(BanIpRepository $banIpRepository)
    {
        $banips = $banIpRepository->findAll();

        return $this->render('moderateur/blacklist.html.twig', ['banips' => $banips]);
    }

    /**
     * @Route("/moderateur/nobanip/{id}", name="nobanip")
     */
    public function noBanIp(BanIpRepository $banIpRepository, Request $request)
    {

        //Affiche la liste des commentaires de chaque article
        $banips = $banIpRepository->findOneBy(["id" => $request->get('id')]);
        $em = $this->getDoctrine()->getManager();
        $em->remove($banips);
        $em->flush();

        return $this->redirect('/moderateur');
     }



}
