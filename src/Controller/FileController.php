<?php

namespace App\Controller;
use App\Entity\FileUpload;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FileController extends AbstractController
{
    #[Route('/api/filetest', name: 'app_file')]
    public function __invoke(Request $request){
        $correction = $request->query->get('correction');


        $file = $request->files->get('file');

        if (!$file) {
            return new JsonResponse(['error'=>'no file uploaded',
                'query'=>$correction]);
        }
        $fileUploaded = new FileUpload();
        $fileUploaded->file = $file;
        $content = file_get_contents($fileUploaded->file);
        $name=$fileUploaded->file->getClientOriginalName();
        $name=str_replace(".txt","",$name);
        $name="testFile/".$name."answer.txt";
        $fs = new Filesystem();
        if ($correction==='lower'){
            $contentCorrect = strtolower($content);
            $fs->dumpFile($name, $contentCorrect);

        }
        if ($correction==='upper'){
            $contentCorrect = strtoupper($content);
            $fs->dumpFile($name, $contentCorrect);

        }



        return new JsonResponse([
            'correction'=>$correction,
            "contenu de l'ancien fichier (avant correction)"=>$content,
            'contenu du nouveau fichier (apres correction)'=>$contentCorrect
        ]);

    }
}
