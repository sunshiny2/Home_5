<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if((isset($_GET['id']))&&(isset($_GET['query']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['query']));
                switch($index){
                    case "home":
                        $query = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rows = array();
                        echo("<fieldset><legend>Изменить дом</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        while ($row=mysqli_fetch_array($result)){
                            $rows = $row;
                        }
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите адрес: <input name='adress' type='text' maxlength='32' value='$rows[1]'/> <br>");
                        echo("Введите тип дома: <input name='type' type='text' maxlength='32' value='$rows[2]' /> <br>");
                        echo("Введите метраж: <input name='area' type='number' min='1' max='10000' value='$rows[3]'/> <br>");
                        echo("Введите количество комнат: <input name='count' type='number' min='1' max='10000' value='$rows[4]'/> <br>");
                        echo("Введите стоимость: <input name='cost' type='number' min='1' max='100000000' value='$rows[5]'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Сохранить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "house_info":
                        $index = "house";
                        $query = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rws = array();
                        while ($row=mysqli_fetch_array($result)){
                            $rws = $row;
                        }
                        $queryTab = "home";
                        $query = "SELECT * FROM $database.$queryTab ORDER BY $database.$queryTab.id ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        
                        echo("<fieldset><legend>Изменить жильца</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        echo("Введите ФИО: <input name='fio' type='text' maxlength='32' value='$rws[1]' /> <br>");
                        echo("Введите дату рождения: <input name='year' type='date' value='$rws[2]' /> <br>");
                        $id = "home";
                        echo("<label for='$id'>Список домов: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите дом--</option>");
                        while ($row=mysqli_fetch_array($result)){
                            if($rws[3]==$row[0]){
                                echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                            } else{
                                echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                            }
                        }
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Сохранить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "debtor_info":
                        $index = "debtor";
                        $query = "SELECT * FROM $database.$index WHERE id='$id'";
                        $result = mysqli_query($link, $query) or die ("Ошибка в запросе");
                        $rws = array();
                        while ($row=mysqli_fetch_array($result)){
                            $rws = $row;
                        }
                        $queryTab = "house";
                        $query = "SELECT * FROM $database.$queryTab ORDER BY $database.$queryTab.id ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        
                        echo("<fieldset><legend>Изменить должника</legend>");
                        echo("<form id='form' method='post' action='save_edit.php'>");
                        
                        echo("<input type='hidden' name='id' value='$id'>");
                        
                        $id = "house";
                        echo("<label for='$id'>Список жильцов: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите жильца--</option>");
                        while ($row=mysqli_fetch_array($result)){
                            if($rws[1]==$row[0]){
                                echo("<option value='$row[0]' selected> $row[0]) $row[1]</option>");
                            } else{
                                echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                            }
                        }
                        echo("</select><br>");
                        echo("Введите долг: <input type='number' name='cost' min='1' max='100000000' value='$rws[2]'><br>");
                        
                        
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                }
		    }
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>