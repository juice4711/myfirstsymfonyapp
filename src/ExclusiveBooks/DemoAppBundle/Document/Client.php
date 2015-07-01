<?php

// src/ExclusiveBooks/DemoAppBundle/Document/Client.php

namespace ExclusiveBooks/DemoAppBundle\Document;

use FOS\OAuthServerBundle\Document\Client as BaseClient;

class Client extends BaseClient 
{
    protected $id;

}
