<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RequestPeople
 *
 * @ORM\Table(name="request_people", indexes={@ORM\Index(name="idx_request_people__request_category", columns={"request_category"})})
 * @ORM\Entity
 */
class RequestPeople
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="request_people_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=false)
     */
    private $text;

    /**
     * @var \RequestCategory
     *
     * @ORM\ManyToOne(targetEntity="RequestCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="request_category", referencedColumnName="id")
     * })
     */
    private $requestCategory;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return RequestPeople
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set requestCategory
     *
     * @param \AppBundle\Entity\RequestCategory $requestCategory
     * @return RequestPeople
     */
    public function setRequestCategory(\AppBundle\Entity\RequestCategory $requestCategory = null)
    {
        $this->requestCategory = $requestCategory;

        return $this;
    }

    /**
     * Get requestCategory
     *
     * @return \AppBundle\Entity\RequestCategory 
     */
    public function getRequestCategory()
    {
        return $this->requestCategory;
    }
}
