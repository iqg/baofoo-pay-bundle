<?php

namespace dwddevops\BaofooPayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/test")
     */
    public function indexAction()
    {
        /**@var $wxPayHandler \iqg\WxPayBundle\Lib\BaofoPayApi*/
        $wxPayHandler = $this->container->get('baofoo_pay.handler');
        return $this->render('WxPayBundle:Default:index.html.twig', array('parameters' => 'hello world baofoo!'));
    }
}
