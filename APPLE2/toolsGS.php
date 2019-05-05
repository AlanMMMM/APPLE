<!DOCTYPE HTML>
<?php session_start();?>
<html>
<head>
    <title>Course Catalog</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2 style="text-align: center;"> Please Select a Tool </h2>
<form style="text-align: center;" action="gsListTool.php" method="post">
    <select name="toolSelection" required="required">
        <option disabled selected value> -- Select A Tool -- </option>

        <option value="graduateList">-- Graduate Applicants List -- </option>
        <option value="admittedList">-- Admitted Applicants List --</option>
        <option value="currentList">-- Current Students List --</option>

    </select>
    <input type="submit" name="goList" value="select" />

</form>
</body>
</html>