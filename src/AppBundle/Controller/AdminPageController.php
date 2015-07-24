<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class AdminPageController extends Controller
{
    /**
     * @Route("/admin")
     */
    public function showAdminPageAction()
    {
        return new Response('Admin page!');
    }
}
