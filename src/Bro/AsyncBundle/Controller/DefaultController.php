<?php

namespace Bro\AsyncBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/send-mail", name="bro_mail_produce")
     */
    public function downloadAction()
    {
        $mailer = $this->container->get('bro_async.async.mailer_producer');

        $mailer->sendEmail('some@gmail.com', 'Subject Of my email', 'my-email', 'BroAsyncBundle:Mail:example.html.twig');

        return $this->render('BroAsyncBundle:Default:index.html.twig', ['type' => 'queued']);
    }

    /**
     * @Route("/send-mail-direct", name="bro_mail_direct")
     */
    public function sendTestAction()
    {
        $mailer = $this->container->get('mailer');

        $message = (new \Swift_Message('Hello Email'))
            ->setFrom(['john@doe.com' => 'John Doe'])
            ->setTo(['receiver@domain.org', 'other@domain.org' => 'A name'])
            ->setBody(
                $this->renderView(
                    'BroAsyncBundle:Mail:example.html.twig',
                    ['params' => ['message' => 'send-mail-test!!!']]
                ),
                'text/html'
            );

        $mailer->send($message);

        return $this->render('BroAsyncBundle:Default:index.html.twig', ['type' => 'sent']);

    }
}
