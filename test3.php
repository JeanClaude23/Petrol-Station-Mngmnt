
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>


  <form action="test3.php" method="POST">
    <input type="text" name="number"><button type="submit">try</button>
  </form>

</body>
</html>
<?php


if (isset($_POST['btnToTest'])) {
    $currentData  = 0;
  for ($i=1; $i < 4; $i++) { 
    $currentData += $_POST['number'];
  }

  echo $currentData;
}

?>