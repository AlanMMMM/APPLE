<form action="adminCreateCheck.php" method="post">  
    
    
    username:<input type="text" required = "required" name="username"/>  
    <br/>  
    password:<input type="password" required = "required" name="password"/>  
    <br/>  
    confirm password:<input type="password" required = "required" name="confirm"/>  
    <br/>  
    role:
    <br/>
    <input type="radio" required = "required" name="role" value="student"> student
    <input type="radio" name="role" value="faculty">faculty
    <input type="radio" name="role" value="GS">GS 
    <input type="radio" name="role" value="CAC">CAC
    <input type="radio" name="role" value="administrator">administrator
    <br/>  
    <input type="Submit" name="Submit" value="Create New User"/>  
</form>