<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
class Serie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=11)
     */
    private $nombre;
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $creador;
    /**
     * @ORM\Column(type="string", length=30)
     */
    private $anio;
    /**
     * @ORM\Column(type="integer", length=5)
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getCreador(): ?string
    {
        return $this->creador;
    }

    public function setCreador(string $creador): self
    {
        $this->creador = $creador;

        return $this;
    }

    public function getAnio(): ?string
    {
        return $this->anio;
    }

    public function setAnio(string $anio): self
    {
        $this->anio = $anio;

        return $this;
    }
}
