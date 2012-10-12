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

namespace CCDNForum\KarmaBundle\Manager;

use CCDNForum\KarmaBundle\Manager\ManagerInterface;
use CCDNForum\KarmaBundle\Manager\BaseManager;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class KarmaManager extends BaseManager implements ManagerInterface
{

    /**
     *
     * @access public
     * @param $karma
     * @return $this
     */
    public function insert($karma)
    {
        // insert a new row
        $this->persist($karma)->flush();

        $this->container->get('ccdn_forum_forum.manager.registry')->updateCacheKarmaCountForUser($karma->getRatingForUser());

        return $this;
    }

}
