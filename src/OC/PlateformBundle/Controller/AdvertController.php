<?php


namespace OC\PlateformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;

class AdverController
{
    public function indexAction()
	{
		$this->render('@OCPlatform/Advert/index.html.twig');
	}	
	
}

