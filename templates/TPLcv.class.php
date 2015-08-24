<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 14:53 �.
 */

class TPLcv extends Template {
    //Arrays from the inputs;
    protected function personalDataArray() {
        //Array to be inserted into DB;
        $insertParams = array();

        if(isset($_POST['submit'])) {
            //Names
            $insertParams['fname'] = $this->aParam['fname'];
            $insertParams['mname'] = $this->aParam['mname'];
            $insertParams['lname'] = $this->aParam['lname'];

            //Contacts;
            $insertParams['email'] = $this->aParam['email'];
            $insertParams['phoneNumber'] = $this->aParam['phoneNumber'];

            //BirthDate and Nationality;
            $insertParams['dateOfBirth'] = $this->aParam['dateOfBirth'];
            $insertParams['nationality'] = $this->aParam['nationality'];


            return $insertParams;
        }

    }
    protected function workExperienceArray() {
        //Array to be inserted into DB;
        $insertParams = array();

        if(isset($_POST['submit'])) {
            //Work experience information;
            $insertParams['companyName'] = $this->aParam['companyName'];
            $insertParams['dateFrom'] = $this->aParam['dateFrom'];
            $insertParams['dateTo'] = $this->aParam['dateTo'];
            $insertParams['jobType'] = $this->aParam['jobType'];
            $insertParams['jobPost'] = $this->aParam['jobPost'];

            return $insertParams;
        }
    }
    protected function educationArray() {
        //Array to be inserted into DB;
        $insertParams = array();

        if(isset($_POST['submit'])) {
            //Work experience information;
            $insertParams['educationInstitution'] = $this->aParam['educationInstitution'];
            $insertParams['dateFrom'] = $this->aParam['dateFrom'];
            $insertParams['dateTo'] = $this->aParam['dateTo'];
            $insertParams['qualificationTitle'] = $this->aParam['qualificationTitle'];
            $insertParams['degreeLevel_id'] = $this->aParam['degreeLevel_id'];

            return $insertParams;
        }
    }


    protected function Title() {
        return "CV Template";
    }

    protected function Body() {
        //Inserts
        $this->insert('documenti', 'personalData', $this->personalDataArray());
        $this->insert('documenti', 'workExperience', $this->workExperienceArray());
        $this->insert('documenti', 'education', $this->educationArray());

        ?>
        <form action="" method="post">
            <h3>Лична информация</h3>
            <?php
            $this->personalData();
            $this->contactData();
            $this->birthAndNationality();
            ?>
            <h3>Трудов стаж</h3>
            <?php
            $this->workExperience();
            //recall workExperience method;
            $this->recall("workExperience",'recallWorkExperience');
            ?>
            <h3>Образование</h3>
            <?php
            $this->education();
            //recall education method;
            $this->recall("education",'recallEducation');
            ?>
            <br>
            <input type="submit" name="submit">
        </form>
        <?php
    }
}