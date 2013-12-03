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
    <form id="register" action="" method="POST">
    <div class="grid_12" style="text-align: center; color: rgb(180,180,180);">
        <h1 style="font-size: 430%; text-align:right;">สมัครเข้าค่าย</h1>
        <h1 style="font-size: 950%; text-align:right; margin-top: -95px; color: rgb(255,60,168);">พี่จุฬา ฯ</h1>
        <h1 style="font-size: 350%; margin-top: -100px;">ครั้งที่ <span style="color: rgb(255,60,168);">17</span></h1>
        
        <a href="javascript:;" onclick="$('#register').submit();">
            <h1 style="padding: 15px; background: rgb(255,25,173); color: rgb(255,255,255);">กรอกข้อมูลส่วนตัว</h1>
        </a>
        <h1 style="padding: 15px; background: rgb(220,220,220); color: rgb(255,255,255);">พิมพ์ใบสมัคร</h1>
        <h1 style="padding: 15px; background: rgb(220,220,220); color: rgb(255,255,255);">ทำแบบทดสอบ และส่งใบสมัคร</h1>
    </div>
    <div class="grid_12">
        <div style="height: 60px;"></div>
        <div style="padding-left: 20px;">
            <div class="just-left">
                <h4>คำนำหน้า</h4>
                <input name="name_prefix" type="text" class="nr-text" style="width: 90px;">
            </div>
            <div class="just-left">
                <h4>ชื่อ</h4>
                <input name="name_first" class="nr-text" type="text">
            </div>
            <div class="just-left just-last">
                <h4>สกุล</h4>
                <input name="name_last" class="nr-text" type="text">
            </div>


            <div class="just-left">
                <h4>ชื่อเล่น</h4>
                <input name="nickname" class="nr-text" type="text" style="width: 100px">
            </div>
            <div class="just-left">
                <h4>ศาสนา</h4>
                <input name="religion" class="nr-text" type="text" style="width: 100px">
            </div>
            <div class="just-left just-last">
                <h4>เลขประจำตัวประชาชนไทย</h4>
                <input name="national_id" class="nr-text" type="text" style="width: 210px">
            </div>
            

            <div style="clear:both;"></div>
            <div style="height: 10px;"></div>
            <div style="padding: 10px 20px 10px 20px; background: rgb(255,230,246);">
                <div class="just-left">
                    <h4 style="color: rgb(255,60,160);">วันเกิด</h4>
                    <!-- <input class="nr-text pink" type="text" style="width: 80px;"> -->
                    <select name="day" tabindex="1" class="nr-text pink" style="width: 80px;">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                    </select>
                </div>
                <div class="just-left">
                    <h4 style="color: rgb(255,60,160);">เดือนเกิด</h4>
                    <!-- <input class="nr-text pink" type="text" style="width: 190px;"> -->
                    <select name="month" tabindex="2" class="nr-text pink" style="width: 190px;"
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                </div>
                <div class="just-left just-last">
                    <h4 style="color: rgb(255,60,160);">ปีเกิด</h4>
                    <!-- <input class="nr-text pink" type="text" style="width: 100px"> -->
                    <select name="year" tabindex="3" class="nr-text pink" style="width: 100px">
                            <option value="2013">2013</option>
                            <option value="2012">2012</option>
                            <option value="2011">2011</option>
                            <option value="2010">2010</option>
                            <option value="2009">2009</option>
                            <option value="2008">2008</option>
                            <option value="2007">2007</option>
                            <option value="2006">2006</option>
                            <option value="2005">2005</option>
                            <option value="2004">2004</option>
                            <option value="2003">2003</option>
                            <option value="2002">2002</option>
                            <option value="2001">2001</option>
                            <option value="2000">2000</option>
                            <option value="1999">1999</option>
                            <option value="1998">1998</option>
                            <option value="1997">1997</option>
                            <option value="1996">1996</option>
                            <option value="1995">1995</option>
                            <option value="1994">1994</option>
                            <option value="1993">1993</option>
                            <option value="1992">1992</option>
                            <option value="1991">1991</option>
                            <option value="1990">1990</option>
                        </select>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="height: 10px"></div>

            <div class="just-left">
                <h4>Facebook</h4>
                <input name="facebook" class="nr-text blue" type="text" style="width: 215px">
            </div>
            <div class="just-left just-last">
                <h4>Email</h4>
                <input name="email" class="nr-text" type="text" style="width: 215px">
            </div>

            <div class="just-left">
                <h4>หมู่เลือด</h4>
                <!-- <input name="blood_group" class="nr-text" type="text" style="width: 70px"> -->
                <select name="blood_group"class="nr-text" style="width: 70px">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>                            
                </select>
            </div>
            <div class="just-left">
                <h4>ขนาดเสื้อ</h4>
                <!-- <input name="shirt_size" class="nr-text" type="text" style="width: 80px"> -->
                <select name="blood_group"class="nr-text" style="width: 70px">
                            <option value="0">S</option>
                            <option value="1">M</option>
                            <option value="2">L</option>
                            <option value="3">XL</option>  
                            <option value="4">XXL</option>                          
                </select>
            </div>
            <div class="just-left just-last">
                <h4>อาหารที่แพ้</h4>
                <input name="food_allergies" class="nr-text" type="text" style="width: 260px">
            </div>

        </div>
    </div>
    </form>
</div>
</body>
</html>