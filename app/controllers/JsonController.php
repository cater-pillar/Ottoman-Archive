<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\{Household,
                LandHousehold,
                LivestockHousehold,
                OccupationHousehold,
                RealEstateHousehold,
                TaxHousehold,
                Location,
                HouseholdMember,
                Occupation,
                Tax,
                Land,
                RealEstate,
                Livestock
            };


class JsonController {

    public function occupationIndex() {
        echo json_encode(Occupation::index());
    }
        public function occupationTop() {
            echo json_encode(Occupation::getTop());
        }
        public function occupationBottom() {
            echo json_encode(Occupation::getBottom());
        }

    public function occupationShow() {
        echo json_encode(Occupation::show($_GET['id']));
    }
    public function locationIndex() {
        echo json_encode(Location::index());
    }
    public function locationShow() {
        echo json_encode(Location::show($_GET['id']));
    }
    public function locationCity() {
        echo json_encode(Location::getCityAreas($_GET['city']));
    }
    

    public function taxIndex() {
        echo json_encode(Tax::index());
    }

    public function taxShow() {
        echo json_encode(Tax::show($_GET['id']));
    }
    
    public function landIndex() {
        echo json_encode(Land::index());
    }

    public function landShow() {
        echo json_encode(Land::show($_GET['id']));
    }

    public function realestateIndex() {
        echo json_encode(RealEstate::index());
    }

    public function realestateShow() {
        echo json_encode(RealEstate::show($_GET['id']));
    }

    public function livestockIndex() {
        echo json_encode(Livestock::index());
    }

    public function livestockShow() {
        echo json_encode(Livestock::show($_GET['id']));
    }

    public function householdIndex() {
        echo json_encode(Household::index());
    }
    public function householdShow() {
        echo json_encode(Household::show($_GET['id']));
    }
}