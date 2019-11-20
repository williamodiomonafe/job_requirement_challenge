<?php

/**
 * Class User
 *
 * User class which holds items the user has matched requirements
 *
 * @author William-Sear O. Odiomonafe
 * @email william.odiomonafe@gmail.com
 */
class User {

    /**
     * @var array $items_owned
     */
    public $items_owned = [];

    /**
     * @var array $compulsory_requirements_found
     */
    private $compulsory_requirements_found = [];

    /**
     * @var array $optional_requirements_found
     */
    private $optional_requirements_found = [];

    /**
     * @var $statement
     */
    public $statement;


    /**
     * Accepts Company object as
     * @param $company
     * @return string
     */
    public function check_work_status($company) {
        // look through each item owned by user
        foreach($this->items_owned AS $owned) {
            // if user item is one of company's compulsory requirement,
            // add to found compulsory items array
            if(in_array($owned, $company->compulsory_requirements)) {
                $this->compulsory_requirements_found[] = $owned;
            }

            // if user item is one of company's optional requirement,
            // add to found optional items array
            if(in_array($owned, $company->optional_requirements)) {
                $this->optional_requirements_found[] = $owned;
            }
        }

        // checks if company doesn't have any requirement at all (either compulsory or optional)
        if(!count($company->compulsory_requirements) && !count($company->optional_requirements)) {
            $this->statement = "Company " . $company->name . " doesn't have any requirement ";
        } else {
        // else if company has any requirement, join them together to form statement
            $this->statement = "Company " . $company->name . " requires a ";
            $this->statement .= implode(' and ', $company->compulsory_requirements);

            count($company->compulsory_requirements) > 0 ? $this->statement .= ' and ' : '';

            $this->statement .= implode(' or a ', $company->optional_requirements);
            $this->statement .= " and Applicant has " . implode(" and ", $this->items_owned);
        }

        if(!count($company->compulsory_requirements) && !count($company->optional_requirements)) {
            // If company doesn't have any requirements, then applicant can work
            $this->statement .= ". Thus, <strong>Applicant can work!</strong>";
        } elseif (count($this->compulsory_requirements_found) > 0 && count($this->optional_requirements_found) > 0) {
            // If company has requirements and user items matches the requirements, then applicant can work
            $this->statement .= ". Thus, <strong>Applicant can work!</strong>";
        } elseif (!count($this->compulsory_requirements_found) > 0) {
            // If company has requirements and user items does not matches the requirements, then applicant cannot work
            $this->statement .= ". Ooops!<strong> Applicant cannot work!</strong>";
        }

        return $this->statement;
    }
}
