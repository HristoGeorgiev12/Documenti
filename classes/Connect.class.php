<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 ã.
 * Time: 21:42 ÷.
 */

class Connect {
    public $connect;
    protected $database;
    public $table;

    public function __construct($database, $table) {
        $this-connect = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8', 'root', '');
        $this->table = $table;
    }
}