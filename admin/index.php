<?php
session_start();
$noNavbar= '';

if(isset($_SESSION['userName'])){
  header('Location: dashboard.php');
}

$pageTitle = 'Login';

include 'init.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];

    $password = $_POST['password'];

    $hashadpass = sha1($password);

   // echo $username . ' ================== ' . $password . ' ================= ' . $hashadpass;

    //statement for choose parameters--
    $stmt =  $conection->prepare("SELECT 
                                              UserId, UserName, password 
                                        FROM  users 
                                        WHERE UserName = ? 
                                        AND   password = ?
                                        AND   GroupId =1
                                        LIMIT 1");
    //excute for parameters--
    $stmt->execute(array($username, $hashadpass));
    //get count of database
    $count =  $stmt->rowCount();
    $row = $stmt->fetch();


    if($count > 0){
       $_SESSION['userName'] = $username; //register session name;
       $_SESSION['ID'] = $row['UserId'];  //register userId
       header('Location: dashboard.php'); //navigate to any page
       exit();  //to exit this script
    }
    //read all queries
    //$stmt->fetchAll();
}

?>

<form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method= "POST">

    <h4 class="text-center">SignUp</h4>


    <input class="form-control input-lg" type="text" name="username" placeholder="Username"  autocomplete="off"/>


    <input class="form-control input-lg" type="text" name="password" placeholder="Password"  autocomplete="off"/>


    <input  class="btn btn-primary btn-block" type="submit" value="Login"/>

</form>

<?php include  $tpl.'footer.php'; ?>



