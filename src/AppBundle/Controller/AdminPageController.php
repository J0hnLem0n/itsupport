<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\RequestPeople;

class AdminPageController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function showAdminPageAction()
    {
       // return new Response('Admin page!');
        $em=$this->getDoctrine()->getManager()->getRepository('AppBundle:RequestPeople');
        $requestPeople=$em->findBy(array(),array('id'=>'ASC'));
        return $this->render('AppBundle:Default:admin.html.twig', array ('RequestPeople' => $requestPeople));
    }
}
