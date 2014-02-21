<!doctype html>
<html>
<head>
	<meta charset='utf-8'>
	<script src="<?=$url?>/js/jquery.min.js"></script>
	<script src="<?=$url?>/js/jquery-ui.custom.min.js"></script>
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
		ลงทะเบียน | <?=Config::get('app.title')?>
	</title>
</head>
<body>
	<div class="container_24">
		<div id="sidebar" class="sidebar" style="text-align: center; color: rgb(180,180,180);">
			<h1 style="font-size: 216%; text-align: center; margin: 0px 0px 0px 0px;">ค่ายจามจุรีอาสา</h1>
			<h1 style="font-size: 800%; margin-top: -50px; color: rgb(255,60,168);">พี่จุฬา ฯ</h1>
			<h1 style="font-size: 320%; margin: -130px 0px 0px 130px;">สานฝันน้อง</h1>
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
							<!-- <input id="name_prefix" name="name_prefix" type="text" class="input-text" style="width: 70px;"> -->
							<select id="name_prefix" name="name_prefix"class="input-text" style="width: 90px">
								<option value="นาย">นาย</option>
								<option value="นางสาว">นางสาว</option>
								<option value="เด็กชาย">เด็กชาย</option>
								<option value="เด็กหญิง">เด็กหญิง</option>                        
							</select>
						</div>
						<div class="just-left">
							<h4>ชื่อ<span class="required"> *</span></h4>
							<input id="name_first" name="name_first" class="input-text" type="text">
						</div>
						<div class="just-left just-last">
							<h4>สกุล<span class="required"> *</span></h4>
							<input id="name_last" name="name_last" class="input-text" type="text">
						</div>


						<div class="just-left">
							<h4>ชื่อเล่น<span class="required"> *</span></h4>
							<input id="nickname" name="nickname" class="input-text" type="text" style="width: 80px">
						</div>
						<div class="just-left">
							<h4>ศาสนา<span class="required"> *</span></h4>
							<input id="religion" name="religion" class="input-text" type="text" style="width: 80px">
						</div>
						<div class="just-left just-last">
							<h4>เลขประจำตัวประชาชนไทย<span class="required"> *</span></h4>
							<input id="national_id" name="national_id" class="input-text example-parent" type="text" style="width: 190px">
							<div class="example">กรอก 13 หลัก ตัวอย่าง 1234567890123</div>
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
							<h4>Facebook<span class="required"> *</span></h4>
							<input id="facebook" name="facebook" class="input-text input-blue example-parent" type="text" style="width: 195px">
							<div class="example example-blue">ตัวอย่าง facebook.com/abcxyz</div>
						</div>
						<div class="just-left just-last">
							<h4>Email</h4>
							<input id="email" name="email" class="input-text example-parent" type="text" style="width: 195px">
							<div class="example">ตัวอย่าง abc@ijk.com</div>
						</div>
						<div style="clear: both"></div>
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
							<input id="food_allergies" name="food_allergies" class="input-text example-parent" type="text" style="width: 250px">
							<div class="example">บอกประเภทของอาหาร เช่น อาหารทะเล</div>
						</div>			
						<div style="clear:both;"></div>
						<div class="just-left">
							<h4>แพ้ยา</h4>
							<input id="drug" name="drug" class="input-text example-parent" type="text" style="width: 195px">
							<div class="example">บอกชื่อตัวยา</div>
						</div>
						<div class="just-left just-last">
							<h4>โรคประจำตัว</h4>
							<input id="disease" name="disease" class="input-text example-parent" type="text" style="width: 195px">
							<div class="example">บอกชื่อโรคประจำตัว</div>
						</div>
						<!-- Address Group -->
						<div style="clear:both;"></div>
						<div style="height: 10px;"></div>
						<div class="group group-pink">
							<div class="just-left">
								<h4 class="pink">บ้านเลขที่<span class="required"> *</span></h4>
								<input id="address" name="address" type="text" class="input-text input-pink" style="width: 70px">
							</div>
							<div class="just-left">
								<h4 class="pink">ถนน</h4>
								<input id="road" name="road" type="text" class="input-text input-pink" style="width: 180px">
							</div>
							<div class="just-left just-last">
								<h4 class="pink">หมู่</h4>
								<input id="moo" name="moo" type="text" class="input-text input-pink example-parent" style="width: 60px">
								<div class="example example-pink">ใส่หมู่ เช่น 4</div>
							</div>

							<div class="just-left">
								<h4 class="pink">จังหวัด</h4>
								<!-- <input name="province" type="text" class="input-text input-pink" style="width: 120px"> -->
								<select id="province" name="province" id="province" class="input-text input-pink" style="width: 195px">
								</select>
							</div>
							<div class="just-left just-last">
								<h4 class="pink">อำเภอ</h4>
								<!-- <input name="amphur" type="text" class="input-text input-pink" style="width: 120px"> -->
								<select id="amphur" name="amphur" id="amphur" class="input-text input-pink" style="width: 195px">
								</select>
							</div>
							<div class="just-left">
								<h4 class="pink">ตำบล</h4>
								<!-- <input name="tambol" type="text" class="input-text input-pink" style="width: 120px"> -->
								<select id="tambol" name="tambol" id="tambol" class="input-text input-pink" style="width: 195px">
								</select>
							</div>
							<div class="just-left just-last">
								<h4 class="pink">รหัสไปรษณีย์<span class="required"> *</span></h4>
								<input id="zip_code" name="zip_code" type="text" class="input-text input-pink" style="width: 175px">								
							</div>

							<div style="clear:both;"></div>
						</div>
						<div style="height: 10px"></div>
						<!-- End address group -->
						<div class="just-left">
							<h4>โทรศัพท์บ้าน</h4>
							<input id="phone_home" name="phone_home" class="input-text example-parent" type="text" style="width: 100px">                
							<div class="example">ใส่เลข 9 หลักติดกัน</div>
						</div>
						<div class="just-left">
							<h4>โทรศัพท์มือถือ<span class="required"> *</span></h4>
							<input id="phone_mobile" name="phone_mobile" class="input-text example-parent" type="text" style="width: 100px">                
							<div class="example">ใส่เลข 10 หลักติดกัน</div>
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
								<h4 class="pink">โรงเรียน<span class="required"> *</span></h4>
								<input id="school_name" name="school_name" type="text" class="input-text input-pink" style="width: 230px">
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
								<select id="school_plan" name="school_plan"class="input-text input-pink" style="width: 140px">
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
							<h4>วิธีการเดินทางมา<span class="required"> *</span></h4>
							<input id="method_arrive" name="method_arrive" class="input-text example-parent" type="text" style="width: 430px">                
							<div class="example">ใส่การเดินทางมาคราวๆ เช่น โดยสารรถตู้มาที่อนุสาวรีย์ แล้วต่อรถไฟฟ้าถึงจุฬาฯ</div>
						</div>
						<div class="just-left just-last">
							<h4>วิธีการเดินทางกลับ<span class="required"> *</span></h4>
							<input id="method_depart" name="method_depart" class="input-text example-parent" type="text" style="width: 430px">                
							<div class="example">ใส่การเดินทางกลับคราวๆ เช่น นั่งรถไฟฟ้าไปลงหมอชิต แล้วโดยสารรถกลับจังหวัด</div>
						</div>

						<div style="clear:both;"></div>
						<h2 class="grey">เบอร์ติดต่อกรณีฉุกเฉิน</h2>
						<div class="just-left">
							<h4>ชื่อผู้ติดต่อ ท่านแรก<span class="required"> *</span></h4>
							<input id="contact1_name" name="contact1_name" type="text" class="input-text" style="width: 190px">
						</div>
						<div class="just-left">
							<h4>เบอร์โทรศัพท์<span class="required"> *</span></h4>
							<input id="contact1_phone" name="contact1_phone" class="input-text" style="width: 100px">
						</div>
						<div class="just-left just-last">
							<h4>เกี่ยวเป็น<span class="required"> *</span></h4>
							<input id="contact1_relation" name="contact1_relation" class="input-text example-parent" style="width: 60px">
							<div class="example">เช่น บิดา</div>
						</div>


						<div class="just-left">
							<h4>ชื่อผู้ติดต่อ ท่านที่สอง<span class="required"> *</span></h4>
							<input id="contact2_name" name="contact2_name" type="text" class="input-text" style="width: 190px">
						</div>
						<div class="just-left">
							<h4>เบอร์โทรศัพท์<span class="required"> *</span></h4>
							<input id="contact2_phone" name="contact2_phone" class="input-text" style="width: 100px">
							
						</div>
						<div class="just-left just-last">
							<h4>เกี่ยวเป็น<span class="required"> *</span></h4>
							<input id="contact2_relation" name="contact2_relation" class="input-text example-parent" style="width: 60px">
							<div class="example">เช่น มารดา</div>
							
						</div>
						<div style="clear:both;"></div>
						<h2 class="grey">คณะที่สนใจศึกษาต่อในระดับมหาวิทยาลัย</h2>
						<div class="just-left">
							<h4>สนใจเป็นอันดับแรก<span class="required"> *</span></h4>
							<input id="faculty1" name="faculty1" class="input-text" type="text" style="width: 195px">                
						</div>
						<div class="just-left just-last">
							<h4>สนใจเป็นอันดับสอง</h4>
							<input id="faculty2" name="faculty2" class="input-text" type="text" style="width: 195px">                
						</div>
						<div class="just-left">
							<h4>สนใจเป็นอันดับสาม</h4>
							<input id="faculty3" name="faculty3" class="input-text" type="text" style="width: 195px">                
						</div>
						<div class="just-left just-last">
							<h4>สนใจเป็นอันดับสี่</h4>
							<input id="faculty4" name="faculty4" class="input-text" type="text" style="width: 195px">                
						</div>

						<div style="clear: both;"></div>
						<h2 class="grey">ส่วนวิชาการ</h2>
						<p class="desc">
							ทางค่ายเปิดสอน 4 คอร์สดังตารางด้านล่างนี้ โดยนักเรียนพึงเลือกได้ตามความสนใจไม่จำเป็นต้องตรงตามแผนการเรียนที่โรงเรียนแต่อย่างใด
						</p>
						<table class="course-table">
							<thead>
								<tr>
									<td>วิชา</td>
									<td>วิทย์ ม.4 ขึ้น ม.5</td>
									<td>วิทย์ ม.5 ขึ้น ม.6</td>
								</tr>
							</thead>
							<tr>
								<td class="head">คณิตศาสตร์</td>
								<td>ตรีโกณมิติ</td>
								<td>แคลคูลัสเบื้องต้น</td>
							</tr>
							<tr>
								<td class="head">ฟิสิกส์</td>
								<td>คลื่น ทฤษฎีจลน์ของก๊าซ</td>
								<td>ไฟฟ้า</td>
							</tr>
							<tr>
								<td class="head">เคมี</td>
								<td>อัตราการเกิดปฎิกิริยาเคมี สมดุลเคมี กรด-เบส</td>
								<td>เคมีอินทรีย์ สารชีวโมเลกุล พอลิเมอร์</td>
							</tr>
							<tr>
								<td class="head">ชีววิทยา</td>
								<td>พืช</td>
								<td>พันธุศาสตร์</td>
							</tr>
							<tr>
								<td class="head">ภาษาอังกฤษ</td>
								<td colspan="2">Grammar, Reading, Vocabulary</td>
							</tr>
							<tr>
								<td class="head">GAT</td>
								<td colspan="2">เชื่อมโยง</td>
							</tr>

							<thead>
								<tr>
									<td>วิชา</td>
									<td>ศิลป์ภาษา</td>
									<td>ศิลป์คำนวณ</td>
								</tr>
							</thead>
							<tr>
								<td class="head">คณิตศาสตร์</td>
								<td>สถิติ ลำดับและอนุกรม</td>
								<td>สถิติ ความน่าจะเป็น</td>
							</tr>
							<tr>
								<td class="head">วิทยาศาสตร์</td>
								<td colspan="2">ฟิสิกส์ เคมี ชีววิทยา (พื้นฐาน) โลกและดาราศาสตร์</td>
							</tr>
							<tr>
								<td class="head">ภาษาไทย</td>
								<td colspan="2">หลักภาษา วรรณคดี</td>
							</tr>
							<tr>
								<td class="head">สังคมศึกษา</td>
								<td colspan="2">ประวัติศาสตร์ ภูมิศาสตร์ เศรษฐศาสตร์</td>
							</tr>
							<tr>
								<td class="head">ภาษาอังกฤษ</td>
								<td colspan="2">Grammar, Reading, Vocabulary</td>
							</tr>
							<tr>
								<td class="head">GAT</td>
								<td colspan="2">เชื่อมโยง</td>
							</tr>
						</table>
						
						<div style="height: 15px;"></div>

						<div class="just-left">
							<h4>คอร์สที่ต้องการเรียน<span class="required"> *</span></h4>
							<select id="course" name="course" class="input-text" style="width: 215px">
								<option value="0">วิทย์ ม.4 ขึ้น ม.5</option>
								<option value="1">วิทย์ ม.5 ขึ้น ม.6</option>
								<option value="2">ศิลป์ภาษา</option> 
								<option value="3">ศิลป์คำนวณ</option>                           
							</select>              
						</div>
						

						<div style="clear:both;"></div>
						<div style="height: 20px"></div>
						<div style="text-align: center;">
							<button type="submit" class="btn btn-success">ไปต่อ</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div style="height: 25px;"></div>
	<div style="background:rgb(240,240,240); z-index:100; position:relative;">
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