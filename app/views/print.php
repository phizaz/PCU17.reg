<!doctype html>
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
	<script src="<?=$url?>/js/print-script.js"></script>
	<title>
		พิมพ์ใบสมัคร | <?=Config::get('app.title')?>
	</title>
</head>
<body>
	<div class="container_24">
		<div id="sidebar" class="sidebar" style="text-align: center; color: rgb(180,180,180);">
			<div style="height: 20px"></div>
			<h1 style="font-size: 216%; text-align: center; margin: 0px 0px 0px 0px;">ค่ายจามจุรีอาสา</h1>
			<h1 style="font-size: 800%; margin-top: -50px; color: rgb(255,60,168);">พี่จุฬา ฯ</h1>
			<h1 style="font-size: 320%; margin: -130px 0px 0px 130px;">สานฝันน้อง</h1>
			<h1 id="side1" class="nav">กรอกข้อมูลส่วนตัว</h1>
			<h1 id="side2" class="nav nav-select">พิมพ์ใบสมัคร</h1>
			<h1 id="side3" class="nav">ทำแบบทดสอบ และส่งใบสมัคร</h1>
		</div>
		
		<div class="prefix_12 grid_12">
			<div style="padding-left: 20px;">
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
				<div>
					<p>
						<h1 class="grey">พิมพ์ใบสมัคร <small>คุณ<?php echo $credential->name_first . ' ' . $credential->name_last; ?></small></small></h1>
					</p>
				</div>

				<a href="print/pdf" target="_blank">
					<div class="big-button">
						<div class="img">
							<h4 class="btn btn-success">พิมพ์ใบสมัคร</h4>
						</div>
					</div>
				</a>
				<p style="color: rgb(88,88,88);">
					หลังจากพิมพ์ใบสมัครแล้ว<br>
					กรุณาเซ็นต์ชื่อในตำแหน่งที่กำหนด <br>
					และตอบคำถาม ข้อเขียนในส่วนสุดท้าย<br>
					<strong>อย่าลืมติดรูปนักเรียนในใบสมัครด้วย</strong>
				</p>

				<div style="clear:both"></div>
				<div style="height:30px;"></div>

				
				<a name="details"/>
				<div style="color: rgb(88,88,88);">
					<h1 class="grey">ส่งใบสมัคร</h1>
					<p>
						ส่ง <strong>ใบสมัคร</strong> (ที่ติดรูปแล้ว) พร้อมรูปถ่ายขนาด 3 x 4 ซม. <strong>อีกหนึ่งรูป</strong> มาตามที่อยู่ด้านล่าง ภายในวันที่ <strong>1 มีนาคม 2557</strong>
					</p>
					<p class="group group-pink" style="text-align: center; color: rgb(33,33,33); font-family: 'thaisans_light'; font-weight: 100;">
						<strong>โครงการค่ายจามจุรีอาสา พี่จุฬาฯ สานฝันน้อง</strong><br>
						นายเยี่ยมยุทธ สุทธิฉายา<br>
						ตึกจำปี ห้อง 508 หอพักนิสิตจุฬาลงกรณ์มหาวิทยาลัย<br>
						ถนนพญาไท แขวงวังใหม่ เขตปทุมวัน กรุงเทพฯ 10330
					</p>

					<p>
						รอการประกาศผลการคัดเลือกผู้มีสิทธิ์เข้าค่าย <strong>ในวันที่ 6 มีนาคม 2557</strong> ที่เว็บไซต์นี้ หรือที่เพจ Facebook <a href="http://www.facebook.com/PCU17" target="_blank">www.facebook.com/PCU17 </a>
					</p>
					
					<div style="height: 15px;"></div>
					<p>
						เมื่อทราบว่า <strong>ได้รับการคัดเลือก</strong> โปรดโอนเงิน <strong>จำนวน 3,000 บาท</strong> มาที่
					</p>
					<div class="group group-pink" style="color: rgb(33,33,33); font-family: 'thaisans_light'; font-weight: 100;">
						<strong>ชื่อบัญชี</strong><br>
						นางสาว กาญจนา สายทิพย์ และ/หรือ<br>
						นางสาว พัชราภรณ์ ตระหง่าน และ/หรือ<br>
						นาย เยี่ยมยุทธ สุทธิฉายา<br>
						<strong>ธนาคารไทยพาณิชย์</strong> สาขาจัตุรัสจามจุรี<br>
						<strong>เลขที่บัญชี</strong> 404-886599-7
					</div>

					<p>
						เก็บหลักฐานการโอินเงิน (สลิปการโอน หรือสำเนา) และส่งมาพร้อมกับ
					</p>
					<ul>
						<li>สำเนาบัตรประจำตัวประชาชนของนักเรียนและของผู้ปกครอง</li>
						<li>สำเนาทะเบียนบ้านของนักเรียน</li>
						<li>สำเนาบัตรประจำตัวนักเรียน</li>
					</ul>
					<p>มาตามที่อยู่ด้านล่างนี้ <strong>ภายในวันที่ 11 มีนาคม 2557</strong></p>
					<p class="group group-pink" style="text-align: center; color: rgb(33,33,33); font-family: 'thaisans_light'; font-weight: 100;">
						<strong>โครงการค่ายจามจุรีอาสา พี่จุฬาฯ สานฝันน้อง</strong><br>
						นายเยี่ยมยุทธ สุทธิฉายา<br>
						ตึกจำปี ห้อง 508 หอพักนิสิตจุฬาลงกรณ์มหาวิทยาลัย<br>
						ถนนพญาไท แขวงวังใหม่ เขตปทุมวัน กรุงเทพฯ 10330
					</p>


				</div>

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