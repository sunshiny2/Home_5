<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
        <?
            if((isset($_POST['id']))&&(isset($_POST['index']))){
                $id = htmlentities(mysqli_real_escape_string($link, $_POST['id']));
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                switch($index){
                    case "home":
                        if((isset($_POST['adress']))&&(isset($_POST['type']))&&(isset($_POST['area']))&&(isset($_POST['count']))&&(isset($_POST['cost']))){
                            $adress = htmlentities(mysqli_real_escape_string($link, $_POST['adress']));
                            $type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
                            $area = htmlentities(mysqli_real_escape_string($link, $_POST['area']));
                            $count = htmlentities(mysqli_real_escape_string($link, $_POST['count']));
                            $cost = htmlentities(mysqli_real_escape_string($link, $_POST['cost']));
                            if((strlen($adress)==0)||(strlen($type)==0)||(strlen($area)==0)||(strlen($count)==0)||(strlen($cost)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET adress = '$adress', type = '$type', area = '$area', count = '$count', cost = '$cost' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Спасибо! Значения изменены в $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "house":
                        if((isset($_POST['home']))&&(isset($_POST['fio']))&&(isset($_POST['year']))){
                            $home = htmlentities(mysqli_real_escape_string($link, $_POST['home']));
                            $fio = htmlentities(mysqli_real_escape_string($link, $_POST['fio']));
                            $year = htmlentities(mysqli_real_escape_string($link, $_POST['year']));
                            if(($home=="")||(strlen($fio)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET fio = '$fio', year = '$year', home = '$home' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Спасибо! Значения изменены в $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                     case "debtor":
                        if((isset($_POST['house']))&&(isset($_POST['cost']))){
                            $house = htmlentities(mysqli_real_escape_string($link, $_POST['house']));
                            $cost = htmlentities(mysqli_real_escape_string($link, $_POST['cost']));
                            if($house==""){
                                die("Ошибка значения пусты");
                            }
                            $query = "UPDATE $database.$index SET house = '$house', cost = '$cost' WHERE $database.$index.id = '$id'";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Спасибо! Значения изменены в $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                }
            }
        ?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>