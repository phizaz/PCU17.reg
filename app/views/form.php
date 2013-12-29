<html>
<head>
	<meta charset='utf-8'>
	<script src="<?=$url?>/js/jquery.min.js"></script>
	<link rel="stylesheet" href="<?=$url?>/css/960_24_col.css">
	<link rel="stylesheet" href="<?=$url?>/css/ui_form.css">
	<link rel="stylesheet" href="<?=$url?>/css/easydropdown.css">
	<script>
	var credential = {
		<?php 
		$first = true;
		foreach($credential as $key => $val) {
			if($first) $first = false;
			else echo ',';
			echo "'". $key . "'" . ':' . "'" . $val . "'";
		}
		?>
	};
	</script>
	<script src="<?=$url?>/js/script.js"></script>
	<title>
		ลงทะเบียนค่ายพี่จุฬาฯครั้งที่ 17
	</title>
</head>
<body>
	<div class="container_24">
		<div class="grid_12 sidebar" style="text-align:center; color: rgb(180,180,180);">
			<h1 style="font-size: 430%; text-align:right;">สมัครเข้าค่าย</h1>
			<h1 style="font-size: 950%; text-align:right; margin-top: -95px; color: rgb(255,60,168);">พี่จุฬา ฯ</h1>
			<h1 style="font-size: 350%; margin-top: -100px;">ครั้งที่ <span style="color: rgb(255,60,168);">17</span></h1>
			<h1 class="nav nav-select">กรอกข้อมูลส่วนตัว</h1>
			<h1 class="nav">พิมพ์ใบสมัคร</h1>
			<h1 class="nav">ทำแบบทดสอบ และส่งใบสมัคร</h1>
		</div>

		<div class="prefix_12 grid_12">
			<div style="height: 60px;"></div>			
				<?php 
					if(!$errors->first()==""){
						echo "<div class=\"error\">";
						foreach ($errors->all() as $message)
						{
						    echo $message . "<br>";
						}
						echo "</div>";
					}
				?>			
			<div class="register">
				<form id="register" action="" method="POST">					
					<div style="padding-left: 20px;">
						<div class="just-left">
							<h4>คำนำหน้า</h4>
							<input id="name_prefix" name="name_prefix" type="text" class="input-text" style="width: 90px;">
						</div>
						<div class="just-left">
							<h4>ชื่อ</h4>
							<input id="name_first" name="name_first" class="input-text" type="text">
						</div>
						<div class="just-left just-last">
							<h4>สกุล</h4>
							<input id="name_last" name="name_last" class="input-text" type="text">
						</div>


						<div class="just-left">
							<h4>ชื่อเล่น</h4>
							<input id="nickname" name="nickname" class="input-text" type="text" style="width: 100px">
						</div>
						<div class="just-left">
							<h4>ศาสนา</h4>
							<input id="religion" name="religion" class="input-text" type="text" style="width: 100px">
						</div>
						<div class="just-left just-last">
							<h4>เลขประจำตัวประชาชนไทย</h4>
							<input id="national_id" name="national_id" class="input-text" type="text" style="width: 210px">
						</div>


						<div style="clear:both;"></div>
						<div style="height: 10px;"></div>
						<div class="group group-pink">
							<div class="just-left">
								<h4 class="pink">วันเกิด</h4>
								<!-- <input class="input-text input-pink" type="text" style="width: 80px;"> -->
								<select id="day" name="day" tabindex="1" class="input-text input-pink" style="width: 80px;">
									<?php 
									for($day = 1; $day <= 31; ++$day)
										echo '<option value="' . $day . '">' . $day . '</option>';
									?>
								</select>
							</div>
							<div class="just-left">
								<h4 class="pink">เดือนเกิด</h4>
								<!-- <input class="input-text input-pink" type="text" style="width: 190px;"> -->
								<select id="month" name="month" tabindex="2" class="input-text input-pink" style="width: 190px;">
									<?php 
									foreach($months as $key => $month) 
										echo '<option value="' . $month->name_en .'">' . $month->name_th . '</option>';
									?>
								</select>
							</div>
							<div class="just-left just-last">
								<h4 class="pink">ปีเกิด</h4>
								<!-- <input class="input-text input-pink" type="text" style="width: 100px"> -->
								<select id="year" name="year" tabindex="3" class="input-text input-pink" style="width: 100px">
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
							<input id="facebook" name="facebook" class="input-text input-blue" type="text" style="width: 215px">
						</div>
						<div class="just-left just-last">
							<h4>Email</h4>
							<input id="email" name="email" class="input-text" type="text" style="width: 215px">
						</div>

						<div class="just-left">
							<h4>หมู่เลือด</h4>
							<!-- <input name="blood_group" class="input-text" type="text" style="width: 70px"> -->
							<select id="blood_group" name="blood_group"class="input-text" style="width: 70px">
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
							<select id="shirt_size" name="shirt_size"class="input-text" style="width: 70px">
								<option value="0">S</option>
								<option value="1">M</option>
								<option value="2">L</option>
								<option value="3">XL</option>  
								<option value="4">XXL</option>                          
							</select>
						</div>
						<div class="just-left just-last">
							<h4>อาหารที่แพ้</h4>
							<input id="food_allergies" name="food_allergies" class="input-text" type="text" style="width: 270px">
						</div>			
						<div style="clear:both;"></div>
						<div class="just-left">
							<h4>แพ้ยา</h4>
							<input id="drug" name="drug" class="input-text" type="text" style="width: 215px">
						</div>
						<div class="just-left just-last">
							<h4>โรคประจำตัว</h4>
							<input id="disease" name="disease" class="input-text" type="text" style="width: 215px">
						</div>
						<!-- Address Group -->
						<div style="clear:both;"></div>
						<div style="height: 10px;"></div>
						<div class="group group-pink">
							<div class="just-left">
								<h4 class="pink">บ้านเลขที่</h4>
								<input id="address" name="address" type="text" class="input-text input-pink" style="width: 80px">
							</div>
							<div class="just-left">
								<h4 class="pink">ถนน</h4>
								<input id="road" name="road" type="text" class="input-text input-pink" style="width: 200px">
							</div>
							<div class="just-left just-last">
								<h4 class="pink">หมู่</h4>
								<input id="moo" name="moo" type="text" class="input-text input-pink" style="width: 80px">
							</div>

							<div class="just-left">
								<h4 class="pink">จังหวัด</h4>
								<!-- <input name="province" type="text" class="input-text input-pink" style="width: 120px"> -->
								<select id="province" name="province" id="province" class="input-text input-pink" style="width: 190px">
								</select>
							</div>
							<div class="just-left just-last">
								<h4 class="pink">อำเภอ</h4>
								<!-- <input name="amphur" type="text" class="input-text input-pink" style="width: 120px"> -->
								<select id="amphur" name="amphur" id="amphur" class="input-text input-pink" style="width: 190px">
								</select>
							</div>
							<div class="just-left">
								<h4 class="pink">ตำบล</h4>
								<!-- <input name="tambol" type="text" class="input-text input-pink" style="width: 120px"> -->
								<select id="tambol" name="tambol" id="tambol" class="input-text input-pink" style="width: 190px">
								</select>
							</div>
							<div class="just-left just-last">
								<h4 class="pink">รหัสไปรษณีย์</h4>
								<input id="zip_code" name="zip_code" type="text" class="input-text input-pink" style="width: 190px">								
							</div>

							<div style="clear:both;"></div>
						</div>
						<div style="height: 10px"></div>
						<!-- End address group -->
						<div class="just-left">
							<h4>โทรศัพท์บ้าน</h4>
							<input id="phone_home" name="phone_home" class="input-text" type="text" style="width: 120px">                
						</div>
						<div class="just-left">
							<h4>โทรศัพท์มือถือ</h4>
							<input id="phone_mobile" name="phone_mobile" class="input-text" type="text" style="width: 120px">                
						</div>
						<div class="just-left just-last">
							<h4>รายได้ผู้ปกครองต่อเดือน</h4>
							<select id="parent_income" name="parent_income"class="input-text" style="width: 170px">
								<option value="0">น้อยกว่า 10,000</option>
								<option value="1">10,000 - 19,999</option>
								<option value="2">20,000 - 29,999</option>
								<option value="3">30,000 - 39,999</option>  
								<option value="4">มากกว่า 40,000</option>                          
							</select>
						</div>						

						<div style="clear:both;"></div>
						<div style="height: 10px"></div>
						<!-- School details group -->
						<div class="group group-pink">
							<div class="just-left">
								<h4 class="pink">โรงเรียน</h4>
								<input id="school_name" name="school_name" type="text" class="input-text input-pink" style="width: 240px">
							</div>
							<div class="just-left just-last">
								<h4 class="pink">จังหวัด</h4>
								<!-- <input name="school_province" type="text" class="input-text input-pink" style="width: 140px"> -->
								<select id="school_province" name="school_province" id="school_province" class="input-text input-pink" style="width: 140px">
								</select>
							</div>
							<div class="just-left">
								<h4 class="pink">อำเภอ</h4>
								<!-- <input name="school_amphur" type="text" class="input-text input-pink" style="width: 140px"> -->
								<select id="school_amphur" name="school_amphur" id="school_amphur" class="input-text input-pink" style="width: 140px">
								</select>
							</div>
							<div class="just-left">
								<h4 class="pink">ชั้น</h4>
								<!-- <input name="address" type="text" class="input-text input-pink" style="width: 80px"> -->
								<select id="school_level" name="school_level"class="input-text input-pink" style="width: 90px">
									<option value="4">ม.4</option>  
									<option value="5">ม.5</option>                          
								</select>
							</div>
							<div class="just-left just-last">
								<h4 class="pink">หลักสูตรการศึกษา</h4>
								<!-- <input name="road" type="text" class="input-text input-pink" style="width: 200px"> -->
								<select id="school_plan" name="school_plan"class="input-text input-pink" style="width: 130px">
									<option value="0">วิทย์-คณิต</option>
									<option value="1">ศิลป์-คำนวณ</option>
									<option value="2">ศิลป์-ภาษา</option>                        
								</select>
							</div>

							<div style="clear:both;"></div>
						</div>
						<div style="height: 10px"></div>
						<!-- End School Details group -->
						<div class="just-left just-last">
							<h4>วิธีการเดินทางมา</h4>
							<input id="method_arrive" name="method_arrive" class="input-text" type="text" style="width: 450px">                
						</div>
						<div class="just-left just-last">
							<h4>วิธีการเดินทางกลับ</h4>
							<input id="method_depart" name="method_depart" class="input-text" type="text" style="width: 450px">                
						</div>

						<div class="just-left">
							<h4>คอร์สที่ต้องการเรียน</h4>
							<select id="course" name="course" class="input-text" style="width: 215px">
								<option value="0">วิทย์ ม.4 ขึ้น ม.5</option>
								<option value="1">วิทย์ ม.5 ขึ้น ม.6</option>
								<option value="2">ศิลป์ภาษา</option> 
								<option value="3">ศิลป์คำนวณ</option>                           
							</select>               
						</div>
						<div style="clear:both;"></div>
						<div style="height: 10px"></div>
						<div class="group group-pink">
							<div class="just-left just-last">
								<h4 class="pink">ชื่อผู้ติดต่อกรณีฉุกเฉิน ท่านที่1</h4>
								<input id="contact1_name" name="contact1_name" type="text" class="input-text input-pink" style="width: 400px">
							</div>
							<div class="just-left">
								<h4 class="pink">เบอร์โทรศัพท์</h4>
								<input id="contact1_phone" name="contact1_phone" class="input-text input-pink" style="width: 190px">
								
							</div>
							<div class="just-left just-last">
								<h4 class="pink">เกี่ยวข้องเป็น</h4>
								<input id="contact1_relation" name="contact1_relation" class="input-text input-pink" style="width: 190px">
								
							</div>
							<div class="just-left just-last">
								<h4 class="pink">ชื่อผู้ติดต่อกรณีฉุกเฉิน ท่านที่2</h4>
								<input id="contact2_name" name="contact2_name" type="text" class="input-text input-pink" style="width: 400px">
							</div>
							<div class="just-left">
								<h4 class="pink">เบอร์โทรศัพท์</h4>
								<input id="contact2_phone" name="contact2_phone" class="input-text input-pink" style="width: 190px">
								
							</div>
							<div class="just-left just-last">
								<h4 class="pink">เกี่ยวข้องเป็น</h4>
								<input id="contact2_relation" name="contact2_relation" class="input-text input-pink" style="width: 190px">
								
							</div>
							<div style="clear:both;"></div>
						</div>
						<div style="clear:both;"></div>
						<div class="just-left">
							<h4>คณะที่สนใจศึกษาต่อ 1</h4>
							<input id="faculty1" name="faculty1" class="input-text" type="text" style="width: 215px">                
						</div>
 						<div class="just-left just-last">
							<h4>คณะที่สนใจศึกษาต่อ 2</h4>
							<input id="faculty2" name="faculty2" class="input-text" type="text" style="width: 215px">                
						</div>
						<div class="just-left">
							<h4>คณะที่สนใจศึกษาต่อ 3</h4>
							<input id="faculty3" name="faculty3" class="input-text" type="text" style="width: 215px">                
						</div>
 						<div class="just-left just-last">
							<h4>คณะที่สนใจศึกษาต่อ 4</h4>
							<input id="faculty4" name="faculty4" class="input-text" type="text" style="width: 215px">                
						</div>
						

						<div style="clear:both;"></div>
						<div style="height: 10px"></div>
						<div class="just-left">
							<button type="submit">ยืนยัน</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div style="height: 25px;"></div>
	<div style="background:rgb(240,240,240);">
		<div class="container_24" style="padding: 15px 0px 20px 0px;">
			<div class="grid_12" align="left">
				<h4 style="font-size: 13px; color: rgb(100,100,100);">เว็บไซต์อย่างเป็นทางการของค่าย<span class="pink">พี่จุฬา ฯ</span> ครั้งที่ <span class="pink">17</span></h4>
			</div>
			<div class="grid_12" align="center">
				<h4 style="font-size: 13px; color: rgb(100,100,100);">สนับสนุนเว็บโฮสติงโดย</h4>
				<a href="redir?url=http://www.thaidatahosting.com" target="_blank"><img src="img/logo-thaidatahosting.png" alt="Our web-hosting sponsor ThaiDataHosting.com" style="height: 55px;"></a>
			</div>
		</div>
	</div>
	<script>
	$.each(credential, function (key, val) {
		$('#' + key).val(val);
	})

	$.each(faculty, function (key, val){
		$('#'+key).val(val);
	})
	</script>
</body>
</html>