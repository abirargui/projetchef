<?php

namespace App\Entity;

use App\Repository\SemestreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SemestreRepository::class)
 */
class Semestre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $codesem;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $libdep;

    /**
     * @ORM\ManyToOne(targetEntity=Anneeuniversitaire::class, inversedBy="semestres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $anneeuniversitaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodesem(): ?int
    {
        return $this->codesem;
    }

    public function setCodesem(int $codesem): self
    {
        $this->codesem = $codesem;

        return $this;
    }

    public function getLibdep(): ?string
    {
        return $this->libdep;
    }

    public function setLibdep(string $libdep): self
    {
        $this->libdep = $libdep;

        return $this;
    }

    public function getAnneeuniversitaire(): ?anneeuniversitaire
    {
        return $this->anneeuniversitaire;
    }

    public function setAnneeuniversitaire(?anneeuniversitaire $anneeuniversitaire): self
    {
        $this->anneeuniversitaire = $anneeuniversitaire;

        return $this;
    }
}
