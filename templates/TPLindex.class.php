<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 28.9.2015 г.
 * Time: 20:02 ч.
 */

class TPLindex extends Template {
    protected function Style() {
        ?>
        <!-- Bootstrap + Font Awesome + Main CSS -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- customize this file if needed -->
        <link href="css/main.css" rel="stylesheet">
        <?php
    }

    protected function Title() {
        return "Index page";
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
                                <?php if(isset($_SESSION['successfulLogin'])){
                                            echo "Здравей, ".$_SESSION['successfulLogin'];
                                            echo "<form action='?page=login' method='post'><input type='submit' name='submitLogout' value='Logout'></form>";

                                        }else {
                                            echo'<form name="test" method="post" action="?page=login" id="loginBorder">
                                                        <input type="email" name="emailLogin" placeholder="Email"><input type="password" name="passwordLogin" placeholder="Password"><br>
                                                        <input type="submit" name="Login" value="Влез"><a id="forgottenPassword" href="?page=registration">Регистрирай се</a>
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
                                            <a href="#">Предложения</a>
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
                <div class="row grid-list-wrapper no-gutter-space">
                    <div class="col-sm-6 col-lg-4 col-md-4" id="documentType">
                        <div class="grid-list">
                            <a href="http://www.porsche.com/international/_bulgaria_/">
                                <img class="img-responsive" src="cvTemplates/CV.png" alt="car">
                            </a>
                            <div class="overlay">
                                <a href="?page=cv">
                                    <h2>Porsche</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-md-4">
                        <div class="grid-list">
                            <a href="http://www.porsche.com/international/_bulgaria_/">
                                <img class="img-responsive" src="cvTemplates/gemballa-mirage-gt-matte-black-edition-porsche-carrera-gt.jpg" alt="car">
                            </a>
                            <div class="overlay">
                                <a href="?formLoad=cvInputForm">
                                    <h2>Porsche</h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

                    <ul>
                        <li><a href="https://www.facebook.com/hristo.georgiev.5836"> <i class="fa fa-facebook"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                        <li><a href="#"> <i class="fa fa-github"></i> </a> </li>
                        <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
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
}