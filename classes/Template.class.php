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
        ?>
            <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
            <link href="css/bootstrap.css" rel="stylesheet">
            <!-- customize this file if needed -->
            <link href="css/main.css" rel="stylesheet">
        <?php
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
                      pattern="[А-Яа-я]{2,30}"
                      title="Име!"
                      placeholder="Име"
                      required><br>

            <input type="text" autocomplete='off'
                          name="mname"
                          pattern="[А-Яа-я]{2,30}"
                          title="Презиме!"
                          placeholder="Презиме"
                          required><br>

            <input type="text" autocomplete='off'
                          name="lname"
                          pattern="[А-Яа-я]{2,30}"
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
        <div id="workExperience">
            <input type="text" autocomplete='off'
                      name="companyName[]"
                      pattern="[А-Яа-я]{2,30}"
                      title="Име на компанията!"
                      placeholder="Име на компанията"
                      required><br>
            <input type="text" autocomplete='off'
                      name="companyPosition[]"
                      pattern="[А-Яа-я]{2,30}"
                      title="Местоположение на работодателят!"
                      placeholder="Местоположение на работодателят"
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

    <!--         <input type="text" autocomplete='off'-->
    <!--                                name="jobType[]"-->
    <!--                                pattern="[А-Яа-я]{2,30}"-->
    <!--                                title="Име на компанията!"-->
    <!--                                placeholder="Отговорности"-->
    <!--                                required><br>-->



            <input type="text" autocomplete='off'
                                    name="jobPost[]"
                                    pattern="[А-Яа-я]{2,30}"
                                    title="Име на компанията!"
                                    placeholder="Заемана длъжност"
                                    required><br>

            <div>
        <!--Да се синхронизира с База Данни и да се промени името на текстовото поле-->
                <textarea id="responsibilities" name='otherHobbies[]'
                                    placeholder="Отговарях за..."
                                     rows='3'
                                     cols='40'></textarea>
            </div>
            <input type="button" value="още" id="callResponsibilities" class="recallButton">
        </div>

        <?php
    }

    //Form for education only;
    protected function education() {
        ?>
        <div id="education">
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
            </select><br>
        </div>
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

        $return.= "<textarea name='otherHobbies'
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

    protected function head() {
        ?>
            <div class="wrapper">
                    <div class="container">
                        <header>
                            <div class="row">
                                <div class="navbar">
                                    <div class="navbar-header">
                                        <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Документи.ком</a>
                                    </div>
                                    <div class="nav navbar-nav social"  id="float">
                                        <?php if(isset($_SESSION['successfulLogin'])){
                                                    echo "Здравей, ".$_SESSION['successfulLogin'];
                                                    echo "<form action='?page=login' method='post'><input type='submit' name='submitLogout' value='Logout'></form>";

                                                }else {
                                                    echo'<form name="test" method="post" action="?page=login" id="loginBorder">
                                                                <input type="email" name="emailLogin" placeholder="Email"><input type="password" name="passwordLogin" placeholder="Password"><br>
                                                                <input type="submit" name="Login" value="Влез"><a id="registrationLink" href="?page=registration">Регистрирай се</a>
                            <!--                                    <input type="submit">-->
                                                            </form>';
                                                }
                                        ?>
                                    </div>
                                </div><!-- /.navbar -->
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <h1 class="intro"><div class="collapse navbar-collapse">
                                            <ul class="nav navbar-nav">
                                                <li>
                                                    <a href="#">Отностно старицата</a>
                                                </li>

                                                <li>
                                                    <a href="#">Блог</a>
                                                </li>

                                                <li>
                                                    <a href="#contacts">Предложения</a>
                                                </li>

                                                <li>
                                                    <a href="#contacts">Контакти</a>
                                                </li>
                                            </ul>
                                            <!--							<div class="nav navbar-nav social"  id="float">-->
                                            <!--								<div id="loginBorder">-->
                                            <!--									<input type="email" name="email" placeholder="Email"><input type="password" name="password" placeholder="Password"><br>-->
                                            <!--								</div>	-->
                                            <!--								<a href="#">Влизане</a><a id="forgottenPassword" href="#">Забравена Парола</a>-->
                                            <!--							</div>-->

                                            <!--<ul class="nav navbar-nav social">
                                                      <li><a href="https://www.facebook.com/hristo.georgiev.5836"> <i class="fa fa-facebook"></i> </a></li>
                                                      <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                                                      <li><a href="#"> <i class="fa fa-github"></i> </a> </li>
                                                      <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                                      <li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
                                            </ul>-->

                                        </div><!-- /.nav-collapse --> </span></h1>
                                </div>
                            </div>
                        </header>
        <?php
    }

    protected function footer() {
        ?>
             <footer>
                    <div class="container" id="contacts">
                        <nav class="nav-footer">
                            <ul>
                                <li>
                                    <a href="#">Отностно страницата</a>
                                </li>

                                <li>
                                    <a href="#">Блог</a>
                                </li>
                            </ul>
                            <p id="shareIdeasWithUsHead">Свържете се чрез</p>
                            <ul>
                                <li><a href="https://www.facebook.com/hristo.georgiev.5836"> <i class="fa fa-facebook"></i> </a></li>
        <!--                        <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>-->
                                <li><a href="https://github.com/HristoGeorgiev12"> <i class="fa fa-github"></i> </a> </li>
        <!--                        <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>-->
                                <li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
                            </ul>

                            <p id="shareIdeasWithUsHead">Споделете ни идеята си.</p>
                            <textarea id="shareIdeasWithUsTextarea"></textarea>
                            <input type="submit" name="ideaSubmit" id="shareIdeasWithUsSubmit" value="Изпрати предложението">

                            <p class="credits text-center">&copy; All Rights Reserved 2015</p>
                        </nav>
                    </div>

                </footer>
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
                <meta charset="utf-8">
                <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
<!--                <meta charset="utf-8"/>-->
                <title> <?php echo $this->Title(); ?> </title>
                <?php echo $this->Style();?>
<!--                --><?php //$this->Style();?>
<!--                <link rel="stylesheet" type="text/css" href="css/loginStyleSheet.css">-->
                <!-- Bootstrap + Font Awesome + Main CSS -->
<!--                <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">-->
<!--                <link href="css/bootstrap.css" rel="stylesheet">-->
<!--                <!-- customize this file if needed -->
<!--                <link href="css/main.css" rel="stylesheet">-->
            </head>
            <body>
                <?php
                    $this->head();
                    //Overwrite the content of the body method;
                    $this->Body();

                    $this->footer();
                ?>



            </body>

        </html>
        <?php


    }

    public function HTMLpdf() {
        $this->Body();
    }
}
