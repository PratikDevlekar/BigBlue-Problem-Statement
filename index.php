<?php

//Get the file
$filename = "inventorymovements.reflextxt";
$file = fopen( $filename, "r" );

if( $file == false ) {
   echo ( "Error in opening file" );
   exit();
}

$filesize = filesize( $filename );
while(! feof($file))  {
    // Reading the file line by line
    $result = fgets($file);
    // Parese the unique id;
    $getunique_id = substr($result,0,14);
    /*  I Looked into the given pattern in problem statement and found out a small part of unique id varies;
        Example : 0000001HL62110 ----> Unique ID
                  HL62110 ---> ID : last 110,111,112 routes us to diffrent structure;
    */
    $id = substr($result,7,7);
    print_r($getunique_id);
    echo "<br>";
    if($id == "HL62110"){
        $Movement_id = substr($result,14,10);
        $Product_id = substr($result,25,9);
        $Product_name  = substr($result,35,20);
        $Movement_quantity = intval(substr($result,63,9));
        $Remaining_quantity = intval(substr($result,73,9));
        $Item_Location = substr($result,83,6);
        $value = array( 'Movement_id' => $Movement_id, 'Product_id' => $Product_id, 'Product_name' => $Product_name, 'Movement_quantity' => $Movement_quantity, 'Remaining_quantity'=>$Remaining_quantity, 'Item_Location' =>$Item_Location );
        
        foreach($value as $x => $val) {
            echo "$x = $val<br>";
          }
        echo "<br>";
    }

    if($id == "HL62111"){
        $Product_id = substr($result,25,9);
        $Product_name  = substr($result,35,20);
        $Movement_quantity = intval(substr($result,63,9));
        $Item_Location = substr($result,83,6);
        $value = array( 'Movement_id' => $Movement_id, 'Product_id' => $Product_id, 'Product_name' => $Product_name, 'Movement_quantity' => $Movement_quantity, 'Remaining_quantity'=>$Remaining_quantity, 'Item_Location' =>$Item_Location );
        
        foreach($value as $x => $val) {
            echo "$x = $val<br>";
          }
          echo "<br>";
    }

    if($id == "HL62112"){
        $Movement_id = substr($result,14,10);
        $date = substr($result,24,22);
        $date = date("c", strtotime($date));
        $Picker_name = substr($result,47,63);          
        $value = array( 'Movement_id' => $Movement_id, 'Date' => $date, 'Picker Name' => $Picker_name);
        foreach($value as $x => $val) {
            echo "$x = $val<br>";
          }
          echo "<br>";
    }
  }
fclose( $file );
?>
