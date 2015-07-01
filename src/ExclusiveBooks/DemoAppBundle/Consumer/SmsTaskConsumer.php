<?php

//src/ExclusiveBooks/DemoAppBundle/Consumer/SmsTaskConsumer.php

namespace ExclusiveBooks\DemoAppBundle\Consumer;

use Doctrine\ORM\EntityManager;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;
use ExclusiveBooks\DemoAppBundle\Entity\SmsAudit;
use ExclusiveBooks\DemoAppBundle\Entity\SmsNotification;

class SmsTaskConsumer implements ConsumerInterface
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function execute(AMQPMessage $msg)
    {
      
	$data = unserialize($msg->body);
	$entity = new SmsNotification($data["mesg"]);
        $entity->sendSmsNotification();
	$em = $this->em;

	$entity2 = $em->getRepository('ExclusiveBooksDemoAppBundle:SmsAudit')
        ->find($entity->GetId());

	if (!$entity2) {
		//manage error
	    }
	$entity2->setSendStatus($entity->getMesgStatus());
	$entity2->setSendResult($entity->getMesgResult());
	$entity2->setSendUser("RabbitMqBundle");
        $em->flush();


    }

	
}
