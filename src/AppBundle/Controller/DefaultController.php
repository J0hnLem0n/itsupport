<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\RequestPeople;


class DefaultController extends Controller
{
    public function showMainPageAction(Request $request)
    {
        $RequestPeople = new RequestPeople();
        $form = $this->createFormBuilder($RequestPeople)
            ->add('requestCategory', 'entity', array(
                'class' => 'AppBundle\Entity\RequestCategory',
                'property' => 'name',
            ))
            ->add('text', 'textarea')
            ->add('save', 'submit', array('label' => 'Сохранить', 'attr' => array('class'=>'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($RequestPeople);
            $em->flush();
            return $this->redirectToRoute('main_homepage');
        }

        return $this->render('AppBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
