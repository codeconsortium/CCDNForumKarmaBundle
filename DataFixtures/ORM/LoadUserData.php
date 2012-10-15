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

namespace CCDNForum\KarmaBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use CCDNForum\KarmaBundle\Entity\Karma;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

	/**
	 *
	 * @access public
	 * @param ObjectManager $manager
	 */
    public function load(ObjectManager $manager)
    {
	
		$karma = new Karma();
		
	    $karma->setPost($manager->merge($this->getReference('forum-post')));
	    $karma->setRatingForUser($manager->merge($this->getReference('user-admin')));
	    $karma->setRatingByUser($manager->merge($this->getReference('user-test')));
	    $karma->setPostedDate(new \DateTime());
	    $karma->setComment('Informative post. Thumbs up!');
	    $karma->setIsPositive(true);

		$manager->persist($karma);
		$manager->flush();		
    }

	/**
	 *
	 * @access public
	 * @return int
	 */
	public function getOrder()
	{
		return 5;
	}
	
}
