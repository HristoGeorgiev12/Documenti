<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 14:53 �.
 */

class TPLcv extends Template {
//    protected $table = 'personalData';

    private function insertParams() {
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

    protected function Title() {
        return "CV Template";
    }

    protected function Body() {
        //Insert into DB personal data;
        $db = new Connect('documenti','personalData');

        $connectInsert = $db->implodeInsertedData($this->insertParams());
        $keyParam = $connectInsert[0];
        $valueParam = $connectInsert[1];


        $connect = $db->connect->prepare("INSERT INTO "
                                            .$db->table." (".$keyParam.")
												VALUES(".$valueParam.")");
        $connect->execute($this->insertParams());


        ?>
        <form action="" method="post">
            <h3>Лична информация</h3>
            <?php
            $this->personalData();
            $this->contactData();
            $this->birthAndNationality();
            ?>
            <input type="submit" name="submit">
        </form>
        <?php
    }
}