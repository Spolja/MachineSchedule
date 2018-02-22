<?php
include "Machine.php";

class ManufacturingFacility { //pogon
    private $name;
    
    /* in machines array key is type of the machine
     machines = 
     * [ "T1": {machine},
        "start T1": {machine}]
     */
    private $machines = array();
    public function __construct($csv) {
        while(($data = fgetcsv($csv, 0, ";")) !== FALSE){
            $machine = new Machine($data);
            
            $this->addMachine($machine);
            print_r($data);
        }
    }
    
    public function addMachine($machine) {
        //if machine alrdy exists, update data of it;
        if(array_key_exists($machine->type, $array)) {
            $updatedMachine = array_keys($this->machines, $machine->type);
            $updatedMachine->merge($machine->workTimes);
            $this->machines[$updatedMachine->type] = $updatedMachine;
        }
        else {
            array_push($this->machines, $machine);
        }
    }
}

