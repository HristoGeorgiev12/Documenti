<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 21:17 �.
 */

class Template {
    //array of parameters;
    protected $aParam = array();

    //check if GET isset or not;
    public function getParam($key) {
        return isset($this->aParam[$key])? $this->aParam[$key] : "";
    }

    //sets parameters to aParams[];
    public function setParams($aParam) {
        $this->aParam = $aParam;
    }

    //Title to be overwritten in TPL;
    protected function Title() {
        return "index";
    }

    //Form for personal information only
    protected function personalData() {
        ?>
            Име<input type="text"
                      name="fname"
                      pattern="[А-Яа-я]{2,12}"
                      title="Име!"
                      required><br>

            Презиме<input type="text"
                          name="mname"
                          pattern="[А-Яа-я]{2,12}"
                          title="Презиме!"
                          required><br>

            Фамилия<input type="text"
                          name="lname"
                          pattern="[А-Яа-я]{2,12}"
                          title="Фамилия!"
                          required><br><hr>

        <?php
    }

    //Form for Contacts information
    protected function contactData() {
        ?>
        Електронна поща<input type="email"
                                      title="Въведете email адрес."
                                      name="email"
                                      required><br>

        Телефонен номер<input type="number"
                                      name="phoneNumber"
                                      title="Въведете телефонен номер."
                                      required><br><hr>
        <?php
    }

    //Form for BirthDate ann Nationality;
    protected function birthAndNationality() {
        ?>
        Националност<input type="text"
                           name="nationality"
                           title="Въведете вашата националност."
                           required><br>

        Дата на раждане<input type="date"
                              name="dateOfBirth"
                              title="Въведете дата на раждане."
                              required><br><hr>
        <?php
    }

    //Form for work experience only
    protected function workExperience() {
        ?>

        <?php
    }

    //Body to be overwritten in TPL;
    protected function Body(){
        ?>
            <p>Body</p>
        <?php
    }

    //Main HTML structure;
    public function HTML() {
        ?>
        <html>
            <head>
<!--                <meta charset="ISO-8859-1">-->
<!--                <meta charset="utf-8">-->
                <meta charset="utf-8"/>
                <title> <?php $this->Title(); ?> </title>
            </head>
            <body>
                <?php $this->Body(); ?>
            </body>

        </html>
        <?php
    }
}
