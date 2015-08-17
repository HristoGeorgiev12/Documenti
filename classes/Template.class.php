<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 ã.
 * Time: 21:17 ÷.
 */

class Template {

    public function getParam() {

    }

    protected function Title() {
        return "index";
    }

    protected function Body() {
        ?>
        <html>
            <head>
                <title> <?php $this->Title(); ?> </title>
            </head>
            <body>
                <?php echo Body(); ?>
            </body>

        </html>
        <?php
    }
}
