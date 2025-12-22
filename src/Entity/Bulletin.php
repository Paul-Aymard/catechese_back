<?php

namespace App\Entity;

use App\Repository\BulletinRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BulletinRepository::class)]
class Bulletin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $decisionfinale = null;

    #[ORM\Column(length: 255)]
    private ?string $observationdecision = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDecisionfinale(): ?string
    {
        return $this->decisionfinale;
    }

    public function setDecisionfinale(string $decisionfinale): static
    {
        $this->decisionfinale = $decisionfinale;

        return $this;
    }

    public function getObservationdecision(): ?string
    {
        return $this->observationdecision;
    }

    public function setObservationdecision(string $observationdecision): static
    {
        $this->observationdecision = $observationdecision;

        return $this;
    }
}
