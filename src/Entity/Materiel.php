<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MaterielRepository::class)
 */
class Materiel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $numeroinventaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $garantie;

    /**
     * @ORM\Column(type="date")
     */
    private $datedereception;

    /**
     * @ORM\Column(type="boolean")
     */
    private $affecter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroinventaire(): ?float
    {
        return $this->numeroinventaire;
    }

    public function setNumeroinventaire(float $numeroinventaire): self
    {
        $this->numeroinventaire = $numeroinventaire;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->garantie;
    }

    public function setGarantie(string $garantie): self
    {
        $this->garantie = $garantie;

        return $this;
    }

    public function getDatedereception(): ?\DateTimeInterface
    {
        return $this->datedereception;
    }

    public function setDatedereception(\DateTimeInterface $datedereception): self
    {
        $this->datedereception = $datedereception;

        return $this;
    }

    public function getAffecter(): ?bool
    {
        return $this->affecter;
    }

    public function setAffecter(bool $affecter): self
    {
        $this->affecter = $affecter;

        return $this;
    }
}
