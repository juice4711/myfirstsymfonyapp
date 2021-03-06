<?php
// src/ExclusiveBooks/DemoAppBundle/Validator/Constraints/IsSecurePassword.php
namespace ExclusiveBooks\DemoAppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class IsSecurePassword extends Constraint
{
    public $message = 'The password entered is not secure enough: please include at least 1 uppercase letter, 1 number and 1 special character.';
}
