<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
		    if(isset($_POST['index'])){
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
                            $query = "INSERT INTO $database.$index (id, adress, type, area, count, cost) VALUES (NULL, '$adress', '$type', '$area', '$count', '$cost')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Спасибо! Значения добавлены в $index.");
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
                            $query = "INSERT INTO $database.$index (id, fio, year, home) VALUES (NULL, '$fio', '$year', '$home')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Спасибо! Значения добавлены в $index.");
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
                            $query = "INSERT INTO $database.$index (id, house, cost) VALUES (NULL, '$house', '$cost')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
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