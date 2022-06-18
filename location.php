<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$blockNo = $streetNo = $flatNo = $locationName = $locationId = $areaName = "";
$blockNo_err = $streetNo_err = $flatNo_err = $locationName_err = $locationId_err = $areaName_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate blockNo
    if(empty(trim($_POST["blockNo"]))){
        $blockNo_err = "Please enter the block no.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE blockNo = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_blockNo);
            
            // Set parameters
            $param_blockNo = trim($_POST["blockNo"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
 

// Validate streetNo
    if(empty(trim($_POST["streetNo"]))){
        $username_err = "Please enter the street no.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE streetNo = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_streetNo);
            
            // Set parameters
            $param_streetNo = trim($_POST["streetNo"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                              

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    


    // Validate flatNo
    if(empty(trim($_POST["flatNo"]))){
        $flatNo_err = "Please enter the flat no.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE flatNo = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_flatNo);
            
            // Set parameters
            $param_flatNo = trim($_POST["flatNo"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
               
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


// Validate locationName
    if(empty(trim($_POST["locationName"]))){
        $locationName_err = "Please enter location Name:";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE locationName = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_locationName);
            
            // Set parameters
            $param_locationName = trim($_POST["locationName"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
               

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    

// Validate locationId
    if(empty(trim($_POST["locationId"]))){
        $locationId_err = "Please enter location Id.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE locationId = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_locationId);
            
            // Set parameters
            $param_locationId = trim($_POST["locationId"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
               
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    



    
    // Validate areaName
    if(empty(trim($_POST["areaName"]))){
        $locationId_err = "Please enter area Name.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE areaName = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_areaName);
            
            // Set parameters
            $param_areaName = trim($_POST["areaName"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
               
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    
    
    // Check input errors before inserting in database
    if(empty($blockNo_err) && empty($streetNo_err) &&  empty($flatNo_err) && empty($locationName_err) && empty($locationId_err) &&  empty($areaName_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (blockNo, streetNo, flatNo, locationName, locationId, areaName) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_blockNo, $param_streetNo, $param_flatNo, $param_locationName, $param_locationId, $param_areaName);
            
            // Set parameters
            $param_blockNo = $blockNo;
            $param_streetNo = $streetNo;
            $param_flatNo = $flatNo;
            $param_locationName = $locationName;
            $param_locationId = $locationId;
            $param_areaName = $areaName;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: location.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill up the form to enter new flat.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group <?php echo (!empty($blockNo_err)) ? 'has-error' : ''; ?>">
                <label>blockNo</label>
                <input type="text" name="blockNo" class="form-control" value="<?php echo $blockNo; ?>">
                <span class="help-block"><?php echo $blockNo_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($streetNo_err)) ? 'has-error' : ''; ?>">
                <label>streetNo</label>
                <input type="text" name="streetNo" class="form-control" value="<?php echo $streetNo; ?>">
                <span class="help-block"><?php echo $streetNo_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($flatNo_err)) ? 'has-error' : ''; ?>">
                <label>flatNo</label>
                <input type="text" name="flatNo" class="form-control" value="<?php echo $flatNo; ?>">
                <span class="help-block"><?php echo $flatNo_err; ?></span>
            </div>    

            <div class="form-group <?php echo (!empty($locationName_err)) ? 'has-error' : ''; ?>">
                <label>locationName</label>
                <input type="locationName" name="locationName" class="form-control" value="<?php echo $locationName; ?>">
                <span class="help-block"><?php echo $locationName_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($locationId_err)) ? 'has-error' : ''; ?>">
                <label>locationId</label>
                <input type="text" name="locationId" class="form-control" value="<?php echo $locationId; ?>">
                <span class="help-block"><?php echo $locationId_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($areaName_err)) ? 'has-error' : ''; ?>">
                <label>areaName</label>
                <input type="text" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $areaName_err; ?></span>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
              </form>
    </div>  
</body>
</html>