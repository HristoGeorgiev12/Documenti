<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 14:53 �.
 */

class TPLcv extends Template {

    protected function Title() {
        return "CV Template";
    }

    protected function Body() {

        ?>
        <form action="?page=html2pdf" method="post">
            <h3>Лична информация</h3>
            <?php
            $this->personalData();
            $this->contactData();
            $this->birthAndNationality();
//            ?>
<!--            <h3>Трудов стаж</h3>-->
<!--            --><?php
//            $this->workExperience();
//            //recall workExperience method;
//            $this->recall("workExperience",'recallWorkExperience');
//            ?>
<!--            <h3>Образование</h3>-->
<!--            --><?php
//            $this->education();
//            //recall education method;
//            $this->recall("education",'recallEducation');
//            ?>
<!--            <br><hr>-->
<!--            --><?php //$this->hobbies();
//            ?>
<!--            <br><hr>-->
            <input type="submit" name="submit">
        </form>
        <?php
    }
}