<?php
include_once "header.php";
?>
<main>
    <div class="container">
        <div class="row">
            <?php foreach($data["events"] as $event){?>
                <div class="col">
                <img src=<?php echo $event["photo"];?>/><br>
                <h3>
                    <?php 
                        echo $event["name"];
                    ?>
                </h3>
                <h4>
                    <?php
                        echo $event["institution"];
                    ?>
                </h4>
                </div>
            <?php }; ?>
            <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=<?php echo $event["location_lat"] ?>%2C<?php echo $event["location_long"] ?>%2C<?php echo $event["location_lat"] ?>%2C<?php echo $event["location_long"] ?>&amp;layer=mapnik&amp;marker=<?php echo $event["location_lat"] ?>%2C<?php echo $event["location_long"] ?>" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=-33.87332&amp;mlon=151.20189#map=17/-33.87332/151.20189&amp;layers=N">View Larger Map</a></small>    </div>
</main>
<?php
include_once "footer.php";
?>