
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">
    <?php
    //this is company name
     echo"TruLuv";
      ?>
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/abhishek/dir/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fName = $_POST['name'];
        $age = $_POST['age'];
        //$gender = $_POST['email'];
        $dob = $_POST['date'];
        $email = $_POST['email'];
        $gender = $_POST['gvalue']; // assuming the form uses POST method and preference is the name of the input field
        switch ($gender) {
          case 'Male':
            $gvalue = 'M';
            break;
          case 'Female':
            $gvalue = 'F';
            break;
          case 'Other':
            $gvalue = 'O';
            break;
          default:
            $gvalue = '';
        }
        $Preference = $_POST['pvalue']; // assuming the form uses POST method and preference is the name of the input field
        switch ($Preference) {
          case 'Male':
            $pvalue = 'M';
            break;
          case 'Female':
            $pvalue = 'F';
            break;
          case 'Both':
            $pvalue = 'B';
            break;
          default:
            $pvalue = '';
        }

        //Submit these to a database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "truluv";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);
        // Die if connection was not successful
        if (!$conn){
            die("Sorry we failed to connect: ". mysqli_connect_error());
        }
        else{ 
          // Submit these to a database
          // Sql query to be executed 
          $sql = "INSERT INTO `cientinfo` (`fName`, `age`, `dob`, `email`,`gender`,`Preference`) VALUES ('$fName', '$age', '$dob', '$email','$gvalue','$pvalue')";
          $result = mysqli_query($conn, $sql);
   
          if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your entry has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
          }
          else{
              // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
              echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> We are facing some technical issue and your entry was not submitted successfully! We regret the inconvinience caused!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
          }
  
        }
  
      }

  

    
?>


<div class="container mt-3">
  <h1>Please enter your details</h1>
  <form action="/abhishek/dir/indexboot.php" method="post">
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="pass">Name</label>
    <input type="name" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="pass">Birth date</label>
    <input type="date" class="form-control" id="date" name="date">
  </div>
  <div class="form-group">
    <label for="pass">age</label>
    <input type="integer" class="form-control" id="integer" name="age">
  </div>
  
  <head>
  <style>
    .btn-group button.active {
      background-color: white;
      color: black;
    }
    
  </style>
</head>
<body>
  <h3>Gender</h3>
  <!-- <div class="btn-group" role="group" aria-label="Basic example">
    <button name="gvalue" value="Male" type="submit" class="btn btn-secondary gender-btn" onclick="handleGenderClick(this)">Male</button>
    <button name="gvalue" value="Female" type="submit" class="btn btn-secondary gender-btn" onclick="handleGenderClick(this)">Female</button>
    <button name="gvalue"  value="Other" type="submit" class="btn btn-secondary gender-btn" onclick="handleGenderClick(this)">Other</button>
  </div> -->
  <div class="btn-group" role="group" aria-label="Basic example" >
    <input name="gvalue" value="Male" type="radio"  >Male
    <input name="gvalue" value="Female" type="radio">Female
    <input name="gvalue"  value="Other" type="radio">Other
    
  </div>

  <h3>Preference</h3>
   <!-- <div class="btn-group" role="group" aria-label="Basic example">
    <button name="pvalue" type="submit" class="btn btn-secondary showme-btn" onclick="handleShowMeClick(this)">Male</button>
    <button name="pvalue" type="submit" class="btn btn-secondary showme-btn" onclick="handleShowMeClick(this)">Female</button>
    <button name="pvalue" type="submit" class="btn btn-secondary showme-btn" onclick="handleShowMeClick(this)">Both</button>
  </div>  -->
  <div class="btn-group" role="group" aria-label="Basic example" >
    <input name="pvalue" value="Male" type="radio"  >Male
    <input name="pvalue" value="Female" type="radio">Female
    <input name="pvalue"  value="Other" type="radio">Other
    
  </div>

  <script>
 
// insert $value into the database using your preferred method

    let selectedGenderButton = null;
    let selectedShowMeButton = null;

    function handleGenderClick(button) {
      if (selectedGenderButton) {
        selectedGenderButton.classList.remove("active");
      }
      button.classList.add("active");
      selectedGenderButton = button;

      const gtext = button.textContent;
      // Store the gender button text in the database
    }

    function handleShowMeClick(button) {
      if (selectedShowMeButton) {
        selectedShowMeButton.classList.remove("active");
      }
      button.classList.add("active");
      selectedShowMeButton = button;

      const ptext = button.textContent;
      // Store the show me button text in the database
    }
  </script>
</body>
</div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>  