<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 ã.
 * Time: 21:17 ÷.
 */

class Template {
    //array of parameters;
    public $aParam = array();

    //check if GET isset or not;
    public function getParam($key) {
        return isset($_GET[$key])? $_GET[$key] : "";
    }


    public function setParams($aParam) {
        $this->aParam = $aParam;
    }

    //Title to be overwritten in TPL;
    protected function Title() {
        return "index";
    }

    //Body to be overwritten in TPL;
    protected function Body(){
        return "body";
    }

    //Main HTML structure;
    public function HTML() {
        ?>
        <html>
            <head>
                <title> <?php $this->Title(); ?> </title>
            </head>
            <body>
                <?php echo $this->Body(); ?>
            </body>

        </html>
        <?php
    }
}
