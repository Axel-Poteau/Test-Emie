<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MotRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MotRepository::class)]
#[ApiResource]
class Mot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $mot = null;

    #[ORM\Column(length: 255)]
    private ?string $mot_reverse = null;

    #[ORM\Column]
    private ?bool $palindrome = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMot(): ?string
    {
        return $this->mot;
    }

    public function setMot(string $mot): self
    {
        $this->mot = $mot;

        return $this;
    }

    public function getMotReverse(): ?string
    {
        return $this->mot_reverse;
    }

    public function setMotReverse(string $mot_reverse): self
    {
        $this->mot_reverse = $mot_reverse;

        return $this;
    }

    public function isPalindrome(): ?bool
    {
        return $this->palindrome;
    }

    public function setPalindrome(bool $palindrome): self
    {
        $this->palindrome = $palindrome;

        return $this;
    }

    public function setId(?int $id){
        $this->id = $id;}

}
