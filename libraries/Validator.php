<?php
class Validator{

  /*
  * Check required Feilds
  */
  public function isRequired($field_array){
    foreach ($field_array as $field) {
      if ($_POST[''.$field.''] == '') {
        return false;
      }
    }
    return true;
  }

  /*
  * Validate Email
  */
  public function isValidEmail($email_array){

    foreach ($email_array as $email) {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
      }
    }
    return true;

  }

  /*
  * Validate Substitutes
  */
  public function isValidSubs($sub_field_array){

    //Calculate the array length for each substitute
    for ($i=0; $i < count($sub_field_array) ; $i++) {
      foreach ($sub_field_array as $key => $sub_field) {
        $arr_count[$i] = count($sub_field);
      }
    }

    //Declare an array to keep the null feild count.
    $null_count_array = array(0,0);
    $j = 0;

    //Loop through the field array to get the count of the null fields.
    foreach ($sub_field_array as $sub_field) {
      foreach ($sub_field as $value) {
        if ($_POST[''.$value.''] == '') {
          $null_count_array[$j]++ ;
        }
      }
      $j++;
    }

    if (($null_count_array[0] == 0 || $arr_count[0] == $null_count_array[0] ) && ($null_count_array[1] == 0 || $arr_count[1] == $null_count_array[1] )) {

      if ($null_count_array[0] != 0 && $null_count_array[1] != 0) {
        return 2;
      }elseif ($null_count_array[0] != 0) {
        return 5;
      }elseif ($null_count_array[1] != 0) {
        return 6;
      }else{
        return 10;
      }
    }else {
      return false;
    }

  }


  /*
  * Validate Halo Substitutes
  */
  public function isValidHaloSubs($sub_field_array){

    $sub_field_count = 0;
    //Calculate the array length for each substitute
    foreach ($sub_field_array as $sub_field) {
      $sub_field_count++;
    }

    $null_count = 0;
    $j = 0;

    //Loop through the field array to get the count of the null fields.
    foreach ($sub_field_array as $value) {
      if ($_POST[''.$value.''] == '') {
        $null_count++ ;
      }
      $j++;
    }

    if ($null_count == 0){
      return 2;
    }else if ($null_count == $sub_field_count) {
      return 3;
    }else {
      return false;
    }

  }

}
