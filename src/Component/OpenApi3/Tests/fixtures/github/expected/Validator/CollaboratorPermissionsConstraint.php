<?php

namespace Github\Validator;

class CollaboratorPermissionsConstraint extends \Symfony\Component\Validator\Constraints\Compound
{
    protected function getConstraints($options) : array
    {
        return array(new \Symfony\Component\Validator\Constraints\Count(array('min' => 0, 'minMessage' => 'This array has not enough properties. It should have {{ limit }} properties or more.')), new \Symfony\Component\Validator\Constraints\NotNull(array('message' => 'This value should not be null.')), new \Symfony\Component\Validator\Constraints\Collection(array('fields' => array('pull' => new \Symfony\Component\Validator\Constraints\Required(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'bool')), new \Symfony\Component\Validator\Constraints\NotNull(array('message' => 'This value should not be null.')))), 'push' => new \Symfony\Component\Validator\Constraints\Required(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'bool')), new \Symfony\Component\Validator\Constraints\NotNull(array('message' => 'This value should not be null.')))), 'admin' => new \Symfony\Component\Validator\Constraints\Required(array(new \Symfony\Component\Validator\Constraints\Type(array('0' => 'bool')), new \Symfony\Component\Validator\Constraints\NotNull(array('message' => 'This value should not be null.'))))), 'allowExtraFields' => true)));
    }
}