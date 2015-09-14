<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 11.9.2015 г.
 * Time: 09:40 ч.
 */

class TPLlogin extends Template {
    protected function loginCheck() {
       if(isset($_POST['submitLogin'])) {
           $insertParams = array();
           $insertParams['userEmail'] = $this->aParam['emailLogin'];
           $insertParams['userPassword'] = md5($this->aParam['passwordLogin']);

           //return matching results;
           $result = $this->select('documenti','users',$insertParams);

           if(!empty($result)) {
               $_SESSION['successfulLogin']=$insertParams['userEmail'];
               header("Location:?page=cv");
               exit;
           }
       }
        if(isset($_POST['submitLogout'])) {
            session_destroy();
            header("Location:?page=cv");
            exit;
        }

    }





    protected function Title() {
        return "LoginCheck";
    }

    protected function Body() {

            //TODO: if loginCheck returns a result, start a session and login;
            $toBelooped = $this->loginCheck();

            foreach($toBelooped as $value) {

                echo $value['userEmail']."<br>". $value['userPassword'] ;
            }

    }
}