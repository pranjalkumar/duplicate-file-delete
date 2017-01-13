<?php
if(isset($_POST['addr'])&& !empty($_POST['addr'])&& !empty($_POST['task']))
{
    $url= $_POST['addr'];
    $task=$_POST['task'];

    $arr = array();
    $i=0;
    if (is_dir($url))
    {
        if ($handle = opendir($url))
        {
            while(($file = readdir($handle)) !== FALSE)
            {
                $arr[] = $file;$i++;
            }
        }
    }

    $match=0;
    for($j=0;$j<$i;$j++)
    {
//        for($k=$j+1;$k<$i;$k++)
//        {
//            if(((string)$arr[$j] )==((string)$arr[$k]))
//            {
////            {   echo $arr[$k];
////                $match++;
//                if($task=='see'){
//                    echo $arr[$k];
//                }
//                if($task=='delete')
//                {$add=$url.'/'.$arr[$k];
//                unlink($addr);}
//
//            }
//        }
        if(stripos($arr[$j],'('))
        {   $match++;
            if($task=='see'){
                    echo $arr[$j];
                }
                if($task=='delete')
                {$add=$url.'/'.$arr[$j];
                unlink($add);}

        }
    }
    if($match==0)
        echo "No files are present in the directory with the same name";

    closedir($handle);
}
else {
    echo "Please fill the details first";
}?>

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
        <input type="radio" name="task" value="see">View the List of Files with the same name
        <input type="radio" name="task" value="delete">Delete the files with the same name
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>