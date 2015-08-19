<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 г.
 * Time: 14:53 ч.
 */

class TPLcv extends Template {
    protected $table = 'comments';

    private function insertParams() {
        //Array to be inserted into DB;
        $insertParams = array();

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

    protected function Title() {
        return "Home";
    }

    protected function Body() {
        //Implode keys and values;
        $keyParam = implode(', ', array_keys($this->insertParams()));

        $valueConcatArray = array();
        foreach($this->insertParams() as $key=>$value) {
            $valueConcatArray[] = " :".$value ;
        }
        $valueParam = implode(',', $valueConcatArray);

        //Insert into DB personal data;
        $db = new Connect('documenti','personalData');
        $connect = $db->connect->prepare("INSERT INTO "
                                            .$this->table." (".$keyParam.")
												VALUES(".$valueParam.")");

        $connect->execute($this->insertParams());

        var_dump($this->insertParams());
        var_dump($keyParam);
        var_dump($valueParam);

        ?>
        <form action="" method="post">
            <h3>Лична информация</h3>
            <div id="PersonalInformation">
                Име<input type="text"
                          name="fname"
                          pattern="[А-Яа-я]{2,12}"
                          title="Използвайте само Кирилица!"
                          required><br>

                Презиме<input type="text"
                              name="mname"
                              pattern="[А-Яа-я]{2,12}"
                              title="Използвайте само Кирилица!"
                              required><br>

                Фамилия<input type="text"
                              name="lname"
                              pattern="[А-Яа-я]{2,12}"
                              title="Използвайте само Кирилица!"
                              required><br><hr>

                Електронна поща<input type="email"
                                      title="Грешна форма на email формата."
                                      name="email"
                                      required><br>

                Телефонен номер<input type="number"
                                      name="phoneNumber"
                                      title="Въведете телефонен номер."
                                      required><br><hr>

                Национаност<input type="text"
                                      name="nationality"
                                      title="Въведете националноста си."
                                      required><br>

                Дата на раждане<input type="date"
                                      name="dateOfBirth"
                                      title="Изберете рожденната си дата."
                                      required><br><hr>

            </div>
            <input type="submit" name="submit">
        </form>
        <?php
    }
}