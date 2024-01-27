<?php
session_start();
// error_reporting(E_ALL);
// error_reporting (E_ALL ^ E_NOTICE);
// error_reporting(E_ERROR | E_PARSE);
if ($_SESSION['scouter'] == 0 && $_SESSION['admin']==0){
    header('Location: ../login.php');
    exit;
}

function RemoveSpecialChar($str) {
 
    // Using str_replace() function
    // to replace the word
    $res = preg_replace('/[^a-zA-Z0-9_ -]/s','',$str);

    // Returning the result
    return $res;
    }


    function createPassword($length)
    {
        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
    
        while ($i <= ($length - 1)) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }
   

//require 'includes/functions.php';
// Include config file
include_once '../includes/connection.php';
include_once '../admin/database_connection.php';
include_once 'navbar.php';

if(isset($_SESSION['registersuccess'])){
if($_SESSION['registersuccess']=='true') {
?>
    <div class="alert alert-success" role="alert">
The data has been saved successfully.
</div>

<?php


$_SESSION['registersuccess'] = '';

}
}
$err='';

if(isset($_POST['postpass'])){


    if( ($_SESSION['formpas'] != $_POST['postpass']) ){

        $_SESSION['formpas'] = $_POST['postpass'];

        unset($_POST['postpass']);

//$value= array();

//foreach ($_POST as $key => $value) {
    // echo "Field ". $key." is ".$value."<br>";

// $pregvalue = RemoveSpecialChar($value);

// $pregvalue= array();

// $pregvalue = $value;

//echo $pregvalue;

// if (is_array($_POST)){
//     echo 'it is an array';
// }
// else {
//     echo 'it is not an array';
// };


$k = array();
$v = array();

$k = implode(", ", array_keys($_POST));
$v = "'".implode("', '", array_values($_POST))."'";

// echo $k;
// echo '<br>';
// echo $v;



$sql001 = "INSERT INTO sdata (" . $k . ")
VALUES (" . $v . ")";

// $query001 = "INSERT INTO sdata ( " . implode(', ', array_keys($_POST)) . ")
//     VALUES (" . implode(', ', array_values($_POST)) . ")";

    $mysqli->query($sql001);

// echo '<br>';
// echo $pregvalue;
// echo $key;

// $sth = $connect->prepare("INSERT INTO sdata ( " . $key . ") VALUES (" . $pregvalue . ")");
// $res7 = $sth->execute($prep);

// $prep = array();
// foreach($pregvalue as $k => $v ) {
//     $prep[':'.$k] = $v;
// }
// $sth = $connect->prepare("INSERT INTO sdata ( " . implode(', ',array_keys($pregvalue)) . ") VALUES (" . implode(', ',array_keys($prep)) . ")");
// $res = $sth->execute($prep);


}


    }

//}




// require_once 'adminconfirm.php';
// Define variables and initialize with empty values

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scouting Data</title>
    <!-- <link rel="stylesheet" href="../css/form.css"> -->
    <link href="../css/bootstrap.css" rel="stylesheet">
	<script src="../css/bootstrap.js"></script>
    <script src="../css/jquery.js"></script>

    <style type="text/css">

:root{

--primary: rgb(56, 56, 223);
  --secondary: rgb(0, 0, 158);
  --border-color: rgb(65, 65, 212);
  --button-text: #fff;
  --button-focus: 0 0 0 3px rgb(16, 16, 112);
  /* link color */
  --link-color: blue;
}



    .c body{ font: 14px sans-serif; }
        .c .wrapper{ width: 350px; padding: 20px; 
        
        }

        .formwrap{
            
            display:grid;

        }

        .prematch{
            padding-top: 20px;
            grid-column:1;
            padding-left: 10px;
            padding-right: 200px;
            margin-right: 50px;

            width: 110%

        }

        .auto{
            grid-column:2;
            padding-top: 20px;
            padding-right: 200px;
            margin-right: 50px;

            width: 110%

        }

        .teleop{
            grid-column:3;
            padding-top: 20px;
            padding-right: 200px;
            margin-right: 50px;

            width: 110%


        }

        .endgame{
            grid-column:4;
            padding-top: 20px;
            padding-right: 200px;
            margin-right: 50px;

            width: 110%

        }

        .postmatch{
            grid-column:5;
            padding-top: 20px;
            padding-right: 200px;
            margin-right: 50px;

            width: 110%


        }



        .c .form-group {
            padding: 10px;
        }
        .c h1 {font-size: 30px}
        .c h2 {font-size: 25px}

        .c h4 { text-align: center; font-weight:normal; font-size:large; padding-top: 10px;}
        .c .h5 { text-align: center; font-weight: normal; font-size: medium;}
        .c .submit-btn{align-self: center; text-align: center;}
        .c sup {color: red;}

        .sdata {
            width: 80%
        }

        


        
    </style>

</head>
<div class="c">
<body>
<main>
    <div class="wrapper">

        <header><h1>Scouting Data</h1></header>


        <form method="post" class="sdata">
        <input type='hidden' name='postpass' value='<?php echo createPassword(149)?>'>

        
<div class="formwrap">
        <div class="prematch">
        <h2>Prematch</h2>



        <div class="form-group">
            <label>Robot<sup>*</sup></label>        
                <input type="text"   name="robot"class="form-control" id="robot" value="<?php echo $_SESSION['username']?>">             
        </div>


<?php        



$querypre = "SELECT name, type, option1, option2, option3, option4, option5, option6, time FROM form WHERE time='prematch'";
$resultpre = $mysqli->query($querypre);

if ($resultpre->num_rows > 0) {
  while($rowpre = $resultpre->fetch_assoc()) {

    if($rowpre['time']=='prematch'){
        ?>
        

        
            <div class="form-group <?php echo (!empty($rowpre['name'])) ? 'has-error' : ''; ?>">
            <label><?php echo $rowpre['name']?><sup>*</sup></label>
        
            <?php 
            if ($rowpre['type']=='text'){?>        
                <input   type="text" name="<?php echo $rowpre['time'].str_replace(' ', '', strtolower( $rowpre['name'] )) ;?>"class="form-control" id="<?php echo $rowpre['time'].str_replace(' ', '', strtolower( $rowpre['name'] )) ;?>">
                
            <?php }
        
            elseif ($rowpre['type']=='checkbox'){?>        
                <input type="checkbox" class="form-check-input"  name="<?php echo $rowpre['time'].str_replace(' ', '', strtolower( $rowpre['name'] )) ;?>"class="form-control" id= "<?php echo $rowpre['time'].str_replace(' ', '', strtolower( $rowpre['name'] )) ;?>">
            <?php }
        
        elseif ($rowpre['type']=='number'){?>        
            <input   type="number" name="<?php echo $rowpre['time'].str_replace(' ', '', strtolower( $rowpre['name'] )) ;?>"class="form-control" id= "<?php echo $rowpre['time'].str_replace(' ', '', strtolower( $rowpre['name'] )) ;?>">
        <?php }
        
        elseif ($rowpre['type']=='dropdown'){?>        
        
                        <select   id="<?php echo $rowpre['time'].str_replace(' ', '', strtolower( $rowpre['name'] )) ;?>" name="<?php echo $rowpre['time'].str_replace(' ', '', strtolower( $rowpre['name'] )) ;?>">
                        
                        <?php if ($rowpre['option1']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpre['option1'] )) ;?>"><?php echo $rowpre['option1'];?></option>
                        <?php };?>
        
                        <?php if ($rowpre['option2']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpre['option2'] )) ;?>"><?php echo $rowpre['option2'];?></option>
                        <?php };?>
        
                        <?php if ($rowpre['option3']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpre['option3'] )) ;?>"><?php echo $rowpre['option3'];?></option>
                        <?php };?>
        
                        <?php if ($rowpre['option4']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpre['option4'] )) ;?>"><?php echo $rowpre['option4'];?></option>
                        <?php };?>
        
                        <?php if ($rowpre['option5']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpre['option5'] )) ;?>"><?php echo $rowpre['option5'];?></option>
                        <?php };?>
        
                        <?php if ($rowpre['option6']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpre['option6'] )) ;?>"><?php echo $rowpre['option6'];?></option>
                        <?php };?>
        
        
                    </select>
        
        
        <?php };
        
            ?>
            
            <small class="text-danger"><?php echo $err; ?></small>
            </div>    
        
        <?php
            };};};

?> 
</div>

<div class="auto">
<h2>Auto</h2>

<?php

            $queryauto = "SELECT name, type, option1, option2, option3, option4, option5, option6, time FROM form WHERE time='auto'";
            $resultauto = $mysqli->query($queryauto);

            if ($resultauto->num_rows > 0) {
            while($rowauto = $resultauto->fetch_assoc()) {


                if($rowauto['time']=='auto'){
                    
                ?>



    <div class="form-group <?php echo (!empty($rowauto['name'])) ? 'has-error' : ''; ?>">
    <label><?php echo $rowauto['name']?><sup>*</sup></label>

    <?php 
    if ($rowauto['type']=='text'){?>        
        <input   type="text" name="<?php echo $rowauto['time'].str_replace(' ', '', strtolower( $rowauto['name'] )) ;?>"class="form-control" id= "<?php echo $rowauto['time'].str_replace(' ', '', strtolower( $rowauto['name'] )) ;?>">
        
    <?php }

    elseif ($rowauto['type']=='checkbox'){?>        
        <input type="checkbox" class="form-check-input"  name="<?php echo $rowauto['time'].str_replace(' ', '', strtolower( $rowauto['name'] )) ;?>"class="form-control" id= "<?php echo $rowauto['time'].str_replace(' ', '', strtolower( $rowauto['name'] )) ;?>">
    <?php }

elseif ($rowauto['type']=='number'){?>        
    <input   type="number" name="<?php echo $rowauto['time'].str_replace(' ', '', strtolower( $rowauto['name'] )) ;?>"class="form-control" id= "<?php echo $rowauto['time'].str_replace(' ', '', strtolower( $rowauto['name'] )) ;?>">
<?php }

elseif ($rowauto['type']=='dropdown'){?>        

                <select   id="<?php echo $rowauto['time'].str_replace(' ', '', strtolower( $rowauto['name'] )) ;?>" name="<?php echo $rowauto['time'].str_replace(' ', '', strtolower( $rowauto['name'] )) ;?>">
                
                <?php if ($rowauto['option1']!=null){?>                
                <option value="<?php echo str_replace(' ', '', strtolower( $rowauto['option1'] )) ;?>"><?php echo $rowauto['option1'];?></option>
                <?php };?>

                <?php if ($rowauto['option2']!=null){?>                
                <option value="<?php echo str_replace(' ', '', strtolower( $rowauto['option2'] )) ;?>"><?php echo $rowauto['option2'];?></option>
                <?php };?>

                <?php if ($rowauto['option3']!=null){?>                
                <option value="<?php echo str_replace(' ', '', strtolower( $rowauto['option3'] )) ;?>"><?php echo $rowauto['option3'];?></option>
                <?php };?>

                <?php if ($rowauto['option4']!=null){?>                
                <option value="<?php echo str_replace(' ', '', strtolower( $rowauto['option4'] )) ;?>"><?php echo $rowauto['option4'];?></option>
                <?php };?>

                <?php if ($rowauto['option5']!=null){?>                
                <option value="<?php echo str_replace(' ', '', strtolower( $rowauto['option5'] )) ;?>"><?php echo $rowauto['option5'];?></option>
                <?php };?>

                <?php if ($rowauto['option6']!=null){?>                
                <option value="<?php echo str_replace(' ', '', strtolower( $rowauto['option6'] )) ;?>"><?php echo $rowauto['option6'];?></option>
                <?php };?>


            </select>


<?php };

    ?>
    
    <small class="text-danger"><?php echo $err; ?></small>
    </div>    

<?php
    };};};
    
?> 
</div>

<div class="teleop">
<h2>Teleop</h2>

<?php

$queryt = "SELECT name, type, option1, option2, option3, option4, option5, option6, time FROM form WHERE time='teleop'";
$resultt = $mysqli->query($queryt);

if ($resultt->num_rows > 0) {
while($rowt = $resultt->fetch_assoc()) {




    if($rowt['time']=='teleop'){
        ?>
        

        
            <div class="form-group <?php echo (!empty($rowt['name'])) ? 'has-error' : ''; ?>">
            <label><?php echo $rowt['name']?><sup>*</sup></label>
        
            <?php 
            if ($rowt['type']=='text'){?>        
                <input   type="text" name="<?php echo $rowt['time'].str_replace(' ', '', strtolower( $rowt['name'] )) ;?>"class="form-control" id= "<?php echo $rowt['time'].str_replace(' ', '', strtolower( $rowt['name'] )) ;?>">
                
            <?php }
        
            elseif ($rowt['type']=='checkbox'){?>        
                <input type="checkbox" class="form-check-input"  name="<?php echo $rowt['time'].str_replace(' ', '', strtolower( $rowt['name'] )) ;?>"class="form-control" id= "<?php echo $rowt['time'].str_replace(' ', '', strtolower( $rowt['name'] )) ;?>">
            <?php }
        
        elseif ($rowt['type']=='number'){?>        
            <input   type="number" name="<?php echo $rowt['time'].str_replace(' ', '', strtolower( $rowt['name'] )) ;?>"class="form-control" id= "<?php echo $rowt['time'].str_replace(' ', '', strtolower( $rowt['name'] )) ;?>">
        <?php }
        
        elseif ($rowt['type']=='dropdown'){?>        
        
                        <select   id="<?php echo $rowt['time'].str_replace(' ', '', strtolower( $rowt['name'] )) ;?>" name="<?php echo $rowt['time'].str_replace(' ', '', strtolower( $rowt['name'] )) ;?>">
                        
                        <?php if ($rowt['option1']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowt['option1'] )) ;?>"><?php echo $rowt['option1'];?></option>
                        <?php };?>
        
                        <?php if ($rowt['option2']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowt['option2'] )) ;?>"><?php echo $rowt['option2'];?></option>
                        <?php };?>
        
                        <?php if ($rowt['option3']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowt['option3'] )) ;?>"><?php echo $rowt['option3'];?></option>
                        <?php };?>
        
                        <?php if ($rowt['option4']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowt['option4'] )) ;?>"><?php echo $rowt['option4'];?></option>
                        <?php };?>
        
                        <?php if ($rowt['option5']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowt['option5'] )) ;?>"><?php echo $rowt['option5'];?></option>
                        <?php };?>
        
                        <?php if ($rowt['option6']!=null){?>                
                        <option value="<?php echo str_replace(' ', '', strtolower( $rowt['option6'] )) ;?>"><?php echo $rowt['option6'];?></option>
                        <?php };?>
        
        
                    </select>
        
                    <?php
            };

            ?>

            
            <small class="text-danger"><?php echo $err; ?></small>
            </div>    
            <?php };};};
        
        ?>
  </div>

<div class="endgame">


<h2>Endgame</h2>

            <?php
            
            $querye = "SELECT name, type, option1, option2, option3, option4, option5, option6, time FROM form WHERE time='endgame'";
            $resulte = $mysqli->query($querye);
            
            if ($resulte->num_rows > 0) {
            while($rowe = $resulte->fetch_assoc()) {
            

            if($rowe['time']=='endgame'){
                ?>
                

                
                    <div class="form-group <?php echo (!empty($rowe['name'])) ? 'has-error' : ''; ?>">
                    <label><?php echo $rowe['name']?><sup>*</sup></label>
                
                    <?php 
                    if ($rowe['type']=='text'){?>        
                        <input   type="text" name="<?php echo $rowe['time'].str_replace(' ', '', strtolower( $rowe['name'] )) ;?>"class="form-control" id= "<?php echo $rowe['time'].str_replace(' ', '', strtolower( $rowe['name'] )) ;?>">
                        
                    <?php }
                
                    elseif ($rowe['type']=='checkbox'){?>        
                        <input type="checkbox" class="form-check-input"  name="<?php echo $rowe['time'].str_replace(' ', '', strtolower( $rowe['name'] )) ;?>"class="form-control" id= "<?php echo $rowe['time'].str_replace(' ', '', strtolower( $rowe['name'] )) ;?>">
                    <?php }
                
                elseif ($rowe['type']=='number'){?>        
                    <input   type="number" name="<?php echo $rowe['time'].str_replace(' ', '', strtolower( $rowe['name'] )) ;?>"class="form-control" id= "<?php echo $rowe['time'].str_replace(' ', '', strtolower( $rowe['name'] )) ;?>">
                <?php }
                
                elseif ($rowe['type']=='dropdown'){?>        
                
                                <select   id="<?php echo $rowe['time'].str_replace(' ', '', strtolower( $rowe['name'] )) ;?>" name="<?php echo $rowe['time'].str_replace(' ', '', strtolower( $rowe['name'] )) ;?>">
                                
                                <?php if ($rowe['option1']!=null){?>                
                                <option value="<?php echo str_replace(' ', '', strtolower( $rowe['option1'] )) ;?>"><?php echo $rowe['option1'];?></option>
                                <?php };?>
                
                                <?php if ($rowe['option2']!=null){?>                
                                <option value="<?php echo str_replace(' ', '', strtolower( $rowe['option2'] )) ;?>"><?php echo $rowe['option2'];?></option>
                                <?php };?>
                
                                <?php if ($rowe['option3']!=null){?>                
                                <option value="<?php echo str_replace(' ', '', strtolower( $rowe['option3'] )) ;?>"><?php echo $rowe['option3'];?></option>
                                <?php };?>
                
                                <?php if ($rowe['option4']!=null){?>                
                                <option value="<?php echo str_replace(' ', '', strtolower( $rowe['option4'] )) ;?>"><?php echo $rowe['option4'];?></option>
                                <?php };?>
                
                                <?php if ($rowe['option5']!=null){?>                
                                <option value="<?php echo str_replace(' ', '', strtolower( $rowe['option5'] )) ;?>"><?php echo $rowe['option5'];?></option>
                                <?php };?>
                
                                <?php if ($rowe['option6']!=null){?>                
                                <option value="<?php echo str_replace(' ', '', strtolower( $rowe['option6'] )) ;?>"><?php echo $rowe['option6'];?></option>
                                <?php };?>
                
                
                            </select>
                
                            <?php
            };

            ?>

            
            <small class="text-danger"><?php echo $err; ?></small>
            </div>    
            <?php };};};
        
        ?>
</div>

<div class="postmatch">

                    
<h2>Postmatch</h2>
                    <?php
                    
                    $querypost = "SELECT name, type, option1, option2, option3, option4, option5, option6, time FROM form WHERE time='postmatch'";
                    $resultpost = $mysqli->query($querypost);
                    
                    if ($resultpost->num_rows > 0) {
                    while($rowpost = $resultpost->fetch_assoc()) {
                    
        
        

                    if($rowpost['time']=='postmatch'){
                        ?>
                        

                        
                            <div class="form-group <?php echo (!empty($rowpost['name'])) ? 'has-error' : ''; ?>">
                            <label><?php echo $rowpost['name']?><sup>*</sup></label>
                        
                            <?php 
                            if ($rowpost['type']=='text'){?>        
                                <input   type="text" name="<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>"class="form-control">
                                
                            <?php }
                        
                            elseif ($rowpost['type']=='checkbox'){?>        
                                <input type="checkbox" class="form-check-input"  name="<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>"class="form-control" id= "<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>">
                            <?php }
                        
                        elseif ($rowpost['type']=='number'){?>        
                            <input   type="number" name="<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>"class="form-control" id= "<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>">
                        <?php }

                        elseif ($rowpost['type']=='comments'){?>        
                        <div class="form-floating">
                        <textarea   class="form-control" placeholder="Leave a comment here" id="<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>" name="<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>"></textarea>
                        </div>
                        <?php }
                        
                        elseif ($rowpost['type']=='dropdown'){?>        
                        
                                        <select   id="<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>" name="<?php echo $rowpost['time'].str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>" id="<?php echo str_replace(' ', '', strtolower( $rowpost['name'] )) ;?>">
                                        
                                        <?php if ($rowpost['option1']!=null){?>                
                                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpost['option1'] )) ;?>"><?php echo $rowpost['option1'];?></option>
                                        <?php };?>
                        
                                        <?php if ($rowpost['option2']!=null){?>                
                                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpost['option2'] )) ;?>"><?php echo $rowpost['option2'];?></option>
                                        <?php };?>
                        
                                        <?php if ($rowpost['option3']!=null){?>                
                                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpost['option3'] )) ;?>"><?php echo $rowpost['option3'];?></option>
                                        <?php };?>
                        
                                        <?php if ($rowpost['option4']!=null){?>                
                                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpost['option4'] )) ;?>"><?php echo $rowpost['option4'];?></option>
                                        <?php };?>
                        
                                        <?php if ($rowpost['option5']!=null){?>                
                                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpost['option5'] )) ;?>"><?php echo $rowpost['option5'];?></option>
                                        <?php };?>
                        
                                        <?php if ($rowpost['option6']!=null){?>                
                                        <option value="<?php echo str_replace(' ', '', strtolower( $rowpost['option6'] )) ;?>"><?php echo $rowpost['option6'];?></option>
                                        <?php };?>
                        
                        
                                    </select>
                        
                        
                        <?php };
                        
                            ?>
                            
                            <small class="text-danger"><?php echo $err; ?></small>
                            </div>    
                        
                        <?php
                            };};};
                            
                            ?>
        </div>
                        </div>
        
<!-- 
            <div class="form-group <?php //echo (!empty($scouter)) ? 'has-error' : ''; ?>">
                <label>Name:<sup>*</sup></label>
                <input type="text" name="scouter"class="form-control" id= "scouter" value="<?php echo $scouter; ?>">
                <small class="text-danger"><?php //echo $err; ?></small>
            </div>    
            
            <div class="form-group <?php //echo (!empty($match)) ? 'has-error' : ''; ?>">
                <label>Match Number:<sup>*</sup></label>
                <input type="number" name="match"class="form-control" id= "match" value="//<?php echo $match; ?>">
                <small class="text-danger"><?php //echo $err; ?></small>
            </div>    

            <div class="form-group <?php //echo (!empty($robot)) ? 'has-error' : ''; ?>">
                <label for="robot">Robot:</label>
                <select name="robot" id="robot">
                <option value="red1">Red 1</option>
                <option value="red1">Red 2</option>
                <option value="red1">Red 3</option>
                <option value="red1">Blue 1</option>
                <option value="red1">Blue 2</option>
                <option value="red1">Blue 3</option>
                </select>
                <small class="text-danger"><?php //echo $err ?></small>
            </div>     -->


            <div class="submit-btn">
            <div class="form-group">
                <div class="send_message">
                <!-- <button formaction= "index.php" formmethod= "post" class="btn btn-primary" type="submit">Submit</button>    -->
            </div>


            </div>
            <div class="form-group">
                <input type="reset" class="btn btn-light" class="btn btn-default" value="Reset">
            </div>
            <div class="form-group">
            <button type="button" class="btn btn-secondary" onclick="generateQRCode()" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Generate QR Code
    </button>            </div>



                <!-- <h4><div class="h5">Already have an account? <a href="login.php">Login here</a>.</h5></h4> -->
        </form>


        <!-- <form>
    <input type="text" id="website" name="website"  value = "" />
    <button type="button" onclick="generateQRCode()">
      Generate QR Code
    </button>
  </form> -->


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">QR Code</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="qrcode-container">
    <div id="qrcode" class="qrcode"></div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

  <script type="text/javascript">
    function generateQRCode() {
        
        <?php $query0 = "SELECT name, time FROM form";
                    $result0 = $mysqli->query($query0);
                    
                    if ($result0->num_rows > 0) {
                    while($row0 = $result0->fetch_assoc()) {

                        ?>
       var <?php echo $row0['time'].str_replace(' ', '', strtolower( $row0['name'] )) ;?> = document.getElementById('<?php echo $row0['time'].str_replace(' ', '', strtolower( $row0['name'] )) ;?>').value;


        <?php };};?> 
        
        //var field2=document.getElementById('prematchmatchnumber').value;
        //var field1=document.getElementById('prematchmatchnumber').value;
        // console.log(postmatchcomments);
        // console.log(field1 + field2);



      //let website = document.getElementById("website").value;

      let codedata = ' _ ' +
      <?php $query01 = "SELECT name, time FROM form";
                    $result01 = $mysqli->query($query01); 
                    if ($result01->num_rows > 0) {
                    while($row01 = $result01->fetch_assoc()) {
                    echo $row01['time'].str_replace(' ', '', strtolower( $row01['name'] )). " + " . "' _ '" . " + ";   
                    };}; ?> ' _ ';
      


       //field1 + ' _ ' + field2;
      if (codedata) {
        console.log(codedata);

        let qrcodeContainer = document.getElementById("qrcode");
        qrcodeContainer.innerHTML = "";
        new QRCode(qrcodeContainer, codedata);
        /*With some styles*/
        let qrcodeContainer2 = document.getElementById("qrcode-2");
        qrcodeContainer2.innerHTML = "";
        new QRCode(qrcodeContainer2, {
          text: codedata,
          width: 128,
          height: 128,
          colorDark: "#5868bf",
          colorLight: "#ffffff",
          correctLevel: QRCode.CorrectLevel.H
        });
        document.getElementById("qrcode-container").style.display = "block";
      } else {
        // alert("Please enter a valid URL");
      }
    }
  </script>

        <!-- <input id="text" type="hidden" value="<?php //echo 'test'; ?>" style="Width:20%"/ onblur='generateBarCode();'>  -->
        <!-- <img id='barcode' src="https://api.qrserver.com/v1/create-qr-code/?data=<?php //echo 'field1 = ' . $_SESSION['field1'] . ' field2 = ' . $_SESSION['field2']  ?>&amp;size=100x100" alt="qrcode" width="150" height="150" /> -->

<script>



// function generateBarCode() {

// //var field1 = document.getElementById('field1').value;
// //var field2 = document.getElementById('field2').value;

// //var nric = 'test<?php //echo 'field1 = ' . $_SESSION['field1'] . ' field2 = ' . $_SESSION['field2'] ?>';
// console.log('field 1 = ' + field1 + 'field 2 = ' + field2);

// {
//     //var nric = var qrdata;
//     var nric = <?php echo 'field1 = ' . $_SESSION['field1'] . ' field2 = ' . $_SESSION['field2'] ?>;

//     var url = 'https://api.qrserver.com/v1/create-qr-code/?data=' + nric + '&amp;size=50x50';
//     $('#barcode').attr('src', url);
// }

// }
</script>
        
    </div>
</main>    
</body>
</div>
</html>