<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Filesystem\Filesystem;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;


class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MessageController.php',
        ]);
    }

    #[Route('/message/create', name: 'app_message_create', methods:['POST'])]
      public function create(Request $request, Filesystem $filesystem): JsonResponse
    {
        $message = $request->getContent();
        $uuid = Uuid::uuid4()->toString();
        $filePath = 'messages/'.$uuid.'.txt';
        
        $filesystem->dumpFile($filePath, $message);
        
        return $this->json([
            'message' => 'Wiadomość zapisana pomyślnie',
            'UUID' => $uuid,
        ]);
    }

      
      
    #[Route('/message/list/{sort?}', name: 'app_message_list')]
    public function list(Filesystem $filesystem, $sort): JsonResponse
    {
        if($sort!="sort" && $sort!=null) return $this->json([
            'error' =>  'Try to use parameter such as sort or leave parameter empty',
        ]);    

        $folder ='messages';
        
        
        $files = glob($folder.'/*.txt');
        $messages = [];
        foreach ($files as $file) {
            $message = file_get_contents($file);
            array_push($messages, ["UUID"=>pathinfo($file)['filename'],"content"=>$message]);
        }
      
        
        if($sort=="sort")  {
            // array_multisort($messages, SORT_ASC);
            uasort($messages, function($a, $b){
                return strcmp($a['UUID'], $b['UUID']);
            });
            return $this->json([
            'messages' => $messages,
            'sorted'=>$sort?1:0
        ]);}

        return $this->json([
            'messages' =>  $messages,
            'sorted'=>$sort?1:0
        ]);
    }

   


}
