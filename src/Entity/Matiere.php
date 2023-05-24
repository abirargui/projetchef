<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
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
    private $codemat;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $libmat;

    /**
     * @ORM\Column(type="integer")
     */
    private $NbAbs;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="matiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    /**
     * @ORM\OneToOne(targetEntity=Enseignant::class, inversedBy="matiere", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $enseignant;

    /**
     * @ORM\ManyToMany(targetEntity=Etudiant::class, inversedBy="matieres")
     */
    private $etudiant;

    public function __construct()
    {
        $this->etudiant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodemat(): ?int
    {
        return $this->codemat;
    }

    public function setCodemat(int $codemat): self
    {
        $this->codemat = $codemat;

        return $this;
    }

    public function getLibmat(): ?string
    {
        return $this->libmat;
    }

    public function setLibmat(string $libmat): self
    {
        $this->libmat = $libmat;

        return $this;
    }

    public function getNbAbs(): ?int
    {
        return $this->NbAbs;
    }

    public function setNbAbs(int $NbAbs): self
    {
        $this->NbAbs = $NbAbs;

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

    public function getEnseignant(): ?enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(enseignant $enseignant): self
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    /**
     * @return Collection<int, etudiant>
     */
    public function getEtudiant(): Collection
    {
        return $this->etudiant;
    }

    public function addEtudiant(etudiant $etudiant): self
    {
        if (!$this->etudiant->contains($etudiant)) {
            $this->etudiant[] = $etudiant;
        }

        return $this;
    }

    public function removeEtudiant(etudiant $etudiant): self
    {
        $this->etudiant->removeElement($etudiant);

        return $this;
    }
}
