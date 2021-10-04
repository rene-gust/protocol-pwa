<?php

namespace App\Entity;

use App\Repository\ProtocolEntryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProtocolEntryRepository::class)
 */
class ProtocolEntry
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
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $disturbanceType;

    /**
     * @ORM\Column(type="time")
     */
    private $startTime;

    /**
     * @ORM\Column(type="time")
     */
    private $endTime;

    /**
     * @ORM\Column(type="string", length=16777215)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=16777215)
     */
    private $witness;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDisturbanceType(): ?string
    {
        return $this->disturbanceType;
    }

    public function setDisturbanceType(string $disturbanceType): self
    {
        $this->disturbanceType = $disturbanceType;

        return $this;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getWitness(): ?string
    {
        return $this->witness;
    }

    public function setWitness(string $witness): self
    {
        $this->witness = $witness;

        return $this;
    }
}
