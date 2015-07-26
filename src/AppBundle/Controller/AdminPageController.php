<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\RequestPeople;
use AppBundle\Entity\RequestCategory;

class AdminPageController extends Controller
{
//    /**
//     * @Route("/admin")
//     */
    public function showAdminPageAction($value)
    {
       // return new Response('Admin page!');
        if ($value == 'main') {
            $em = $this->getDoctrine()->getManager()->getRepository('AppBundle:RequestPeople');
            $requestPeople = $em->findBy(array(), array('id' => 'ASC'));
            return $this->render('AppBundle:adminMenu:RequestPeople.html.twig', array('RequestPeople' => $requestPeople));
        }
        if ($value == 'requestCategory') {
            $em = $this->getDoctrine()->getManager()->getRepository('AppBundle:RequestCategory');
            $requestCategory = $em->findBy(array(), array('id' => 'ASC'));
            return $this->render('AppBundle:adminMenu:RequestCategory.html.twig', array('RequestCategory' => $requestCategory));
        }
    }
}
