<?php

class Team{

  //Init DB variable
  private $db;

  /*
  * Constructor
  */
  public function __construct(){
    $this->db = new Database();
  }

  public function register($data){

    //Insert Query
    // $this->db->query('INSERT INTO team (region_id, game_id, team_name, team_tag, team_logo)
    //                   VALUES (:region_id, :game_id, :team_name, :team_tag, :team_logo)
    //                 ');
    // $this->db->bind(':region_id', $data['region_id']);
    // $this->db->bind(':game_id', $data['game_id']);
    // $this->db->bind(':team_name', $data['team_name']);
    // $this->db->bind(':team_tag', $data['team_tag']);
    // $this->db->bind(':team_logo', $data['team_logo']);

    //without teamlogo
    $this->db->query('INSERT INTO team (region_id, game_id, team_name, team_tag)
                      VALUES (:region_id, :game_id, :team_name, :team_tag)
                    ');
    $this->db->bind(':region_id', $data['region_id']);
    $this->db->bind(':game_id', $data['game_id']);
    $this->db->bind(':team_name', $data['team_name']);
    $this->db->bind(':team_tag', $data['team_tag']);


    //Execute
    if ($this->db->execute()) {
      return $this->db->lastInsertId();
    } else {
      return false;
    }

  }

}
