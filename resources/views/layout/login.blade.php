<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-firestore.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	var firebaseConfig = {
        apiKey: "AIzaSyBlgB3Up0iQSHwjjeKKv4fVS5nbjeCjHvM",
        authDomain: "fir-db-8d065.firebaseapp.com",
        databaseURL: "https://fir-db-8d065.firebaseio.com",
        projectId: "fir-db-8d065",
        storageBucket: "fir-db-8d065.appspot.com",
        messagingSenderId: "417540815548",
        appId: "1:417540815548:web:6eb2526ba2cc39a68f2eb9",
        measurementId: "G-QZQXP66PJW"
    };
   firebase.initializeApp(firebaseConfig);
        db = firebase.firestore();

   function Login(){  //ตรวจสอบ ชื้อผู้ใช้


	db.collection("Admin").where('Username','==',$('#user').val()).onSnapshot(function(querySnapshot) {
		
		       if(querySnapshot.docs.length > 0){  //ถ้ามี ชื่อผู้ใช้
				

					querySnapshot.forEach(function(doc) {
							if ((doc.data().Password) == ($('#pwd').val())){  // ถ้ารหัสผ่านถูกต้อง
								console.log('ล็อกอินผ่าน');
								{{session()->put('admin', 'admin')}}
								Swal.fire({
									// position: 'top',
									icon: 'success',
									title: 'ลงชื่อ สำเร็จ',
									showConfirmButton: false,
									timer: 1500
									});
									window.location.replace('{{url('/')}}');
							}else {
								console.log('ล็อกอินไม่ผ่าน');
								Swal.fire({
									// position: 'top',
									icon: 'error',
									title: 'รหัสผ่านไม่ถูกต้อง',
									showConfirmButton: false,
									timer: 1500
									})
							}
						});

			   }else{
                    console.log('ไม่มีชื่อผู้ใช้');  
					Swal.fire({
									// position: 'top',
									icon: 'error',
									title: 'ไม่มีชื่อผู้ใช้',
									showConfirmButton: false,
									timer: 1500
									})
			   }  
   });

   }
</script>
<div class="container" id="container">
	<div class="form-container sign-in-container">
		<form >
			<h1>ยินดีต้อนรับ</h1>
			<span>กรุณาเข้าระบบ เพื่อใช้งานระบบบริหารจัดการข้อมูลขยะ</span>
			<input type="text" placeholder="ชื่อผู้ใช้งาน" name="user" id="user" required />
			<input type="password" placeholder="รหัสผ่าน" name="pwd" id="pwd" required/>
			<!-- <a href="#">ลืมรหัสผ่าน?</a> -->
			<button type="button" onclick="Login()">เข้าสู่ะบบ</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">

			</div>
		</div>
	</div>
</div>
<style>
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

		* {
			box-sizing: border-box;
		}

		body {
			background: #f6f5f7;
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			font-family: 'Montserrat', sans-serif;
			height: 100vh;
			margin: -20px 0 50px;
		}

		h1 {
			font-weight: bold;
			margin: 0;
		}

		h2 {
			text-align: center;
		}

		p {
			font-size: 14px;
			font-weight: 100;
			line-height: 20px;
			letter-spacing: 0.5px;
			margin: 20px 0 30px;
		}

		span {
			font-size: 12px;
		}

		a {
			color: #333;
			font-size: 14px;
			text-decoration: none;
			margin: 15px 0;
		}

		button {
			border-radius: 20px;
			border: 1px solid #689c97;
			background-color: #689c97;
			color: #FFFFFF;
			font-size: 12px;
			font-weight: bold;
			padding: 12px 45px;
			letter-spacing: 1px;
			text-transform: uppercase;
			transition: transform 80ms ease-in;
		}

		button:active {
			transform: scale(0.95);
		}

		button:focus {
			outline: none;
		}

		button.ghost {
			background-color: transparent;
			border-color: #FFFFFF;
		}

		form {
			background-color: #FFFFFF;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 50px;
			height: 100%;
			text-align: center;
		}

		input {
			background-color: #eee;
			border: none;
			padding: 12px 15px;
			margin: 8px 0;
			width: 100%;
		}

		.container {
			background-color: #fff;
			border-radius: 10px;
			box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
					0 10px 10px rgba(0,0,0,0.22);
			position: relative;
			overflow: hidden;
			width: 768px;
			max-width: 100%;
			min-height: 480px;
		}

		.form-container {
			position: absolute;
			top: 0;
			height: 100%;
			transition: all 0.6s ease-in-out;
		}

		.sign-in-container {
			left: 0;
			width: 50%;
			z-index: 2;
		}

		.container.right-panel-active .sign-in-container {
			transform: translateX(100%);
		}

		.sign-up-container {
			left: 0;
			width: 50%;
			opacity: 0;
			z-index: 1;
		}

		.container.right-panel-active .sign-up-container {
			transform: translateX(100%);
			opacity: 1;
			z-index: 5;
			animation: show 0.6s;
		}

		@keyframes show {
			0%, 49.99% {
				opacity: 0;
				z-index: 1;
			}
			
			50%, 100% {
				opacity: 1;
				z-index: 5;
			}
		}

		.overlay-container {
			position: absolute;
			top: 0;
			left: 50%;
			width: 50%;
			height: 100%;
			overflow: hidden;
			transition: transform 0.6s ease-in-out;
			z-index: 100;
		}

		.container.right-panel-active .overlay-container{
			transform: translateX(-100%);
		}

		.overlay {
			background: #FF416C;
			/* background: -webkit-linear-gradient(to right, #7FB174, #9BCFB8);
			background: linear-gradient(to right, #7FB174, #9BCFB8); */
			background-image: url('https://shopee.co.th/blog/wp-content/uploads/2019/10/%E0%B8%81%E0%B8%B2%E0%B8%A3%E0%B8%84%E0%B8%B1%E0%B8%94%E0%B9%81%E0%B8%A2%E0%B8%81%E0%B8%82%E0%B8%A2%E0%B8%B0.jpg');
			background-repeat: no-repeat;
			background-size: cover;
			background-position: 0 0;
			color: #FFFFFF;
			position: relative;
			left: -100%;
			height: 100%;
			width: 200%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.container.right-panel-active .overlay {
			transform: translateX(50%);
		}

		.overlay-panel {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;
			padding: 0 40px;
			text-align: center;
			top: 0;
			height: 100%;
			width: 50%;
			transform: translateX(0);
			transition: transform 0.6s ease-in-out;
		}

		.overlay-left {
			transform: translateX(-20%);
		}

		.container.right-panel-active .overlay-left {
			transform: translateX(0);
		}

		.overlay-right {
			right: 0;
			transform: translateX(0);
		}

		.container.right-panel-active .overlay-right {
			transform: translateX(20%);
		}

		.social-container {
			margin: 20px 0;
		}

		.social-container a {
			border: 1px solid #DDDDDD;
			border-radius: 50%;
			display: inline-flex;
			justify-content: center;
			align-items: center;
			margin: 0 5px;
			height: 40px;
			width: 40px;
		}

		footer {
			background-color: #222;
			color: #fff;
			font-size: 14px;
			bottom: 0;
			position: fixed;
			left: 0;
			right: 0;
			text-align: center;
			z-index: 999;
		}

		footer p {
			margin: 10px 0;
		}

		footer i {
			color: red;
		}

		footer a {
			color: #3c97bf;
			text-decoration: none;
		}

</style>

