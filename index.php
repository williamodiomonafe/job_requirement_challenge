<?php
    require_once "Company.php";
    require "User.php";

    $companies = [
        [
            "name" => "A",
            "compulsory_requirements" => ["property insurance"],
            "optional_requirements" => ["apartment", "house"],
        ],
        [
            "name" => "B",
            "compulsory_requirements" => ["driver's licence", "car insurance"],
            "optional_requirements" => ["5 door car", "4 door car"],
        ],
        [
            "name" => "C",
            "compulsory_requirements" => ["social security number ", "work permit"],
            "optional_requirements" => [],
        ],
        [
            "name" => "D",
            "compulsory_requirements" => [],
            "optional_requirements" => ["apartment", "flat", "house"],
        ],
        [
            "name" => "E",
            "compulsory_requirements" => ["driver's license"],
            "optional_requirements" => ["2 door car", "3 door car", "5 door car", "4 door car"],
        ],
        [
            "name" => "F",
            "compulsory_requirements" => ["motorcycle", "driver's license", "motorcycle insurance"],
            "optional_requirements" => ["scooter", "bike"],
        ],
        [
            "name" => "G",
            "compulsory_requirements" => ["massage qualification certificate", "liability insurance"],
            "optional_requirements" => [],
        ],
        [
            "name" => "H",
            "compulsory_requirements" => [],
            "optional_requirements" => ["storage place ", "garage"],
        ],
        [
            "name" => "J",
            "compulsory_requirements" => [],
            "optional_requirements" => [],
        ],
        [
            "name" => "K",
            "compulsory_requirements" => ["Paypal Account"],
            "optional_requirements" => [],
        ],
    ];


    foreach($companies AS $comp) {
        $company = new Company($comp['name']);
        $company->compulsory_requirements = $comp['compulsory_requirements'];
        $company->optional_requirements = $comp['optional_requirements'];

        $user = new User();
        $user->items_owned = ["house","property insurance"];
        echo "<p>{$user->check_work_status($company)}</p>";
    }

