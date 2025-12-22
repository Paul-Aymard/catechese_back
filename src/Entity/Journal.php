<?php

namespace App\Entity;

use App\Repository\JournalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JournalRepository::class)]
class Journal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Tablej = null;

    #[ORM\Column(length: 255)]
    private ?string $Event = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $DatejAt = null;

    #[ORM\Column]
    private ?int $anciennevaleur = null;

    #[ORM\Column]
    private ?int $nouvellevaleur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTablej(): ?int
    {
        return $this->Tablej;
    }

    public function setTablej(int $Tablej): static
    {
        $this->Tablej = $Tablej;

        return $this;
    }

    public function getEvent(): ?string
    {
        return $this->Event;
    }

    public function setEvent(string $Event): static
    {
        $this->Event = $Event;

        return $this;
    }

    public function getDatejAt(): ?\DateTimeImmutable
    {
        return $this->DatejAt;
    }

    public function setDatejAt(\DateTimeImmutable $DatejAt): static
    {
        $this->DatejAt = $DatejAt;

        return $this;
    }

    public function getAnciennevaleur(): ?int
    {
        return $this->anciennevaleur;
    }

    public function setAnciennevaleur(int $anciennevaleur): static
    {
        $this->anciennevaleur = $anciennevaleur;

        return $this;
    }

    public function getNouvellevaleur(): ?int
    {
        return $this->nouvellevaleur;
    }

    public function setNouvellevaleur(int $nouvellevaleur): static
    {
        $this->nouvellevaleur = $nouvellevaleur;

        return $this;
    }
}
