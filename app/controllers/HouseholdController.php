<?php

namespace App\Controllers;

use App\Core\App;
use App\Models\{Household, Land, Livestock, Occupation, RealEstate, Tax};


class HouseholdsController {

    protected static function buildHousehold() {
        $occupation = App::get('database')
        ->selectClassPerId(
            'App\\Models\\Occupation', 
            ['id' => $_GET['id']]
        );

        $tax = App::get('database')
        ->selectClassPerId(
            'App\\Models\\Tax', 
            ['id' => $_GET['id']]
        );

        $land = App::get('database')
        ->selectClassPerId(
            'App\\Models\\Land', 
            ['id' => $_GET['id']]
        );

        $real_estate = App::get('database')
        ->selectClassPerId(
            'App\\Models\\RealEstate', 
            ['id' => $_GET['id']]
        );

        $livestock = App::get('database')
        ->selectClassPerId(
            'App\\Models\\Livestock', 
            ['id' => $_GET['id']]
        );

        $household = App::get('database')
        ->selectClassPerId(
            'App\\Models\\Household', 
            ['id' => $_GET['id']]
        );

        $household = $household[0];
        $household->add($occupation, 'occupations');
        $household->add($tax, 'taxes');
        $household->add($land, 'lands');
        $household->add($real_estate, 'real_estates');
        $household->add($livestock, 'livestock');

        return $household;
    }

    public function display()
    {
        
        $household = HouseholdsController::buildHousehold();

        $ids = App::get('database')->selectColumns('household_id', 'household');

        $current_id_index = array_search($_GET['id'], $ids);
        
        return view('household', 
                    compact('household', 'ids', 'current_id_index'));
    }


    public function insert() {
        
        /* HOUSEHOLD */
        App::get('database')->insert('household', 
        [
            ':fk_location_name_id' =>  $_POST['location'],
            ':member_forname' => $_POST['forname'],
            ':member_surname' => $_POST['surname'],
            ':fk_household_member_type_id' => $_POST['member_type'],
            ':household_number' => $_POST['household_number'],
            ':notes' => $_POST['household_notes']
        ]);

       
   
        $last_id = App::get('database')->lastId();

        /* OCCUPATIONS */
        $i_occ = 1;
        while (isset($_POST['occupation'. $i_occ]) &&  
               isset($_POST['occupation_income'. $i_occ]) && 
               isset($_POST['occupation_type'. $i_occ])) {

                App::get('database')->insert('occupation_household', 
                [
                    ':fk_occupation_id' =>  $_POST['occupation'. $i_occ],
                    ':income' => $_POST['occupation_income'. $i_occ],
                    ':fk_household_id' => $last_id,
                    ':type' => $_POST['occupation_type'. $i_occ]
                ]);
            $i_occ++;
        }

        /* TAXES */
        $i_tax = 1;
        while (isset($_POST['taxes'. $i_tax]) &&  
               isset($_POST['tax_amount'. $i_tax])) {

                App::get('database')->insert('tax_household', 
                [
                    ':fk_tax_id' =>  $_POST['taxes'. $i_tax],
                    ':amount' => $_POST['tax_amount'. $i_tax],
                    ':fk_household_id' => $last_id
                ]);
            $i_tax++;
        }

        /* LAND */
        $i_land = 1;
        while (isset($_POST['land_type'. $i_land]) &&  
               isset($_POST['land_area'. $i_land]) && 
               isset($_POST['land_income'. $i_land]) &&  
               isset($_POST['land_rent'. $i_land]) && 
               isset($_POST['land_location'. $i_land]) &&  
               isset($_POST['land_description'. $i_land])) {

                App::get('database')->insert('land_household', 
                [
                    ':fk_land_id' =>  $_POST['land_type'. $i_land],
                    ':area' => $_POST['land_area'. $i_land],
                    ':income' => $_POST['land_income'. $i_land],
                    ':payed_rent' => $_POST['land_rent'. $i_land],
                    ':location' => $_POST['land_location'. $i_land],
                    ':description' => $_POST['land_description'. $i_land],
                    ':fk_household_id' => $last_id
                ]);
            $i_land++;
        }

        /* REAL ESTATE */
        $i_estate = 1;
        while (isset($_POST['real_estate'. $i_estate]) &&  
               isset($_POST['real_estate_quantity'. $i_estate]) && 
               isset($_POST['real_estate_income'. $i_estate]) &&  
               isset($_POST['real_estate_location'. $i_estate]) && 
               isset($_POST['real_estate_description'. $i_estate])) {

                App::get('database')->insert('real_estate_household', 
                [
                    ':fk_real_estate_id' =>  $_POST['real_estate'. $i_estate],
                    ':quantity' => $_POST['real_estate_quantity'. $i_estate],
                    ':rent_income' => $_POST['real_estate_income'. $i_estate],
                    ':location' => $_POST['real_estate_location'. $i_estate],
                    ':description' => $_POST['real_estate_description'. $i_estate],
                    ':fk_household_id' => $last_id
                ]);
            $i_estate++;
        }

        /* LIVESTOCK */
        $i_livestock = 1;
        while (isset($_POST['livestock'. $i_livestock]) &&  
               isset($_POST['livestock_quantity'. $i_livestock]) && 
               isset($_POST['livestock_income'. $i_livestock])) {

                App::get('database')->insert('livestock_household', 
                [
                    ':fk_livestock_id' =>  $_POST['livestock'. $i_livestock],
                    ':quantity' => $_POST['livestock_quantity'. $i_livestock],
                    ':income' => $_POST['livestock_income'. $i_livestock],
                    ':fk_household_id' => $last_id
                ]);
            $i_livestock++;
        }

        redirect('household?id='.$last_id);

    }


    public function edit()
    {
        $locations = App::get('database')->selectAll('location_name', 'name');
        $member_types = App::get('database')->selectAll('household_member_type', 'type');
        $occupations = App::get('database')->selectAll('occupation', 'name');
        $taxes = App::get('database')->selectAll('tax', 'type');
        $lands = App::get('database')->selectAll('land', 'type');
        $realestates = App::get('database')->selectAll('real_estate', 'type');
        $livestocks = App::get('database')->selectAll('livestock', 'type');

        $household = HouseholdsController::buildHousehold();
        
        return view('edit', 
                    compact('household', 'locations', 'member_types',
                'occupations', 'taxes', 'lands', 'realestates', 'livestocks'));
    }

    public function editHousehold() {

        $household_id = $_GET['id'];

        /* HOUSEHOLD */
       if (isset($_POST['location']) ){

        Household::performEdit(
            'fk_location_name_id',
            $_POST['location'],
            $household_id
        );
       }

       
       if (isset($_POST['forname']) ){

        Household::performEdit(
            'member_forname',
            $_POST['forname'],
            $household_id
        );
       }

       if (isset($_POST['surname']) ){

        Household::performEdit(
            'member_surname',
            $_POST['surname'],
            $household_id
        );
       }

       if (isset($_POST['member_type']) ){

        Household::performEdit(
            'fk_household_member_type_id',
            $_POST['member_type'],
            $household_id
        );
       }

       if (isset($_POST['household_number']) ){

        Household::performEdit(
            'household_number',
            $_POST['household_number'],
            $household_id
        );
       }

       if (isset($_POST['household_notes']) ){

        Household::performEdit(
            'notes',
            $_POST['household_notes'],
            $household_id
        );
       }

       /* OCCUPATION */
       $occupation_ids = App::get('database')->getId(Occupation::getId(), $household_id);
       $i_occ = 1;
       foreach ($occupation_ids as $occ) {

        if (isset($_POST['occupation'.$i_occ])) {

            Occupation::performEdit(
                'fk_occupation_id',
                $_POST['occupation'.$i_occ],
                $occ->id
            );
           }

        if (isset($_POST['occupation_income'.$i_occ])) {

            Occupation::performEdit(
                'income',
                $_POST['occupation_income'.$i_occ],
                $occ->id
            );
        }
        $i_occ++;
       }

       /* TAX */
       $tax_ids = App::get('database')->getId(Tax::getId(), $household_id);
       $i_tax = 1;
       foreach ($tax_ids as $tax) {

        if (isset($_POST['tax_type'.$i_tax])) {

            Tax::performEdit(
                'fk_tax_id',
                $_POST['tax_type'.$i_tax],
                $tax->id
            );
           }

        if (isset($_POST['tax_amount'.$i_tax])) {
            
            Tax::performEdit(
                'amount',
                $_POST['tax_amount'.$i_tax],
                $tax->id
            );
        }

        $i_tax++;
       }

       /* LAND */
       $land_ids = App::get('database')->getId(Land::getId(), $household_id);
       $i_land = 1;
       foreach ($land_ids as $land) {

        if (isset($_POST['land_type'.$i_land])) {

            Land::performEdit(
                'fk_land_id',
                $_POST['land_type'.$i_land],
                $land->id
            ); 
           }

        if (isset($_POST['land_area'.$i_land])) {

            Land::performEdit(
                'area',
                $_POST['land_area'.$i_land],
                $land->id
            ); 
        }

        if (isset($_POST['land_income'.$i_land])) {

            Land::performEdit(
                'income',
                $_POST['land_income'.$i_land],
                $land->id
            ); 
        }

        if (isset($_POST['land_rent'.$i_land])) {

            Land::performEdit(
                'payed_rent',
                $_POST['land_rent'.$i_land],
                $land->id
            ); 
        }

        if (isset($_POST['land_location'.$i_land])) {

            Land::performEdit(
                '`location`',
                $_POST['land_location'.$i_land],
                $land->id
            ); 
        }

        if (isset($_POST['land_description'.$i_land])) {

            Land::performEdit(
                '`description`',
                $_POST['land_description'.$i_land],
                $land->id
            );
        }
        $i_land++;
       }

       /* REAL ESTATE */
       $realestate_ids = App::get('database')->getId(RealEstate::getId(), $household_id);
       $i_estate = 1;
       foreach ($realestate_ids as $estate) {

        if (isset($_POST['real_estate_type'.$i_estate])) {

            RealEstate::performEdit(
                'fk_real_estate_id',
                $_POST['real_estate_type'.$i_estate],
                $estate->id
            ); 
           }

        if (isset($_POST['real_estate_quantity'.$i_estate])) {

            RealEstate::performEdit(
                'quantity',
                $_POST['real_estate_quantity'.$i_estate],
                $estate->id
            ); 
        }

        if (isset($_POST['real_estate_income'.$i_estate])) {

            RealEstate::performEdit(
                'rent_income',
                $_POST['real_estate_income'.$i_estate],
                $estate->id
            );
        }

        if (isset($_POST['real_estate_location'.$i_estate])) {

            RealEstate::performEdit(
                '`location`',
                $_POST['real_estate_location'.$i_estate],
                $estate->id
            );
        }

        if (isset($_POST['real_estate_description'.$i_estate])) {

            RealEstate::performEdit(
                '`description`',
                $_POST['real_estate_description'.$i_estate],
                $estate->id
            );
        }
        $i_estate++;
       }


       /* LIVESTOCK */
       $livestock_ids = App::get('database')->getId(Livestock::getId(), $household_id);
       $i_livestock = 1;
       foreach ($livestock_ids as $livestock) {

        if (isset($_POST['livestock_type'.$i_livestock])) {

            Livestock::performEdit(
                    'fk_livestock_id', 
                    $_POST['livestock_type'.$i_livestock], 
                    $livestock->id); 
        }

        if (isset($_POST['livestock_quantity'.$i_livestock])) {

            Livestock::performEdit(
                    'quantity', 
                    $_POST['livestock_quantity'.$i_livestock], 
                    $livestock->id); 
        }

        if (isset($_POST['livestock_income'.$i_livestock])) {

            Livestock::performEdit(
                    'income', 
                    $_POST['livestock_income'.$i_livestock], 
                    $livestock->id);
        }
        $i_livestock++;
       }
      
        redirect('household?id='.$household_id);
    
    }
    
    public function delete()
    { 
            $value = $_GET['id'];
            App::get('database')->delete(
                "land_household", 
                "land_household.fk_household_id", 
                $value);
            App::get('database')->delete('livestock_household', 'livestock_household.fk_household_id', $value);
            App::get('database')->delete('occupation_household', 'occupation_household.fk_household_id', $value);
            App::get('database')->delete('real_estate_household', 'real_estate_household.fk_household_id', $value);
            App::get('database')->delete('tax_household', 'tax_household.fk_household_id', $value);
            App::get('database')->delete('household', 'household.household_id', $value);
            redirect('inputform');
        
    }
}