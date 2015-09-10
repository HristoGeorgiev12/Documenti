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

    public $pdf=0;


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

    //Recall a function onclick;
    protected function recall($recallFunction, $recallGetParam) {
        global $addToCounter;
        $addToCounter++;
        if(isset($_GET[$recallGetParam])) {
            $addToCounter += $_GET[$recallGetParam];
            for($counter = 1;$counter<$addToCounter;$counter++) {
              $this->$recallFunction();
            }
        }
//        $getStr = '?'.$recallGetParam.'='.$addToCounter;
        ?>
<!--        <a href="--><?php //echo $getStr;?><!-- " >-->
            Добави новo поле.
        </a>
        <?php
        $addToCounter = null;
    }

    //Insert data in the corresponding database and table;
    protected function insert($dataBase, $table, $insertArray) {
        $db = new Connect($dataBase,$table);

        $connectInsert = $db->implodeInsertedData($insertArray);
        $keyParam = $connectInsert[0];
        $valueParam = $connectInsert[1];


        $connect = $db->connect->prepare("INSERT INTO "
            .$db->table." (".$keyParam.")
												VALUES(".$valueParam.")");
        $connect->execute($insertArray);
    }

     //Login form:
    public function login() {
        ?>
            Email: <input type="email"
                          name="loginEmail"
                          required><br>

            Password: <input type="password"
                             name="loginPassword"
                             required><br>

            <input type="submit"
                   name="loginSubmit"
                   value="Submit"><br>

            <a href="TPLcreateAccount.class.php">Create Account</a><br><hr>
        <?php
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

    //Form for contacts information
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
        Име на компанията: <input type="text"
                                  name="companyName[]"
                                  pattern="[А-Яа-я]{2,12}"
                                  title="Име на компанията!"
                                  required><br>
        Период<br>
        От: <input type="date"
                   name="dateFromWork[]"
                   title=""
                   required>

        До: <input type="date"
                   name="dateToWork[]"
                   title=""
                   required><br>

        Вид на работата: <input type="text"
                                name="jobType[]"
                                pattern="[А-Яа-я]{2,12}"
                                title="Име на компанията!"
                                required><br>

        Заемана позиция: <input type="text"
                                name="jobPost[]"
                                pattern="[А-Яа-я]{2,12}"
                                title="Име на компанията!"
                                required><br>

        <hr>
        <?php
    }

    //Form for education only;
    protected function education() {
        ?>
        Име на учебното заведение: <input type="text"
                                          name="educationInstitution[]"
                                          title="Име на учебното заведение"><br>

        Период<br>
        От: <input type="date"
                   name="dateFromEducation[]">
        До: <input type="date"
                   name="dateToEducation[]"><br>

        Завършена специалност: <input type="text"
                                name="qualificationTitle[]"><br>

        Образователна степен:
        <select name="degreeLevel_id[]">
            <option value="1">Начална</option>
            <option value="2">Основна</option>
            <option value="3">Средна</option>
            <option value="4">Средна специална</option>
            <option value="5">Професионален Бакалавър</option>
            <option value="6">Бакалавър</option>
            <option value="7">Магистър</option>
            <option value="8">Докторантура</option>
        </select><br><hr>
        <?php
    }

    //Hobbies form;
    protected function hobbies() {
        ?>
        <h3></h3>
        Хобита и интереси:
        <?php
        //Check boxes for hobbies and interests;
        $aHobbies = array (
            'Кино','Театър','Фотография','Четене'
        );

        foreach($aHobbies as $value) {
            echo $value."<input type='checkbox'
                                name='hobbies_list[]'
                                value=".$value."><br>";
        }

        echo "<textarea name='otherHobbies'></textarea>";
    }

    //Body to be overwritten in TPL;
    protected function Body(){
        ?>
            <p>Body</p>
        <?php
    }

    //Main HTML structure;
    public function HTML() {
        if($this->pdf) {
            $this->HTMLpdf();
        }
        ?>
        <html>
            <head>
                <meta charset="utf-8"/>
                <title> <?php echo $this->Title(); ?> </title>
            </head>
            <body>
                <?php
//                $this->login();
                $this->Body();
                ?>
            </body>

        </html>
        <?php


    }

    public function HTMLpdf() {
        $this->Body();
    }
}
