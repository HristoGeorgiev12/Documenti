<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 10.9.2015 г.
 * Time: 19:29 ч.
 */

class TPLregistration extends Template {
    protected function insertRegistrationArray() {
        if(isset($_POST['submitRegistration'])) {
            //If the passwords match, continue with the registration;
            if($this->aParam['userPassword'] == $this->aParam['userPasswordConfirm']) {

                $insertParams = array();
                $insertParams['userEmail'] = $this->aParam['userEmail'];
                $insertParams['userPassword'] = md5($this->aParam['userPassword']);

                //check is the Email in users DB
                    //if true, don`t insert
                    //else insert
                $emailCheck = $this->select('documenti','users',$insertParams);
                if(empty($emailCheck)) {
                    //insert into DB;
                    $this->insert('documenti','users',$insertParams);
                    return 'Вие успешно създадохте своя профил!';
                }else {
                    return "Вече има създаден профил с този Email адрес.";
                }


            }else {
                return "Въведениете от вас пароли не съвпадат.";
            }
        }
    }

    public function Title() {
        return "This is registration form";
    }

    public function Body() {
        ?>
            <div id="registrationForm">
        <?php
//        if(isset($_POST['submitRegistration'])) {
            //execute insert method and return message;
            echo $this->insertRegistrationArray();
//        }

        //registration form;
        $this->registration();

        ?>
            </div>
        <?php
    }

}