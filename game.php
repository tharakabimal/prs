<?php require('core/init.php'); ?>

<?php
  //Create region oci_fetch_object
  $games = new Game();
  $games_region = $games->getGamesForRegion($_GET["rID"]);

  //Fetch the selected region name
  $regions = new Region();
  $region_by_id = $regions->getRegion($_GET["rID"]);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
  <TITLE>SLCG</TITLE>
  <link rel="stylesheet" type="text/css" href="css/style.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/parsley.min.js">

  </script>

</HEAD>

<BODY>
  <?php if ($games_region) : ?>
    <center>

      <div class="m">
          <b> REGION : <?php echo $region_by_id['region_name']; ?></b>
      </div>
      <div class="m">
          <b>Select Your Game</b>
      </div>

      ------ Multiplayer -------

      <?php foreach ($games_region as $game) : ?>
        <?php if (!$game['is_single_player']) : ?>
          <div class="m">
            <?php if ($game['game_id'] == 5) : ?>
              <a href="mphregister.php?rID=<?php echo $region_by_id['region_id']?>&gID=<?php echo $game['game_id']?>"><?php echo $game['game']; ?></a>
            <?php else : ?>
              <a href="mpregister.php?rID=<?php echo $region_by_id['region_id']?>&gID=<?php echo $game['game_id']?>"><?php echo $game['game']; ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      <?php endforeach ; ?>

      ------ Singleplayer -------

      <?php foreach ($games_region as $game) : ?>
        <?php if ($game['is_single_player']) : ?>
          <div class="m">
            <a href="spregister.php?rID=<?php echo $region_by_id['region_id']?>&gID=<?php echo $game['game_id']?>"><?php echo $game['game']; ?></a>
          </div>
        <?php endif; ?>
      <?php endforeach ; ?>

    </center>
  <?php else : ?>
    <center>
      <div class="m">
        <b> No games found.</b>
      </div>
    </center>
  <?php endif; ?>
</BODY>

</HTML>
