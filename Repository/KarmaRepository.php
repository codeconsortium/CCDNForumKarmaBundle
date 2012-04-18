<?php

namespace CCDNForum\KarmaBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;

/**
 * KarmaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class KarmaRepository extends EntityRepository
{
	
	
	
	/**
	 *
	 * @access public
	 * @param int $topicId
	 */
	public function findKarmaForUserById($userId)
	{
		$query = $this->getEntityManager()
			->createQuery('
				SELECT k FROM CCDNForumKarmaBundle:Karma k
				LEFT JOIN k.posted_by kc
				LEFT JOIN k.for_user kf
				WHERE k.for_user = :id
				ORDER BY k.posted_date DESC')
			->setParameter('id', $userId);

		try {
			return new Pagerfanta(new DoctrineORMAdapter($query));
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        return null;
	    }
	}
	
	
	
	/**
	 *
	 *
	 */
	public function getKarmaCountForUserById($user_id)
	{
		
		$kpQuery = $this->getEntityManager()
			->createQuery('	
				SELECT COUNT(kp.id) AS karmaPositiveCount
				FROM CCDNForumKarmaBundle:Karma kp
				WHERE kp.for_user = :id AND kp.is_positive = TRUE')
			->setParameter('id', $user_id);
			
		$knQuery = $this->getEntityManager()
			->createQuery('
				SELECT COUNT(kn.id) AS karmaNegativeCount
				FROM CCDNForumKarmaBundle:Karma kn
				WHERE kn.for_user = :id AND kn.is_positive = FALSE')
			->setParameter('id', $user_id);
			
			
		try {
	        $kp = $kpQuery->getsingleResult();
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        $kp = null;
	    }

		try {
	        $kn = $knQuery->getsingleResult();
	    } catch (\Doctrine\ORM\NoResultException $e) {
	        $kn = null;
	    }

		return array_merge($kp, $kn);
	
	}
	
}