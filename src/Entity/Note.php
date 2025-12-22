<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numerodevoir = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column]
    private ?bool $absencemesse = null;

    #[ORM\Column]
    private ?bool $absencecours = null;

    #[ORM\Column(length: 255)]
    private ?string $observation = null;

    #[ORM\Column]
    private ?float $moyenne = null;

    #[ORM\Column]
    private ?int $total_presence = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumerodevoir(): ?int
    {
        return $this->numerodevoir;
    }

    public function setNumerodevoir(int $numerodevoir): static
    {
        $this->numerodevoir = $numerodevoir;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function isAbsencemesse(): ?bool
    {
        return $this->absencemesse;
    }

    public function setAbsencemesse(bool $absencemesse): static
    {
        $this->absencemesse = $absencemesse;

        return $this;
    }

    public function isAbsencecours(): ?bool
    {
        return $this->absencecours;
    }

    public function setAbsencecours(bool $absencecours): static
    {
        $this->absencecours = $absencecours;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(string $observation): static
    {
        $this->observation = $observation;

        return $this;
    }

    public function getMoyenne(): ?float
    {
        return $this->moyenne;
    }

    public function setMoyenne(float $moyenne): static
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    public function getTotalPresence(): ?int
    {
        return $this->total_presence;
    }

    public function setTotalPresence(int $total_presence): static
    {
        $this->total_presence = $total_presence;

        return $this;
    }
}
