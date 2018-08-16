<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
            include "./classes/ManufacturingFacility.php";
			include "./databaseManager/databaseManager.php";
			
			echo "Machine-schedule index.php page started </br>";
			
            $facilityAHandle = fopen("../../resources/facility - A.csv", "r");
            $facilityBHandle = fopen("../../resources/facility - B.csv", "r");
            $facilityCHandle = fopen("../../resources/facility - C.csv", "r");
            $facilityTestHandle = fopen("../../resources/facility - TEST.csv", "r");

            $facilityA = new ManufacturingFacility($facilityAHandle);
            $facilityB = new ManufacturingFacility($facilityBHandle);
            $facilityC = new ManufacturingFacility($facilityCHandle);
			$facilityTest = new ManufacturingFacility($facilityTestHandle);
		
			
			#foreach ($facilityA->machines as &$machine) {
			#	$machine->toString();
			#}
			
			$databaseManager = new DatabaseManager();
			
			$databaseManager->saveManufacturingFacility($facilityA);
			#$databaseManager->saveManufacturingFacility($facilityB);
			#$databaseManager->saveManufacturingFacility($facilityC);
			#$databaseManager->saveManufacturingFacility($facilityTest);
			
            fclose($facilityAHandle);
            fclose($facilityBHandle);
            fclose($facilityCHandle);
			fclose($facilityTestHandle);

        ?>
    </body>
</html>