<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
            if(isset($_GET['Index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_GET['Index']));
                switch($index){
                    case "home":
                        echo("<fieldset><legend>Добавить новый дом</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите адрес: <input name='adress' type='text' maxlength='32' /> <br>");
                        echo("Введите тип дома: <input name='type' type='text' maxlength='32' /> <br>");
                        echo("Введите метраж: <input name='area' type='number' min='1' max='10000' value='1'/> <br>");
                        echo("Введите количество комнат: <input name='count' type='number' min='1' max='10000' value='1'/> <br>");
                        echo("Введите стоимость: <input name='cost' type='number' min='1' max='100000000' value='1'/> <br>");
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "house":
                        $queryTab = "home";
                        $query = "SELECT * FROM $database.$queryTab ORDER BY $database.$queryTab.id ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить нового жильца</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        
                        echo("Введите ФИО: <input name='fio' type='text' maxlength='32'/> <br>");
                        echo("Введите дату рождения: <input name='year' type='date'/> <br>");
                        $id = "home";
                        echo("<label for='$id'>Список домов: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите дом--</option>");
                        while ($row=mysqli_fetch_array($result)){
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                        
                        echo("<input type='hidden' name='index' value='$index'> <br>");
                        echo("<input type='submit' value='Добавить'/> <br>");
                        echo("</form>");
                        echo("</fieldset>");
                    break;
                    case "debtor":
                        $queryTab = "house";
                        $query = "SELECT * FROM $database.$queryTab ORDER BY $database.$queryTab.id ASC";
                        $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                        echo("<fieldset><legend>Добавить нового должника</legend>");
                        echo("<form id='form' method='post' action='save_new.php'>");
                        $id = "house";
                        echo("<label for='$id'>Список жильцов: </label>");
                        echo("<select id='$id' name='$id'>");
                        echo("<option value=''>--Выберите жильца--</option>");
                        while ($row=mysqli_fetch_array($result)){
                            echo("<option value='$row[0]'> $row[0]) $row[1]</option>");
                        }
                        echo("</select><br>");
                        echo("Введите долг: <input type='number' name='cost' min='1' max='100000000' value='1'><br>");
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