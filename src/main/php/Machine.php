<?php
include "TemporalExpression.php";

class Machine {
    private $type;
    private $fuelConsumption;
    private $workTimes = array();
    
    private $workDays = [
        "Monday" => false,
        "Tuesday" => false,
        "Wednesday" => false,
        "Thursday" => false,
        "Friday" => false,
        "Saturday" => false,
        "Sunday" => false
    ];
    
    public function __construct($data) {
        $this->type = $data[2];
        $this->fuelConsumption = $data[3];
        
        $startHour = $data[0];
        $endTime = $data[1];
        
        $temporalExpression = new TemporalExpression($startHour, $endTime);
        $this->addWorkTime($temporalExpression);
    }
    public function addWorkTime($temporalExpression) {
        if(is_a($temporalExpression, "TemporalExpression")){
            array_push($this->workTimes, $temporalExpression);
            
            //refresh workdays
            $this->workDays[date("l", $temporalExpression->startTime)] = true;
            $this->workDays[date("l", $temporalExpression->endTime)] = true;
        }
        else {
            throw new Exception("addWorkTime() function expects argument of type 'TemporalExpression'");
        }
    }
    
    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }
    
    public function mergeWorkTimes($workTimes) {
        $this->workTimes = array_merge($this->workTimes, $workTimes);
    }
    
    public function mergeWorkDays($workDays) {
        for($i = 0; $i < count($this->workDays) ; ++$i) {
            if($workDays[i] == true) {
                $this->workDays[i] = true;
            }
        }
    }
}