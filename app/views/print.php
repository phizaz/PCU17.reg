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
	<script src="<?=$url?>/js/script.js"></script>
	<title>
		ลงทะเบียนค่ายพี่จุฬาฯครั้งที่ 17
	</title>
</head>
<body>
	<div class="container_24">
		<div id="sidebar" class="sidebar" style="text-align: center; color: rgb(180,180,180);">
			<div style="height: 20px"></div>
			<h1 style="font-size: 400%; text-align:right;">สมัครเข้าค่าย</h1>
			<h1 style="font-size: 800%; text-align:right; margin-top: -95px; color: rgb(255,60,168);">พี่จุฬา ฯ</h1>
			<h1 style="font-size: 300%; margin-top: -100px;">ครั้งที่ <span style="color: rgb(255,60,168);">17</span></h1>
			<h1 class="nav">กรอกข้อมูลส่วนตัว</h1>
			<h1 class="nav nav-select">พิมพ์ใบสมัคร</h1>
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
			<div>
				<p>
					<h1>พิมพ์ใบสมัคร</h1>
					<hr>
					<h2>คุณ <?php echo $credential->name_first . ' ' . $credential->name_last; ?></h2>
				</p>
			</div>
			
			<div class="big-button">		
				<a href="print/pdf">			
				<img src="<?php echo $url . '/img/pdf.png' ?>">
				<br>
				<div>พิมพ์ใบสมัคร</div>
				</a>
			</div>

			<div class="big-button">		
				<a href="print/next">			
				<img src="<?php echo $url . '/img/next.png' ?>">
				<br>
				<div>ขั้นตอนต่อไป</div>
				</a>
			</div>
			
			<div style="height:500px"></div>
			
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