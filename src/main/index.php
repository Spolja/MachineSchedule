<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
       <?php
            include "./ManufacturingFacility.php";
            
            $facilityHandle = fopen("facility - A.csv", "r");
            
            //$facilityB_CSV = fopen("facility - B.csv", "r");
            //$facilityC_CSv = fopen("facility - C.csv", "r");
            
            $facilityA = new ManufacturingFacility($facilityHandle);
            fclose($facilityHandle);
        ?>
    </body>
</html>