<?php

namespace App\Entity;

use App\Repository\GroupeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupeRepository::class)
 */
class Groupe
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
    private $codeGP;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $libGP;

    /**
     * @ORM\Column(type="integer")
     */
    private $codedep;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="groupe")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    /**
     * @ORM\OneToMany(targetEntity=Etudiant::class, mappedBy="groupe")
     */
    private $etudiants;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeGP(): ?int
    {
        return $this->codeGP;
    }

    public function setCodeGP(int $codeGP): self
    {
        $this->codeGP = $codeGP;

        return $this;
    }

    public function getLibGP(): ?string
    {
        return $this->libGP;
    }

    public function setLibGP(string $libGP): self
    {
        $this->libGP = $libGP;

        return $this;
    }

    public function getCodedep(): ?int
    {
        return $this->codedep;
    }

    public function setCodedep(int $codedep): self
    {
        $this->codedep = $codedep;

        return $this;
    }

    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): self
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants[] = $etudiant;
            $etudiant->setGroupe($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): self
    {
        if ($this->etudiants->removeElement($etudiant)) {
            // set the owning side to null (unless already changed)
            if ($etudiant->getGroupe() === $this) {
                $etudiant->setGroupe(null);
            }
        }

        return $this;
    }
}
