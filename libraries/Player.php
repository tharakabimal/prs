<?php

class Player{

  //Init DB variable
  private $db;

  /*
  * Constructor
  */
  public function __construct(){
    $this->db = new Database();
  }

  //Single player register function
  public function sp_register($data){

    //Insert Query
    $this->db->query('INSERT INTO single_player (region_id, game_id, real_name, game_name, mobile_no, email_id, nic, year_of_birth)
                      VALUES(:region_id, :game_id, :real_name, :game_name, :mobile_no, :email_id, :nic, :year_of_birth)
                  ');

    $this->db->bind(':region_id', $data['region_id']);
    $this->db->bind(':game_id', $data['game_id']);
    $this->db->bind(':real_name', $data['real_name']);
    $this->db->bind(':game_name', $data['game_name']);
    $this->db->bind(':mobile_no', $data['mobile_no']);
    $this->db->bind(':email_id', $data['email_id']);
    $this->db->bind(':nic', $data['nic']);
    $this->db->bind(':year_of_birth', $data['year_of_birth']);


    //Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }


  //Multi player register function
  public function mp_register($data){

    foreach($data as $sub_array) {

      // Insert Query
      $this->db->query('INSERT INTO multi_player (team_id, real_name, game_name, mobile_no, email_id, nic, year_of_birth, steam_id, is_captain, is_substitute)
                        VALUES(:team_id, :real_name, :game_name, :mobile_no, :email_id, :nic, :year_of_birth, :steam_id, :is_captain, :is_substitute)
                    ');

      //Bind the values with the alias
      $this->db->bind(':team_id', $sub_array['team_id']);
      $this->db->bind(':real_name', $sub_array['real_name']);
      $this->db->bind(':game_name', $sub_array['game_name']);
      $this->db->bind(':mobile_no', $sub_array['mobile_no']);
      $this->db->bind(':email_id', $sub_array['email_id']);
      $this->db->bind(':nic', $sub_array['nic']);
      $this->db->bind(':year_of_birth', $sub_array['year_of_birth']);
      $this->db->bind(':steam_id', $sub_array['steam_id']);
      $this->db->bind(':is_captain', $sub_array['is_captain']);
      $this->db->bind(':is_substitute', $sub_array['is_substitute']);

      // Execute
      if (!$this->db->execute()) {
        return false;
      }
    }
    return true;
  }

}
