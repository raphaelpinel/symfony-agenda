<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsletterRepository")
 */
class Newsletter
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=96)
     */
    private $subject;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Subscriber")
     */
    private $subscriber;

    public function __construct()
    {
        $this->subscriber = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return Collection|Subscriber[]
     */
    public function getSubscriber(): Collection
    {
        return $this->subscriber;
    }

    public function addSubscriber(Subscriber $subscriber): self
    {
        if (!$this->subscriber->contains($subscriber)) {
            $this->subscriber[] = $subscriber;
        }

        return $this;
    }

    public function removeSubscriber(Subscriber $subscriber): self
    {
        if ($this->subscriber->contains($subscriber)) {
            $this->subscriber->removeElement($subscriber);
        }

        return $this;
    }
}
