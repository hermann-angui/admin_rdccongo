<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'app_home')]
    public function home(Request $request): Response
    {
        return $this->render('home/index.html.twig');
    }

    #[Route(path: '/aboutus', name: 'app_about_us')]
    public function aboutUs(Request $request): Response
    {
        return $this->render('home/aboutus.html.twig');
    }

    #[Route(path: '/config', name: 'app_config')]
    public function config(Request $request): Response
    {
        return $this->render('home/config.html.twig');
    }
    #[Route(path: '/language/{lang}', name: 'app_change_language')]
    public function changeLanguage($lang): Response
    {
        if($lang)
        return $this->redirectToRoute('app_home');
    }
}
