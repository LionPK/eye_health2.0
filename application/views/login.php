<!DOCTYPE html>
<html lang="en">
<head>
	<title>แอปพลิเคชันสำหรับประเมินผลกระทบทางด้านสุขภาพตา ด้วยเทคนิคการตรวจจับเวลาหน้าจอ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--fix to load template uder path that load-->
	<link rel="shortcut icon" href="<?=base_url()?>assets/images/icons/eyeSuggestionLogo.png" type="image/x-icon">	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<!--alert display-->        
				<div class="alert alert-danger alert-dismissible fade show" role="alert" id="login-empty-input">
					<strong>กรุณากรอกข้อมูล</strong>ให้ครบ!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                </div>
	            <?php if($alert): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="login-invalid-input">
                    <strong>ข้อมูล</strong>ไม่ถูกต้อง!
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
                </div>
				<?php endif; ?>
					
				<!--created form login-->
				<form class="login100-form validate-form" role="form" method="post" onsubmit="return checkEmptyInput();" action="<?=base_url()?>authentication/login/">
					<span class="login100-form-title p-b-26">
						AEHE SYSTEM
					</span>
					<span class="login100-form-title p-b-26">
						ยินดีต้อนรับผู้ดูแลระบบ
					</span>
					<span class="login100-form-title p-b-48">
                        <img src="<?=base_url()?>assets/images/icons/eyeSuggestionLogo.png" alt="Eye impact" width="62" height="56">
					</span>

					<div class="wrap-input100" >
						<input class="input100" id="email" name="email" type="email" autofocus>
						<span class="focus-input100" data-placeholder="อีเมล์"></span>
					</div>

					<div class="wrap-input100">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" id="password" name="password" type="password" value="" >
						<span class="focus-input100" data-placeholder="รหัสผ่าน"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" id="login-submit" type="submit">
								Login
							</button>
						</div>
					</div>

					<!-- alert model -->
					<div class="modal" id="forgot">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">คำแนะนำ</h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<p>โปรดติดต่อผู้ดูแลระบบเพื่อรีเซ็ตรหัสผ่านของคุณ!</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">
								<strong>ดำเนินการต่อ</strong>
								</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
							</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<!--template-->
	<script src="<?=base_url()?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/animsition/js/animsition.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/select2/select2.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?=base_url()?>assets/vendor/countdowntime/countdowntime.js"></script>
    <script src="<?=base_url()?>assets/js/main.js"></script>

	<!-- check error login -->
	<script>
		window.onload = hideLoginErrors();
		function hideLoginErrors(){
			$("#login-empty-input").hide();
		}

		function checkEmptyInput(){
			hideLoginErrors();
			$("#login-invalid-input").hide();
			if( $("#email").val() == '' || $("#password").val() == ''){
				$("#login-empty-input").show();
				return false;
			}
		}
	</script>

</body>
</html>