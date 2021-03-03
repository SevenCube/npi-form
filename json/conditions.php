<?php
  require_once('../../wp-load.php');

  $PhysicianState = $_GET['state'];
  $Conditions = array();

  $Provinces = array("Alberta",  "British Columbia",  "Manitoba",  "New Brunswick",  "Newfoundland and Labrador",  "Nova Scotia",  "Ontario",  "Prince Edward Island",  "Quebec",  "Saskatchewan");
  if (in_array($PhysicianState, $Provinces)) { 
    $isCanadian=true;
  } else {
    $isCanadian=false;
  }


  $SQL= "SELECT * FROM wp_arfinn_conditions_link WHERE stateSpecific='$PhysicianState'";
  $Results = $wpdb->get_results($SQL);

  foreach ( $Results as $Data ) {
    $conditionList = array();
    $conditionList['name'] = $Data->qc;
    $conditionList['value'] = $Data->qc;
    array_push($Conditions, $conditionList);
    
   }

   echo json_encode($Conditions);

?>
