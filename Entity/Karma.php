<?php

/*
 * This file is part of the CCDNForum KarmaBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/> 
 * 
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\KarmaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="CCDNForum\KarmaBundle\Repository\KarmaRepository")
 * @ORM\Table(name="CC_Forum_Karma")
 */
class Karma
{
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id;

	/**
     * @ORM\ManyToOne(targetEntity="CCDNForum\ForumBundle\Entity\Post", cascade={"persist"})
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $post;
	
	/**
     * @ORM\ManyToOne(targetEntity="CCDNUser\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="for_user_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $for_user;
		
	/**
     * @ORM\ManyToOne(targetEntity="CCDNUser\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="posted_by_user_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $posted_by;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	protected $posted_date;
	
	/**
     * @ORM\Column(type="text")
     */
	protected $comment;

	/**
	 * @ORM\Column(type="boolean")
	 */
	protected $is_positive;
	

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
     * Set posted_date
     *
     * @param datetime $postedDate
     */
    public function setPostedDate($postedDate)
    {
        $this->posted_date = $postedDate;
    }

    /**
     * Get posted_date
     *
     * @return datetime 
     */
    public function getPostedDate()
    {
        return $this->posted_date;
    }

    /**
     * Set comment
     *
     * @param text $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return text 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set is_positive
     *
     * @param boolean $isPositive
     */
    public function setIsPositive($isPositive)
    {
        $this->is_positive = $isPositive;
    }

    /**
     * Get is_positive
     *
     * @return boolean 
     */
    public function getIsPositive()
    {
        return $this->is_positive;
    }

    /**
     * Set for_user
     *
     * @param CCDNUser\UserBundle\Entity\User $forUser
     */
    public function setForUser(\CCDNUser\UserBundle\Entity\User $forUser)
    {
        $this->for_user = $forUser;
    }

    /**
     * Get for_user
     *
     * @return CCDNUser\UserBundle\Entity\User 
     */
    public function getForUser()
    {
        return $this->for_user;
    }

    /**
     * Set posted_by
     *
     * @param CCDNUser\UserBundle\Entity\User $postedBy
     */
    public function setPostedBy(\CCDNUser\UserBundle\Entity\User $postedBy)
    {
        $this->posted_by = $postedBy;
    }

    /**
     * Get posted_by
     *
     * @return CCDNUser\UserBundle\Entity\User 
     */
    public function getPostedBy()
    {
        return $this->posted_by;
    }

    /**
     * Set post
     *
     * @param CCDNForum\ForumBundle\Entity\Post $post
     */
    public function setPost(\CCDNForum\ForumBundle\Entity\Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get post
     *
     * @return CCDNForum\ForumBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }
}