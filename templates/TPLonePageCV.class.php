<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 23.9.2015 г.
 * Time: 14:29 ч.
 */

class TPLonePageCV extends Template
{
    //Methods return input arrays;
    protected function insertPersonalDataArray()
    {
        //Array to be inserted into DB;
        $insertParams = array();

        if (isset($_POST['submit'])) {
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
        return implode(' ', $insertParams);


    }

    protected function contactDataAraay()
    {
        //Contacts;
        $insertParams['email'] = $this->aParam['email'];
        $insertParams['phoneNumber'] = $this->aParam['phoneNumber'];
        return $insertParams;
    }

    protected function birthAndNationalityArray()
    {
        //BirthDate and Nationality;
        $insertParams['dateOfBirth'] = $this->aParam['dateOfBirth'];
        $insertParams['nationality'] = $this->aParam['nationality'];
        return $insertParams;
    }

    protected function workExperienceArray()
    {
        //Array to be inserted into DB;
        if (isset($_POST['submit'])) {
            $insertParams = array();
            $getRecallParam = array();

            $countArrayElements = count($this->aParam['companyName']) - 1;
            for ($i = 0; $i <= $countArrayElements; $i++) {
                //Work experience information;
                $insertParams['companyName'] = $this->aParam['companyName'][$i];
                $insertParams['companyPosition'] = $this->aParam['companyPosition'][$i];
                $insertParams['dateFrom'] = $this->aParam['dateFromWork'][$i];
                $insertParams['dateTo'] = $this->aParam['dateToWork'][$i];
                $insertParams['jobType'] = $this->aParam['jobType'][$i];
                $insertParams['jobPost'] = $this->aParam['jobPost'][$i];

//                $this->insert('documenti', 'workExperience', $insertParams);

                //getRecallParams
                $getRecallParam[$i] = $insertParams;
            }

            return $getRecallParam;
        }

    }

    protected function educationArray()
    {
        //Array to be inserted into DB;
        if (isset($_POST['submit'])) {
            $insertParams = array();
            $getRecallParam = array();

            $countArrayElements = count($this->aParam['educationInstitution']) - 1;

            for ($i = 0; $i <= $countArrayElements; $i++) {


                //Work experience information;
                $insertParams['educationInstitution'] = $this->aParam['educationInstitution'][$i];
                $insertParams['dateFrom'] = $this->aParam['dateFromEducation'][$i];
                $insertParams['dateTo'] = $this->aParam['dateToEducation'][$i];
                $insertParams['qualificationTitle'] = $this->aParam['qualificationTitle'][$i];
                $insertParams['degreeLevel_id'] = $this->aParam['degreeLevel_id'][$i];

                $getRecallParam[$i] = $insertParams;

                $this->insert('documenti', 'education', $insertParams);

            }

            return $getRecallParam;
        }
    }

    protected function insertHobbiesArray()
    {
        $insertParams = array();
        if (isset($_POST['submit']) && !empty($_POST['hobbies_list'])) {
            //implode hobbies list to a string;
            $implodedStr = implode(', ', $this->aParam['hobbies_list']);

            $insertParams['hobbies'] = $implodedStr;
            $insertParams['otherHobbies'] = $this->aParam['otherHobbies'];

            //Insert array into DB;
//            $this->insert('documenti', 'hobbies', $insertParams);
        }
        return $insertParams;
    }

    //rePrintWorkExperience method for workRecall();
    protected function rePrintWorkExperience()
    {
        $workExperienceData = $this->workExperienceArray();
        $concatWorkExperience = null;

        foreach ($workExperienceData as $key => $value) {
            $concatWorkExperience .= "<h2>{$workExperienceData[$key]['jobPost']}<span>{$workExperienceData[$key]['companyName']} - {$workExperienceData[$key]['companyPosition']} - {$workExperienceData[$key]['dateFrom']} - {$workExperienceData[$key]['dateTo']}</span></h2>
                    <ul>
                        <li>Inspired and won highest peasant death competition among servants</li>
                        <li>Helped coordinate managers to grow cult following</li>
                        <li>Provided untimely deaths to all who opposed</li>
                    </ul>";
        }
        return $concatWorkExperience;
    }

    //rePrintEducation method for educationRecall();
    protected function rePrintEducation()
    {
        $educationData = $this->educationArray();
        $concatEducation = null;

        foreach ($educationData as $key => $value) {
            $concatEducation .= "<h2>{$educationData[$key]['educationInstitution']} <span>{$educationData[$key]['dateFrom']}-{$educationData[$key]['dateTo']}</span>></h2>
                    <p><strong>Специалност:</strong>{$educationData[$key]['qualificationTitle']} <br />
                        <strong>Образователна степен:</strong> {$educationData[$key]['degreeLevel_id']}</p>";
        }
        return $concatEducation;
    }

    protected function Style()
    {
        return '<link href="css/onePageCV.css" rel="stylesheet">';
    }

    protected function Title()
    {
        return 'One Page CV design.';
    }

//    empty head
    protected function head() {

    }

//    empty footer
    protected function footer() {

    }

    protected function Body()
    {
        //Personal Information;
        $personalData = $this->insertPersonalDataArray();
        $contactData = $this->contactDataAraay();
        $birthAndNationalityData = $this->birthAndNationalityArray();
//        $workExperienceData = $this->workExperienceArray();
        $hobbiesAndInterests = $this->insertHobbiesArray();


        echo " <div id='page-wrap'>

            <img src='images/passport2.png' alt='Photo of Cthulu' width='260px' height='303' id='pic' />

            <div id='contact-info' class='vcard'>
                <h1 class='fn'>{$this->insertPersonalDataArray()}</h1>

                <p>
                    Телефон: <span class='tel'>{$contactData['phoneNumber']}</span>
                    Националност: <span class='tel'>{$birthAndNationalityData['dateOfBirth']}</span><br />
                    Email: <a class='email' href='mailto{$contactData['email']}'>{$contactData['email']}</a>
                    Рожденна дата: <span class='tel'>{$birthAndNationalityData['nationality']}</span>
                </p>
            </div>

            <div id='objective'>
                <p>
                    I am an outgoing and energetic (ask anybody) young professional, seeking a
                    career that fits my professional skills, personality, and murderous tendencies.
                    My squid-like head is a masterful problem solver and inspires fear in who gaze upon it.
                    I can bring world domination to your organization.
                </p>
            </div>

            <div class='clear'></div>

            <div class='dl'>
                <div class='clear'></div>

                <div class='dt'>Образование</div>
                <div class='dd'>{$this->rePrintEducation()}</div>

                <div class='clear'></div>

                <div class='dt'>Skills</div>
                <div class='dd'>
                    <h2>Office skills</h2>
                    <p>Office and records management, database administration, event organization, customer support, travel coordination</p>

                    <h2>Computer skills</h2>
                    <p>Microsoft productivity software (Word, Excel, etc), Adobe Creative Suite, Windows</p>
                </div>

                <div class='clear'></div>

                <div class='dt'>Опит</div>
                <div class='dd'>{$this->rePrintWorkExperience()}</div>

                <div class='clear'></div>

                <div class='dt'>Хобита и Интереси</div>
                <div class='dd'>{$hobbiesAndInterests['hobbies']}</div>

                <div class='clear'></div>

                <div class='dt'>References</div>
                <div class='dd'>Available on request</div>

                <div class='clear'></div>
            </div>

            <div class='clear'></div>

        </div>";
    }

}