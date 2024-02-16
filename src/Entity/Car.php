<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Le nom de l\'annonce ne peut pas être vide')]
    #[Assert\Length(
        min: 5,
        max: 255,
        minMessage: 'Le nom de l\'annonce doit faire au moin 5 caractères',
        maxMessage: 'Impossible de dépasser les 255 caractéres'
    )]
    private ?string $name = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le prix de l\'annonce ne peut pas être vide')]
    #[Assert\Positive(message: 'Le prix doit étre un entier positif')]
    #[Assert\Type(
        type: 'integer',
        message: 'Le prix n\'accepte que des chiffres'
    )]
    #[Assert\Length(
        min: 3,
        minMessage: 'Le prix de l\'annonce doit faire au moin 3 chiffres'
    )]
    private ?int $price = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'Le killométrage de l\'annonce ne peut pas être vide')]
    #[Assert\PositiveOrZero(message: 'L\'année de mise en circulation doit étre un entier positif')]
    private ?int $killometering = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: 'L\'année de mise en circulation de l\'annonce ne peut pas être vide')]
    #[Assert\PositiveOrZero(message: 'L\'année de mise en circulation doit étre un entier positif')]
    #[Assert\Type(
        type: 'integer',
        message: 'Le prix n\'accepte que des chiffres'
    )]
    #[Assert\Length(
        min: 4,
        max: 5,
        minMessage: 'L\'année de mise en circulation doit étre de 4 chiffres',
        maxMessage: 'L\'année de mise en circulation doit étre de 4 chiffres'
    )]
    private ?int $circulation = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Impossible de dépasser les 255 caractéres'
    )]
    private ?string $brand = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Impossible de dépasser les 255 caractéres'
    )]
    private ?string $model = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Impossible de dépasser les 255 caractéres'
    )]
    private ?string $fuel = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Impossible de dépasser les 255 caractéres'
    )]
    private ?string $gearbox = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Assert\Length(
        max: 255,
        maxMessage: 'Impossible de dépasser les 255 caractéres'
    )]
    private ?string $color = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero(message: 'Le nombre de porte doit étre un entier positif')]
    #[Assert\Type(
        type: 'integer',
        message: 'Le prix n\'accepte que des chiffres'
    )]
    #[Assert\Length(
        max: 2,
        maxMessage: 'Impossible de dépasser les 2 chiffres'
    )]
    private ?int $numberofdoors = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero(message: 'La puissance fiscale doit étre un entier positif')]
    #[Assert\Type(
        type: 'integer',
        message: 'Le prix n\'accepte que des chiffres'
    )]
    private ?int $fiscalpower = null;

    #[ORM\Column(nullable: true)]
    #[Assert\PositiveOrZero(message: 'La puissance DIN doit étre un entier positif')]
    #[Assert\Type(
        type: 'integer',
        message: 'Le prix n\'accepte que des chiffres'
    )]
    private ?int $powerdin = null;

    #[ORM\Column(length: 500, nullable: true)]
    #[Assert\Length(
        max: 500,
        maxMessage: 'Impossible de dépasser les 500 caractéres'
    )]
    private ?string $otherinfo = null;


    #[ORM\OneToMany(mappedBy: 'car', targetEntity: Picturecar::class, orphanRemoval: true, cascade: ['persist'])]
    #[Assert\NotBlank(message: 'l\'annonce doit obligatoirement posséder une image')]
    private Collection $picture;


    public function __construct()
    {
        $this->picture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getKillometering(): ?int
    {
        return $this->killometering;
    }

    public function setKillometering(int $killometering): static
    {
        $this->killometering = $killometering;

        return $this;
    }

    public function getCirculation(): ?int
    {
        return $this->circulation;
    }

    public function setCirculation(int $circulation): static
    {
        $this->circulation = $circulation;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(?string $fuel): static
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function setGearbox(?string $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getNumberofdoors(): ?int
    {
        return $this->numberofdoors;
    }

    public function setNumberofdoors(?int $numberofdoors): static
    {
        $this->numberofdoors = $numberofdoors;

        return $this;
    }

    public function getFiscalpower(): ?int
    {
        return $this->fiscalpower;
    }

    public function setFiscalpower(int $fiscalpower): static
    {
        $this->fiscalpower = $fiscalpower;

        return $this;
    }

    public function getPowerdin(): ?int
    {
        return $this->powerdin;
    }

    public function setPowerdin(?int $powerdin): static
    {
        $this->powerdin = $powerdin;

        return $this;
    }

    public function getOtherinfo(): ?string
    {
        return $this->otherinfo;
    }

    public function setOtherinfo(?string $otherinfo): static
    {
        $this->otherinfo = $otherinfo;

        return $this;
    }

    /**
     * @return Collection<int, Picturecar>
     */
    public function getPicture(): Collection
    {
        return $this->picture;
    }

    public function addPicture(Picturecar $picture): static
    {
        if (!$this->picture->contains($picture)) {
            $this->picture->add($picture);
            $picture->setCar($this);
        }

        return $this;
    }

    public function removePicture(Picturecar $picture): static
    {
        if ($this->picture->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getCar() === $this) {
                $picture->setCar(null);
            }
        }

        return $this;
    }
}
