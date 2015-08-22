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

    //Recall a function onclick;
    protected function recall($recallFunction, $recallGetParam) {
        $addToCounter = $_GET[$recallGetParam] + 1;
         if(isset($_GET[$recallGetParam])) {
            for($counter = 1;$counter<$addToCounter;$counter++) {
                $this->workExperience();
            }
         }
        ?>
        <a href="<?php echo '?'.$recallGetParam.'='.$addToCounter;?> " >
            Recall
        </a>
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
                                  name="companyName"><br>

        Период<br>
        От: <input type="date"
               name="dateFrom">
        До: <input type="date"
               name="dateTo"><br>

        Вид на работата: <input type="text"
                                name="jobType"><br>

        Заемана позиция: <input type="text"
                                name="jobPost"><br>

        <hr>
        <?php

    }

    //Form for education only;
    protected function education() {
        ?>
        Име на учебното заведение: <input type="text"
                                  name="educationInstitution"><br>

        Период<br>
        От: <input type="date"
                   name="dateFrom">
        До: <input type="date"
                   name="dateTo"><br>

        Завършена специалност: <input type="text"
                                name="qualificationTitle"><br>

        Образователна степен:
        <select name="degreeLevel">
            <option value="">Начална</option>
            <option value="">Основна</option>
            <option value="">Средна</option>
            <option value="">Средна специална</option>
            <option value="">Професионален Бакалавър</option>
            <option value="">Бакалавър</option>
            <option value="">Магистър</option>
            <option value="">Докторантура</option>
        </select><br><hr>
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
