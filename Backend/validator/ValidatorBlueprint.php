<?php

/**
 * An inteface for the validator classes
 */
interface ValidatorBlueprint{
    function next(ValidatorBlueprint $toAll): ValidatorBlueprint;
    function validate($userDetails): ?string;
}
/* An abstract class implementing the methods (contracts) in the ValidatorBlueprint interface */
abstract class Validator implements ValidatorBlueprint{
    private $nextValidatorBlueprint;
    /**
     * This method helps creates a chain of continuety by taking
     * a the next class to be connected and returning such class to the
     * required class.
     *
     * @param ValidatorBlueprint $validatorBlueprint
     * @return mixed
     */
    function next(ValidatorBlueprint $validatorBlueprint): ValidatorBlueprint{
        $this->nextValidatorBlueprint = $validatorBlueprint;
        return $this->nextValidatorBlueprint;
    }

    /**
     * The immediate method below takes an array input containing user's emial,
     * passord, and name, and might returns string incase of any error.
     *
     * @param mixed $userDetails
     * @return mixed
     */
    function validate($userDetails): ?string{
        if($this->nextValidatorBlueprint){
            return $this->nextValidatorBlueprint->validate($userDetails);
        }
        return null;
    }
}
?>