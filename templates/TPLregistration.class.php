<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 10.9.2015 г.
 * Time: 19:29 ч.
 */

class TPLregistration extends Template {
    protected function insertRegistrationArray() {
        $insertParams = array();
        if(isset($_POST['submitRegistration'])) {
            //If the passwords match, continue with the registration;
            if($this->aParam['userPassword'] == $this->aParam['userPasswordConfirm']) {

            $insertParams['userEmail'] = $this->aParam['userEmail'];
            $insertParams['userPassword'] = md5($this->aParam['userPassword']);


            $this->insert('documenti','users',$insertParams);
            return 'Successfully created account';
            }
        }else {
            return "Passwords did not match";
        }
    }

    public function Title() {
        return "This is registration form";
    }

    public function Body() {
        //execute insert method and return message;
        echo $this->insertRegistrationArray();

        //registration form;
        $this->registration();
    }

}