<?php

namespace Bro\AsyncBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/send-mail", name="bro_async_download")
     */
    public function downloadAction()
    {
        $mailer = $this->container->get('bro_async.async.mailer_producer');

        $mailer->sendEmail('some@gmail.com', 'Subject Of my email', 'my-email', 'BroAsyncBundle:Mail:example.html.twig');

        return $this->render('BroAsyncBundle:Default:index.html.twig');
    }

}
