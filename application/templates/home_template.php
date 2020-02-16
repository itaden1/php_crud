<?php
include_once "header.php";
?>
<main>
    <div class="container">
        <table class="table">
            <?php foreach($data["events"] as $event){?>
                <tr>
                    <?php foreach($event as $item){?>
                        <td>
                            <?php 
                                echo $item;
                            ?>
                        </td>
                    <?php }; ?>
                </tr>
            <?php }; ?>
        </table>
    </div>
</main>
<?php
include_once "footer.php";
?>