<?php
namespace ExclusiveBooks\DemoAppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class IsSecurePasswordValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
	if (!preg_match('/[A-Z]/', $value, $matches)) {
  	$this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
      
        }
        else if (!preg_match('/[0-9]/', $value, $matches)) {
            // If you're using the new 2.5 validation API (you probably are!)
            $this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
      
        }
        else if (!preg_match('/[\!\#\_\@\~\.]/', $value, $matches)) {
  	$this->context->buildViolation($constraint->message)
                ->setParameter('%string%', $value)
                ->addViolation();
      
        }
    }
}
