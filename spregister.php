<?php require('core/init.php'); ?>

<?php
// if (isset($_POST['register'])) {
  //Fetch the Game for the selected Region
  $games = new Game();
  $game_region = $games->getGameForRegion($_GET["rID"], $_GET["gID"]);
// }

?>

<?php
if (isset($_POST['spregister'])) {
  //Create Data array

  $data = array();
  $data['region_id']      = $_POST['region_id'];
  $data['game_id']        = $_POST['game_id'];
  $data['real_name']      = $_POST['real_name'];
  $data['game_name']      = $_POST['game_name'];
  $data['mobile_no']      = $_POST['mobile_no'];
  $data['email_id']       = $_POST['email_id'];
  $data['nic']            = $_POST['nic'];
  $data['year_of_birth']  = $_POST['year_of_birth'];
  $data['email_id']       = $_POST['email_id'];
  $data['nic']            = $_POST['nic'];
  $data['year_of_birth']  = $_POST['year_of_birth'];


  /*
  * Server side validation
  */

  $validate = new Validator();

  //Required Fields
  $field_array = array('region_id', 'game_id', 'real_name', 'game_name', 'mobile_no', 'email_id', 'year_of_birth');
  $email_array = array($data['email_id']);

    if ($validate->isRequired($field_array)) {
      if ($validate->isValidEmail($email_array)) {

          $player = new Player();

          //Register Singleplayer
          if ($player->sp_register($data)) {
            return true;
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
  <link rel="stylesheet" href="css/screen.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/parsley.min.js"></script>

</HEAD>

<BODY>
  <?php if ($game_region): ?>
    <center>

      <div class="m">

        <form name="register" method="post" action="spregister.php" data-parsley-validate>

          <fieldset><legend>SINGLE PLAYER REGISTRATION</legend>

            <div class="a"> <div class="l">Region</div><div class="r"><?php echo $game_region["region_name"]; ?></div></div>

            <INPUT type="hidden" name="region_id" value=<?php echo $game_region["region_id"]; ?>>

            <div class="a"> <div class="l">Game</div><div class="r"><?php echo $game_region["game"]; ?></div></div>

            <INPUT type="hidden" name="game_id" value=<?php echo $game_region["game_id"]; ?>>

            <div class="a"> <div class="l">Real Name</div><div class="r"><INPUT type="text" name="real_name" data-parsley-required="true" data-parsley-required-message="Real Name is required."></div></div>

            <div class="a"> <div class="l">Game Name</div><div class="r"><INPUT type="text" name="game_name" data-parsley-required="true" data-parsley-required-message="Game Name is required."></div></div>

            <div class="a"> <div class="l">Mobile No</div><div class="r"><INPUT type="text" name="mobile_no" data-parsley-required="true" data-parsley-required-message="Mobile No is required."></div></div>

            <div class="a"> <div class="l">Email ID</div><div class="r"><INPUT type="text" name="email_id" data-parsley-trigger="change" data-parsley-type="email" data-parsley-required="true" data-parsley-required-message="Email is required."></div></div>

            <div class="a"> <div class="l">NIC</div><div class="r"><INPUT type="text" name="nic"></div></div>

            <div class="a"> <div class="l">Year of Birth</div><div class="r"><INPUT type="text" name="year_of_birth" data-parsley-trigger="change" data-parsley-type="number"  data-parsley-required="true" data-parsley-required-message="Year of Birth is required."></div></div>

            <div class="a"> <div class="l">&nbsp;</div> <div class="r"><INPUT type="checkbox" name="i_agree" value="1"> We agree to adhere to the terms ........</div></div>

            <div class="a"> <div class="l">&nbsp;</div> <div class="r"><INPUT type="checkbox" name="i_agree" value="1"> We agree to the rules of the Dota 2 game </div></div>

            <div class="a"> <div class="l">&nbsp;</div> <div class="r"><INPUT class="button" type="submit" name="spregister" value="Save"></div></div>

            <div class="a"></div>

          </fieldset>
        </form>

      </div>

    </center>

  <?php else : echo "WHAT DID YOU DO.....?"; //header('Location: index.php'); ?>
  <?php endif; ?>
</BODY>

</HTML>
