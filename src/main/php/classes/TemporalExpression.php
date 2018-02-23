<?php
class TemporalExpression {
    private $startTime;
    private $endTime;
    
    public function __construct($startHour, $endTime) {
        $this->endTime = DateTime::createFromFormat('d.m.Y. H:i', $endTime)->getTimestamp();
        $this->startTime = $this->calculateStartTime($startHour);
   }
   
   private function calculateStartTime($startHour){

       $endTimeHour = DateTime::createFromFormat('U', $this->endTime)->format('H:i');
       $endTimeDate = DateTime::createFromFormat('U', $this->endTime)->format('d.m.Y.');
       
       $startTimeHour = $startHour;
       $startTimeDate = new DateTime($endTimeDate);

       
       //TODO: check strtotime format expectation of the hour string, atm it is "18:30", seconds not included
       if(strtotime($endTimeHour) <= strtotime($startTimeHour)){
           $startTimeDate->modify("-1 day");
       }
       
       $startTime = $startTimeDate->format('d.m.Y.') . " " . $startTimeHour;
       $startTime = DateTime::createFromFormat('d.m.Y. H:i', $startTime)->getTimestamp();
       
       return $startTime;
   }
   
    public function __get($property) {
        if (property_exists($this, $property)) {
          return $this->$property;
        }
    }
}
