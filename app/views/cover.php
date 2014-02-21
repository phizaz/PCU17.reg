<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<link rel="stylesheet" href="<?=$url?>/css/cover.css">
	<link rel="stylesheet" href="<?=$url?>/css/960_24_col.css">
	<script src="<?=$url?>/js/jquery.min.js"></script>
	<script>
	var fail = <?=$fail ? 'true' : 'false'?>;
	$(function () {
		if(fail) $('#fail').show();
	})
	</script>
</head>
<body>
	<div id="content">
		<div style="height: 80px;"></div>
		<h1 style="text-shadow: none; margin:0px 0px 0px 0px; font-size: 135%;" class="light-grey">ค่ายจามจุรีอาสา</h1>
		<h1 style="text-shadow: none; margin:-60px 0px 0px 0px; font-size: 500%;" class="pink">พี่จุฬา ฯ</h1>
		<h1 style="text-shadow: none; margin:-60px 0px -15px 170px; font-size: 200%;" class="light-grey">สานฝันน้อง</h1>
		<h2 style="font-size: 75%; color: rgb(220,220,220); text-shadow: none; font-family: 'thaisans_light'; font-weight: 100;">21 มีนา - 4 เมษา 57 ณ หอพักนิสิตจุฬา ฯ</h2>
		<h2 style="margin: 50px 0px 15px 0px;">เงื่อนไขการสมัคร</h2>
		<ul id="list">
			<li style="font-size: 125%;">เป็นนักเรียน ม.4 ขึ้น ม.5 หรือ ม.5 ขึ้น ม.6 ทั่วประเทศ</li>
			<li style="margin: 8px 0px 8px 0px; font-size: 140%; font-family: 'thaisans';">สามารถเข้าร่วมกิจกรรมได้ตลอดทั้งค่าย<br>วันที่ 21 มีนามคม - 4 เมษายน 2557</li>
			<li style="font-size: 170%;">ได้รับการอนุญาตจากผู้ปกครอง</li>
		</ul>
		<a href="<?php echo $url ?>/files/details.pdf" style="color: rgb(255,255,255);"><h2 style="margin: 25px 0px 0px 0px; font-size: 120%; ">ดูรายละเอียด..ที่นี่</h2></a>
		<div style="height: 50px;"></div>

		<?php if($online) : ?>
		<a id="nav-reg" href="reg"><h2 id="box-reg">สมัครเลย</h2></a>
		<div style="height: 20px;"></div>
		<hr class="separator-line">
		<h3 class="separator-text">หรือ</h3>
		<div id="section-return" style="margin: 5px 0px 0px 0px;">
			<a id="return" name="return"></a>
			<h2 id="box-return">สมัครแล้ว พิมพ์ใบสมัคร</h2>
			<h4 style="font-size: 15px; color: rgb(150,150,150); margin: 10px 0px 10px 0px;">กรอกเลขประจำตัวประชาชน 13 หลัก</h4>
			<form action="print/return" method="post">
				<input type="text" name="national_id"><button type="submit">พิมพ์</button>
			</form>
			<div id="fail" style="display: none; margin-top: 20px; font-family: 'thaisans_light'; font-weight: 100; font-size: 15px; background: rgb(206,0,70); text-shadow:none; border-radius: 4px;">คุณอาจยังไม่เคยสมัครค่าย</div>
		</div>
		<?php else : ?>
		<div>
			<h2 id="box-time">
				<?php if($before) : ?>
					เริ่มรับสมัครวันที่ 22 กุมภา - 1 มีนา
				<?php endif; ?>
				<?php if($after) : ?>
					ปิดรับสมัครแล้ว รอประกาศผลต่อไป
				<?php endif; ?>
			</h2>
		</div>
		<?php endif; ?>

		<div style="height: 50px;"></div>
		<div>
			<h2 style="font-size: 13px; color: rgb(100,100,100); margin: 5px 0px 5px 0px;">สนับสนุนเว็บโฮสติงโดย</h2>
			<a href="redir?url=http://www.thaidatahosting.com&from=cover" target="_blank"><img src="img/logo-thaidatahosting-invert.png" alt="Our web-hosting sponsor ThaiDataHosting.com" style="height: 55px;"></a>
		</div>
		<div style="height: 60px;"></div>
	</div>
</body>
</html>