<?php
if(isset($_POST['addr'])&& !empty($_POST['addr']))
{
    $url= $_POST['addr'];

    $arr = array();

    if (is_dir($url))
    {
        if ($handle = opendir($url))
        {
            while(($file = readdir($handle)) !== FALSE)
            {
                $arr[] = $file;
            }
        }
    }

    closedir($handle);
}
echo "Please fill the details first";
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Duplicate File Delete</title>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="form">
    <form action="index.php" method="post">
        <input type="text" name="addr" id="addr">
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>