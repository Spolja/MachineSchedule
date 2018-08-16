<?php
include "TemporalExpression.php";

class Machine {
    private $type;
    private $fuelConsumption;
    private $workTimes = array();
    private $workHours = 0;
    private $workDays = [
        "Monday" => false,
        "Tuesday" => false,
        "Wednesday" => false,
        "Thursday" => false,
        "Friday" => false,
        "Saturday" => false,
        "Sunday" => false
    ];
	
	private $weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
    
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
            $this->workHours = ($temporalExpression->endTime - $temporalExpression->startTime) / 3600;
            //refresh workdays
            $this->workDays[date("l", $temporalExpression->startTime)] = true;
            $this->workDays[date("l", $temporalExpression->endTime)] = true;
        }
        else {
            throw new Exception("addWorkTime() function expects argument of type 'TemporalExpression'");
        }
    }
    
	public function toString(){
		echo "<br>";
		print_r($this);
		echo "</br>";
	}
	
	public function workDaysToString(){
		$returnValue = "";

		$returnValue .= "[Monday]=" . $this->workDays["Monday"] . ";";
		$returnValue .= "[Tuesday]=" . $this->workDays["Tuesday"] . ";";
		$returnValue .= "[Wednesday]=" . $this->workDays["Wednesday"] . ";";
		$returnValue .= "[Thursday]=" . $this->workDays["Thursday"] . ";";
		$returnValue .= "[Friday]=" . $this->workDays["Friday"] . ";";
		$returnValue .= "[Saturday]=" . $this->workDays["Saturday"] . ";";
		$returnValue .= "[Sunday]=" . $this->workDays["Sunday"] . ";";
		
		echo "ETO MEEEE" . $returnValue;
		return $returnValue;
	}
   
	public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }
	
	public function __set($property, $value) {
    if (property_exists($this, $property)) {
      $this->$property = $value;
    }

    return $this;
  }
    
    public function mergeWorkTimes($workTimes) {
        $this->workTimes = array_merge($this->workTimes, $workTimes);
    }
    
    public function mergeWorkDays($workDays) {
        for($i = 0; $i < count($this->workDays) ; ++$i) {
            if($workDays[$this->weekdays[$i]] == true) {
                $this->workDays[$this->weekdays[$i]] = true;
            }
        }
    }
}