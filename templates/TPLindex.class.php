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
        <?php
    }
}