<?php

namespace ExclusiveBooks\DemoAppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * SmsAuditRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SmsAuditRepository extends EntityRepository
{
 public function findAllMesg()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p.recipientNumber,p.smsText,p.sendDate,p.sendUser FROM ExclusiveBooksDemoAppBundle:SmsAudit p where p.sendStatus <> :status'
            )
            ->setParameter('status', 'D')
            ->getResult();
    }
}
