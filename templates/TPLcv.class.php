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
                            <div class="grid-list" >
                                <?php
                                    echo "<h3>Трудов стаж</h3>";
                                    $this->workExperience();
                                ?>

                            </div>
                            <input type="button" value="ново" id="recallWorkExperience" class="recallButton">

<!--                            --><?php
//                            //recall workExperience method;
//                                $this->recallWork("workExperience",'recallWorkExperience');
//
//                            ?>
                        </div>
<!--                            <input type="button" value="още" id="callResponsibilities" class="recallButton">-->
<!--                            <input type="button" value="ново" id="recallWorkExperience" class="recallButton">-->
                        <div class="col-sm-6 col-lg-4 col-md-4">
                            <div class="grid-list" >
                                <?php
                                echo "<h3>Образование</h3>";
                                $this->education();
                                //recall education method;
//                                $this->recallEducation("education",'recallEducation');
                                ?>
                            </div>
                            <input type="button" value="ново" id="recallEducation" class="recallButton">
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
//            add styling class to the corrisponding label of the selected chechbox
            $('#hobbiesStyle').on( 'click', 'input:checkbox', function () {
                $( this ).next('label').addClass( '.selectedCheckBox');
                $( this ).next('label').toggleClass( 'selectedCheckBox', this.checked);
            });

//            add style to date input
            $('input[type="date"]').on( 'change', function () {
                $( this ).addClass( 'selectedDate');
            });

//            onclick recall resposibilities textarea
            $("#callResponsibilities").on('click', function(){
                $("#responsibilities").parent().append($('#responsibilities').clone().val(''));
            });

//            onclick recall workExperience form
            $("#recallWorkExperience").on('click', function(){
                 var clone = $('#workExperience').clone();
                 clone.find('textarea').val('');
                 clone.find('input').val('');
                 $('#workExperience').parent().append(clone);
            });

//            onclick recall education form
            $("#recallEducation").on('click', function(){
                 var clone = $('#education').clone();
                 clone.find('input').val('');
                 $('#education').parent().append(clone);
            });
        </script>
        <?php
    }
}