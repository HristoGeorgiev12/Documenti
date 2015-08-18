<?php
/**
 * Created by PhpStorm.
 * User: Georgievi
 * Date: 17.8.2015 г.
 * Time: 14:53 ч.
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
            <h3>Лична информация</h3>
            <div id="PersonalInformation">
                Име<input type="text"
                          name="fname"
                          pattern="[А-Яа-я]{2,12}"
                          title="използвайте само Кирилица!"
                          required><br>

                Презиме<input type="text"
                              name="mname"
                              pattern="[А-Яа-я]{2,12}"
                              title="използвайте само Кирилица!"
                              required><br>

                Фамилия<input type="text"
                              name="lname"
                              pattern="[А-Яа-я]{2,12}"
                              title="използвайте само Кирилица!"
                              required><br>

                Електронна поща<input type="email"
                                      title="Wrong email"
                                      name="email"
                                      required><br>

                Телефонен номер<input type="number"
                                      name="phoneNumeber"
                                      required><br>

                Дата на раждане<input type="date"
                                      name="dateOfBirth"
                                      required><br>
            </div>
            <h3>Образование</h3>
            <div id="SchoolHistory">
                <input type="">
            </div>
            <input type="submit" name="submit">
        </form>
        <?php
    }
}