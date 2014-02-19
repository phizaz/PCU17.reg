<?php 
    // {{Form::open(array('url' => 'foo/bar', 'method' => 'put'))}}
    // echo Form::label('label_prefix', 'คำนำหน้า', )
    // {{Form::close()}}

?>

<!-- <!doctype html>
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
 -->
 <!doctype html>
<html>
<head>
    <?php   
            $url = URL::to('');
            $months = DB::table('month')->get();
    ?>
    <meta charset='utf-8'>
    <script src="<?=$url?>/js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=$url?>/css/960_24_col.css">
    <link rel="stylesheet" href="<?=$url?>/css/ui_form.css">
    <link rel="stylesheet" href="<?=$url?>/css/easydropdown.css">
    <script>
    </script>
    <script src="<?=$url?>/js/script.js"></script>
    <title>
        ลงทะเบียนค่ายพี่จุฬาฯครั้งที่ 17
    </title>
</head>
<body>
    <div class="container_24">
        <div id="sidebar" class="sidebar" style="text-align: center; color: rgb(180,180,180);">
            <h1 style="font-size: 400%; text-align:right;">สมัครเข้าค่าย</h1>
            <h1 style="font-size: 800%; text-align:right; margin-top: -95px; color: rgb(255,60,168);">พี่จุฬา ฯ</h1>
            <h1 style="font-size: 300%; margin-top: -100px;">ครั้งที่ <span style="color: rgb(255,60,168);">17</span></h1>
            <h1 class="nav nav-select">กรอกข้อมูลส่วนตัว</h1>
            <h1 class="nav">พิมพ์ใบสมัคร</h1>
            <h1 class="nav">ทำแบบทดสอบ และส่งใบสมัคร</h1>
        </div>
        
        <div class="prefix_12 grid_12">
            <div class="register">
                <div style="height:50px"></div>
                <form id="register" action="" method="POST">                    
                    <div style="padding-left: 20px;">
                    		<h1 style="color: rgb(66,66,66);">โปรดตรวจสอบความถูกต้อง</h1>
                        <div class="just-left">
                            <h4>คำนำหน้า</h4>
                            <div id="name_prefix" name="name_prefix" type="text" class="show-text" style="width: 75px;">
                                <?php echo $name_prefix; ?>
                            </div>
                        </div>
                        <div class="just-left">
                            <h4>ชื่อ</h4>
                            <div id="name_first" name="name_first" class="show-text" type="text" style="width: 145px;">
                                <?php echo $name_first; ?>
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>สกุล</h4>
                            <div id="name_last" name="name_last" class="show-text" type="text" style="width: 145px;">
                                <?php echo $name_last; ?>
                            </div>
                        </div>


                        <div class="just-left">
                            <h4>ชื่อเล่น</h4>
                            <div id="nickname" name="nickname" class="show-text" type="text" style="width: 75px">
                                <?php echo $nickname; ?>
                            </div>
                        </div>
                        <div class="just-left">
                            <h4>ศาสนา</h4>
                            <div id="religion" name="religion" class="show-text" type="text" style="width: 85px">
                                <?php echo $religion; ?>
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>เลขประจำตัวประชาชนไทย</h4>
                            <div id="national_id" name="national_id" class="show-text" type="text" style="width: 205px">
                                <?php echo $national_id ?>
                            </div>
                        </div>


                        <div style="clear:both;"></div>
                        <div style="height: 10px;"></div>
                        <div class="group group-pink">
                            <div class="just-left">
                                <h4 class="pink">วันเกิด</h4>
                                <div id="day" name="day" tabindex="1" class="show-text show-pink" style="width: 70px;">
                                    <?php echo $day; ?>
                                </div>
                            </div>
                            <div class="just-left">
                                <h4 class="pink">เดือนเกิด</h4>
                                <div id="month" name="month" tabindex="2" class="show-text show-pink" style="width: 170px;">
                                    <?php echo $month; ?>
                                </div>
                            </div>
                            <div class="just-left just-last">
                                <h4 class="pink">ปีเกิด</h4>
                                <div id="year" name="year" tabindex="3" class="show-text show-pink" style="width: 70px">
                                    <?php echo $year; ?>             
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                        <div style="height: 10px"></div>

                        <div class="just-left">
                            <h4>Facebook</h4>
                            <div id="facebook" name="facebook" class="show-text show-blue" type="text" style="width: 195px">
                                <?php echo $facebook; ?>
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>Email</h4>
                            <div id="email" name="email" class="show-text" type="text" style="width: 205px">
                                <?php echo $email; ?> 
                            </div>
                        </div>

                        <div class="just-left">
                            <h4>หมู่เลือด</h4>
                            <div id="blood_group" name="blood_group"class="show-text" style="width: 80px">
                                <?php echo $blood_group; ?>                        
                            </div>
                        </div>
                        <div class="just-left">
                            <h4>ขนาดเสื้อ</h4>
                            <!-- <show name="shirt_size" class="show-text" type="text" style="width: 80px"> -->
                            <div id="shirt_size" name="shirt_size"class="show-text" style="width: 80px">
                                <?php   if($shirt_size == 0) echo "S";
                                        else if($shirt_size == 1) echo "M";
                                        else if($shirt_size == 2) echo "L";
                                        else if($shirt_size == 3) echo "XL";
                                        else if($shirt_size == 4) echo "XXL";?>                         
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>อาหารที่แพ้</h4>
                            <div id="food_allergies" name="food_allergies" class="show-text" type="text" style="width: 205px">
                                <?php echo $food_allergies; ?>
                            </div>
                        </div>          
                        <div style="clear:both;"></div>
                        <div class="just-left">
                            <h4>แพ้ยา</h4>
                            <div id="drug" name="drug" class="show-text" type="text" style="width: 195px">
                                <?php echo $drug; ?>
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>โรคประจำตัว</h4>
                            <div id="disease" name="disease" class="show-text" type="text" style="width: 205px">
                                <?php echo $disease; ?>
                            </div>
                        </div>
                        <!-- Address Group -->
                        <div style="clear:both;"></div>
                        <div style="height: 10px;"></div>
                        <div class="group group-pink">
                            <div class="just-left">
                                <h4 class="pink">บ้านเลขที่</h4>
                                <div id="address" name="address" type="text" class="show-text show-pink" style="width: 70px">
                                    <?php echo $address; ?>
                                </div>
                            </div>
                            <div class="just-left">
                                <h4 class="pink">ถนน</h4>
                                <div id="road" name="road" type="text" class="show-text show-pink" style="width: 180px">
                                    <?php echo $road; ?>
                                </div>
                            </div>
                            <div class="just-left just-last">
                                <h4 class="pink">หมู่</h4>
                                <div id="moo" name="moo" type="text" class="show-text show-pink" style="width: 60px">
                                    <?php echo $moo; ?>
                                </div>
                            </div>

                            <div class="just-left">
                                <h4 class="pink">จังหวัด</h4>
                                <!-- <show name="province" type="text" class="show-text show-pink" style="width: 120px"> -->
                                <div id="province" name="province" id="province" class="show-text show-pink" style="width: 175px">
                                    <?php 
                                        $temp = DB::select("select PROVINCE_NAME from province where PROVINCE_ID = ".$province);
                                        echo $temp[0]->PROVINCE_NAME;
                                    ?>
                                </div>
                            </div>
                            <div class="just-left just-last">
                                <h4 class="pink">อำเภอ</h4>
                                <!-- <show name="amphur" type="text" class="show-text show-pink" style="width: 120px"> -->
                                <div id="amphur" name="amphur" id="amphur" class="show-text show-pink" style="width: 175px">
                                    <?php 
                                        $temp = DB::select("select AMPHUR_NAME from amphur where AMPHUR_ID = ".$amphur);
                                        echo $temp[0]->AMPHUR_NAME;
                                    ?>
                                </div>
                            </div>
                            <div class="just-left">
                                <h4 class="pink">ตำบล</h4>
                                <!-- <show name="tambol" type="text" class="show-text show-pink" style="width: 120px"> -->
                                <div id="tambol" name="tambol" id="tambol" class="show-text show-pink" style="width: 175px">
                                    <?php 
                                        $temp = DB::select("select DISTRICT_NAME from district where DISTRICT_ID = ".$tambol);
                                        echo $temp[0]->DISTRICT_NAME;
                                    ?>
                                </div>
                            </div>
                            <div class="just-left just-last">
                                <h4 class="pink">รหัสไปรษณีย์</h4>
                                <div id="zip_code" name="zip_code" type="text" class="show-text show-pink" style="width: 175px">                                
                                    <?php echo $zip_code; ?>
                                </div>
                            </div>

                            <div style="clear:both;"></div>
                        </div>
                        <div style="height: 10px"></div>
                        <!-- End address group -->
                        <div class="just-left">
                            <h4>โทรศัพท์บ้าน</h4>
                            <div id="phone_home" name="phone_home" class="show-text" type="text" style="width: 100px">                
                                <?php echo $phone_home; ?>
                            </div>
                        </div>
                        <div class="just-left">
                            <h4>โทรศัพท์มือถือ</h4>
                            <div id="phone_mobile" name="phone_mobile" class="show-text" type="text" style="width: 100px">                
                                <?php echo $phone_mobile; ?>
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>รายได้ผู้ปกครองต่อเดือน</h4>
                            <div id="parent_income" name="parent_income"class="show-text" style="width: 165px">
                                <?php 
                                if($parent_income==0) echo "น้อยกว่า 10,000";
                                else if($parent_income==1) echo "10,000 - 19,999";
                                else if($parent_income==2) echo "20,000 - 29,999";
                                else if($parent_income==3) echo "30,000 - 39,999";  
                                else if($parent_income==4) echo "มากกว่า 40,000";      
                                ?>                    
                            </div>
                        </div>                      

                        <div style="clear:both;"></div>
                        <div style="height: 10px"></div>
                        <!-- School details group -->
                        <div class="group group-pink">
                            <div class="just-left">
                                <h4 class="pink">โรงเรียน</h4>
                                <div id="school_name" name="school_name" type="text" class="show-text show-pink" style="width: 230px">
                                    <?php echo $school_name; ?>
                                </div>
                            </div>
                            <div class="just-left just-last">
                                <h4 class="pink">จังหวัด</h4>
                                <div id="school_province" name="school_province" id="school_province" class="show-text show-pink" style="width: 120px">
                                     <?php 
                                        $temp = DB::select("select PROVINCE_NAME from province where PROVINCE_ID = ".$school_province);
                                        echo $temp[0]->PROVINCE_NAME;
                                    ?>
                                </div>
                            </div>
                            <div class="just-left">
                                <h4 class="pink">อำเภอ</h4>
                                <div id="school_amphur" name="school_amphur" id="school_amphur" class="show-text show-pink" style="width: 103.333px">
                                    <?php 
                                        $temp = DB::select("select AMPHUR_NAME from amphur where AMPHUR_ID = ".$school_amphur);
                                        echo $temp[0]->AMPHUR_NAME;
                                    ?>
                                </div>                                
                            </div>
                            <div class="just-left">
                                <h4 class="pink">ชั้น</h4>
                                <!-- <show name="address" type="text" class="show-text show-pink" style="width: 80px"> -->
                                <div id="school_level" name="school_level" id="school_level" class="show-text show-pink" style="width: 103.333px">
                                    <?php 
                                        if($school_level==4) echo "ม.4";
                                        else if($school_level==5) echo "ม.5";
                                    ?>
                                </div> 
                            </div>
                            <div class="just-left just-last">
                                <h4 class="pink">หลักสูตรการศึกษา</h4>
                                <!-- <show name="road" type="text" class="show-text show-pink" style="width: 200px"> -->
                                <div id="school_plan" name="school_plan"class="show-text show-pink" style="width: 103.333px">
                                    <?php 
                                        if($school_plan==0) echo "วิทย์-คณิต";
                                        else if($school_plan==1) echo "ศิลป์-คำนวณ";
                                        else if($school_plan==2) echo "ศิลป์-ภาษา";  
                                    ?>                     
                                </div>
                            </div>

                            <div style="clear:both;"></div>
                        </div>
                        <div style="height: 10px"></div>
                        <!-- End School Details group -->
                        <div class="just-left just-last">
                            <h4>วิธีการเดินทางมา</h4>
                            <div id="method_arrive" name="method_arrive" class="show-text" type="text" style="width: 435px">   
                                <?php echo $method_arrive; ?>             
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>วิธีการเดินทางกลับ</h4>
                            <div id="method_depart" name="method_depart" class="show-text" type="text" style="width: 435px">                
                                <?php echo $method_depart; ?>
                            </div>
                        </div>

                        <div style="clear:both;"></div>
                        <h2 class="grey">เบอร์ติดต่อกรณีฉุกเฉิน</h2>
                        <div class="just-left">
                            <h4>ชื่อผู้ติดต่อ ท่านแรก</h4>
                            <div id="contact1_name" name="contact1_name" type="text" class="show-text" style="width: 0px">
                                <?php echo $contact1_name; ?>
                            </div>
                        </div>
                        <div class="just-left">
                            <h4>เบอร์โทรศัพท์</h4>
                            <div id="contact1_phone" name="contact1_phone" class="show-text" style="width: 100px">
                                <?php echo $contact1_phone; ?>
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>เกี่ยวเป็น</h4>
                            <div id="contact1_relation" name="contact1_relation" class="show-text" style="width: 65px">
                                <?php echo $contact1_relation; ?>
                            </div>
                        </div>


                        <div class="just-left">
                            <h4>ชื่อผู้ติดต่อ ท่านที่สอง</h4>
                            <div id="contact2_name" name="contact2_name" type="text" class="show-text" style="width: 200px">
                                <?php echo $contact2_name; ?>
                            </div>
                        </div>
                        <div class="just-left">
                            <h4>เบอร์โทรศัพท์</h4>
                            <div id="contact2_phone" name="contact2_phone" class="show-text" style="width: 100px">
                                <?php echo $contact2_phone; ?>
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>เกี่ยวเป็น</h4>
                            <div id="contact2_relation" name="contact2_relation" class="show-text" style="width: 65px">
                                <?php echo $contact2_relation; ?>
                            </div>
                            
                        </div>
                        <div style="clear:both;"></div>
                        <h2 class="grey">คณะที่สนใจศึกษาต่อในระดับมหาวิทยาลัย</h2>
                        <div class="just-left">
                            <h4>สนใจเป็นอันดับแรก</h4>
                            <div id="faculty1" name="faculty1" class="show-text" type="text" style="width: 200px;">                
                                <?php echo $faculty1; ?>
                            </div>
                        </div>
                        <div class="just-left just-last">
                            <h4>สนใจเป็นอันดับสอง</h4>
                            <div id="faculty2" name="faculty2" class="show-text" type="text" style="width: 200px;">                
                                <?php echo $faculty2; ?>
                            </div>
                        </div>
                        <div class="just-left">
                            <h4>สนใจเป็นอันดับสาม</h4>
                            <div id="faculty3" name="faculty3" class="show-text" type="text" style="width: 200px;">  
                                <?php echo $faculty3; ?>
                            </div>              
                        </div>
                        <div class="just-left just-last">
                            <h4>สนใจเป็นอันดับสี่</h4>
                            <div id="faculty4" name="faculty4" class="show-text" type="text" style="width: 200px;">                
                                <?php echo $faculty4; ?>
                            </div>
                        </div>

                        <div style="clear: both;"></div>
                        <h2 class="grey">ส่วนวิชาการ</h2>
                        <div class="just-left">
                            <h4>คอร์สที่ต้องการเรียน</h4>
                            <div id="course" name="course" class="show-text" style="width: 200px">
                                <?php 
                                if($course==0) echo "วิทย์ ม.4 ขึ้น ม.5";
                                else if($course==1) echo "วิทย์ ม.5 ขึ้น ม.6";
                                else if($course==2) echo "ศิลป์ภาษา"; 
                                else if($course==3) echo "ศิลป์คำนวณ";    
                                ?>                        
                            </div>               
                        </div>
                        

                        <div style="clear:both;"></div>
                        <div style="height: 30px"></div>
                        <div style="text-align: center;">
                        	<a href="reg" class="btn btn-default">กลับไปแก้ไข</a>
                        	<span class="btn-separator">หรือ</span>
                        	<a href="reg/confirm" class="btn btn-success">ยืนยัน</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div style="height: 25px;"></div>
    <div style="background:rgb(240,240,240); z-index:100; position:relative">
        <div class="container_24" style="padding: 20px 0px 20px 0px;">
            <div class="grid_12" align="left">
                <h4 style="font-size: 13px; color: rgb(100,100,100);">เว็บไซต์อย่างเป็นทางการของค่ายพี่จุฬา ฯ ครั้งที่ 17</h4>
            </div>
            <div class="grid_12" align="center">
                <h4 style="font-size: 13px; color: rgb(100,100,100);">สนับสนุนเว็บโฮสติงโดย</h4>
                <a href="redir?url=http://www.thaidatahosting.com&from=reg" target="_blank"><img src="img/logo-thaidatahosting.png" alt="Our web-hosting sponsor ThaiDataHosting.com" style="height: 55px;"></a>
            </div>
        </div>
    </div>
    <script>
    $.each(credential, function (key, val) {
        $('#' + key).val(val);
    })
    </script>
</body>
</html>