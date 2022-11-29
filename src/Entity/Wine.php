<?php

namespace App\Entity;

use App\Repository\WineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @SuppressWarnings(PHPMD.ExcessivePublicCount)
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
#[ORM\Entity(repositoryClass: WineRepository::class)]
class Wine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $domaine = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column(nullable: true)]
    private ?int $ranking = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\Column(nullable: true)]
    private ?int $stock = null;

    #[ORM\Column(nullable: true)]
    private ?float $value = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cellarLocation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $picture = null;

    #[ORM\Column(nullable: true)]
    private ?int $drinkBefore = null;

    #[ORM\Column(nullable: true)]
    private ?int $vintage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $purchaseDate = null;

    #[ORM\ManyToOne(inversedBy: 'wines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Color $color = null;

    #[ORM\ManyToOne(inversedBy: 'wines')]
    private ?Country $country = null;

    #[ORM\ManyToOne(inversedBy: 'wines')]
    private ?Region $region = null;

    #[ORM\ManyToOne(inversedBy: 'wines')]
    private ?Appellation $appellation = null;

    #[ORM\ManyToOne(inversedBy: 'wines')]
    private ?Type $type = null;

    #[ORM\ManyToMany(targetEntity: GrapeVariety::class, inversedBy: 'wines')]
    private Collection $grapeVariety;

    #[ORM\ManyToMany(targetEntity: WinePairing::class, inversedBy: 'wines')]
    private Collection $winePairing;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'wines')]
    private Collection $user;

    public function __construct()
    {
        $this->grapeVariety = new ArrayCollection();
        $this->winePairing = new ArrayCollection();
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(?int $ranking): self
    {
        $this->ranking = $ranking;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getValue(): ?float
    {
        return $this->value;
    }

    public function setValue(?float $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getCellarLocation(): ?string
    {
        return $this->cellarLocation;
    }

    public function setCellarLocation(?string $cellarLocation): self
    {
        $this->cellarLocation = $cellarLocation;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getDrinkBefore(): ?int
    {
        return $this->drinkBefore;
    }

    public function setDrinkBefore(?int $drinkBefore): self
    {
        $this->drinkBefore = $drinkBefore;

        return $this;
    }

    public function getVintage(): ?int
    {
        return $this->vintage;
    }

    public function setVintage(?int $vintage): self
    {
        $this->vintage = $vintage;

        return $this;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->purchaseDate;
    }

    public function setPurchaseDate(?\DateTimeInterface $purchaseDate): self
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getAppellation(): ?Appellation
    {
        return $this->appellation;
    }

    public function setAppellation(?Appellation $appellation): self
    {
        $this->appellation = $appellation;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, GrapeVariety>
     */
    public function getGrapeVariety(): Collection
    {
        return $this->grapeVariety;
    }

    public function addGrapeVariety(GrapeVariety $grapeVariety): self
    {
        if (!$this->grapeVariety->contains($grapeVariety)) {
            $this->grapeVariety->add($grapeVariety);
        }

        return $this;
    }

    public function removeGrapeVariety(GrapeVariety $grapeVariety): self
    {
        $this->grapeVariety->removeElement($grapeVariety);

        return $this;
    }

    /**
     * @return Collection<int, WinePairing>
     */
    public function getWinePairing(): Collection
    {
        return $this->winePairing;
    }

    public function addWinePairing(WinePairing $winePairing): self
    {
        if (!$this->winePairing->contains($winePairing)) {
            $this->winePairing->add($winePairing);
        }

        return $this;
    }

    public function removeWinePairing(WinePairing $winePairing): self
    {
        $this->winePairing->removeElement($winePairing);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {

        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }
}
