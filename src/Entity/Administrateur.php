<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateurRepository::class)]
class Administrateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomadmin = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomadmin = null;

    #[ORM\Column(length: 255)]
    private ?string $responsabiliteadmin = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomadmin(): ?string
    {
        return $this->nomadmin;
    }

    public function setNomadmin(string $nomadmin): static
    {
        $this->nomadmin = $nomadmin;

        return $this;
    }

    public function getPrenomadmin(): ?string
    {
        return $this->prenomadmin;
    }

    public function setPrenomadmin(string $prenomadmin): static
    {
        $this->prenomadmin = $prenomadmin;

        return $this;
    }

    public function getResponsabiliteadmin(): ?string
    {
        return $this->responsabiliteadmin;
    }

    public function setResponsabiliteadmin(string $responsabiliteadmin): static
    {
        $this->responsabiliteadmin = $responsabiliteadmin;

        return $this;
    }
}
