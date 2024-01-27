<?php
            $sql1 = "SELECT * FROM sdata ORDER BY id DESC LIMIT 1";
            $result1 = $mysqli->query($sql1);
            mysqli_fetch_all($result1, MYSQLI_ASSOC);
            foreach ($result1 as $row1) {
             
                $totalpts=($row1['autoleftcommunity']*1)+($row1['autolowcone']*3)+($row1['autolowcube']*3)+($row1['automidcone']*4)+($row1['automidcube']*4)+($row1['autohighcube']*6)+($row1['autohighcone']*6)+($row1['teleoplowcone']*2)+($row1['teleoplowcube']*2)+($row1['teleopmidcone']*3)+($row1['teleopmidcube']*3)+($row1['teleophighcube']*5)+($row1['teleophighcone']*5);
                
                if ($row1['autochargestationdocked']=='Yes'){
                    $totalpts=$totalpts+8;
                }
                if ($row1['autochargestationengaged']=='Yes'){
                    $totalpts=$totalpts+12;
                }
                if ($row1['teleopchargestationdocked']=='Yes'){
                    $totalpts=$totalpts+6;
                }
                if ($row1['teleopchargestationengaged']=='Yes'){
                    $totalpts=$totalpts+10;
                }
                if ($row1['teleopchargestationparked']=='Yes'){
                    $totalpts=$totalpts+2;
                }
                $id=$row1['id'];

            }

            $sql2 = "UPDATE sdata SET totalpoints='$totalpts' WHERE id='$id'";
            $mysqli->query($sql2);

?>