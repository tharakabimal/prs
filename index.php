<?php require('core/init.php'); ?>

<?php
  //Create region regions fetch object
  $regions = new Region();
  $regions_all = $regions->getAllRegions();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
  <TITLE>SLCG</TITLE>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
</HEAD>

<BODY>
  <?php if ($regions_all) : ?>
    <center>
      Select Your Region
      <?php foreach ($regions_all as $region) : ?>
          <div class="m">
            <a href="game.php?rID=<?php echo $region['region_id']?>"><?php echo $region['region_name']; ?></a>
          </div>
      <?php endforeach ; ?>
    </center>
  <?php else : ?>
    <center>
      <div class="m">
        <b> No regions found.</b>
      </div>
    </center>
  <?php endif; ?>
</BODY>

</HTML>
