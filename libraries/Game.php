<?php

class Game{

  //Init DB variable
  private $db;

  /*
  * Constructor
  */
  public function __construct(){
    $this->db = new Database();
  }

  /*
  * Get Games for the selected Region
  */
  public function getGamesForRegion($region_id){

    $this->db->query("SELECT region.region_id, game.game_id, game.game, game.is_single_player
                      FROM game_region
                      INNER JOIN game ON game.game_id = game_region.game_id
                      INNER JOIN region ON region.region_id = game_region.region_id
                      WHERE game_region.region_id = :region_id
                      ");
    $this->db->bind(':region_id', $region_id);

    //Assign the result set
    $results = $this->db->resultset();

    return $results;
  }


  /*
  * Feth a single Game for the selected Region
  * This is "getGameForRegion" not "getGamesForRegion" <- there's an "S"
  */
  public function getGameForRegion($region_id, $game_id){

    $this->db->query("SELECT region.region_id, region.region_name, game.game_id, game.game
                      FROM game_region
                      INNER JOIN game ON game.game_id = game_region.game_id
                      INNER JOIN region ON region.region_id = game_region.region_id
                      WHERE game_region.region_id = :region_id AND game.game_id = :game_id
                      ");
    $this->db->bind(':region_id', $region_id);
    $this->db->bind(':game_id', $game_id);

    //Assign the result set
    $result = $this->db->single();

    return $result;
  }
}
