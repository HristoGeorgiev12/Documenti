<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 11.9.2015 г.
 * Time: 09:40 ч.
 */

class TPLlogin extends Template {
    protected function loginCheck() {
        //Login into Account;
        if(isset($_POST['Login'])) {
            $insertParams = array();
            $insertParams['userEmail'] = $this->aParam['emailLogin'];
//           $insertParams['userPassword'] = md5($this->aParam['passwordLogin']);
            $insertParams['userPassword'] =$this->aParam['passwordLogin'];

            //return matching results;
            $result = $this->select('documenti','users',$insertParams);

            if(!empty($result)) {
//                $_SESSION['successfulLogin']=$insertParams['userEmail'];
                $_SESSION['successfulLogin']=$result['userName'];
                header("Location:?page=index");
                exit;
            }else{
                $_SESSION['successfulLogin']="Invalid";
                header("Location:?page=index");
                exit;
            }
        }


        //Logout from account;
       if(isset($_POST['submitLogout'])) {
            session_destroy();
            header("Location:?page=index");
            exit;
        }

    }

    protected function Title() {
        return "LoginCheck";
    }

    protected function Body() {
      $this->loginCheck();
    }
}