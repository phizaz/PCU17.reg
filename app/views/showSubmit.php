<?php 
    // {{Form::open(array('url' => 'foo/bar', 'method' => 'put'))}}
    // echo Form::label('label_prefix', 'คำนำหน้า', )
    // {{Form::close()}}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
    <style>
        @import url(//fonts.googleapis.com/css?family=Lato:300,400,700);

        body {
            margin:0;
            font-family:'Lato', sans-serif;
            color: #000000;
        }   

        a, a:visited {
            color:#FF5949;
            text-decoration:none;
        }

        a:hover {
            text-decoration:underline;
        }

        ul li {
            display:inline;
            margin:0 1.2em;
        }

        p {
            margin:2em 0;
            color:#555;
        }
    </style>
</head>
<body>
    <h2>ยืนยัน</h2>
    <?php echo $name_prefix ?>
    &nbsp;
    <?php echo $name_first ?>
    &nbsp;
    <?php echo $name_last ?>
    &nbsp;
    <div>
    	<a href="reg">กลับไปแก้ไข</a>
    	<a href="reg/confirm">ยืนยัน</a>
    </div>

</body>
</html>
