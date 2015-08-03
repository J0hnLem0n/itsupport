<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\RequestPeople;
use AppBundle\Entity\RequestCategory;
use Symfony\Component\HttpFoundation\Request;

class AdminPageController extends Controller
{
//    /**
//     * @Route("/admin")
//     */
    public function showAdminPageAction(Request $request, $value)
    {
        if ($value == 'admin_main') {
            $em = $this->getDoctrine()->getManager()->getRepository('AppBundle:RequestPeople');
            $requestPeople = $em->findBy(array(), array('id' => 'ASC'));
            return $this->render('AppBundle:adminMenu:RequestPeople.html.twig', array('RequestPeople' => $requestPeople));
        }
        if ($value == 'handbook_requestCategory') {
            $RequestCategory = new RequestCategory();
            $form = $this->createFormBuilder($RequestCategory)
                ->add('name', 'text')
                ->add('save', 'submit', array('label' => 'Сохранить', 'attr' => array('class'=>'btn btn-primary')))
                ->getForm();

            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($RequestCategory);
                $em->flush();
               return $this->redirectToRoute('admin_page', ['value' => 'requestCategory']);
            }
            $em = $this->getDoctrine()->getManager()->getRepository('AppBundle:RequestCategory');
            $requestCategory = $em->findBy(array(), array('id' => 'ASC'));
            return $this->render('AppBundle:adminMenu:RequestCategory.html.twig', array('RequestCategory' => $requestCategory,'form' => $form->createView()));
        }
        if ($value == 'handbook_Users') {
            $em = $this->getDoctrine()->getManager()->getRepository('UserBundle:User');
            $Users = $em->findBy(array(), array('id' => 'ASC'));
            return $this->render('AppBundle:adminMenu:Users.html.twig', array('Users' => $Users));
        }
    }
}
