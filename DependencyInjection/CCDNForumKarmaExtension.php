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

namespace CCDNForum\KarmaBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class CCDNForumKarmaExtension extends Extension
{
	
	
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');


		$container->setParameter('ccdn_forum_karma.template.engine', $config['template']['engine']);
		$container->setParameter('ccdn_forum_karma.user.profile_route', $config['user']['profile_route']);
		
		$this->getSEOSection($container, $config);
		$this->getReviewSection($container, $config);
		$this->getRateSection($container, $config);
    }
	
	
    /**
     * {@inheritDoc}
     */
	public function getAlias()
	{
		return 'ccdn_forum_karma';
	}
	
	
	
	/**
	 *
	 * @access protected
	 * @param $container, $config
	 */
	protected function getSEOSection($container, $config)
	{
	    $container->setParameter('ccdn_forum_karma.seo.title_length', $config['seo']['title_length']);
	}
	
	

	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getReviewSection($container, $config)
	{
		$container->setParameter('ccdn_forum_karma.review.review_all.reviews_per_page', $config['review']['review_all']['reviews_per_page']);
		$container->setParameter('ccdn_forum_karma.review.review_all.topic_title_truncate', $config['review']['review_all']['topic_title_truncate']);
		$container->setParameter('ccdn_forum_karma.review.review_all.layout_template', $config['review']['review_all']['layout_template']);		
		$container->setParameter('ccdn_forum_karma.review.review_all.rating_datetime_format', $config['review']['review_all']['rating_datetime_format']);
	}
	
	

	/**
	 *
	 * @access private
	 * @param $container, $config
	 */
	private function getRateSection($container, $config)
	{
		$container->setParameter('ccdn_forum_karma.rate.rate.layout_template', $config['rate']['rate']['layout_template']);		
		$container->setParameter('ccdn_forum_karma.rate.rate.form_theme', $config['rate']['rate']['form_theme']);
	}
	
}
