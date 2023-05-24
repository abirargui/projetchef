<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
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
    private $codedep;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $libdep;

    /**
     * @ORM\OneToOne(targetEntity=Secretaire::class, inversedBy="departement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $secretaire;

    /**
     * @ORM\ManyToMany(targetEntity=Enseignant::class, inversedBy="departements")
     */
    private $enseignant;

    /**
     * @ORM\OneToOne(targetEntity=DirecteurDeDepart::class, inversedBy="departement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $directeurdedepart;

    /**
     * @ORM\OneToMany(targetEntity=Groupe::class, mappedBy="departement", orphanRemoval=true)
     */
    private $groupe;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="departement", orphanRemoval=true)
     */
    private $matiere;

    public function __construct()
    {
        $this->enseignant = new ArrayCollection();
        $this->groupe = new ArrayCollection();
        $this->matiere = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLibdep(): ?string
    {
        return $this->libdep;
    }

    public function setLibdep(string $libdep): self
    {
        $this->libdep = $libdep;

        return $this;
    }

    public function getSecretaire(): ?secretaire
    {
        return $this->secretaire;
    }

    public function setSecretaire(secretaire $secretaire): self
    {
        $this->secretaire = $secretaire;

        return $this;
    }

    /**
     * @return Collection<int, enseignant>
     */
    public function getEnseignant(): Collection
    {
        return $this->enseignant;
    }

    public function addEnseignant(enseignant $enseignant): self
    {
        if (!$this->enseignant->contains($enseignant)) {
            $this->enseignant[] = $enseignant;
        }

        return $this;
    }

    public function removeEnseignant(enseignant $enseignant): self
    {
        $this->enseignant->removeElement($enseignant);

        return $this;
    }

    public function getDirecteurdedepart(): ?directeurdedepart
    {
        return $this->directeurdedepart;
    }

    public function setDirecteurdedepart(directeurdedepart $directeurdedepart): self
    {
        $this->directeurdedepart = $directeurdedepart;

        return $this;
    }

    /**
     * @return Collection<int, groupe>
     */
    public function getGroupe(): Collection
    {
        return $this->groupe;
    }

    public function addGroupe(groupe $groupe): self
    {
        if (!$this->groupe->contains($groupe)) {
            $this->groupe[] = $groupe;
            $groupe->setDepartement($this);
        }

        return $this;
    }

    public function removeGroupe(groupe $groupe): self
    {
        if ($this->groupe->removeElement($groupe)) {
            // set the owning side to null (unless already changed)
            if ($groupe->getDepartement() === $this) {
                $groupe->setDepartement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, matiere>
     */
    public function getMatiere(): Collection
    {
        return $this->matiere;
    }

    public function addMatiere(matiere $matiere): self
    {
        if (!$this->matiere->contains($matiere)) {
            $this->matiere[] = $matiere;
            $matiere->setDepartement($this);
        }

        return $this;
    }

    public function removeMatiere(matiere $matiere): self
    {
        if ($this->matiere->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getDepartement() === $this) {
                $matiere->setDepartement(null);
            }
        }

        return $this;
    }
}
