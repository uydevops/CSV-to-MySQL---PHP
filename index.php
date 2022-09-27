<?php 
include'db.php';
?>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="">
    <input type="submit" name="submit" value="submit">
</form>


<?php
if(isset($_POST["submit"]))
{
    $file=$_FILES["file"]["tmp_name"];
    $handle=fopen($file,"r");
    $c=0;
    while(($filesop=fgetcsv($handle,1000,","))!==false)
    {
    
        $c++;
        if($c>1)
        {
         
          $insert=$db->prepare("INSERT INTO `tb_data`(`name`, `age`, `county`) VALUES (?,?,?)");
            $insert->execute([$filesop[0],$filesop[1],$filesop[2]]);

        }
    }
}
   
  
?>
</body>
</html>