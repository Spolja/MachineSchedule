<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
            include "./classes/ManufacturingFacility.php";

            $facilityAHandle = fopen("../../resources/facility - A.csv", "r");
            $facilityBHandle = fopen("../../resources/facility - B.csv", "r");
            $facilityCHandle = fopen("../../resources/facility - C.csv", "r");
            
            $facilityA = new ManufacturingFacility($facilityAHandle);
            $facilityB = new ManufacturingFacility($facilityBHandle);
            $facilityC = new ManufacturingFacility($facilityCHandle);
            
            fclose($facilityAHandle);
            fclose($facilityBHandle);
            fclose($facilityCHandle);
        ?>
    </body>
</html>