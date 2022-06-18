<?php
require_once "config.php";

$Name = $TenantID = $Address = $ContactNo = $Email = "";
$Name_err = $TenantID_err = $Address_err = $ContactNo_err = $Email_err = "";

 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
       if(empty(trim($_POST["Name"])))
       {
        $Username_err = "Enter your name:";
       } 
       else
       {
        $sql = "SELECT ID FROM Tenant WHERE Name = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_Name);
            $param_Name = trim($_POST["Name"]);
        
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $Name_err = "Name already taken. Try a different one.";
                } 
                else
                {
                    $Name = trim($_POST["Name"]);
                }
            } 
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["TenantID"])))
    {
        $TenantID_err = "Enter a TenantID:";
    } 
    else
    {
        $sql = "SELECT ID FROM Tenant WHERE TenantID = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_TenantID);
            $param_TenantID = trim($_POST["TenantID"]);
            
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $TenantID_err = "ID already taken. Try a different ID.";
                } 
                else
                {
                    $TenantID = trim($_POST["TenantID"]);
                }
            } 
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["Address"])))
    {
        $Address_err = "Enter your address:";
    } 
    else
    {
        $sql = "SELECT ID FROM Tenant WHERE Address = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_Address);
            $param_Address = trim($_POST["Address"]);
            
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $Address_err = "Address matches. Try again.";
                } 
                else
                {
                    $Address = trim($_POST["Address"]);
                }
            } 
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }




    if(empty(trim($_POST["ContactNo"])))
    {
        $ContactNo_err = "Enter your contact number:";
    } 
    else
    {
        $sql = "SELECT ID FROM Tenant WHERE ContactNo = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_ContactNo);
            $param_ContactNo = trim($_POST["ContactNo"]);
            
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $ContactNo_err = "Number matches. Try again.";
                } 
                else
                {
                    $ContactNo = trim($_POST["ContactNo"]);
                }
            } 
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    



    if(empty(trim($_POST["Email"])))
    {
        $Email_err = "Enter your email:";
    } 
    else
    {
        $sql = "SELECT ID FROM Tenant WHERE Email = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "s", $param_Email);
            $param_Email = trim($_POST["Email"]);
            
            
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $Email_err = "Email matches. Try a different one.";
                } 
                else
                {
                    $Email = trim($_POST["Email"]);
                }
            } 
            else
            {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
        
    
    if(empty($Name_err) && empty($TenantID_err) &&  empty($Address_err) && empty($ContactNo_err) && empty($Email_err))
    {
        $sql = "INSERT INTO Tenant (Name, TenantID, Address, ContactNo, Email) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sssss", $param_Name, $param_TenantID, $param_Address, $param_ContactNo, $param_Email);
            
            $param_Name = $Name;
            $param_TenantID = $TenantID;
            $param_Address = $Address;
            $param_ContactNo = $ContactNo;
            $param_Email = $Email;
            
            if(mysqli_stmt_execute($stmt))
            {
                header("location: welcome.php");
            } 
            else
            {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to be a tenant.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($Name_err)) ? 'has-error' : ''; ?>">
                <label>Name</label>
                <input type="text" name="Name" class="form-control" value="<?php echo $Name; ?>">
                <span class="help-block"><?php echo $Name_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($TenantID_err)) ? 'has-error' : ''; ?>">
                <label>TenantID</label>
                <input type="text" name="TenantID" class="form-control" value="<?php echo $TenantID; ?>">
                <span class="help-block"><?php echo $TenantID_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($Address_err)) ? 'has-error' : ''; ?>">
                <label>Address</label>
                <input type="text" name="Address" class="form-control" value="<?php echo $Address; ?>">
                <span class="help-block"><?php echo $Address_err; ?></span>
            </div>    

            <div class="form-group <?php echo (!empty($ContactNo_err)) ? 'has-error' : ''; ?>">
                <label>Contact</label>
                <input type="text" name="Contact" class="form-control" value="<?php echo $ContactNo; ?>">
                <span class="help-block"><?php echo $ContactNo_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($Email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" value="<?php echo $Email; ?>">
                <span class="help-block"><?php echo $Email_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            
        </form>
    </div>    
</body>
</html>