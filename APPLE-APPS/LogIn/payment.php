<?php
session_start();
?>
<html>

<head>
    <title>Make A Payment</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
</head>

<body>
<h1>Your Payment Info:</h1>
<form method="POST" action="paymentProcess.php">
    Cardholder First Name:  <input type="text" required="required" name="chfn" maxlength=15>
    Cardholder Last Name:  <input type="text" required="required" name="chln" maxlength=15>
    Cardnumber:  <input type="number" required="required" name="cn" minlength=16 maxlength=16>
    Experiration Month: <select name="edm" required="required">
        <option disabled selected value> -- select an option -- </option>
        <option value="1">01</option>
        <option value="2">02</option>
        <option value="3">03</option>
        <option value="4">04</option>
        <option value="5">05</option>
        <option value="6">06</option>
        <option value="7">07</option>
        <option value="8">08</option>
        <option value="9">09</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
    </select><br>
    Experiration Year: <select name="edr" required="required">
        <option disabled selected value> -- select an option -- </option>
        <option value="1">2019</option>
        <option value="2">2020</option>
        <option value="3">2021</option>
        <option value="4">2022</option>
        <option value="5">2023</option>
        <option value="6">2024</option>
        <option value="7">2025</option>
        <option value="8">2026</option>
        <option value="9">2027</option>
        <option value="10">2028</option>
        <option value="11">2029</option>
        <option value="12">2030</option>
    </select><br>
    CVV:  <input type="number" required="required" name="cvv" minlength=3 maxlength=3>
    Zip Code: <input type="number" required="required" name="zc" minlength=5 maxlength=5>
    <input type="submit" value="submit" >
</form>

<br />

<input type=button onClick="location.href='mainpage.php'" value='Back to home page'>
</body>
</html>
