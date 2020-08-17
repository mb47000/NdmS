<?php

namespace App\Subscribers;

use App\Entity\Customer;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class Subscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setCreateDate']
        ];
    }
    
    public function setCreateDate(BeforeEntityPersistedEvent $event)
    {
        
        $entity = $event->getEntityInstance();

        if($entity instanceof Customer) {
            $entity->setCreateDate(new \DateTime());
        }
    }
}