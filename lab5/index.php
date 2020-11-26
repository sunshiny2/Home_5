<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
        <?
            echo("<div>");
            $queryTab = "home";
            $headText = "Таблица недвижимость";
            $arrayTitle = array("№", "Адрес", "Тип дома", "Метраж", "Количество комнат", "Стоимость", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='/lab5/new.php?Index="."home"."'> Добавить новую недвижимость</a> </div>");
            echo("</div>");
            
            $queryTab = "house_info";
            $headText = "Таблица жильцы дома";
            $arrayTitle = array("№", "ФИО", "Год рождения", "Дом", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='/lab5/new.php?Index="."house"."'> Добавить нового жильца дома</a> </div>");
            echo("</div>");
            
            $queryTab = "debtor_info";
            $headText = "Таблица должники";
            $arrayTitle = array("№", "Жилец", "Долг", "Изменить", "Удалить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("<div> <a href='/lab5/new.php?Index="."debtor"."'> Добавить нового должника</a> </div>");
            echo("</div>");
            echo("</div>");
            
            echo("<div>");
            echo("<div>");
            
            
            
            echo("</div>");
            echo("<div><br></div>");
            echo("<div> <a href='/lab5/gen_pdf.php'> Открыть PDF - файл </a> </div>");
            echo("<div> <a href='/lab5/gen_xls.php'> Загрузить XLS - файл </a> </div>");
            echo("</div>");
            echo("</div>");
        ?>
    </body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>