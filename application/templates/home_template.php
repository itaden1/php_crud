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
        </div>
    </div>
</main>
<?php
include_once "footer.php";
?>