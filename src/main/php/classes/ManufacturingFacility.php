<?php
include "Machine.php";

class ManufacturingFacility { //pogon
    private $name;
    
    /* in "machines" array key is type of the machine
     machines = 
     * [ "T1": {machine},
        "start T1": {machine}]
     */
    public $machines = array();

    public function __construct($csv) {

        fgetcsv($csv, 0, ";");
        while(($data = fgetcsv($csv, 0, ";")) !== FALSE){
            $machine = new Machine($data);
            $this->addMachine($machine);
        }
    }
    
    public function addMachine($machine) {
        //if machine alrdy exists, update data of it;
		$machineExists = false;
		$updatedMachine = null;
		foreach ($this->machines as &$machineObject) {
			if($machine->type === $machineObject->type){
				$updatedMachine=$machineObject;
				$machineExists = true;
			}
		}
		
        if($machineExists) {
            $updatedMachine->mergeWorkTimes($machine->workTimes);
			$updatedMachine->mergeWorkDays($machine->workDays);
			$updatedMachine->workHours += $machine->workHours;
			
            $this->machines[$updatedMachine->type] = $updatedMachine;
        }
        else {
            $this->machines[$machine->type] = $machine;
        }
    }
}

