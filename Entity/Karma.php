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

use CCDNForum\ForumBundle\Entity\Post;

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
     * @var UserInterface $ratingForUser
     */
    protected $ratingForUser;

    /**
     * @var UserInterface $ratingByUser
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
     * @param \Datetime $postedDate
     */
    public function setPostedDate($postedDate)
    {
        $this->postedDate = $postedDate;
    }

    /**
     * Get postedDate
     *
     * @return \Datetime
     */
    public function getPostedDate()
    {
        return $this->postedDate;
    }

    /**
     * Set comment
     *
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get comment
     *
     * @return string
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
     * @param Post $post
     */
    public function setPost(Post $post = null)
    {
        $this->post = $post;
    }

    /**
     * Get post
     *
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set ratingForUser
     *
     * @param UserInterface $ratingForUser
     */
    public function setRatingForUser(UserInterface $ratingForUser = null)
    {
        $this->ratingForUser = $ratingForUser;
    }

    /**
     * Get ratingForUser
     *
     * @return UserInterface
     */
    public function getRatingForUser()
    {
        return $this->ratingForUser;
    }

    /**
     * Set postedBy
     *
     * @param UserInterface $postedBy
     */
    public function setPostedBy(UserInterface $postedBy = null)
    {
        $this->postedBy = $postedBy;
    }

    /**
     * Get postedBy
     *
     * @return UserInterface
     */
    public function getPostedBy()
    {
        return $this->postedBy;
    }

    /**
     * Set ratingByUser
     *
     * @param UserInterface $ratingByUser
     */
    public function setRatingByUser(UserInterface $ratingByUser = null)
    {
        $this->ratingByUser = $ratingByUser;
    }

    /**
     * Get ratingByUser
     *
     * @return UserInterface
     */
    public function getRatingByUser()
    {
        return $this->ratingByUser;
    }
}
