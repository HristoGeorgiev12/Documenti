<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 �.
 * Time: 14:53 �.
 */

class TPLcv extends Template {
    protected $table = 'comments';

    protected function Title() {
        return "Home";
    }

    protected function Body() {
        $connect = new Connect('pdo','comments');
        $result = $connect->connect->prepare('Select * FROM '.$connect->table);
        $result->execute();
        $all = $result->fetchAll();

//        var_dump($all);


        echo $this->getParam('name');

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
                              required><br>

                ���������� ����<input type="email"
                                      title="Wrong email"
                                      name="email"
                                      required><br>

                ��������� �����<input type="number"
                                      name="phoneNumeber"
                                      required><br>

                ���� �� �������<input type="date"
                                      name="dateOfBirth"
                                      required><br>
            </div>
            <h3>�����������</h3>
            <div id="SchoolHistory">
                <input type="">
            </div>
            <input type="submit" name="submit">
        </form>
        <?php
    }
}