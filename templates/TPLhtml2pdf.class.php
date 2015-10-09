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
            //TODO: adiv class='dd' get variable in html2pdf;
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
//        if(isset($_POST['submit'])) {
//
//            //TODO: to execute insert method only once;
//            $personalData = implode('<br>', $this->insertPersonalDataArray());
//            $workData = implode('<br>', $this->insertWorkExperienceArray());
////            $educationData = implode('<br>', $this->insertEducationArray());
////            $hobbiesData = implode('<br>', $this->insertHobbiesArray());
//
//
//        return '<h4>Лична Информация</h4><br>
//                {$personalData}<br><hr>
//                <h4>Стаж </h4><br>
//                {$workData}<br><hr>';
////                <h4> Образование</h4><br>
////                {$educationData}<br><hr>
////                <h4>Интереси</h4><br>
////                {$hobbiesData}<br><hr>

            return "<style>* {
    margin: 0;
    padding: 0;
}

.clear {
    clear: both;
}
#page-wrap {
    width: 800px;
    margin: 40px auto 60px;
    background-color: #0000AA;
}
#pic {
    float: right;
    margin: -30px 0 0 0;
}
h1 {
    margin: 0 0 16px 0;
    padding: 0 0 16px 0;
    font-size: 42px;
    font-weight: bold;
    letter-spacing: -2px;
    border-bottom: 1px solid #999;
}
h2 {
    font-size: 20px;
    margin: 0 0 6px 0;
    position: relative;
}
h2 span {
    position: absolute;
    bottom: 0; right: 0;
    font-style: italic;
    font-family: times, Serif;
    font-size: 16px;
    color: #999;
    font-weight: normal;
}
p {
    margin: 0 0 16px 0;
}
a {
    color: #999;
    text-decoration: none;
    border-bottom: 1px dotted #999;
}
a:hover {
    border-bottom-style: solid;
    color: black;
}
ul {
    margin: 0 0 32px 17px;
}
#objective {
    width: 500px;
    float: left;
}
#objective p {
    font-family: times, Serif;
    font-style: italic;
    color: #666;
}
.dt {
    font-style: italic;
    font-weight: bold;
    font-size: 18px;
    text-align: right;
    padding: 0 26px 0 0;
    width: 150px;
    float: left;
    height: 100px;
    border-right: 1px solid #999;
}
.dd {
    width: 600px;
    float: right;
}
div.clear {
    float: none;
    margin: 0;
    height: 15px;
}</style>

     <div id='page-wrap'>

                <img src='images/cthulu.png' alt='Photo of Cthulu' id='pic' />

                <div id='contact-info' class='vcard'>

                    <!-- Microformats! -->

                    <h1 class='fn'>C'thulhu</h1>

                    <p>
                        Cell: <span class='tel'>555-666-7777</span><br />
                        Email: <a class='email' href='mailto:greatoldone@lovecraft.com'>greatoldone@lovecraft.com</a>
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


                    <div class='clear'></div>

                    <div class='dt'>Education</div>
                    <div class='dd'>
                        <h2>Withering Madness University - Planet Vhoorl</h2>
                        <p><strong>Major:</strong> Public Relations<br />
                            <strong>Minor:</strong> Scale Tending</p>
                    </div>

                    <div class='clear'></div>

                    <div class='dt'>Skills</div>
                    <div class='dd'>
                        <h2>Office skills</h2>
                        <p>Office and records management, database administration, event organization, customer support, travel coordination</p>

                        <h2>Computer skills</h2>
                        <p>Microsoft productivity software (Word, Excel, etc), Adobe Creative Suite, Windows</p>
                    </div>

                    <div class='clear'></div>

                    <div class='dt'>Experience</div>
                    <div class='dd'>
                        <h2>Doomsday Cult <span>Leader/Overlord - Baton Rogue, LA - 1926-2010</span></h2>
                        <ul>
                            <li>Inspired and won highest peasant death competition among servants</li>
                            <li>Helped coordinate managers to grow cult following</li>
                            <li>Provided untimely deaths to all who opposed</li>
                        </ul>

                        <h2>The Watering Hole <span>Bartender/Server - Milwaukee, WI - 2009</span></h2>
                        <ul>
                            <li>Worked on grass-roots promotional campaigns</li>
                            <li>Reduced theft and property damage percentages</li>
                            <li>Janitorial work, Laundry</li>
                        </ul>
                    </div>

                    <div class='clear'></div>

                    <div class='dt'>Hobbies</div>
                    <div class='dd'>World Domination, Deep Sea Diving, Murder Most Foul</div>

                    <div class='clear'></div>

                    <div class='dt'>References</div>
                    <div class='dd'>Available on request</div>

                    <div class='clear'></div>


                <div class='clear'></div>

     </div>";


//        }

    }

    protected function Style() {
        require_once('/../css/onePageCV.css');
    }

    protected function Title() {
        return 'html2pdf';
    }

    protected function Body() {


//        var_dump($this->insertWorkExperienceArray());
//        var_dump($this->insertEducationArray());
//
        ob_start();
        $content = $this->implodeHtml2Pdf();
////        $content = 'Христо,Георгиев,mistic12@abv.bg';
//        $content = '<page style='font-family: freeserif'><br />'.$content.'</page>';


//        $content = $this->imgFile();



        // convert in PDF
        require_once(dirname(__FILE__).'/../html2pdf_v4.03/html2pdf.class.php');
        try
        {
            $html2pdf = new HTML2PDF('P', 'A3', 'en', true, 'UTF-8', array(0, 0, 0, 0));
            $html2pdf->pdf->SetDisplayMode('real');
            $html2pdf->writeHTML($content);
            $html2pdf->Output('utf8.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }


    }


}