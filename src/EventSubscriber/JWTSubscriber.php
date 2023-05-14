<?php

namespace App\EventSubscriber;

use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class JWTSubscriber implements EventSubscriberInterface
{
    public function onLexikJwtAuthenticationOnJwtCreated($event): void
    {
        $data = $event->getData();
        $user = $event->getUser();
        if($user instanceof User) {
            $data['email'] = $user->getEmail();
        }
        // also possible to simplify with
        // $data['usernanme'] = $event->getUser()->getUsername();
        $event->setData($data);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'lexik_jwt_authentication.on_jwt_created' => 'onLexikJwtAuthenticationOnJwtCreated',
        ];
    }
}
