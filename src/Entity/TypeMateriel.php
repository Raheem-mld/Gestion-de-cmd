<?php

namespace App\Entity;

use App\Repository\TypeMaterielRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeMaterielRepository::class)
 */
class TypeMateriel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typemateriel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $ventoryornot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypemateriel(): ?string
    {
        return $this->typemateriel;
    }

    public function setTypemateriel(string $typemateriel): self
    {
        $this->typemateriel = $typemateriel;

        return $this;
    }

    public function getVentoryornot(): ?bool
    {
        return $this->ventoryornot;
    }

    public function setVentoryornot(bool $ventoryornot): self
    {
        $this->ventoryornot = $ventoryornot;

        return $this;
    }
}
