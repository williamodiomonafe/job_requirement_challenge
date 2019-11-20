<?php

/**
 * Class Company
 * holds company attributes which are it's optional and compulsory requirements
 *
 * @author William-Sear O. Odiomonafe
 * @email william.odiomonafe@gmail.com
 */

class Company
{
    /**
     * @var name
     */
    public $name;

    /**
     * @var optional_requirements
     */
    public $optional_requirements;

    /**
     * @var compulsory_requirements
     */
    public $compulsory_requirements;

    /**
     * Company constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

}