<?php

namespace App\Entity;

use App\Repository\CatechumenesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CatechumenesRepository::class)]
class Catechumenes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $matricule = null;

    #[ORM\Column(length: 255)]
    private ?string $nomcatechumene = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomcatechumene = null;

    #[ORM\Column(length: 255)]
    private ?string $lieunaissancecatechumene = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $parrain_maraine = null;

    #[ORM\Column(length: 255)]
    private ?string $quartiercatechumene = null;

    #[ORM\Column(length: 255)]
    private ?string $contactcatechumene = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sacrementcatechumene = null;

    #[ORM\Column(length: 255)]
    private ?string $professioncatechumene = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?int
    {
        return $this->matricule;
    }

    public function setMatricule(int $matricule): static
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNomcatechumene(): ?string
    {
        return $this->nomcatechumene;
    }

    public function setNomcatechumene(string $nomcatechumene): static
    {
        $this->nomcatechumene = $nomcatechumene;

        return $this;
    }

    public function getPrenomcatechumene(): ?string
    {
        return $this->prenomcatechumene;
    }

    public function setPrenomcatechumene(string $prenomcatechumene): static
    {
        $this->prenomcatechumene = $prenomcatechumene;

        return $this;
    }

    public function getLieunaissancecatechumene(): ?string
    {
        return $this->lieunaissancecatechumene;
    }

    public function setLieunaissancecatechumene(string $lieunaissancecatechumene): static
    {
        $this->lieunaissancecatechumene = $lieunaissancecatechumene;

        return $this;
    }

    public function getParrainMaraine(): ?string
    {
        return $this->parrain_maraine;
    }

    public function setParrainMaraine(?string $parrain_maraine): static
    {
        $this->parrain_maraine = $parrain_maraine;

        return $this;
    }

    public function getQuartiercatechumene(): ?string
    {
        return $this->quartiercatechumene;
    }

    public function setQuartiercatechumene(string $quartiercatechumene): static
    {
        $this->quartiercatechumene = $quartiercatechumene;

        return $this;
    }

    public function getContactcatechumene(): ?string
    {
        return $this->contactcatechumene;
    }

    public function setContactcatechumene(string $contactcatechumene): static
    {
        $this->contactcatechumene = $contactcatechumene;

        return $this;
    }

    public function getSacrementcatechumene(): ?string
    {
        return $this->sacrementcatechumene;
    }

    public function setSacrementcatechumene(?string $sacrementcatechumene): static
    {
        $this->sacrementcatechumene = $sacrementcatechumene;

        return $this;
    }

    public function getProfessioncatechumene(): ?string
    {
        return $this->professioncatechumene;
    }

    public function setProfessioncatechumene(string $professioncatechumene): static
    {
        $this->professioncatechumene = $professioncatechumene;

        return $this;
    }
}
