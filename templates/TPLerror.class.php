<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 18.8.2015 �.
 * Time: 08:36 �.
 */

class TPLerror extends Template {
    protected function Style() {
        ?>
            <link href="css/error.css" rel="stylesheet">
        <?php
    }

    public function Title() {
        return "Errors";
    }

    protected function head() {}

    protected function footer() {}

    public function Body() {
        ?>
            <img id="errorImage" src="images/404_man.jpg" alt="Error image" width="auto" height="auto">
        <?php
    }
}