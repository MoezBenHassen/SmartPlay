<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date_cde;

    /**
     * @ORM\Column(type="time")
     */
    private $heure_cde;

    /**
     * @ORM\Column(type="integer")
     */
    private $remise_cde;

    /**
     * @ORM\Column(type="float")
     */
    private $mnt_cde;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $code_clt_cde;

    /**
     * @ORM\OneToMany(targetEntity=LigneCde::class, mappedBy="num_cde_ligne", orphanRemoval=true)
     */
    private $code_jouet_ligne;

    public function __construct()
    {
        $this->code_jouet_ligne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCde(): ?\DateTimeInterface
    {
        return $this->date_cde;
    }

    public function setDateCde(\DateTimeInterface $date_cde): self
    {
        $this->date_cde = $date_cde;

        return $this;
    }

    public function getHeureCde(): ?\DateTimeInterface
    {
        return $this->heure_cde;
    }

    public function setHeureCde(\DateTimeInterface $heure_cde): self
    {
        $this->heure_cde = $heure_cde;

        return $this;
    }

    public function getRemiseCde(): ?int
    {
        return $this->remise_cde;
    }

    public function setRemiseCde(int $remise_cde): self
    {
        $this->remise_cde = $remise_cde;

        return $this;
    }

    public function getMntCde(): ?float
    {
        return $this->mnt_cde;
    }

    public function setMntCde(float $mnt_cde): self
    {
        $this->mnt_cde = $mnt_cde;

        return $this;
    }

    public function getCodeCltCde(): ?Client
    {
        return $this->code_clt_cde;
    }

    public function setCodeCltCde(?Client $code_clt_cde): self
    {
        $this->code_clt_cde = $code_clt_cde;

        return $this;
    }

    /**
     * @return Collection|LigneCde[]
     */
    public function getCodeJouetLigne(): Collection
    {
        return $this->code_jouet_ligne;
    }

    public function addCodeJouetLigne(LigneCde $codeJouetLigne): self
    {
        if (!$this->code_jouet_ligne->contains($codeJouetLigne)) {
            $this->code_jouet_ligne[] = $codeJouetLigne;
            $codeJouetLigne->setNumCdeLigne($this);
        }

        return $this;
    }

    public function removeCodeJouetLigne(LigneCde $codeJouetLigne): self
    {
        if ($this->code_jouet_ligne->removeElement($codeJouetLigne)) {
            // set the owning side to null (unless already changed)
            if ($codeJouetLigne->getNumCdeLigne() === $this) {
                $codeJouetLigne->setNumCdeLigne(null);
            }
        }

        return $this;
    }
}
