<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Webkul\UVDesk\CoreBundle\Controller\Account;

class VueController extends Controller
{
    /**
     * @Route("/vue", name="vue")
     */
    public function index()
    {
        return $this->render('index.html.twig', []);
    }

    /**
     * @Route("/en/member/profile2", name="vue2")
     * @param Account $account
     */
    public function profile(Account $account)
    {
        $account->loadDashboard();
    }


    /**
     * @Route("/sendEmail")
     * @param \Swift_Mailer $mailer
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexSendEmail( \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('send@example.com')
            ->setTo('ka_rax@hotmail.com')
            ->setBody(
                $this->renderView('vue/index.html.twig' ), 'text/html'
            );

//            /*
//             * If you also want to include a plaintext version of the message
//            ->addPart(
//                $this->renderView(
//                    'emails/registration.txt.twig',
//                    ['name' => $name]
//                ),
//                'text/plain'
//            )
//            */

        $mailer->send($message);

        return $this->json(
            [
                'data' => 'the email sent from gmail'
            ],
            200);

    }

}