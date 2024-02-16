<?php

namespace App\Entity;

use App\Repository\PicturecarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PicturecarRepository::class)]
class Picturecar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $picturecarNAME = null;

    #[ORM\ManyToOne(inversedBy: 'picture')]
    #[ORM\JoinColumn(nullable: false)]
    private ?car $car = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicturecarNAME(): ?string
    {
        return $this->picturecarNAME;
    }

    public function setPicturecarNAME(string $picturecarNAME): static
    {
        $this->picturecarNAME = $picturecarNAME;

        return $this;
    }

    public function getCar(): ?car
    {
        return $this->car;
    }

    public function setCar(?car $car): static
    {
        $this->car = $car;

        return $this;
    }
}
