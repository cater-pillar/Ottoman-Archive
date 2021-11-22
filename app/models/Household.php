<?php

namespace App\Models;

use App\Core\App;

class Household {
    public $location;
    public $id;
    public $number;
    public $member_forname;
    public $member_surname;
    public $member_type;
    public $member_type_en;
    public $notes;
    public $occupations = [];
    public $taxes = [];
    public $lands = [];
    public $real_estates = [];
    public $livestock = [];


    public static function index() {
        return App::get('database')
                ->selectClassAll('App\\Models\\Household');
    }

    public static function show($id) {
        $occupation = App::get('database')
        ->selectClassPerId(
            'App\\Models\\OccupationHousehold', 
            ['id' => $id]
        );

        $tax = App::get('database')
        ->selectClassPerId(
            'App\\Models\\TaxHousehold', 
            ['id' => $id]
        );

        $land = App::get('database')
        ->selectClassPerId(
            'App\\Models\\LandHousehold', 
            ['id' => $id]
        );

        $real_estate = App::get('database')
        ->selectClassPerId(
            'App\\Models\\RealEstateHousehold', 
            ['id' => $id]
        );

        $livestock = App::get('database')
        ->selectClassPerId(
            'App\\Models\\LivestockHousehold', 
            ['id' => $id]
        );

        $household = App::get('database')
        ->selectClassPerId(
            'App\\Models\\Household', 
            ['id' => $id]
        );

        $household = $household[0];
        $household->add($occupation, 'occupations');
        $household->add($tax, 'taxes');
        $household->add($land, 'lands');
        $household->add($real_estate, 'real_estates');
        $household->add($livestock, 'livestock');

        return $household;
    }

    static public function create() {
        return App::get('database')->insert('household', 
        [
            ':fk_location_name_id' =>  $_POST['location'],
            ':member_forname' => $_POST['forname'],
            ':member_surname' => $_POST['surname'],
            ':fk_household_member_type_id' => $_POST['member_type'],
            ':household_number' => $_POST['household_number'],
            ':notes' => $_POST['household_notes']
        ]);
    }

    static public function destroy($id) {
        return App::get('database')->delete('household', 
                                     'household.household_id', 
                                     $id);
    }

    static public function update($arr, $id) {

        try {
            App::get('database')->update(
                $arr,
                'household',
                'household_id',
                $id
            );
        }
        catch(Exception $e) {
            $e->getMessage();
        } 
    }






    static public function select($id) {

        return
            "SELECT 
            location_name.`name` AS `location`, 
            household.`household_id` AS `id`, 
            household.`household_number` AS `number`, 
            household.`member_forname`, 
            household.`member_surname`, 
            household_member_type.`name` AS `member_type`,
            household_member_type.`name_en` AS `member_type_en`,
            household.`notes`
        FROM 
            location_name, 
            household, 
            household_member_type 
        WHERE 
            household.household_id = {$id} 
        AND 
            household.fk_location_name_id = 
            location_name.id 
        AND 
            household.fk_household_member_type_id = 
            household_member_type.id";
        

    }
    
    public function selectAll() {
        return
        "SELECT 
            location_name.`name` AS `location`, 
            household.`household_id` AS `id`, 
            household.`household_number` AS `number`, 
            household.`member_forname`, 
            household.`member_surname`, 
            household_member_type.`name` AS `member_type`,
            household_member_type.`name_en` AS `member_type_en`,
            household.`notes`
        FROM 
            location_name, 
            household, 
            household_member_type 
        WHERE 
            household.fk_location_name_id = 
            location_name.id 
        AND 
            household.fk_household_member_type_id = 
            household_member_type.id
        ORDER BY 
            `location`, `number`";
    }



    public function add($object, $array) {
        $this->$array = $object;
    }

  
    public function income($array) {
        $sum = 0;
        foreach ($this->$array as $item) {
            $sum+= $item->income;
        }
        return $sum;
    }

    public function totalIncome() {
        return $sum = $this->income('occupations')
              +$this->income('lands')
              +$this->income('real_estates')
              +$this->income('livestock');

    }
    
    public function totalTax() {
        $sum = 0;
        foreach ($this->taxes as $tax) {
            $sum+= $tax->amount;
        }
        return $sum;
    }


}