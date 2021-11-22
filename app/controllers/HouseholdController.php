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


class HouseholdsController {

    public function index() {

        $households = Household::index();
        return view('householdlist', 
                    ['households' => $households]);
    }

    public function new() {

        $locations = Location::index();
        $member_types = HouseholdMember::index();
        return view('inputform', 
                    ['locations' => $locations,
                     'member_types' => $member_types]);
    } 

    public function create() {
        
        /* HOUSEHOLD */
        Household::create();

        $last_id = App::get('database')->lastId();

        /* OCCUPATIONS */
        $i_occ = 1;
        while (isset($_POST['occupation'. $i_occ])) {

            OccupationHousehold::create($_POST['occupation'. $i_occ],
                               $_POST['occupation_income'. $i_occ],
                               $last_id,
                               $_POST['occupation_type'. $i_occ]);
            $i_occ++;
        }

        /* TAXES */
        $i_tax = 1;
        while (isset($_POST['taxes'. $i_tax])) {

                TaxHousehold::create($_POST['taxes'. $i_tax],
                            $_POST['tax_amount'. $i_tax],
                            $last_id);
            $i_tax++;
        }

        /* LAND */
        $i_land = 1;
        while (isset($_POST['land_type'. $i_land])) {

                LandHousehold::create($_POST['land_type'. $i_land],
                             $_POST['land_area'. $i_land],
                             $_POST['land_income'. $i_land],
                             $_POST['land_rent'. $i_land],
                             $_POST['land_location'. $i_land],
                             $_POST['land_description'. $i_land],
                             $last_id);
            $i_land++;
        }

        /* REAL ESTATE */
        $i_estate = 1;
        while (isset($_POST['real_estate'. $i_estate])) {

                RealEstateHousehold::create($_POST['real_estate'. $i_estate],
                                   $_POST['real_estate_quantity'. $i_estate],
                                   $_POST['real_estate_income'. $i_estate],
                                   $_POST['real_estate_location'. $i_estate],
                                   $_POST['real_estate_description'. $i_estate],
                                   $last_id);
            $i_estate++;
        }

        /* LIVESTOCK */
        $i_livestock = 1;
        while (isset($_POST['livestock'. $i_livestock])) {

                LivestockHousehold::create($_POST['livestock'. $i_livestock],
                                  $_POST['livestock_quantity'. $i_livestock],
                                  $_POST['livestock_income'. $i_livestock],
                                  $last_id);
            $i_livestock++;
        }

        redirect('household?id='.$last_id);

    }

    public function show() {
        
        $household = Household::show($_GET['id']);

        $ids = App::get('database')->selectColumns('household_id', 'household');

        $current_id_index = array_search($_GET['id'], $ids);
        
        return view('household', 
                    compact('household', 'ids', 'current_id_index'));
    }

    public function edit() {

        $locations = Location::index();
        $member_types = HouseholdMember::index();
        $occupations = Occupation::index();
        $taxes = Tax::index();
        $lands = Land::index();
        $realestates = RealEstate::index();
        $livestocks = Livestock::index();

        $household = Household::show($_GET['id']);
        
        return view('edit', 
                    compact('household', 'locations', 'member_types',
                'occupations', 'taxes', 'lands', 'realestates', 'livestocks'));
    }

    public function update() {

        $household_id = $_GET['id'];

        /* HOUSEHOLD */
        $householdData = [
            'member_forname' => $_POST['forname'],
            'member_surname' => $_POST['surname'],
            'household_number' => $_POST['household_number']];

        if (isset($_POST['location'])) {
            $householdData['fk_location_name_id'] = 
            $_POST['location'];
        }

        if (isset($_POST['member_type'])) {
            $householdData['fk_household_member_type_id'] = 
            $_POST['member_type'];
        }

        if (isset($_POST['household_notes'])) {
            $householdData['notes'] = 
            $_POST['household_notes'];
        }


        Household::update($householdData, $household_id);
      

 
        /* OCCUPATION */
       $occupation_ids = App::get('database')
       ->getId(OccupationHousehold::getId(), $household_id);
       $i_occ = 1;
       
       foreach ($occupation_ids as $occ) {

        $occupationData= [
            'income' => $_POST['occupation_income'.$i_occ]
           ];

        if (isset($_POST['occupation'.$i_occ])) {
            $occupationData['fk_occupation_id'] = 
            $_POST['occupation'.$i_occ];
           }
           
           OccupationHousehold::update($occupationData, 
                                        $occ->id);
        $i_occ++;
       }

       /* TAXES */
       $tax_ids = App::get('database')
       ->getId(TaxHousehold::getId(), $household_id);
       $i_tax = 1;
       foreach ($tax_ids as $tax) {

        $taxData= [
            'amount' => $_POST['tax_amount'.$i_tax]
           ];

        if (isset($_POST['tax_type'.$i_tax])) {
            $taxData['fk_tax_id'] = 
            $_POST['tax_type'.$i_tax];
           }

           TaxHousehold::update($taxData, $tax->id);
        $i_tax++;
       }

       /* LANDS */
       $land_ids = App::get('database')
       ->getId(LandHousehold::getId(), $household_id);
       $i_land = 1;
       foreach ($land_ids as $land) {

        $landData= [
            'area' => $_POST['land_area'.$i_land],
            'income' => $_POST['land_income'.$i_land],
            'payed_rent' => $_POST['land_rent'.$i_land],
            'location' => trim(
                $_POST['land_location'.$i_land]
                ),
            'description' => trim(
                $_POST['land_description'.$i_land]
                ),
           ];

        if (isset($_POST['land_type'.$i_land])) {
            $landData['fk_land_id'] = 
            $_POST['land_type'.$i_land];
           }

           LandHousehold::update($landData, $land->id);
        $i_land++;
       }

        /* REAL ESTATE */
       $realestate_ids = App::get('database')
       ->getId(RealEstateHousehold::getId(), $household_id);
       $i_estate = 1;
       foreach ($realestate_ids as $estate) {

        $estateData= [
            'quantity' => $_POST['real_estate_quantity'.$i_estate],
            'rent_income' => $_POST['real_estate_income'.$i_estate],
            'location' => trim(
                $_POST['real_estate_location'.$i_estate]
                ),
            'description' => trim(
                $_POST['real_estate_description'.$i_estate]
                ),
           ];

        if (isset($_POST['real_estate_type'.$i_estate])) {
            $estateData['fk_real_estate_id'] = $_POST['real_estate_type'.$i_estate];
           }

           RealEstateHousehold::update($estateData, $estate->id);
        $i_estate++;
       }

       /* LIVESTOCK */
       $livestock_ids = App::get('database')
       ->getId(LivestockHousehold::getId(), $household_id);
       $i_livestock = 1;
       foreach ($livestock_ids as $livestock) {

        $livestockData= [
            'quantity' => $_POST['livestock_quantity'.$i_livestock],
            'income' => $_POST['livestock_income'.$i_livestock]
           ];

        if (isset($_POST['livestock_type'.$i_livestock])) {
            $livestockData['fk_livestock_id'] = 
            $_POST['livestock_type'.$i_livestock];
           }

           LivestockHousehold::update($livestockData, 
                                    $livestock->id);
        $i_livestock++;
       }

        redirect('household?id='.$household_id);
    }
    
    public function destroy() {
        $id = $_GET['id'];
        LandHousehold::destroy($id);
        LivestockHousehold::destroy($id);
        OccupationHousehold::destroy($id);
        RealEstateHousehold::destroy($id);
        TaxHousehold::destroy($id);
        Household::destroy($id);
        redirect('inputform');
    }
}