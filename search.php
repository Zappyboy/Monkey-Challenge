<?php
if (isset($_POST['submit'])) {
    $connection = NEW MySqli ("localhost", "root", "", "apen");
    $q = $connection->real_escape_string($_POST['q']);
    $column = $connection->real_escape_string($_POST['column']);

    if ($column == "" || ($column != "soort" && $column != "omschrijving"))
        $column = "soort"; 

    $sql = $connection->query("SELECT soort FROM soort_omschrijving WHERE $column LIKE '%$q%'");
    if ($sql->num_rows > 0) {
        while ($data = $sql->fetch_array())
        echo $data['soort'] . "<br>";

    }else 
        echo "Your search query doesn't match any data"; 
}
?>
<html>
<head> 
<title>Search your monkeys</title>
</head>
<body>
<form method ="post" action ="search.php">
<input type ="text" name ="q" placeholder="Search Query...">
<select name="column">
<option value ="">Select Filter</option>
<option value ="soort">Aap Soort</option>
<option value ="omschrijving">Leefgebied</option>
</select>
<input type ="submit" name ="submit" value ="Find">
</form>
</body>
</html>