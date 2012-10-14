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

namespace CCDNForum\KarmaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class CCDNForumKarmaBundle extends Bundle
{
	
	/**
	 *
	 * @access public
	 */
	public function boot()
	{
		$twig = $this->container->get('twig');	
		$twig->addGlobal('ccdn_forum_karma', array(
			'seo' => array(
				'title_length' => $this->container->getParameter('ccdn_forum_karma.seo.title_length'),
			),
			'rate' => array(
				'rate' => array(
					'layout_template' => $this->container->getParameter('ccdn_forum_karma.rate.rate.layout_template'),
					'form_theme' => $this->container->getParameter('ccdn_forum_karma.rate.rate.form_theme'),
					'enable_bb_editor' => $this->container->getParameter('ccdn_forum_karma.rate.rate.enable_bb_editor'),
				),
			),
			'review' => array(
				'review_all' => array(
					'layout_template' => $this->container->getParameter('ccdn_forum_karma.review.review_all.layout_template'),
					'topic_title_truncate' => $this->container->getParameter('ccdn_forum_karma.review.review_all.topic_title_truncate'),
					'rating_datetime_format' => $this->container->getParameter('ccdn_forum_karma.review.review_all.rating_datetime_format'),
					'enable_bb_parser' => $this->container->getParameter('ccdn_forum_karma.review.review_all.enable_bb_parser'),
				),
			),
			
		));
	}
	
}
