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

    //Style Sheet;
    protected function Style() {

    }

    //Recall a HTML WOrk Form;
    protected function recallWork($recallFunction, $recallGetParam) {
        if(!isset($_GET['recallWorkExperience'])&&!isset($_GET['recallWorkExperience'])) {
            $addToWork = 1;
            $addToEducation = 0;
        }elseif(isset($_GET['recallWorkExperience'])) {
            $addToEducation = $_GET['recallEducation'];
            $addToWork = $_GET['recallWorkExperience'];

            $addToWork++;


                for ($counter = 1; $counter < $addToWork; $counter++) {
//                    $this->$recallFunction();
                    $this->workExperience();
                }

        }

        ?>
        <a href="<?php echo '?page=cv&recallWorkExperience=' . $addToWork . '&recallEducation=' . $addToEducation; ?> ">
            Добави новo поле.
        </a>
        <?php

    }

    //Recall a HTML Education Form;
    protected function recallEducation($recallFunction, $recallGetParam) {
        if(!isset($_GET['recallWorkExperience'])&&!isset($_GET['recallWorkExperience'])) {
            $addToWork = 0;
            $addToEducation = 1;
        }elseif(isset($_GET['recallWorkExperience'])) {
            $addToEducation = $_GET['recallEducation'];
            $addToWork = $_GET['recallWorkExperience'];

            $addToEducation++;


            for ($counter = 1; $counter < $addToEducation; $counter++) {
//                    $this->$recallFunction();
                $this->education();
            }

        }

        ?>
        <a href="<?php echo '?page=cv&recallWorkExperience=' . $addToWork . '&recallEducation=' . $addToEducation; ?> ">
            Добави новo поле.
        </a>
        <?php

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

    //Select
    protected function select($dataBase,$table,$insertArray) {
        $db = new Connect($dataBase,$table);

        $connect = $db->connect->prepare("SELECT *
                                          FROM ".$table."
                                          WHERE userEmail='".$insertArray['userEmail']."'
                                          AND userPassword='".$insertArray['userPassword']."' LIMIT 1");
        $connect->execute();
        return $connect->fetchAll();
    }

    //Check the account;
	protected function account_trim($input){
		$input = trim($input);
		$input = stripslashes($input);
		$input = htmlspecialchars($input);
		return $input;
	}

     //Login form:
    public function loginForm() {
        ?>
<!--            <form action="?page=login" method="post">-->
<!--            Email: <input type="email"-->
<!--                          name="emailLogin"-->
<!--                          required><br>-->
<!---->
<!--            Password: <input type="password"-->
<!--                             name="passwordLogin"-->
<!--                             required><br>-->
<!---->
<!--            <input type="submit"-->
<!--                   name="submitLogin"-->
<!--                   value="Зареди профила"><br>-->
<!--            </form>-->
        <form action="?page=login" method="post">
            <fieldset class="account-info">
                <label>
                    Username
                    <input type="email" name="emailLogin">
                </label>
                <label>
                    Password
                    <input type="password" name="passwordLogin">
                </label>
            </fieldset>
            <fieldset class="account-action">
                <input class="btn" type="submit" name="submitLogin" value="Зареди профила">
                <label>
<!--                    Създай профил-->
<!--                    <input type="checkbox" name="remember"> Stay signed in-->
                    <a href="?page=registration">Създай профил</a>
                </label>
            </fieldset>
        </form>

<!--            <a href="?page=registration">Създай профил</a><br><hr>-->
        <?php
    }

    //LogOut form;
    public function logOutForm() {
        if(isset($_SESSION['successfulLogin'])) {
            ?>

            <form action="?page=login" method="post">
                <input type="submit"
                           name="submitLogout"
                           value="Излез от профила"><br>
            </form>
            <?php
        }
    }

    //registration form;
    protected function registration() {
    ?>
<!--    <div id="registrationForm">-->
        <h3>Регистрация</h3>
        <form action="" method="post">

               <input type="email"
               name="userEmail"
               placeholder="Емайл адрес"
               required><br>

               <input type="password"
               name="userPassword"
               placeholder="Парола"
               required><br>

               <input type="password"
               name="userPasswordConfirm"
               placeholder="Повторни Паролата"
               required><br>

        <input type="submit"
               name="submitRegistration"
               value="Регистрирай ме"
               required>
        </form>
<!--    </div>-->
    <?php
    }

    //TODO: add aoutocomplete to the text inputs;

    //Form for personal information only
    protected function personalData() {
        ?>
            <input type="text"
                    autocomplete="off"
                      name="fname"
                      pattern="[А-Яа-я]{2,12}"
                      title="Име!"
                      placeholder="Име"
                      required><br>

            <input type="text" autocomplete='off'
                          name="mname"
                          pattern="[А-Яа-я]{2,12}"
                          title="Презиме!"
                          placeholder="Презиме"
                          required><br>

            <input type="text" autocomplete='off'
                          name="lname"
                          pattern="[А-Яа-я]{2,12}"
                          title="Фамилия!"
                          placeholder="Фамилия"
                          required><br>



        <?php

    }

    //Form for contacts information
    protected function contactData() {
        ?>
        <input type="email"
                      title="Въведете email адрес."
                      name="email"
                      placeholder="Електронна поща"
                      required><br>

        <input type="number"
                      name="phoneNumber"
                      title="Въведете телефонен номер."
                      placeholder="Телефонен номер"
                      required><br>
        <?php
    }

    //Form for BirthDate ann Nationality;
    protected function birthAndNationality() {
        ?>
        <input type="text" autocomplete='off'
               name="nationality"
               title="Въведете вашата националност."
               placeholder="Националност"
               required><br>


<!--               onfocus="(this.type='date')"-->

        <span class="spanStyle">Родженна Дата:</span> <input type="date" autocomplete='off'
                name="dateOfBirth"
                title="Въведете дата на раждане."
                placeholder="Дата на раждане"
                required><br>
        <?php
    }

    //Form for work experience only
    protected function workExperience() {
        ?>
        <input type="text" autocomplete='off'
                  name="companyName[]"
                  pattern="[А-Яа-я]{2,12}"
                  title="Име на компанията!"
                  placeholder="Име на компанията"
                  required><br>
        <span class="spanStyle">Период:</span><br>
        <span class="spanStyle">От</span>
        <input type="date"
                   name="dateFromWork[]"
                   title=""
                   placeholder=""
                   required>

        <span class="spanStyle">До</span>
        <input type="date"
                   name="dateToWork[]"
                   title=""
                   placeholder=""
                   required><br>

         <input type="text" autocomplete='off'
                                name="jobType[]"
                                pattern="[А-Яа-я]{2,12}"
                                title="Име на компанията!"
                                placeholder="Вид на работата"
                                required><br>

        <input type="text" autocomplete='off'
                                name="jobPost[]"
                                pattern="[А-Яа-я]{2,12}"
                                title="Име на компанията!"
                                placeholder="Заемана позиция"
                                required><br>

        <hr>
        <?php
    }

    //Form for education only;
    protected function education() {
        ?>
        <input type="text" autocomplete='off'
                                          name="educationInstitution[]"
                                          title="Име на учебното заведение"
                                          placeholder="Име на учебното заведение"><br>

        <span class="spanStyle">Период:</span><br>
        <span class="spanStyle">От</span>
        <input type="date"
                   name="dateFromEducation[]"
                   placeholder="">
        <span class="spanStyle">До</span>
        <input type="date"
                   name="dateToEducation[]"
                   placeholder=""><br>

        <input type="text" autocomplete='off'
                                name="qualificationTitle[]"
                                placeholder="Завършена специалност"><br>


        <select name="degreeLevel_id[]">
            <option value="select" selected disabled>Ниво на образование</option>
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
        //return variable;
        $return = null;

        //Check boxes for hobbies and interests;
        $aHobbies = array (
            'Кино','Театър','Фотография','Четене', 'Спорт', 'Планинарство', 'Риболов'
        );

        foreach($aHobbies as $value) {
            $return.= "<input type='checkbox' name='hobbies_list[]' value='".$value."'>
                    <label for='".$value."'>".$value."</label><br>";
        }

        $return.= "<textarea name='otherHobbiesc'
                             rows='7'
                             cols='40'
                    ></textarea>";
        return $return;
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
        <!DOCTYPE html>
        <html>
            <head>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--                <script type="text/javascript">-->
<!--                    $(document).ready(function(){-->
<!--                        $('#hobbiesStyle').on( 'click', 'input:checkbox', function () {-->
<!--                            $( this ).next('label').toggleClass( 'highlight', this.checked);-->
<!--                        });-->
<!--                    });-->
<!--                </script>-->
                <meta charset="utf-8">
                <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
<!--                <meta charset="utf-8"/>-->
                <title> <?php echo $this->Title(); ?> </title>
<!--                --><?php //$this->Style();?>
<!--                <link rel="stylesheet" type="text/css" href="css/loginStyleSheet.css">-->
                <!-- Bootstrap + Font Awesome + Main CSS -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- customize this file if needed -->
        <link href="css/main.css" rel="stylesheet">
            </head>
            <body>
<!--                --><?php
//                if(isset($_SESSION['successfulLogin'])) {
//                     echo "Hi,".$_SESSION['successfulLogin'];
//                     $this->logOutForm();
//                }else {
//                    $this->loginForm();
//                }
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
