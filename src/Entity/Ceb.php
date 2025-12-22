<?php

namespace App\Entity;

use App\Repository\CebRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CebRepository::class)]
class Ceb
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_ceb = null;

    #[ORM\Column(length: 255)]
    private ?string $zone = null;

    #[ORM\Column(length: 255)]
    private ?string $secteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCeb(): ?string
    {
        return $this->nom_ceb;
    }

    public function setNomCeb(string $nom_ceb): static
    {
        $this->nom_ceb = $nom_ceb;

        return $this;
    }

    public function getZone(): ?string
    {
        return $this->zone;
    }

    public function setZone(string $zone): static
    {
        $this->zone = $zone;

        return $this;
    }

    public function getSecteur(): ?string
    {
        return $this->secteur;
    }

    public function setSecteur(string $secteur): static
    {
        $this->secteur = $secteur;

        return $this;
    }
}
