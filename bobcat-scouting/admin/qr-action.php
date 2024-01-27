<?php 
session_start();
$qr = $_GET['qr'];
$key=array();

require_once '../includes/connection.php';
require_once 'database_connection.php';


if (isset($qr)) {


  //  echo $qr;
    $separator = ";";

    $exploded = explode($separator, $_GET['qr']); 

    $size11= sizeof($exploded);
    echo $size11;
 $size12= $size11-1;
  //  echo $size12;

                                                                               
  //echo $exploded[0];

    for ($i = 0; $i < ($size11); $i++) {
      $exploded[$i]=strstr($exploded[$i], "=");
  }

  for ($i = 0; $i < ($size11); $i++) {
    $exploded[$i]=str_replace("=", "", $exploded[$i]);
}

// for ($i = 0; $i < ($size11); $i++) {
//   $exploded[$i]=preg_replace('/[^A-Za-z0-9 ]/', '', $exploded[$i]);

// }

$exploded[$size12]=preg_replace('/[^A-Za-z0-9 ]/', '', $exploded[$size12]);

    
    $sql = "SELECT COLUMN_NAME\n"

    . "  FROM INFORMATION_SCHEMA.COLUMNS\n"

    . "  WHERE TABLE_SCHEMA = 'scouting' AND TABLE_NAME = 'sdata';";


    $result1 = $mysqli->query($sql); 
                    if ($result1->num_rows > 0) {
                      while($row1 = $result1->fetch_array()) {
                
                        
                        $key[] = preg_replace( '/[\W]/', '', $row1['COLUMN_NAME']);


                    }

                };

                unset($key['0']);


                $num= (sizeof($key));


                // unset($exploded[$num]);
                // unset($exploded[($num-1)]);

                // unset($exploded['0']);

                
                $k = array();
                $v = array();
                
                $k = "`".implode("`, `", array_values($key)) . "`";
                $v = "'" . implode("', '", array_values($exploded)) . "'";
                
                echo $v . "\n <br>";
              //  echo $v;
                $sql001 = "INSERT INTO sdata ( $k )
                VALUES ( $v )";
                
                    $mysqli->query($sql001);
                         //luh

                    $sql002 = "INSERT INTO sdata_backup ( $k )
                    VALUES ( $v )";
                    
                        $mysqli->query($sql002);
                             

                         header('Location: scanner.php');

exit;

            };
?>
