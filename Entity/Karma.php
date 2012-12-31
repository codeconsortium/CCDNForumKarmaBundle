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
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="CCDNForum\KarmaBundle\Repository\KarmaRepository")
 */
class Karma
{
	
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var Post $post
     */
    protected $post;

    /**
     * @var User $ratingForUser
     */
    protected $ratingForUser;

    /**
     * @var User $ratingByUser
     */
    protected $ratingByUser;

    /**
     * @var \DateTime $postedDate
     */
    protected $postedDate;

    /**
     * @var string $comment
     */
    protected $comment;

    /**
     * @var bool $isPositive
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
     * @param Symfony\Component\Security\Core\User\UserInterface $ratingForUser
     */
    public function setRatingForUser(Symfony\Component\Security\Core\User\UserInterface $ratingForUser = null)
    {
        $this->ratingForUser = $ratingForUser;
    }

    /**
     * Get ratingForUser
     *
     * @return Symfony\Component\Security\Core\User\UserInterface
     */
    public function getRatingForUser()
    {
        return $this->ratingForUser;
    }

    /**
     * Set postedBy
     *
     * @param Symfony\Component\Security\Core\User\UserInterface $postedBy
     */
    public function setPostedBy(Symfony\Component\Security\Core\User\UserInterface $postedBy = null)
    {
        $this->postedBy = $postedBy;
    }

    /**
     * Get postedBy
     *
     * @return Symfony\Component\Security\Core\User\UserInterface
     */
    public function getPostedBy()
    {
        return $this->postedBy;
    }

    /**
     * Set ratingByUser
     *
     * @param Symfony\Component\Security\Core\User\UserInterface $ratingByUser
     */
    public function setRatingByUser(Symfony\Component\Security\Core\User\UserInterface $ratingByUser = null)
    {
        $this->ratingByUser = $ratingByUser;
    }

    /**
     * Get ratingByUser
     *
     * @return Symfony\Component\Security\Core\User\UserInterface
     */
    public function getRatingByUser()
    {
        return $this->ratingByUser;
    }
}