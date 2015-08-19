<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 14:53 �.
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
            <h3>����� ����������</h3>
            <div id="PersonalInformation">
                ���<input type="text"
                          name="fname"
                          pattern="[�-��-�]{2,12}"
                          title="����������� ���� ��������!"
                          required><br>

                �������<input type="text"
                              name="mname"
                              pattern="[�-��-�]{2,12}"
                              title="����������� ���� ��������!"
                              required><br>

                �������<input type="text"
                              name="lname"
                              pattern="[�-��-�]{2,12}"
                              title="����������� ���� ��������!"
                              required><br><hr>

                ���������� ����<input type="email"
                                      title="������ ����� �� email �������."
                                      name="email"
                                      required><br>

                ��������� �����<input type="number"
                                      name="phoneNumber"
                                      title="�������� ��������� �����."
                                      required><br><hr>

                �����������<input type="text"
                                      name="nationality"
                                      title="�������� ������������� ��."
                                      required><br>

                ���� �� �������<input type="date"
                                      name="dateOfBirth"
                                      title="�������� ���������� �� ����."
                                      required><br><hr>

            </div>
            <input type="submit" name="submit">
        </form>
        <?php
    }
}