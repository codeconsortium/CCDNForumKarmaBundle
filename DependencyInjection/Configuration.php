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

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 *
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class Configuration implements ConfigurationInterface
{
	
	
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ccdn_forum_karma');

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.
		$rootNode
			->children()
				->arrayNode('user')
					->children()
						->scalarNode('profile_route')->defaultValue('cc_profile_show_by_id')->end()
					->end()
				->end()
				->arrayNode('template')
					->children()
						->scalarNode('engine')->defaultValue('twig')->end()
					->end()
				->end()
			->end();
			
		$this->addReviewSection($rootNode);
		$this->addRateSection($rootNode);
		
        return $treeBuilder;
    }


	/**
	 *
	 * @access private
	 * @param ArrayNodeDefinition $node
	 */
	private function addReviewSection(ArrayNodeDefinition $node)
	{
		$node
			->children()
				->arrayNode('review')
					->addDefaultsIfNotSet()
					->canBeUnset()
					->children()
						->arrayNode('review_all')
							->addDefaultsIfNotSet()
							->children()
								->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
								->scalarNode('reviews_per_page')->defaultValue('40')->end()
								->scalarNode('topic_title_truncate')->defaultValue('70')->end()
								->scalarNode('rating_datetime_format')->defaultValue('d-m-Y - H:i')->end()
							->end()
						->end()
					->end()
				->end()
			->end();
	}



	/**
	 *
	 * @access private
	 * @param ArrayNodeDefinition $node
	 */
	private function addRateSection(ArrayNodeDefinition $node)
	{
		$node
			->children()
				->arrayNode('rate')
					->addDefaultsIfNotSet()
					->canBeUnset()
					->children()
						->arrayNode('rate')
							->addDefaultsIfNotSet()
							->children()
								->scalarNode('layout_template')->defaultValue('CCDNComponentCommonBundle:Layout:layout_body_left.html.twig')->end()
								->scalarNode('form_theme')->defaultValue('CCDNForumKarmaBundle:Form:fields.html.twig')->end()
							->end()
						->end()
					->end()
				->end()
			->end();
	}
	
}
