<?php

namespace App\Controller;

use App\Entity\Mot;
use App\Repository\MotRepository;
use http\Client\Request;
use phpDocumentor\Reflection\DocBlock\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class MotController extends AbstractController
{

    #[Route('/api/mot/{char}', name: 'app_mot',methods: ['GET'])]
    public function mot(String $char, MotRepository $motRepository, SerializerInterface $serializer): Response
    {
        $motTab = $motRepository->findAll();
        $id = end($motTab)->getId();
        $mot = new Mot();
        $mot->setId($id+1);
        $mot->setMot($char);
        $mot->setMotReverse(strrev($char));
        $mot->setPalindrome($char === strrev($char));
        $jsonMot = $serializer->serialize($mot,'json');
        return new JsonResponse($jsonMot,Response::HTTP_OK, [],true);

    }

}
