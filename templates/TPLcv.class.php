<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 14:53 �.
 */

class TPLcv extends Template {

    protected function Style() {

    }

    protected function Title() {
        return "CV Template";
    }

    protected function Body() {
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
                                <div id="loginBorder">
                                    <input type="email" name="email" placeholder="Email"><input type="password" name="password" placeholder="Password"><br>
                                </div>
                                <a href="#">Влизане</a><a id="forgottenPassword" href="#">Забравена Парола</a>
                            </div>
                        </div><!-- /.navbar -->
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h1 class="intro"><div class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <a href="#">About</a>
                                        </li>

                                        <li>
                                            <a href="#">Blog</a>
                                        </li>

                                        <li>
                                            <a href="#">Resume</a>
                                        </li>

                                        <li>
                                            <a href="#">Contact</a>
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
                <form action="?page=onePageCV" method="post">
                    <div class="row grid-list-wrapper no-gutter-space">
                        <div class="col-sm-6 col-lg-4 col-md-4" id="documentType">
                            <div class="grid-list">
                                <?php
                                echo "<h3>Лична информация</h3>";
                                $this->personalData();
                                $this->contactData();
                                $this->birthAndNationality();
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-md-4">
                            <div class="grid-list" id="hobbiesStyle">
                                <?php
                                echo "<h3>Хобита и Интереси</h3>";
                                echo $this->hobbies();
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-md-4" id="documentType">
                            <div class="grid-list">
                                <?php
                                echo "<h3>Трудов стаж</h3>";
                                $this->workExperience();
                                //recall workExperience method;
                                $this->recallWork("workExperience",'recallWorkExperience');
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 col-md-4">
                            <div class="grid-list">
                                <?php
                                echo "<h3>Образование</h3>";
                                $this->education();
                                //recall education method;
                                $this->recallEducation("education",'recallEducation');
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    //            $this->personalData();
                    //            $this->contactData();
                    //            $this->birthAndNationality();
                    ?>
                    <!--            <h3>Трудов стаж</h3>-->
                    <?php
                    //            $this->workExperience();
                    //            //recall workExperience method;
                    //            $this->recallWork("workExperience",'recallWorkExperience');
                    ?>
                    <!--            <h3>Образование</h3>-->
                    <!--            --><?php
                    //            $this->education();
                    //            //recall education method;
                    //            $this->recallEducation("education",'recallEducation');
                    //            ?>
                    <!--            <br><hr>-->
                    <!--            --><?php //$this->hobbies();
                    //            ?>
                    <br><hr>

                    <input id="readyButton" type="submit" name="submit" value="Готово!">
                </form>
            </div>
        </div>

        <footer>
            <div class="container">
                <nav class="nav-footer">
                    <ul>
                        <li>
                            <a href="#">About</a>
                        </li>

                        <li>
                            <a href="#">Blog</a>
                        </li>

                        <li>
                            <a href="#">Resume</a>
                        </li>

                        <li>
                            <a href="#">Contact</a>
                        </li>
                    </ul>

                    <ul>
                        <li><a href="https://www.facebook.com/hristo.georgiev.5836"> <i class="fa fa-facebook"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-github"></i> </a> </li>
                        <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-envelope"></i> </a></li>
                    </ul>

                    <p class="credits text-center">&copy; All Rights Reserved 2015</p>
                </nav>
            </div>

        </footer>
        <script>
            $('#hobbiesStyle').on( 'click', 'input:checkbox', function () {
                $( this ).next('label').addClass( '.selectedCheckBox');
                $( this ).next('label').toggleClass( 'selectedCheckBox', this.checked);
            });

            $('input[type="date"]').on( 'change', function () {
                $( this ).addClass( 'selectedDate');
            });
        </script>
        <?php
    }
}