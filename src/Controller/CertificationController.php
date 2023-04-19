<?php

namespace App\Controller;

use App\Certification\AnonymousFunctions\Tests as TestsAN;
use App\Certification\Exceptions\Tests as TestsEx;
use App\Certification\HeaderFields\Tests as TestsHF;
use App\Certification\TemplatingTwig\Tests as TestsTF;
use App\Form\RequestHeaderType;
use App\Form\RequestInputType;
use App\Form\RequestTwigFilterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CertificationController extends AbstractController
{
    
    #[Route('/', name: 'homepage')]
    public function index(Request $request): Response
    {

        $locale = $request->getLocale();
        return  $this->render($locale.'/index.html.twig');

    }

    #[Route('/certification/anonymous-functions', name: 'certification_anonymous_functions')]
    public function indexAF(Request $request, TestsAN $tests): Response
    {

        $form_type = RequestInputType::class;
        return $this->getResponse($request, $form_type, $tests);

    }

    #[Route('/certification/exceptions', name: 'certification_exceptions')]
    public function indexEx(Request $request, TestsEx $tests): Response
    {

        $form_type = RequestInputType::class;
        return $this->getResponse($request, $form_type, $tests);

    }


    #[Route('/certification/request/header/', name: 'certification_request_header')]
    public function indexRH(Request $request, TestsHF $tests): Response
    {

        $form_type = RequestHeaderType::class;
        return $this->getResponse($request, $form_type, $tests);

    }

    #[Route('/certification/twig/filter/', name: 'certification_twig_filter')]
    public function indexTF(Request $request, TestsTF $tests): Response
    {

        $form_type = RequestTwigFilterType::class;
        return $this->getResponse($request, $form_type, $tests);

    }


    private function getResponse(Request $request,  $form_type, $tests): Response
    {

        $array = $this->getBaseArray($tests);

        $form = $this->createForm($form_type);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $response = $this->getData($tests, $form);

            return $response;
        }
   
        $array['form']= $form;

        $response =  $this->render('certification/index.html.twig', $array);

        return $response;
    }



    private function getData($tests, ?FormInterface $form): Response
    {
        $class = $tests::class;  
        $src = $this->getParameter('APP_BASE_SRC') . str_replace(['\\', 'App'], ['/', 'src'], $tests::class). '.php';

        $array =  [
            'src' => $src,
            'class' => $class,
        ];

        $data = $form->getData();
        $array['form'] = $form; 

        $result = $tests->test1($data);
        $array = array_merge($array, $result);

        $response =  $this->render('certification/index.html.twig', $array);

        return $response;
    }


    private function getBaseArray($tests): array
    {
        $class = $tests::class;  
        $src = $this->getParameter('APP_BASE_SRC') . str_replace(['\\', 'App'], ['/', 'src'], $tests::class). '.php';

        $array =  [
            'src' => $src,
            'class' => $class,
        ];


        return $array;
    }

}
