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
            'hello_world' => 'Hello World!!',
            'questions' =>[
                'Как вас зовут?',
                'Сколько вам лет?',
                'На каком языке программирования вы пробовали писать?',
                'Выберите наиболее понравившийся',
                'Оцените опрос',
                'Что вы думаете о опросе?',
                'Загрузите ваш файл',
        ]],
    );
    }

    public function index_list(): Response
    {
        return $this->render('hello/index_list.html.twig', [
            'controller_name' => 'HelloController',
            'hello_world' => 'Hello World!!',
        ]);
    }
    
}
