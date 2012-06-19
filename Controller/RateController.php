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

namespace CCDNForum\KarmaBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * 
 * @author Reece Fowell <reece@codeconsortium.com> 
 * @version 1.0
 */
class RateController extends ContainerAware
{



	/**
	 *
	 * @access public
	 * @param $board_id
	 * @return RedirectResponse|RenderResponse
	 */
	public function rateAction($post_id)
	{
		//
		//	Invalidate this action / redirect if user should not have access to it
		//
		if ( ! $this->container->get('security.context')->isGranted('ROLE_USER')) {
			throw new AccessDeniedException('You do not have permission to use this resource!');
		}
	
		$user = $this->container->get('security.context')->getToken()->getUser();
	
		$post = $this->container->get('ccdn_forum_forum.post.repository')->findPostForEditing($post_id);
	
		if (( ! $post)
		|| ( ! is_object($post->getTopic()) && $post->getTopic() instanceof Topic)
		|| ( ! is_object($post->getCreatedBy())))
		{
			throw new NotFoundHttpException('No such post exists!');
		}
		
		//
		// You cannot rate yourself.
		//
		if ($post->getCreatedBy()->getId() == $user->getId())
		{
			throw new AccessDeniedException('You cannot rate yourself.');
		}
		
		//
		// Set the form handler options.
		//
		$options = array('post' => $post, 'for_user' => $post->getCreatedBy(), 'by_user' => $user);
	
		$formHandler = $this->container->get('ccdn_forum_karma.post.rate.form.handler')->setDefaultValues($options);
	
		if ($formHandler->process())	
		{	
			$this->container->get('session')->setFlash('notice', $this->container->get('translator')->trans('flash.karma.rate.success', array('%topic_title%' => $post->getTopic()->getTitle(), '%post_id%' => $post->getId()), 'CCDNForumKarmaBundle'));
								
			return new RedirectResponse($this->container->get('router')->generate('cc_forum_topic_show', array('topic_id' => $post->getTopic()->getId() )));
		}
	
		// setup crumb trail.
		$topic = $post->getTopic();
		$board = $topic->getBoard();
		$category = $board->getCategory();
	
		$crumb_trail = $this->container->get('ccdn_component_crumb.trail')
			->add($this->container->get('translator')->trans('crumbs.forum_index', array(), 'CCDNForumForumBundle'), $this->container->get('router')->generate('cc_forum_category_index'), "home")
			->add($category->getName(), $this->container->get('router')->generate('cc_forum_category_show', array('category_id' => $category->getId())), "category")
			->add($board->getName(), $this->container->get('router')->generate('cc_forum_board_show', array('board_id' => $board->getId())), "board")
			->add($topic->getTitle(), $this->container->get('router')->generate('cc_forum_topic_show', array('topic_id' => $topic->getId())), "topic")
			->add($this->container->get('translator')->trans('crumbs.karma.rate', array('%post_id%' => $post->getId()), 'CCDNForumKarmaBundle'), $this->container->get('router')->generate('cc_forum_karma_rate', array('post_id' => $post->getId())), "karma");

		return $this->container->get('templating')->renderResponse('CCDNForumKarmaBundle:Rate:rate.html.' . $this->getEngine(), array(
			'user_profile_route' => $this->container->getParameter('ccdn_forum_forum.user.profile_route'),
			'user' => $user,
			'crumbs' => $crumb_trail,
			'form' => $formHandler->getForm()->createView(),
			'post' => $post,
		));
	}
	
	
	
	/**
	 *
	 * @access protected
	 * @return string
	 */
	protected function getEngine()
    {
        return $this->container->getParameter('ccdn_forum_karma.template.engine');
    }

}
