<?php

namespace OC\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{

    private $listAdverts;

    public function __construct()
    {
        $this->listAdverts = array(
            array(
                'title'   => 'Recherche développpeur Symfony 3',
                'id'      => 1,
                'author'  => 'Alexandre',
                'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Mission de webmaster',
                'id'      => 2,
                'author'  => 'Hugo',
                'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
                'date'    => new \Datetime()),
            array(
                'title'   => 'Offre de stage webdesigner',
                'id'      => 3,
                'author'  => 'Mathieu',
                'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
                'date'    => new \Datetime())
        );
    }

    public function indexAction($page)
	{

        if ($page < 1) {

            throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
        }

        return $this->render('@OCPlatform/Advert/index.html.twig', array('listAdvert' => $this->listAdverts));

	}

	public function viewAction($id, Request $request)
    {
        $ids = array_column($this->listAdverts, 'id');
        $found_key = array_search($id, $ids);

        $content = $this->render(
            '@OCPlatform/Advert/view.html.twig',
                  array('advert' => $this->listAdverts[$found_key])
        );

        return $content;

    }

    public function addAction(Request $request)
    {
        if ($request->isMethod('POST')) {

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée');

            return $this->redirectToRoute('oc_platform_view', array('id' => 5));
        }

        return $this->render('@OCPlatform/Advert/add.html.twig');

    }

    public function editaction($id, Request $request)
    {

        return $this->render('@OCPlatform/Advert/edit.html.twig', array('id' => $id));

    }

    public function deleteAction($id)
    {

        return $this->render('@OCPlatform/Advert/delete.html.twig');
    }

    public function viewSlugAction($year, $slug, $_format)
    {

        return new Response("L'annonce avec le slug ".$slug." crée en ".$year." et au format ".$_format);
    }

    public function menuAction($limit)
    {
        return $this->render('@OCPlatform/Advert/menu.html.twig', array('listAdverts' => $this->listAdverts));
    }
}

