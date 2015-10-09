<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 18.8.2015 �.
 * Time: 08:36 �.
 */

class TPLerror extends Template {
    public function Title() {
        return "Errors";
    }

    public function Body() {
        ?>
            <p>Errorssssssssssssssssss</p>
        <img src="images/404_man.jpg" alt="Error image" width="auto" height="auto">
        <?php
    }
}