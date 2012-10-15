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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class ReviewController extends ContainerAware
{

    /**
     *
     *
     * @access public
     * @param  int $page
     * @return RedirectResponse|RenderResponse
     */
    public function showAction($page)
    {
        if ( ! $this->container->get('security.context')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException('You do not have access to this section.');
        }

        $user = $this->container->get('security.context')->getToken()->getUser();

        $karmaPager = $this->container->get('ccdn_forum_karma.repository.karma')->findKarmaForUserById($user->getId());

        $karmaPerPage = $this->container->getParameter('ccdn_forum_karma.review.review_all.reviews_per_page');
        $karmaPager->setMaxPerPage($karmaPerPage);
        $karmaPager->setCurrentPage($page, false, true);

        //
        // Get registry for user
        //
        $registries = $this->container->get('ccdn_forum_forum.manager.registry')->getRegistriesForUsersAsArray(array($user->getId()));

        // setup crumb trail.
        $crumbs = $this->container->get('ccdn_component_crumb.trail')
            ->add($this->container->get('translator')->trans('ccdn_forum_karma.crumbs.karma.review', array(), 'CCDNForumKarmaBundle'), $this->container->get('router')->generate('ccdn_forum_karma_show_all'), "home");

        return $this->container->get('templating')->renderResponse('CCDNForumKarmaBundle:Review:show.html.' . $this->getEngine(), array(
            'user_profile_route' => $this->container->getParameter('ccdn_forum_karma.user.profile_route'),
            'user' => $user,
            'crumbs' => $crumbs,
            'pager' => $karmaPager,
            'registries' => $registries,
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
