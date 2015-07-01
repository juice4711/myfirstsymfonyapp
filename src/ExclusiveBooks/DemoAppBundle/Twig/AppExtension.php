<?php
namespace ExclusiveBooks\DemoAppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('showstatus', array($this, 'statusFilter')),
        );
    }

    public function statusFilter($status)
    {
        if($status == "A"){return "Active";}
        if($status == "D"){return "De-Activated";}
        return "Unknown";
    }

public function getName()
    {
        return 'app_extension';
    }

}
