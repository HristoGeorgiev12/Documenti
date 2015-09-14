<?php



class TPLhtml2pdf extends TPLcv {
    public $pdf = true;

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
            $getParam = $_GET['recallWorkExperience'];
            for($i=0;$i<=$getParam;$i++) {
                $insertParams = array();

                //Work experience information;
                $insertParams['companyName'] = $this->aParam['companyName'][$i];
                $insertParams['dateFrom'] = $this->aParam['dateFromWork'][$i];
                $insertParams['dateTo'] = $this->aParam['dateToWork'][$i];
                $insertParams['jobType'] = $this->aParam['jobType'][$i];
                $insertParams['jobPost'] = $this->aParam['jobPost'][$i];

                $this->insert('documenti', 'workExperience', $insertParams);

            }
        }
    }
    protected function insertEducationArray() {
        //Array to be inserted into DB;
        if(isset($_POST['submit'])) {
            $getParam = $_GET['recallEducation'];
            for($i=0;$i<=$getParam;$i++) {

                $insertParams = array();

                //Work experience information;
                $insertParams['educationInstitution'] = $this->aParam['educationInstitution'][$i];
                $insertParams['dateFrom'] = $this->aParam['dateFromEducation'][$i];
                $insertParams['dateTo'] = $this->aParam['dateToEducation'][$i];
                $insertParams['qualificationTitle'] = $this->aParam['qualificationTitle'][$i];
                $insertParams['degreeLevel_id'] = $this->aParam['degreeLevel_id'][$i];

                $this->insert('documenti', 'education', $insertParams);
            }
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
    }

    //TODO: change the whole method;
    protected function implodeHtml2Pdf() {
        if(isset($_POST['submit'])) {

            //TODO: to execute insert method only once;
        $contentArray = $this->insertPersonalDataArray();

        $result = implode(',',$contentArray);

        return $result;
        }

    }

    protected function Title() {
        return "html2pdf";
    }

    protected function Body() {

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