<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HelloController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('hello/index.html.twig', [
            'controller_name' => 'HelloController',
            'hello_world' => 'Hello World!!'
        ]);
    }

    public function index2(): Response
    {
        return $this->render('hello/index2.html.twig', [
            'controller_name' => 'HelloController',
            'hello_world' => 'Hello World!!'
        ]);
    }
    
}
