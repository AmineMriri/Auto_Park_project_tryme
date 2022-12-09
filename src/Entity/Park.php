<?php

namespace App\Entity;

use App\Repository\ParkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParkRepository::class)
 */
class Park
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbr_etage;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_jour;

    /**
     * @ORM\Column(type="float")
     */
    private $prix_nuit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getNbrEtage(): ?int
    {
        return $this->nbr_etage;
    }

    public function setNbrEtage(int $nbr_etage): self
    {
        $this->nbr_etage = $nbr_etage;

        return $this;
    }

    public function getPrixJour(): ?float
    {
        return $this->prix_jour;
    }

    public function setPrixJour(float $prix_jour): self
    {
        $this->prix_jour = $prix_jour;

        return $this;
    }

    public function getPrixNuit(): ?float
    {
        return $this->prix_nuit;
    }

    public function setPrixNuit(float $prix_nuit): self
    {
        $this->prix_nuit = $prix_nuit;

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getAdresse();
    }
}
