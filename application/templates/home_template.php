<?php
include_once "header.php";
?>
<main>
    <div class="container">
        <div class="row">
            <?php foreach($data["speakers"] as $speaker){?>
                <div class="col">
                <img src=<?php echo $speaker["photo"];?>/><br>
                <h3>
                    <?php 
                        echo $speaker["first_name"];
                        echo $speaker["last_name"];
                    ?>
                </h3>
                <h4>
                    <?php
                        echo $speaker["title"];
                    ?>
                </h4>
                </div>
            <?php }; ?>
            <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=151.19610071182254%2C-33.87718547974775%2C151.20768785476685%2C-33.86946237310581&amp;layer=mapnik&amp;marker=-33.873324013781385%2C151.20189428329468" style="border: 1px solid black"></iframe><br/><small><a href="https://www.openstreetmap.org/?mlat=-33.87332&amp;mlon=151.20189#map=17/-33.87332/151.20189&amp;layers=N">View Larger Map</a></small>    </div>
</main>
<?php
include_once "footer.php";
?>