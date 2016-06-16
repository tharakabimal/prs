<?php

class Region{

  //Init DB variable
  private $db;

  /*
  * Constructor
  */
  public function __construct(){
    $this->db = new Database();
  }

  /*
  * Get All Regions
  */
  public function getAllRegions(){

    $this->db->query("SELECT * FROM region");

    //Assign the result set
    $results = $this->db->resultset();

    return $results;
  }


  /*
  * Get All Regions
  */
  public function getRegion($region_id){

    $this->db->query("SELECT * FROM region WHERE region_id = :region_id");
    $this->db->bind(':region_id', $region_id);

    //Assign the result set
    $result = $this->db->single();

    return $result;
  }

}
