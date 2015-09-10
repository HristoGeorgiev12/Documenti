<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 14:53 �.
 */

class TPLcv extends Template {

//    public $pdf = 0;
    //Arrays from the inputs;
//    protected function personalDataArray() {
//        //Array to be inserted into DB;
//        $insertParams = array();
//
//        if(isset($_POST['submit'])) {
//            //Names
//            $insertParams['fname'] = $this->aParam['fname'];
//            $insertParams['mname'] = $this->aParam['mname'];
//            $insertParams['lname'] = $this->aParam['lname'];
//
//            //Contacts;
//            $insertParams['email'] = $this->aParam['email'];
//            $insertParams['phoneNumber'] = $this->aParam['phoneNumber'];
//
//            //BirthDate and Nationality;
//            $insertParams['dateOfBirth'] = $this->aParam['dateOfBirth'];
//            $insertParams['nationality'] = $this->aParam['nationality'];
//
//            //Insert the array into DB;
//            $this->insert('documenti', 'personalData', $insertParams);
//        }
//        return $insertParams;
//
//    }
//    protected function workExperienceArray() {
//        //Array to be inserted into DB;
//        if(isset($_POST['submit'])) {
//            $getParam = $_GET['recallWorkExperience'];
//            for($i=0;$i<=$getParam;$i++) {
//                $insertParams = array();
//
//                //Work experience information;
//                $insertParams['companyName'] = $this->aParam['companyName'][$i];
//                $insertParams['dateFrom'] = $this->aParam['dateFromWork'][$i];
//                $insertParams['dateTo'] = $this->aParam['dateToWork'][$i];
//                $insertParams['jobType'] = $this->aParam['jobType'][$i];
//                $insertParams['jobPost'] = $this->aParam['jobPost'][$i];
//
//                $this->insert('documenti', 'workExperience', $insertParams);
//
//            }
//        }
//    }
//    protected function educationArray() {
//        //Array to be inserted into DB;
//       if(isset($_POST['submit'])) {
//            $getParam = $_GET['recallEducation'];
//            for($i=0;$i<=$getParam;$i++) {
//
//                $insertParams = array();
//
//                //Work experience information;
//                $insertParams['educationInstitution'] = $this->aParam['educationInstitution'][$i];
//                $insertParams['dateFrom'] = $this->aParam['dateFromEducation'][$i];
//                $insertParams['dateTo'] = $this->aParam['dateToEducation'][$i];
//                $insertParams['qualificationTitle'] = $this->aParam['qualificationTitle'][$i];
//                $insertParams['degreeLevel_id'] = $this->aParam['degreeLevel_id'][$i];
//
//                $this->insert('documenti', 'education', $insertParams);
//            }
//        }
//    }
//    protected function hobbiesArray() {
//        $insertParams = array();
//        if(isset($_POST['submit']) && !empty($_POST['hobbies_list'])) {
//            //implode hobbies list to a string;
//            $implodedStr = implode(', ', $_POST['hobbies_list']);
//
//            $insertParams['hobbies'] = $implodedStr;
//            $insertParams['otherHobbies'] = $this->aParam['otherHobbies'];
//
//            //Insert array into DB;
//            $this->insert('documenti', 'hobbies', $insertParams);
//        }
//    }


    protected function Title() {
        return "CV Template";
    }

    protected function Body() {

//        if(isset($_POST['submit'])) {
//            $contentArray = $this->personalDataArray();
//
//            $result = implode(',',$contentArray);
//
//            echo $result;
//        }

//        require_once(dirname(__FILE__).'/../html2pdf.class.php');
//        require_once(dirname(__FILE__).'/../html2pdf_v4.03/html2pdf.class.php');
//
//        // get the HTML
//        ob_start();
////        $content = file_get_contents(dirname(__FILE__).'/../html2pdf_v4.03/_tcpdf_5.0.002/cache/utf8test.txt');
//       $content = "Здравей";
//        $content = '<page style="font-family: freeserif"><br />'.nl2br($content).'</page>';
//
//        // convert to PDF
//        try
//        {
//            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
//            $html2pdf->pdf->SetDisplayMode('real');
//            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
//            $html2pdf->Output('utf8.pdf');
//        }
//        catch(HTML2PDF_exception $e) {
//            echo $e;
//            exit;
//        }
//

        ?>
        <form action="?page=html2pdf" method="post">
            <h3>Лична информация</h3>
            <?php
            $this->personalData();
            $this->contactData();
            $this->birthAndNationality();
            ?>
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