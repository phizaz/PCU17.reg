<html>
<head>
    <meta charset='utf-8'>
    <script src="<?=$url?>/js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?=$url?>/css/960_24_col.css">
    <link rel="stylesheet" href="<?=$url?>/css/ui_form.css">
    <link rel="stylesheet" href="<?=$url?>/css/easydropdown.css">
    <script>
    
    </script>
</head>
<body>
<div class="container_24">
    
    <div class="grid_12" style="text-align: center; color: rgb(180,180,180);">
        <h1 style="font-size: 430%; text-align:right;">สมัครเข้าค่าย</h1>
        <h1 style="font-size: 950%; text-align:right; margin-top: -95px; color: rgb(255,60,168);">พี่จุฬา ฯ</h1>
        <h1 style="font-size: 350%; margin-top: -100px;">ครั้งที่ <span style="color: rgb(255,60,168);">17</span></h1>
        
        <h1 class="nav nav-select">กรอกข้อมูลส่วนตัว</h1>
        <h1 class="nav">พิมพ์ใบสมัคร</h1>
        <h1 class="nav">ทำแบบทดสอบ + ส่งใบสมัคร</h1>
    </div>

    <form id="register" action="" method="POST">
    <div class="grid_12">
        <div style="height: 60px;"></div>
        <div style="padding-left: 20px;">
            <div class="just-left">
                <h4>คำนำหน้า</h4>
                <input name="name_prefix" type="text" class="input-text" style="width: 90px;">
            </div>
            <div class="just-left">
                <h4>ชื่อ</h4>
                <input name="name_first" class="input-text" type="text">
            </div>
            <div class="just-left just-last">
                <h4>สกุล</h4>
                <input name="name_last" class="input-text" type="text">
            </div>


            <div class="just-left">
                <h4>ชื่อเล่น</h4>
                <input name="nickname" class="input-text" type="text" style="width: 100px">
            </div>
            <div class="just-left">
                <h4>ศาสนา</h4>
                <input name="religion" class="input-text" type="text" style="width: 100px">
            </div>
            <div class="just-left just-last">
                <h4>เลขประจำตัวประชาชนไทย</h4>
                <input name="national_id" class="input-text" type="text" style="width: 210px">
            </div>
            

            <div style="clear:both;"></div>
            <div style="height: 10px;"></div>
            <div class="group group-pink">
                <div class="just-left">
                    <h4 class="pink">วันเกิด</h4>
                    <!-- <input class="input-text input-pink" type="text" style="width: 80px;"> -->
                    <select name="day" tabindex="1" class="input-text input-pink" style="width: 80px;">
	                    <?php 
	                    for($day = 1; $day <= 31; ++$day)
	                    	echo '<option value="' . $day . '">' . $day . '</option>';
	                     ?>
                    </select>
                </div>
                <div class="just-left">
                    <h4 class="pink">เดือนเกิด</h4>
                    <!-- <input class="input-text input-pink" type="text" style="width: 190px;"> -->
                    <select name="month" tabindex="2" class="input-text input-pink" style="width: 190px;">
                        <?php 
                        foreach($months as $month) 
                        	echo '<option value="' . $month->id .'">' . $month->name_th . '</option>';
                         ?>
					</select>
                </div>
                <div class="just-left just-last">
                    <h4 class="pink">ปีเกิด</h4>
                    <!-- <input class="input-text input-pink" type="text" style="width: 100px"> -->
                    <select name="year" tabindex="3" class="input-text input-pink" style="width: 100px">
                        <?php 
                        for($year = 2013; $year >= 1990; --$year)
                            echo '<option value="' . $year . '">' . $year . '</option>';
                         ?>                  
                    </select>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="height: 10px"></div>

            <div class="just-left">
                <h4>Facebook</h4>
                <input name="facebook" class="input-text input-blue" type="text" style="width: 215px">
            </div>
            <div class="just-left just-last">
                <h4>Email</h4>
                <input name="email" class="input-text" type="text" style="width: 215px">
            </div>

            <div class="just-left">
                <h4>หมู่เลือด</h4>
                <!-- <input name="blood_group" class="input-text" type="text" style="width: 70px"> -->
                <select name="blood_group"class="input-text" style="width: 70px">
                	<option value="-">-</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>                            
                </select>
            </div>
            <div class="just-left">
                <h4>ขนาดเสื้อ</h4>
                <!-- <input name="shirt_size" class="input-text" type="text" style="width: 80px"> -->
                <select name="blood_group"class="input-text" style="width: 70px">
                            <option value="0">S</option>
                            <option value="1">M</option>
                            <option value="2">L</option>
                            <option value="3">XL</option>  
                            <option value="4">XXL</option>                          
                </select>
            </div>
            <div class="just-left just-last">
                <h4>อาหารที่แพ้</h4>
                <input name="food_allergies" class="input-text" type="text" style="width: 260px">
            </div>			
            <!-- Address Group -->
            <div style="clear:both;"></div>
            <div style="height: 10px;"></div>
            <div class="group group-pink">
                <div class="just-left">
                    <h4 class="pink">บ้านเลขที่</h4>
                    <input name="address" type="text" class="input-text input-pink" style="width: 80px">
                </div>
                <div class="just-left">
                    <h4 class="pink">ถนน</h4>
                    <input name="road" type="text" class="input-text input-pink" style="width: 200px">
                </div>
                <div class="just-left just-last">
                    <h4 class="pink">หมู่</h4>
                    <input name="moo" type="text" class="input-text input-pink" style="width: 60px">
                </div>

                <div class="just-left">
                    <h4 class="pink">จังหวัด</h4>
                    <input name="province" type="text" class="input-text input-pink" style="width: 120px">
                </div>
                <div class="just-left">
                    <h4 class="pink">อำเภอ</h4>
                    <input name="amphur" type="text" class="input-text input-pink" style="width: 120px">
                </div>
                <div class="just-left just-last">
                    <h4 class="pink">ตำบล</h4>
                    <input name="tambol" type="text" class="input-text input-pink" style="width: 120px">
                </div>

                <div style="clear:both;"></div>
            </div>
            <div style="height: 10px"></div>
            <!-- End address group -->
            <div class="just-left">
                <h4>โทรศัพท์บ้าน</h4>
                <input name="phone_home" class="input-text" type="text" style="width: 180px">                
            </div>
            <div class="just-left just-last">
                <h4>โทรศัพท์มือถือ</h4>
                <input name="phone_mobile" class="input-text" type="text" style="width: 180px">                
            </div>
            <div style="clear:both;"></div>
            <div style="height: 10px"></div>
            <!-- School details group -->
            <div class="group group-pink">
                <div class="just-left">
                    <h4 class="pink">ชั้น</h4>
                    <!-- <input name="address" type="text" class="input-text input-pink" style="width: 80px"> -->
                    <select name="school_level"class="input-text input-pink" style="width: 80px">
                            <option value="4">ม.4</option>  
                            <option value="5">ม.5</option>                          
                </select>
                </div>
                <div class="just-left">
                    <h4 class="pink">หลักสูตรการศึกษา</h4>
                    <!-- <input name="road" type="text" class="input-text input-pink" style="width: 200px"> -->
                    <select name="school_plan"class="input-text input-pink" style="width: 140px">
                            <option value="0">วิทย์-คณิต</option>
                            <option value="1">ศิลป์-คำนวณ</option>
                            <option value="2">ศิลป์-ภาษา</option>                        
                    </select>
                </div>
                <div class="just-left">
                    <h4 class="pink">โรงเรียน</h4>
                    <input name="school_name" type="text" class="input-text input-pink" style="width: 160px">
                </div>

                <div class="just-left">
                    <h4 class="pink">จังหวัด</h4>
                    <input name="province" type="text" class="input-text input-pink" style="width: 100px">
                </div>
                <div class="just-left just-last">
                    <h4 class="pink">อำเภอ</h4>
                    <input name="amphur" type="text" class="input-text input-pink" style="width: 100px">
                </div>

                <div style="clear:both;"></div>
            </div>
            <div style="height: 10px"></div>
            <!-- End School Details group -->
            <div class="just-left just-last">
                <h4>วิธีการเดินทางมา</h4>
                <input name="method_arrive" class="input-text" type="text" style="width: 450px">                
            </div>
            <div class="just-left just-last">
                <h4>วิธีการเดินทางกลับ</h4>
                <input name="method_depart" class="input-text" type="text" style="width: 450px">                
            </div>

            <div class="just-left">
                <h4>คอร์สที่ต้องการเรียน</h4>
                <select name="course"class="input-text" style="width: 140px">
                            <option value="0">วิทย์-คณิต</option>
                            <option value="1">ศิลป์-คำนวณ</option>
                            <option value="2">ศิลป์-ภาษา</option>                        
                </select>               
            </div>

            <div styel="clear:both;"></div>
            <div style="height: 10px"></div>
            <div class="just-left">
                <button type="submit">ยืนยัน</button>
            </div>
        </div>
    </div>
    </form>
</div>
</body>
</html>