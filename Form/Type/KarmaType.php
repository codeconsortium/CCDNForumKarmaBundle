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

namespace CCDNForum\KarmaBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class KarmaType extends AbstractType
{

	/**
	 *
	 * @access private
	 */
	private $defaults = array();



	/**
	 *
	 * @access private
	 */
	protected $container;
	
	
	
	/**
	 *
	 * @access private
	 */
	protected $doctrine;
	
	
	
	/**
	 *
	 *
	 */
	public function __construct($service_container)
	{
		$this->defaults = array();
		
		$this->container = $service_container;
	}
	
	
	
	/**
	 *
	 * @access public
	 * @param Array() $options
	 */
	public function setDefaultValues(array $defaults = null)
	{
		$this->defaults = array_merge($this->defaults, $defaults);
		
		return $this;
	}
	
	
	
	/**
	 *
	 * @access public
	 * @param FormBuilder $builder, Array() $options
	 */
	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->add('comment', 'textarea');
		$builder->add('is_positive', 'choice', array(
			'choices' => array('1' => 'Positive', '0' => 'Negative'),
			'required' => true,
		));
		
	}

	
	
	/**
	 *
	 * for creating and replying to topics
	 *
	 * @access public
	 * @param Array() $options
	 */
	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'CCDNForum\KarmaBundle\Entity\Kara',
            'empty_data' => new \CCDNForum\KarmaBundle\Entity\Karma(),
			'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'karma_item',
		);
	}



	/**
	 *
	 * @access public
	 * @return string
	 */
	public function getName()
	{
		return 'Karma';
	}
	
}
