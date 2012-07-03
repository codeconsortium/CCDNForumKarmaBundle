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
     * @ORM\JoinColumn(name="fk_post_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $post;

	/**
     * @ORM\ManyToOne(targetEntity="CCDNUser\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="fk_rating_for_user_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $ratingForUser;
		
	/**
     * @ORM\ManyToOne(targetEntity="CCDNUser\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="fk_rating_by_user_id", referencedColumnName="id", onDelete="SET NULL")
	 */
	protected $ratingByUser;

	/**
	 * @ORM\Column(type="datetime", name="posted_date", nullable=true)
	 */
	protected $postedDate;
	
	/**
     * @ORM\Column(type="text", nullable=false)
     */
	protected $comment;

	/**
	 * @ORM\Column(type="boolean", name="is_positive", nullable=false)
	 */
	protected $isPositive = false;
	


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
     * Set postedDate
     *
     * @param datetime $postedDate
     */
    public function setPostedDate($postedDate)
    {
        $this->postedDate = $postedDate;
    }

    /**
     * Get postedDate
     *
     * @return datetime 
     */
    public function getPostedDate()
    {
        return $this->postedDate;
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
     * Set isPositive
     *
     * @param boolean $isPositive
     */
    public function setIsPositive($isPositive)
    {
        $this->isPositive = $isPositive;
    }

    /**
     * Get isPositive
     *
     * @return boolean 
     */
    public function getIsPositive()
    {
        return $this->isPositive;
    }

    /**
     * Set post
     *
     * @param CCDNForum\ForumBundle\Entity\Post $post
     */
    public function setPost(\CCDNForum\ForumBundle\Entity\Post $post = null)
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

    /**
     * Set ratingForUser
     *
     * @param CCDNUser\UserBundle\Entity\User $ratingForUser
     */
    public function setRatingForUser(\CCDNUser\UserBundle\Entity\User $ratingForUser = null)
    {
        $this->ratingForUser = $ratingForUser;
    }

    /**
     * Get ratingForUser
     *
     * @return CCDNUser\UserBundle\Entity\User 
     */
    public function getRatingForUser()
    {
        return $this->ratingForUser;
    }

    /**
     * Set postedBy
     *
     * @param CCDNUser\UserBundle\Entity\User $postedBy
     */
    public function setPostedBy(\CCDNUser\UserBundle\Entity\User $postedBy = null)
    {
        $this->postedBy = $postedBy;
    }

    /**
     * Get postedBy
     *
     * @return CCDNUser\UserBundle\Entity\User 
     */
    public function getPostedBy()
    {
        return $this->postedBy;
    }

    /**
     * Set ratingByUser
     *
     * @param CCDNUser\UserBundle\Entity\User $ratingByUser
     */
    public function setRatingByUser(\CCDNUser\UserBundle\Entity\User $ratingByUser = null)
    {
        $this->ratingByUser = $ratingByUser;
    }

    /**
     * Get ratingByUser
     *
     * @return CCDNUser\UserBundle\Entity\User 
     */
    public function getRatingByUser()
    {
        return $this->ratingByUser;
    }
}