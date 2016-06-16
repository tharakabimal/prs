<?php require('core/init.php'); ?>

<?php

if (!isset($_POST['mpregister'])) {
  //Fetch a Game for the selected Region
  $games = new Game();
  $game_region = $games->getGameForRegion($_GET["rID"], $_GET["gID"]);
}

?>

<?php
if (isset($_POST['mpregister'])) {

  //Create Data array for Team information
  $teamData = array();
  $teamData['region_id'] = $_POST['region_id'];
  $teamData['game_id'] = $_POST['game_id'];
  $teamData['team_name'] = $_POST['team_name'];
  $teamData['team_tag'] = $_POST['team_tag'];


  /*
  * Server side validation
  */

  // Creat the validation object
  $validate = new Validator();

  //Required Fields array
  $field_array = array('team_name', 'team_tag',
                       'c_real_name', 'c_game_name', 'c_mobile_no', 'c_email_id', 'c_year_of_birth',
                       'p2_real_name', 'p2_game_name', 'p2_mobile_no', 'p2_email_id', 'p2_year_of_birth',
                       'p3_real_name', 'p3_game_name', 'p3_mobile_no', 'p3_email_id', 'p3_year_of_birth',
                       'p4_real_name', 'p4_game_name', 'p4_mobile_no', 'p4_email_id', 'p4_year_of_birth',
                       'p5_real_name', 'p5_game_name', 'p5_mobile_no', 'p5_email_id', 'p5_year_of_birth'
                      );

  //Substitute Fields array
  $sub_field_array = array(array('p6_real_name', 'p6_game_name', 'p6_mobile_no', 'p6_email_id', 'p6_year_of_birth'),
                           array('p7_real_name', 'p7_game_name', 'p7_mobile_no', 'p7_email_id', 'p7_year_of_birth')
                          );

  //Email array to check if the email is valid.
  $email_array = array($_POST['c_email_id'], $_POST['p2_email_id'], $_POST['p3_email_id'], $_POST['p4_email_id'], $_POST['p5_email_id']);

  //Check if all the required fields are filled in before registering the Team
  if ($validate->isRequired($field_array)) {
      if ($validate->isValidEmail($email_array)) {
        if ($validate->isValidSubs($sub_field_array) != false) {
            $team = new Team();
            $team_id = $team->register($teamData);
        }
    }
  }


  $playerData = array(
    array(
      'team_id'       => $team_id,
      'real_name'     => $_POST['c_real_name'],
      'game_name'     => $_POST['c_game_name'],
      'mobile_no'     => $_POST['c_mobile_no'],
      'email_id'      => $_POST['c_email_id'],
      'nic'           => $_POST['c_nic'],
      'year_of_birth' => $_POST['c_year_of_birth'],
      'steam_id'      => $_POST['c_steam_id'],
      'is_captain'    => '1',
      'is_substitute' => '0'
    ),
    array(
      'team_id'       => $team_id,
      'real_name'     => $_POST['p2_real_name'],
      'game_name'     => $_POST['p2_game_name'],
      'mobile_no'     => $_POST['p2_mobile_no'],
      'email_id'      => $_POST['p2_email_id'],
      'nic'           => $_POST['p2_nic'],
      'year_of_birth' => $_POST['p2_year_of_birth'],
      'steam_id'      => $_POST['p2_steam_id'],
      'is_captain'    => '0',
      'is_substitute' => '0'
    ),
    array(
      'team_id'       => $team_id,
      'real_name'     => $_POST['p3_real_name'],
      'game_name'     => $_POST['p3_game_name'],
      'mobile_no'     => $_POST['p3_mobile_no'],
      'email_id'      => $_POST['p3_email_id'],
      'nic'           => $_POST['p3_nic'],
      'year_of_birth' => $_POST['p3_year_of_birth'],
      'steam_id'      => $_POST['p3_steam_id'],
      'is_captain'    => '0',
      'is_substitute' => '0'
    ),
    array(
      'team_id'       => $team_id,
      'real_name'     => $_POST['p4_real_name'],
      'game_name'     => $_POST['p4_game_name'],
      'mobile_no'     => $_POST['p4_mobile_no'],
      'email_id'      => $_POST['p4_email_id'],
      'nic'           => $_POST['p4_nic'],
      'year_of_birth' => $_POST['p4_year_of_birth'],
      'steam_id'      => $_POST['p4_steam_id'],
      'is_captain'    => '0',
      'is_substitute' => '0'
    ),
    array(
      'team_id'       => $team_id,
      'real_name'     => $_POST['p5_real_name'],
      'game_name'     => $_POST['p5_game_name'],
      'mobile_no'     => $_POST['p5_mobile_no'],
      'email_id'      => $_POST['p5_email_id'],
      'nic'           => $_POST['p5_nic'],
      'year_of_birth' => $_POST['p5_year_of_birth'],
      'steam_id'      => $_POST['p5_steam_id'],
      'is_captain'    => '0',
      'is_substitute' => '0'
    ),
    array(
      'team_id'       => $team_id,
      'real_name'     => $_POST['p6_real_name'],
      'game_name'     => $_POST['p6_game_name'],
      'mobile_no'     => $_POST['p6_mobile_no'],
      'email_id'      => $_POST['p6_email_id'],
      'nic'           => $_POST['p6_nic'],
      'year_of_birth' => $_POST['p6_year_of_birth'],
      'steam_id'      => $_POST['p6_steam_id'],
      'is_captain'    => '0',
      'is_substitute' => '1'
    ),
    array(
      'team_id'       => $team_id,
      'real_name'     => $_POST['p7_real_name'],
      'game_name'     => $_POST['p7_game_name'],
      'mobile_no'     => $_POST['p7_mobile_no'],
      'email_id'      => $_POST['p7_email_id'],
      'nic'           => $_POST['p7_nic'],
      'year_of_birth' => $_POST['p7_year_of_birth'],
      'steam_id'      => $_POST['p7_steam_id'],
      'is_captain'    => '0',
      'is_substitute' => '1'
    ),
  );

  if ($validate->isRequired($field_array)) {
    if ($validate->isValidEmail($email_array)) {

      $return_val = $validate->isValidSubs($sub_field_array);

      if ($return_val == 5) {
        unset($playerData[$return_val]);
      }elseif ($return_val == 6) {
        unset($playerData[$return_val]);
      }elseif ($return_val == 2) {
        unset($playerData[6]);
        unset($playerData[5]);
      }

        $player = new Player();
        //Register Multiplayer
        if ($player->mp_register($playerData)) {
           header('Location: success.php');
           die();
        } else {
          return false;
        }
    }
  }
}

 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
  <TITLE>SLCG</TITLE>
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/parsley.min.js"></script>

</HEAD>

<BODY>
  <?php if ($game_region) : ?>
    <center>

      <div class="m">

        <form name="register" method="post" action="mpregister.php" data-parsley-validate>

          <fieldset><legend>MULTIPLAYER REGISTRATION</legend>

            <div class="a"> <div class="l">Region</div><div class="r"><?php echo $game_region["region_name"]; ?></div></div>

            <INPUT type="hidden" name="region_id" value=<?php echo $game_region["region_id"]; ?>>

            <div class="a"> <div class="l">Game</div><div class="r"><?php echo $game_region["game"]; ?></div></div>

            <INPUT type="hidden" name="game_id" value=<?php echo $game_region["game_id"]; ?>>

            <div class="a"></div>

            <div class="a"> <div class="l">[TEAM INFO]</div></div>

            <div class="a"> <div class="l">Team Name</div><div class="r"><INPUT type="text" name="team_name" data-parsley-required="true" data-parsley-required-message="Team Name is required."></div></div>

            <div class="a"> <div class="l">Team Tag</div><div class="r"><INPUT type="text" name="team_tag"  data-parsley-required="true" data-parsley-required-message="Team Tag is required."></div></div>

            <div class="a"> <div class="l">Team Logo</div><div class="r"><INPUT type="file" name="team_logo"></div></div>

            <div class="a"></div>

            <!-- ***********************************************************************************************************************   -->

            <div class="a"> <div class="l">[PLAYER INFO]</div></div>

            <div class="a"> <div class="l">(Captain)</div></div>

            <div class="a"> <div class="l">Real Name</div><div class="r"><INPUT type="text" name="c_real_name" data-parsley-required="true" data-parsley-required-message="Real Name is required."></div></div>

            <div class="a"> <div class="l">Game Name</div><div class="r"><INPUT type="text" name="c_game_name" data-parsley-required="true" data-parsley-required-message="Game Name is required."></div></div>

            <div class="a"> <div class="l">Mobile No</div><div class="r"><INPUT type="text" name="c_mobile_no" data-parsley-required="true" data-parsley-required-message="Mobile No is required."></div></div>

            <div class="a"> <div class="l">Email ID</div><div class="r"><INPUT type="text" name="c_email_id" data-parsley-trigger="change" data-parsley-type="email" data-parsley-required="true" data-parsley-required-message="Email is required."></div></div>

            <div class="a"> <div class="l">NIC</div><div class="r"><INPUT type="text" name="c_nic"></div></div>

            <div class="a"> <div class="l">Year of Birth</div><div class="r"><INPUT type="text" name="c_year_of_birth" data-parsley-trigger="change" data-parsley-type="number" data-parsley-required="true" data-parsley-required-message="Year of Birth is required."></div></div>

            <?php if ($game_region["game_id"] == 2 || $game_region["game_id"] == 3) : ?>
            <div class="a"> <div class="l">Steam ID</div><div class="r"><INPUT type="text" name="c_steam_id"></div></div>
            <?php else :?>
            <INPUT type="hidden" name="c_steam_id" value=''>
            <?php endif; ?>

            <div class="a"></div>

            <!-- ***********************************************************************************************************************   -->

            <div class="a"> <div class="l">(Player 2)</div></div>

            <div class="a"> <div class="l">Real Name</div><div class="r"><INPUT type="text" name="p2_real_name" data-parsley-required="true" data-parsley-required-message="Real Name is required."></div></div>

            <div class="a"> <div class="l">Game Name</div><div class="r"><INPUT type="text" name="p2_game_name" data-parsley-required="true" data-parsley-required-message="Game Name is required."></div></div>

            <div class="a"> <div class="l">Mobile No</div><div class="r"><INPUT type="text" name="p2_mobile_no" data-parsley-required="true" data-parsley-required-message="Mobile No is required."></div></div>

            <div class="a"> <div class="l">Email ID</div><div class="r"><INPUT type="text" name="p2_email_id" data-parsley-trigger="change" data-parsley-type="email" data-parsley-required="true" data-parsley-required-message="Email is required."></div></div>

            <div class="a"> <div class="l">NIC</div><div class="r"><INPUT type="text" name="p2_nic"></div></div>

            <div class="a"> <div class="l">Year of Birth</div><div class="r"><INPUT type="text" name="p2_year_of_birth" data-parsley-trigger="change" data-parsley-type="number" data-parsley-required="true" data-parsley-required-message="Year of Birth is required."></div></div>

            <?php if ($game_region["game_id"] == 2 || $game_region["game_id"] == 3) : ?>
            <div class="a"> <div class="l">Steam ID</div><div class="r"><INPUT type="text" name="p2_steam_id"></div></div>
            <?php else :?>
            <INPUT type="hidden" name="p2_steam_id" value=''>
            <?php endif; ?>

            <div class="a"></div>

            <!-- ***********************************************************************************************************************   -->

            <div class="a"> <div class="l">(Player 3)</div></div>

            <div class="a"> <div class="l">Real Name</div><div class="r"><INPUT type="text" name="p3_real_name" data-parsley-required="true" data-parsley-required-message="Real Name is required."></div></div>

            <div class="a"> <div class="l">Game Name</div><div class="r"><INPUT type="text" name="p3_game_name" data-parsley-required="true" data-parsley-required-message="Game Name is required."></div></div>

            <div class="a"> <div class="l">Mobile No</div><div class="r"><INPUT type="text" name="p3_mobile_no" data-parsley-required="true" data-parsley-required-message="Mobile No is required."></div></div>

            <div class="a"> <div class="l">Email ID</div><div class="r"><INPUT type="text" name="p3_email_id" data-parsley-trigger="change" data-parsley-type="email" data-parsley-required="true" data-parsley-required-message="Email is required."></div></div>

            <div class="a"> <div class="l">NIC</div><div class="r"><INPUT type="text" name="p3_nic"></div></div>

            <div class="a"> <div class="l">Year of Birth</div><div class="r"><INPUT type="text" name="p3_year_of_birth" data-parsley-trigger="change" data-parsley-type="number" data-parsley-required="true" data-parsley-required-message="Year of Birth is required."></div></div>

            <?php if ($game_region["game_id"] == 2 || $game_region["game_id"] == 3) : ?>
            <div class="a"> <div class="l">Steam ID</div><div class="r"><INPUT type="text" name="p3_steam_id"></div></div>
            <?php else :?>
            <INPUT type="hidden" name="p3_steam_id" value=''>
            <?php endif; ?>

            <div class="a"></div>

            <!-- ***********************************************************************************************************************   -->

            <div class="a"> <div class="l">(Player 4)</div></div>

            <div class="a"> <div class="l">Real Name</div><div class="r"><INPUT type="text" name="p4_real_name" data-parsley-required="true" data-parsley-required-message="Real Name is required."></div></div>

            <div class="a"> <div class="l">Game Name</div><div class="r"><INPUT type="text" name="p4_game_name" data-parsley-required="true" data-parsley-required-message="Game Name is required."></div></div>

            <div class="a"> <div class="l">Mobile No</div><div class="r"><INPUT type="text" name="p4_mobile_no" data-parsley-required="true" data-parsley-required-message="Mobile No is required."></div></div>

            <div class="a"> <div class="l">Email ID</div><div class="r"><INPUT type="text" name="p4_email_id" data-parsley-trigger="change" data-parsley-type="email" data-parsley-required="true" data-parsley-required-message="Email is required."></div></div>

            <div class="a"> <div class="l">NIC</div><div class="r"><INPUT type="text" name="p4_nic"></div></div>

            <div class="a"> <div class="l">Year of Birth</div><div class="r"><INPUT type="text" name="p4_year_of_birth" data-parsley-trigger="change" data-parsley-type="number" data-parsley-required="true" data-parsley-required-message="Year of Birth is required."></div></div>

            <?php if ($game_region["game_id"] == 2 || $game_region["game_id"] == 3) : ?>
            <div class="a"> <div class="l">Steam ID</div><div class="r"><INPUT type="text" name="p4_steam_id"></div></div>
            <?php else :?>
            <INPUT type="hidden" name="p4_steam_id" value=''>
            <?php endif; ?>

            <div class="a"></div>

            <!-- ***********************************************************************************************************************   -->

            <div class="a"> <div class="l">(Player 5)</div></div>

            <div class="a"> <div class="l">Real Name</div><div class="r"><INPUT type="text" name="p5_real_name" data-parsley-required="true" data-parsley-required-message="Real Name is required."></div></div>

            <div class="a"> <div class="l">Game Name</div><div class="r"><INPUT type="text" name="p5_game_name" data-parsley-required="true" data-parsley-required-message="Game Nameh is required."></div></div>

            <div class="a"> <div class="l">Mobile No</div><div class="r"><INPUT type="text" name="p5_mobile_no" data-parsley-required="true" data-parsley-required-message="Mobile No is required."></div></div>

            <div class="a"> <div class="l">Email ID</div><div class="r"><INPUT type="text" name="p5_email_id" data-parsley-trigger="change" data-parsley-type="email" data-parsley-required="true" data-parsley-required-message="Email is required."></div></div>

            <div class="a"> <div class="l">NIC</div><div class="r"><INPUT type="text" name="p5_nic"></div></div>

            <div class="a"> <div class="l">Year of Birth</div><div class="r"><INPUT type="text" name="p5_year_of_birth" data-parsley-trigger="change" data-parsley-type="number" data-parsley-required="true" data-parsley-required-message="Year of Birth is required."></div></div>

            <?php if ($game_region["game_id"] == 2 || $game_region["game_id"] == 3) : ?>
            <div class="a"> <div class="l">Steam ID</div><div class="r"><INPUT type="text" name="p5_steam_id"></div></div>
            <?php else :?>
            <INPUT type="hidden" name="p5_steam_id" value=''>
            <?php endif; ?>

            <div class="a"></div>

            <!-- ***********************************************************************************************************************   -->        <!-- ***********************************************************************************************************************   -->

            <div class="a">(Player 6) - Substitute</div>

            <div class="a"> <div class="l">Real Name</div><div class="r"><INPUT type="text" name="p6_real_name"></div></div>

            <div class="a"> <div class="l">Game Name</div><div class="r"><INPUT type="text" name="p6_game_name"></div></div>

            <div class="a"> <div class="l">Mobile No</div><div class="r"><INPUT type="text" name="p6_mobile_no" ></div></div>

            <div class="a"> <div class="l">Email ID</div><div class="r"><INPUT type="text" name="p6_email_id"></div></div>

            <div class="a"> <div class="l">NIC</div><div class="r"><INPUT type="text" name="p6_nic"></div></div>

            <div class="a"> <div class="l">Year of Birth</div><div class="r"><INPUT type="text" name="p6_year_of_birth" data-parsley-trigger="change" data-parsley-type="number"></div></div>

            <?php if ($game_region["game_id"] == 2 || $game_region["game_id"] == 3) : ?>
            <div class="a"> <div class="l">Steam ID</div><div class="r"><INPUT type="text" name="p6_steam_id"></div></div>
            <?php else :?>
            <INPUT type="hidden" name="p6_steam_id" value=''>
            <?php endif; ?>

            <div class="a"></div>

            <!-- ***********************************************************************************************************************   -->

            <div class="a">(Player 7) - Substitute</div>

            <div class="a"> <div class="l">Real Name</div><div class="r"><INPUT type="text" name="p7_real_name"></div></div>

            <div class="a"> <div class="l">Game Name</div><div class="r"><INPUT type="text" name="p7_game_name"></div></div>

            <div class="a"> <div class="l">Mobile No</div><div class="r"><INPUT type="text" name="p7_mobile_no"></div></div>

            <div class="a"> <div class="l">Email ID</div><div class="r"><INPUT type="text" name="p7_email_id" data-parsley-trigger="change"  data-parsley-type="email"></div></div>

            <div class="a"> <div class="l">NIC</div><div class="r"><INPUT type="text" name="p7_nic"></div></div>

            <div class="a"> <div class="l">Year of Birth</div><div class="r"><INPUT type="text" name="p7_year_of_birth" data-parsley-trigger="change" data-parsley-type="number"></div></div>

            <?php if ($game_region["game_id"] == 2 || $game_region["game_id"] == 3) : ?>
            <div class="a"> <div class="l">Steam ID</div><div class="r"><INPUT type="text" name="p7_steam_id"></div></div>
            <?php else :?>
            <INPUT type="hidden" name="p7_steam_id" value=''>
            <?php endif; ?>

            <!-- ***********************************************************************************************************************   -->


            <div class="a"> <div class="l">&nbsp;</div> <div class="r"><INPUT type="checkbox" name="i_agree" value="1"> We agree to adhere to the terms ........</div></div>

            <div class="a"> <div class="l">&nbsp;</div> <div class="r"><INPUT type="checkbox" name="i_agree" value="1"> We agree to the rules of the Dota 2 game </div></div>

            <div class="a"> <div class="l">&nbsp;</div> <div class="r"><INPUT class="button" type="submit" name="mpregister" value="Save"></div></div>

            <div class="a"></div>

          </fieldset>

        </form>

      </div>

    </center>
  <?php else : header('Location: error.php'); ?>
  <?php endif; ?>
</BODY>

</HTML>
