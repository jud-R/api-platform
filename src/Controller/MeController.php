<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Security\Core\Security;

class MeController {

    public function __construct(private Security $security)
    {
        
    }

    public function __invoke()
    {
        return $this->security->getUser();
    }
}
