<!-- TODO Employee view -->
<?php
session_start();

if (!isset($_SESSION["loggedUsername"])) {
    header("Location:../index.php");
}
if(isset($_SESSION["employeeToUpdate"])){
    
    $name=$_SESSION["employeeToUpdate"]["name"];
    $lastName=$_SESSION["employeeToUpdate"]["lastName"];
    $email=$_SESSION["employeeToUpdate"]["email"];
    $gender=$_SESSION["employeeToUpdate"]["gender"];
    $city=$_SESSION["employeeToUpdate"]["city"];
    $streetAddress=$_SESSION["employeeToUpdate"]["streetAddress"];
    $state=$_SESSION["employeeToUpdate"]["state"];
    $age=$_SESSION["employeeToUpdate"]["age"];
    $postalCode=$_SESSION["employeeToUpdate"]["postalCode"];
    $phoneNumber=$_SESSION["employeeToUpdate"]["phoneNumber"];
  
}else{
    $name="";
    $lastName="";
    $email="";
    $gender="";
    $city="";
    $streetAddress="";
    $state="";
    $age="";
    $postalCode="";
    $phoneNumber="";

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <script src="../assets/js/timeout.js"></script>

    <!-- Dependencies -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>

    <link rel="stylesheet" href="../node_modules/jsgrid/css/jsgrid.css" />
    <link rel="stylesheet" href="../node_modules/jsgrid/css/theme.css" />
    <script type="text/javascript" src="../node_modules/jsgrid/dist/jsgrid.min.js"></script>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">

    <title>Dashboard</title>
</head>

<body>
    <?php require("../assets/html/header.php") ?>
    <main class="container-fluid d-flex flex-column justify-content-center">
        <h2>Employee form</h2>
        <form id="editForm" class="w-50">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="newName">Name</label>
                    <input type="text" class="form-control" id="newName"  value=<?php echo $name; ?> placeholder="Your name">
                </div>
                <div class="form-group col-md-6">
                    <label for="newLastName">Last Name</label>
                    <input type="text"class="form-control" id="newLastName" value=<?php echo $lastName; ?> placeholder="Your last name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="newEmail">Email</label>
                    <input type="email"  class="form-control" id="newEmail" value=<?php echo $email; ?> placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="genderSelect">Gender</label>
                    <select class="form-control" value=<?php echo $gender; ?>  id="genderSelect">
                        <option>Man</option>
                        <option>Woman</option>
                        <option>Non-binary</option>
                        <option>Hermaphrodite</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="newCity">City</label>
                    <input type="text" class="form-control" value=<?php echo $city;  ?> id="newCity" placeholder="Residency city">
                </div>
                <div class="form-group col-md-6">
                    <label for="newStreetAdress">Street Address</label>
                    <input type="number" class="form-control" value=<?php echo $streetAddress; ?> id="newStreetAdress" placeholder="Number">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="newState">State</label>
                    <input type="text" class="form-control" value=<?php echo $state; ?> id="newState" placeholder="Residency state">
                </div>
                <div class="form-group col-md-6">
                    <label for="newAge">Age</label>
                    <input type="number" class="form-control" value=<?php echo $age; ?> id="newAge" placeholder="Your phone age">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="newPostalCode">Postal Code</label>
                    <input type="number" class="form-control" value=<?php echo $postalCode; ?> id="newPostalCode" placeholder="Your postal code">
                </div>
                <div class="form-group col-md-6">
                    <label for="newPhone">Phone</label>
                    <input type="number" class="form-control" value=<?php echo $phoneNumber; ?> id="newPhone" placeholder="Your phone number">
                </div>
            </div>

            <button type="submit" class="form-button btn btn-primary">Sign in</button>
            <button type="button" class="form-button btn btn-secondary">Back</button>
        </form>
    </main>
    <?php require("../assets/html/footer.html") ?>

    <!-- Javascript -->
    <script>
    //  const queryString=window.location.search;
    //  const urlParams = new URLSearchParams(queryString);
    //  console.log(urlParams);
    //  let id=urlParams.get('employeeRowId');
     //console.log(id);
        $("#editForm").submit((e)=>{
            e.preventDefault();
            const item={
                
                "name":$("#newName").val(),
                "lastName":$("#newLastName").val(),
                "email":$("#newEmail").val(),
                "gender":$("#genderSelect").val(),
                "city":$("#newCity").val(),
                "streetAddress":$("#newStreetAdress").val(),
                "state":$("#newState").val(),
                "age":$("#newAge").val(),
                "postalCode":$("#newPostalCode").val(),
                "phoneNumber":$("#newPhone").val()
            }
                
                        $.ajax({
                            type: "PUT",
                            url: "./library/employeeController.php",
                            data: {
                                "updatedEmployee":item,
                            },
                            success: function(resp) {
                                console.log("PUT",resp);
                            }
                        });
                 })
       

    </script>
</body>

</html>