<?php
// Start the session
session_start();


?>
<head>
    <title>My Application</title>
    <link rel="stylesheet" href="../../APPLE2/style.css">
</head>
<body>
  <h2>Apply By Filling Out This Form</h2>

  <form method="post" action="submit.php">
    <h4> Personal Information: </h4>
    <label for="firstname">First name:</label>
    <input type="text" required = "required" name="firstname" maxlength = "15"><br /><br /><br />
    <label for="lastname">Last name:</label>
    <input type="text" required = "required" name="lastname" maxlength = "15" ><br /><br /><br />
    <label for="email">Email:</label>
    <input type="email" required = "required" name="email" ><br /><br /><br />
    <label for="ssn">SSN:</label>
    <input type="number" required = "required" name="ssn" max = "999999999" ><br /><br /><br />
    Seeking degree: <br />
    <input type="radio" required = "required" name="degree" value="MS"> MS<br>
    <input type="radio" name="degree" value="PHD"> PHD<br><br /><br />
    Admission date(term): <br />
    <input type="radio" required = "required" name="app_term" value="Fall"> Fall<br>
    <input type="radio" name="app_term" value="Spring"> Spring<br><br /><br />
      <label for= "app_year">apply year</label>
      <input type="number" required=required name="app_year" max="9999"><br /><br /><br />
    <label for="area_of_interest">Area of interest:</label>
    <input type="text" required = "required" name="area_of_interest"  maxlength = "25"><br /><br /><br />
    <h4> Address: </h4>
    <label for="city">City:</label>
    <input type="text" required = "required" name="city" maxlength = "15" ><br /><br /><br />
    <label for="state">State:</label>
    <input type="text" required = "required" name="state" maxlength = "15" ><br /><br /><br />
    <label for="street">Street:</label>
    <input type="text" required = "required" name="street" maxlength = "20" ><br /><br /><br />
    <label for="zip">Zip:</label>
    <input type="number" required = "required" name="zip" max="99999"><br /><br /><br />
    <h4> Academics and work experience: </h4>
    <label for="bachelor_school">bachelor's degree school:</label>
    <input type="text" required = "required" name="bachelor_school" maxlength = "25" /><br /><br /><br />
    <label for="bachelor_degree">bachelor's degree type:</label>
    <input type="text" required = "required" name="bachelor_degree" maxlength = "25" /><br /><br /><br />
    <label for="bachelor_major">bachelor's major:</label>
    <input type="text" required = "required" name="bachelor_major" maxlength = "25" /><br /><br /><br />
    <label for="bachelor_year">bachelor's degree year:</label>
    <input type="number" required = "required" name="bachelor_year" max="9999"  ><br /><br /><br />
    <label for="bachelor_gpa">bachelor's degree GPA:</label>
    <input type="number" step="0.01" required = "required" name="bachelor_gpa" /><br /><br /><br />
    <h4> Masters degree (if applicable): </h4>
    <label for="masters_school">master's degree school:</label>
    <input type="text" name="masters_school" maxlength = "25" /><br /><br /><br />
    <label for="masters_degree">master's degree type:</label>
    <input type="text" name="masters_degree" maxlength = "25" /><br /><br /><br />
    <label for="masters_major">master's major:</label>
    <input type="text" name="masters_major" maxlength = "25" /><br /><br /><br />
    <label for="masters_year">master's degree year:</label>
    <input type="number" name="masters_year" max="9999"><br />
    <label for="masters_gpa">master's degree GPA:</label>
    <input type="number" step="0.01" name="masters_gpa" /><br /><br /><br />
    <h4> Work Experience (if applicable): </h4>
    <label for="work_experience">What work experience do you have?</label>
    <input type="text" name="work_experience" /><br /><br /><br />
    <h4> Test Scores: </h4>
    <label for="GRE_verbal">GRE verbal:</label>
    <input type="number"  required = "required" name="GRE_verbal" max="999"><br /><br /><br />
    <label for="GRE_quantitative">GRE quantitative:</label>
    <input type="number" name="GRE_quantitative" max="999"><br /><br /><br />
    <label for="GRE_year">GRE year:</label>
    <input type="number" name="GRE_year" max="9999"><br /><br /><br />
    <label for="GRE_subject">GRE subject:</label>
    <input type="text" name="GRE_subject" maxlength = "10" /><br /><br /><br />
    <label for="GRE_score">GRE score(for subject):</label>
    <input type="number" name="GRE_score" max="9999"/><br /><br /><br />
    <label for="TOEFL">TOEFL score:</label>
    <input type="number" name="TOEFL" max="120"/><br /><br /><br />
    <label for="TOEFL_year">TOEFL year:</label>
    <input type="number" name="TOEFL_year" max="9999"/><br /><br /><br />

      <h4> Recommendation Letter 1: </h4>

    <label for="rec_email1">Recommender's email:</label>
    <input type="email" name="rec_email1" /><br /><br /><br />

      <h4> Recommendation Letter 2: </h4>

      <label for="rec_email2">Recommender's email:</label>
      <input type="email" name="rec_email2" /><br /><br /><br />

      <h4> Recommendation Letter 3: </h4>

      <label for="rec_email3">Recommender's email:</label>
      <input type="email" name="rec_email3" /><br /><br /><br />
    

    <input type="submit" value="Submit Application" name="submit" /><br/><br/>
  </form>
</body>
</html>

