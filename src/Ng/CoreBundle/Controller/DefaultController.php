<?php

namespace Ng\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NgCoreBundle:Default:index.html.twig');
    }
}
