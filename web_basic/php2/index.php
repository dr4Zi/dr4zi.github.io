<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Validate form</title>
	<style type="text/css">
		*{
			box-sizing: border-box;
		}
		body{
			background: #F3F3F4;
			color: #333;
			padding: 20px;
		}
		.validate-form{
			width: 400px;
			padding: 24px;
			background-color: #fcfcfc;
			max-width: 420px;
			margin: auto;
			box-shadow: 1px 4px 10px 1px #aaa;
		}
		.input_holder{
			margin: 0 0 10px 0;
		}
		.input_error{
			color: #f00;
		}
		input[type=text],input[type=email],input[type=password], textarea{
			border: 2px solid #ccc;
			border-radius: 4px;
			padding: 10px;
			width: 100%;
		}
		textarea{
			min-height: 100px;
		}
	</style>
</head>
<body>
	<form class="validate-form" method="post" action="process.php"> 
		<h1>Validate form</h1>
		<div>
			<!-- them ten -->
			<div class="input_holder">
				<input type="text" placeholder="Your name" id="name" name="name">
				<span id="name_error" class="input_error"></span>
			</div>
			<!-- them gioi tinh -->
			<div class="input_holder">
				<input type="radio" id="gender_male" name="gender" value="male" >
				<label for="gender_male">Male</label>
				<input type="radio" id="gender_female" name="gender" value="female" >
				<label for="gender_female">Female</label>
				<span id="gender_error" class="input_error"></span>
			</div>
			<!-- them email -->
			<div class="input_holder">
				<input type="email" placeholder="Your email" id="email" name="email">
				<span id="email_error" class="input_error"></span>
			</div>
			<div class="input_holder">
				<input type="password" placeholder="Your Password" id="password" name="password">
				<span id="password_error" class="input_error"></span>
			</div>
			<div class="input_holder">
				<input type="text" placeholder="Your Address" id="address" name="address">
				<span id="address_error" class="input_error"></span>
			</div>
			<div class="input_holder">
				<textarea id="hobbies" placeholder="Your hobbies" rows="5" name="hobbies"></textarea>
			</div>
		</div>
		<button type="submit" onclick="return kiem_tra()" id="submit">Submit</button>
		<button type="reset">Reset</button>
	</form>

	<script type="text/javascript">
		document.getElementById("hobbies")
		.addEventListener("keyup", function(event) {
			event.preventDefault();
			if (event.keyCode === 13) {
				document.getElementById("submit").click();
			}
		});
		function kiem_tra()
		{
			let name = document.getElementById("name").value;
			let gender_array = document.getElementsByName("gender");
			let address = document.getElementById("address").value;
			let email = document.getElementById("email").value;
			let password = document.getElementById("password").value;
			let hobbies = document.getElementById("hobbies").value;

			let is_valid = true;

			// check ten 
			let regex_name = /^[A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]+(?: [A-ZÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ][a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹ]*)+$/;
			if(name.length === 0) {
				document.getElementById("name_error").innerHTML = "Tên không được để trống";
				is_valid = false;
			} else if(!regex_name.test(name)) {
				document.getElementById("name_error").innerHTML = "Hãy điền tên đúng";
				is_valid = false;
			} else {
				document.getElementById("name_error").innerHTML = "";
			}
			// check gioi tinh
			let is_checked = false;
			for (let e of gender_array){
				if (e.checked){
					is_checked=true;
				}
			}
			if (!is_checked){
				document.getElementById("gender_error").innerHTML = "Giới tính không được để trống";
				is_valid=false;
			} else {
				document.getElementById("gender_error").innerHTML = "";
			}
			//check email
			let regex_email = /^\w+@\w+\.[a-z]+$/;
			if(email.length === 0) {
				document.getElementById("email_error").innerHTML = "Email không được để trống";
				is_valid = false;
			}
			else if(!regex_email.test(email)) {
				document.getElementById("email_error").innerHTML = "Hãy nhập email đúng";
				is_valid = false;
			}
			else {
				document.getElementById("email_error").innerHTML = "";
			}
            //check password
            if(password.length === 0) {
            	document.getElementById("password_error").innerHTML = "Password không được để trống";
            	is_valid = false;
            }
            else if(password.length < 8) {
            	document.getElementById("password_error").innerHTML = "Password cần dài 8 ký tự";
            	is_valid = false;
            }
            else {
            	document.getElementById("password_error").innerHTML = "";
            }
            //check dia chi
            if(address.length === 0) {
                document.getElementById("address_error").innerHTML = "Địa chỉ không được để trống";
                is_valid = false;
            }
            else {
                document.getElementById("address_error").innerHTML = "";
            }

            if(!is_valid){
            	return false;
            }
            return true;
        }
    </script>
</body>
</html>