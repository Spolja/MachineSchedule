<?php

class DatabaseManager {
	public function saveManufacturingFacility($facility){
		$connection = mysqli_connect("localhost", "root", "", "machine-scheduler", 3306);
		foreach ($facility->machines as &$machine) {
			$workDays = $machine->workDaysToString();
			echo "</br></br>" . $workDays;
			$sql = "INSERT INTO `machine` (`workHours`, `type`, `fuelConsumption`, `workDays`) VALUES ('$machine->workHours', '$machine->type','$machine->fuelConsumption','$workDays')";

			//Run Query
			$result = mysqli_query($connection, $sql) or die(mysql_error());
		}
	}
}