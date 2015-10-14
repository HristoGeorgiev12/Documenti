<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 14:53 �.
 */

class TPLcv extends Template {

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
        return "CV Template";
    }

    protected function Body() {
        ?>
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
                            <div class="grid-list" id="workExperience">
                                <?php
                                echo "<h3>Трудов стаж</h3>";
                                $this->workExperience();

                                ?>



                            </div>
                            <input type="button" value="отговарях още за.." id="callResponsibilities">
                            <input type="button" value="ново" id="recallWorkExperience">
<!--                            --><?php
//                            //recall workExperience method;
//                                $this->recallWork("workExperience",'recallWorkExperience');
//
//                            ?>
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


        <script>
            $('#hobbiesStyle').on( 'click', 'input:checkbox', function () {
                $( this ).next('label').addClass( '.selectedCheckBox');
                $( this ).next('label').toggleClass( 'selectedCheckBox', this.checked);
            });

            $('input[type="date"]').on( 'change', function () {
                $( this ).addClass( 'selectedDate');
            });

            $("#callResponsibilities").on('click', function(){
                $("#responsibilities").parent().append($('#responsibilities').clone());
            });

            $("#recallWorkExperience").on('click', function(){
                $("#workExperience").parent().prepend($('#workExperience').clone(true));
            });
        </script>
        <?php
    }
}