<?php

namespace App\EventSubscriber;


use App\Entity\ClothCategory;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\Security;

class EventSubscriber implements EventSubscriberInterface
{
    private $mailer;
    
    public function __construct(Security $security,MailerInterface $mailer)
    {
        $this->security = $security;
        $this->mailer = $mailer;
    } 

    public function sendMail(AfterEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();
        if ($entity instanceof ClothCategory){
            $cat_name=$entity->getCategoryName();
            $cat_Managed_by=(string) $entity->getManagedUnder();
            $email = (new Email())
            ->from('raj116347@gmail.com')
            ->to($cat_Managed_by)
            ->subject('New Category is Created')
            ->text(' You are Assigned to '.$cat_name.' category')
            ->html('<p>You are Assigned to <b>'.$cat_name.'<b> category</p>');
            $this->mailer->send($email);  
          }
    }

    public static function getSubscribedEvents()
    {
        return [
            AfterEntityPersistedEvent::class=>['sendMail'],
            BeforeEntityPersistedEvent::class => ['setClothCategory'],
            BeforeEntityUpdatedEvent::class => ['updateClothCategory'],
        
        ];
    }
    public function setClothCategory(BeforeEntityPersistedEvent $event){
        $entity = $event->getEntityInstance();
        if ($entity instanceof ClothCategory) {
           
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
            
        }
        
        return;
    }

    public function updateClothCategory(BeforeEntityUpdatedEvent $event){
        $entity = $event->getEntityInstance();
        if ($entity instanceof ClothCategory) {
           
            $entity->setUpdatedAt(new \DateTime());
        }
        
        return;
    }
    
}