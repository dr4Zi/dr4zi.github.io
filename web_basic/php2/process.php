<?php

$name = isset($_POST['name']) ? $_POST['name'] : '';
echo "Ban nhập ten la: $name";

$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
echo "<br>Gioi tinh la: $gender";

$email = isset($_POST['email']) ? $_POST['email'] : '';
echo "<br>Email la: $email";

$password = isset($_POST['password']) ? $_POST['password'] : '';
echo "<br>Password la: $password";

$address = isset($_POST['address']) ? $_POST['address'] : '';
echo "<br>Dia chi la: $address";

$hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : '';
echo "<br> So thich la: $hobbies";