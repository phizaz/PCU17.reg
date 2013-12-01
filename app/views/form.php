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
            color: #999;
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
    <form action="" method="POST">
        <label for="name_prefix">คำนำหน้า</label>
        <input type="text" name="name_prefix">
        <br>
        <label for="name_first">ชื่อ</label>
        <input type="text" name="name_first">
        <label for="name_last">นามสกุล</label>
        <input type="text" name="name_last" >
        <input type="submit" name="submit">
    </form>

</body>
</html>
