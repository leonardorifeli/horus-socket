<?php

namespace PublicBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChatController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render(':chat:index.html.twig',[
            'name' => $request->get('name'),
            'room' => $request->get('room')
        ]);
    }

    public function jsAction(Request $request)
    {
        $response = $this->render('PublicBundle:script:main.js.twig',[
            'name' => $request->get('name'),
            'room' => $request->get('room')
        ]);

        $response->headers->set('Content-Type', 'application/javascript');

        return $response;
    }
}
