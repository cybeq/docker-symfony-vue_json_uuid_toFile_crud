<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;


class MainController extends AbstractController
{

    #[Route('/', name: 'app_main')]
    public function vueApp()
    {
        return $this->render('vue/index.html');
    }



}