<?php 
session_start();
require_once '../adminconfirm.php';

?>
<html>
 <head>
  <script src="../../css/jquery.js"></script>
  <link rel="stylesheet" href="../css/bootstrap3.css" />
  <script src="../css/jquerytabledit.js"></script>
  <script src="../css/datatablebootstrap.js"></script>

  <script src="../css/bootstraptabledit.css"></script>  
  <link rel="stylesheet" href="../css/bootstraptabledit.css" />
  <script src="../css/bootstrap3.js"></script>
  <script src="../css/tabledit.js"></script>
  <style>
      /* .panel-heading{
          font-size: 20px;
      }

      .title1{
        color: black;

      } */

      /* table {
  border-collapse: separate;
  border-spacing: 0;
  border-top: 1px solid grey;
}

td,
th {
  margin: 0;
  border: 1px solid grey;
  white-space: nowrap;
  border-top-width: 0px;
}

/* div {
  width: 500px;
  overflow-x: scroll;
  margin-left: 5em;
  overflow-y: visible;
  padding: 0;
} */
/* td:first-child, td:second-child 
 {
  position: absolute;
  width: 5em;
  left: 0;
  top: auto;
  border-top-width: 1px;
  /*only relevant for first row*/
  /* margin-top: -1px;
  /*compensate for top border*/
/*}

td:first-child:before, td:second-child:before {
  content: 'Row ';
}

.long {
  background: yellow;
  letter-spacing: 1em;
} */  


  </style>
 </head>
 <body>
  <div class="container">
   <br/>
   <div class="panel panel-default">
   <div class="panel-heading">Users</div>
    <div class="panel-body">
     <div class="table-responsive">
      <table id="users" class="table table-bordered table-striped">
       <thead>
        <tr>
         <th>Username</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Email</th>
         <th>Admin</th>
         <th>Scouter</th>
        </tr>
       </thead>
       <tbody></tbody>
      </table>
     </div>
    </div>
   </div>
  </div>
  <br />
  <br />
 </body>
</html>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){

 var dataTable = $('#users').DataTable({
  "processing" : true,
  "serverSide" : true,
  "order" : [],
  "ajax" : { 
   url:"fetch.php",
   type:"POST"
  }
 });

 $('#users').on('draw.dt', function(){
  $('#users').Tabledit({
   url:'action.php',
   dataType:'json',
   columns:{
    identifier : [0, 'username'],
    editable:[[1, 'first_name'], [2, 'last_name'],[3, 'email'], [4, 'admin', '{"1":"Yes","0":"No"}'], [5, 'scouter', '{"1":"Yes","0":"No"}']]
   },
   restoreButton:false,
   onSuccess:function(data, textStatus, jqXHR)
   {
    if(data.action == 'delete')
    {
     $('#' + data.id).remove();
     $('#users').DataTable().ajax.reload();
    }
   }
  });
 });
  
}); 
</script>  