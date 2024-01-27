<?php

function showMenu($level = 0) {
require '../includes/connection.php'; //import connection

$result = $mysqli->query("SELECT * FROM `nav_bar` WHERE `parent_id` = ".$level); //this query isn't used here but it is used later in the code
	echo "<li>";
		while ($node = $result->fetch_array()) {

			$mysqli->query("SELECT * FROM `nav_bar` WHERE `parent_id` = 0");
			if ($node['hasChildren'] == '1') {
      
              echo "<li class=\"nav-item dropdown\"><a class=\"nav-link dropdown-toggle\" href=\"" . '../' . $node['url'] . "\" id=\"navbarDropdown\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">" . $node['name'] . "</a><ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
            
              $result3 = $mysqli->query("SELECT * FROM `nav_bar` WHERE `parent_id` =" . $node['id'] );

                    while ($node3 = $result3->fetch_array()) {        
                    echo "<li><a class=\"dropdown-item\" href=\"" . '../' . $node3['url'] . "\">" . $node3['name'] . " </a></li>";

        }
        
        echo "</ul>";

      }else{
            echo "<li class=\"nav-item\"><a class=\"nav-link active\" aria-current=\"page\" href=\"" . '../' . $node['url'] . "\">" . $node['name'] . "</a>";

    }
  }
}

?>
