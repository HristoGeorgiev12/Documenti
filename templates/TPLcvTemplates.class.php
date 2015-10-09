<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 18.9.2015 г.
 * Time: 13:24 ч.
 */

class TPLcvTemplates extends Template {

    protected function insertPersonalDataArray() {
        //Array to be inserted into DB;
        $insertParams = array();

        if(isset($_POST['submit'])) {
            //Names
            $insertParams['fname'] = $this->aParam['fname'];
            $insertParams['mname'] = $this->aParam['mname'];
            $insertParams['lname'] = $this->aParam['lname'];

//            //Contacts;
//            $insertParams['email'] = $this->aParam['email'];
//            $insertParams['phoneNumber'] = $this->aParam['phoneNumber'];
//
//            //BirthDate and Nationality;
//            $insertParams['dateOfBirth'] = $this->aParam['dateOfBirth'];
//            $insertParams['nationality'] = $this->aParam['nationality'];

            //Insert the array into DB;
//            $this->insert('documenti', 'personalData', $insertParams);
        }
        return $insertParams;


    }

    protected function contactDataAraay() {
        if(isset($_POST['submit'])) {
            //Contacts;
            $insertParams['email'] = $this->aParam['email'];
            $insertParams['phoneNumber'] = $this->aParam['phoneNumber'];
            return $insertParams;
        }
    }

    protected function birthAndNationality() {

        //BirthDate and Nationality;
        $insertParams['dateOfBirth'] = $this->aParam['dateOfBirth'];
        $insertParams['nationality'] = $this->aParam['nationality'];
        return $insertParams;
    }

    protected function Style() {
        require_once("/../css/cvTextPositioning.css");
    }

    protected function Title() {
        return "Choose a Designs for your CV";
    }
    protected function Body() {
        echo "Дизайн<br>";
        
        ?>
        <div id="container">

            <p id="names"><?php
                    foreach($this->insertPersonalDataArray() as $value) {
                        echo $value." ";
                    }
                ?></p>
            <p id="contacts"><?php
                foreach($this->contactData() as $value) {
                    echo $value." ";
                }
                ?></p>
            <p id="birthAndNationality"><?php
                foreach($this->birthAndNationality() as $value) {
                    echo $value." ";
                }
                ?></p>
            <img id="image" src="cvTemplates/12023207_1150098525004774_590714815_n.jpg" alt="smile" width="auto" height="auto">
        </div>
        <?php

        

    }
}