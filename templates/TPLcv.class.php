<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 ã.
 * Time: 14:53 ÷.
 */

class TPLcv extends Template {
    protected $table = 'comments';

    protected function Title() {
        return "Home";
    }

    protected function Body() {
        $connect = new Connect('pdo','comments');
        $result = $connect->connect->prepare('Select * FROM '.$connect->table);
        $result->execute();
        $all = $result->fetchAll();

        var_dump($all);


        echo $this->getParam('name');
    }
}