<?php
namespace ExclusiveBooks\DemoAppBundle\Services;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class CustomMd5PasswordEncoder implements PasswordEncoderInterface
{
    public function __construct() {
    }

    public function encodePassword($raw, $salt) {
        return "{SSHA}" . base64_encode(pack("H*", sha1($raw . $salt)) . $salt);
    }

    public function isPasswordValid($encoded, $raw, $salt) {

	$ohash = base64_decode(substr($encoded, 6));
        $osalt = substr($ohash, 20);
        $ohash = substr($ohash, 0, 20);
        $nhash = pack("H*", sha1($raw . $osalt));
        return $ohash == $nhash;
    }
}
