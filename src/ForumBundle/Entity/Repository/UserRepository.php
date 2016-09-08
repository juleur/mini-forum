<?php

    namespace ForumBundle\Entity\Repository;

    use Doctrine\ORM\EntityRepository;

    /**
     * UserRepository
     *
     * This class was generated by the Doctrine ORM. Add your own custom
     * repository methods below.
     */
    class UserRepository extends \Doctrine\ORM\EntityRepository
    {
        public function findOnlineUsers()
        {
            $delay = new \DateTime();
            $delay->setTimestamp(strtotime('2 minutes ago'));

            return $this->getEntityManager()
                ->createQuery('SELECT u FROM ForumBundle:User u WHERE u.lastActivityAt > :delay')
                ->setParameter('delay', $delay)
                ->getResult();
        }
    }