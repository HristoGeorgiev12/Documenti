<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 18.8.2015 �.
 * Time: 12:56 �.
 */

class TPLapplication extends Template {
    public function Title() {
        return "Application Template";
    }

    public function Body() {

        $this->personalData();
        ?>

        <?php
    }
}