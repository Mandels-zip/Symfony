<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
            ],
            'checkbox' =>[
                'label' => [
                    'proglang1' => 'Python',
                    'proglang2' => 'Java',
                    'proglang3' => 'C#'
            ]
            ],
            'radio' =>[
                'label' => [
                    'age1' => '18-24',
                    'age2' => '25-35',
                    'age3' => '36+'
                ]
                ],
            'input' =>[
                'label' => [
                    'fname' => 'Имя',
                    'sname' => 'Фамилия',
                ]
            ]]
    );
    }

    public function submitForm(Request $request, SessionInterface $session){

            $fname = $request->get('fname');
            $sname = $request->get('sname');
            $age = $request->get('age');
            $checklist = $request->get('checklist');
            $fav_lang= $request ->get('fav_lang');
            $grade= $request ->get('grade');
            $opinion = $request ->get('opinion');
            $uploadfile = $request ->files->get('uploadfile');
            
            $session->set('form_data', [
            'fname'=> $fname,
            'sname' =>$sname,
            'age' =>$age,
            'checklist' => $checklist,
            'fav_lang' =>$fav_lang,
            'grade' =>$grade,
            'opinion' =>$opinion,
            'file_name' => basename($uploadfile),
            'file_size' => filesize($uploadfile)
            ]); 
    
            return $this->redirectToRoute('index_list');
    }

    public function index_list(SessionInterface $session): Response
    {
        
        $data  = $session -> get('form_data');

        if (!$data) {
            // Redirect to error page with error message
            return $this->render('error.html.twig', [
                'error_message' => 'Form data not found. Please submit the form first.',
            ]);
        }
        
        return $this->render('hello/index_list.html.twig', [
            'controller_name' => 'HelloController_list',
            'hello_world' => 'Hello World!!',
            'data' => $data
        ]);
    }
}
