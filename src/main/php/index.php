<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
            include "./classes/ManufacturingFacility.php";

            $facilityHandle = fopen("../../resources/facility - A.csv", "r");
            
            //$facilityB_CSV = fopen("../../resources/facility - B.csv", "r");
            //$facilityC_CSv = fopen("../../resources/facility - C.csv", "r");
            
            $facilityA = new ManufacturingFacility($facilityHandle);
            fclose($facilityHandle);
        ?>
    </body>
</html>