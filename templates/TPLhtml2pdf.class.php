<?php



class TPLhtml2pdf extends TPLcv {
    public $pdf = false;

    //Insert arrays into DB;
    protected function insertPersonalDataArray() {
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

            //Insert the array into DB;
            $this->insert('documenti', 'personalData', $insertParams);
        }
        return $insertParams;


    }
    protected function insertWorkExperienceArray() {
        //Array to be inserted into DB;
        if(isset($_POST['submit'])) {
            //TODO: add get variable in html2pdf;
//            if(isset($_GET['recallWorkExperience'])) {
//                $getParam = $_GET['recallWorkExperience'];
//            }else {
//                $getParam = 0;
//            }
            $insertParams = array();
            $getRecallParam = array();

                $countArrayElements = count($this->aParam['companyName']) - 1;
                for($i=0;$i<=$countArrayElements;$i++) {

                   //Work experience information;
                    $insertParams['companyName'] = $this->aParam['companyName'][$i];
                    $insertParams['dateFrom'] = $this->aParam['dateFromWork'][$i];
                    $insertParams['dateTo'] = $this->aParam['dateToWork'][$i];
                    $insertParams['jobType'] = $this->aParam['jobType'][$i];
                    $insertParams['jobPost'] = $this->aParam['jobPost'][$i];

                    $this->insert('documenti', 'workExperience', $insertParams);

                    $getRecallParam[$i] = $insertParams;


                }

            return $getRecallParam;


        }

    }
    protected function insertEducationArray() {
        //Array to be inserted into DB;
        if(isset($_POST['submit'])) {
//            if(isset($_GET['recallEducation'])){
//                $getParam = $_GET['recallEducation'];
//            }else {
//                $getParam = 0;
//            }
            $insertParams = array();
            $getRecallParam = array();

            $countArrayElements = count($this->aParam['educationInstitution']) - 1;

            for($i=0;$i<=$countArrayElements;$i++) {



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
    protected function insertHobbiesArray() {
        $insertParams = array();
        if(isset($_POST['submit']) && !empty($_POST['hobbies_list'])) {
            //implode hobbies list to a string;
            $implodedStr = implode(', ', $_POST['hobbies_list']);

            $insertParams['hobbies'] = $implodedStr;
            $insertParams['otherHobbies'] = $this->aParam['otherHobbies'];

            //Insert array into DB;
            $this->insert('documenti', 'hobbies', $insertParams);
        }
        return $insertParams;
    }

    //TODO: change the whole method;
    protected function implodeHtml2Pdf() {
        if(isset($_POST['submit'])) {

            //TODO: to execute insert method only once;
            $personalData = implode('<br>', $this->insertPersonalDataArray());
            $workData = implode('<br>', $this->insertWorkExperienceArray());
//            $educationData = implode('<br>', $this->insertEducationArray());
//            $hobbiesData = implode('<br>', $this->insertHobbiesArray());


        return "<h4>Лична Информация</h4><br>
                {$personalData}<br><hr>
                <h4>Стаж </h4><br>
                {$workData}<br><hr>";
//                <h4> Образование</h4><br>
//                {$educationData}<br><hr>
//                <h4>Интереси</h4><br>
//                {$hobbiesData}<br><hr>


        }

    }

    protected function Title() {
        return "html2pdf";
    }

    protected function Body() {

        var_dump($this->insertWorkExperienceArray());
        var_dump($this->insertEducationArray());

        ob_start();
        $content = $this->implodeHtml2Pdf();
//        $content = "Христо,Георгиев,mistic12@abv.bg";
        $content = '<page style="font-family: freeserif"><br />'.$content.'</page>';





        // convert in PDF
        require_once(dirname(__FILE__).'/../html2pdf_v4.03/html2pdf.class.php');
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('real');
            $html2pdf->writeHTML($content,1);
            $html2pdf->Output('utf8.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }


    }


}