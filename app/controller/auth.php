

    <?php
require_once("../model/User.php");
require_once("../service/UserService.php");

$UserService = new UserService;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (isset($_POST['login'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        $userFromDatabase = $UserService->validateLogin($username, $password);
    
        if ($userFromDatabase) {
            $nameRole = $userFromDatabase['nameRole']; 
    
            if ($nameRole == 'admin') {
                session_start();
                $_SESSION['user_id'] = $userFromDatabase['idUser'];
                $_SESSION['username'] = $userFromDatabase['username'];
                $_SESSION['nameRole'] = $userFromDatabase['nameRole'];
    
                header("location:/wikie/app/view/adminIndex.php");
                exit();
            } elseif ($nameRole == 'author') {
                session_start();
                $_SESSION['user_id'] = $userFromDatabase['idUser'];
                $_SESSION['username'] = $userFromDatabase['username'];
                $_SESSION['nameRole'] = $userFromDatabase['nameRole'];
    
                header("location:/wikie/app/view/authorwikis.php");
                exit();
            } else {
                echo "<script>
                        setTimeout(function() {
                            window.location.href = '/wikie/public/login.php?error=Invalid username or password';
                        }, 3000); // Introduce a 3-second delay
                      </script>";
                exit();
            }
        } else {
            
            echo "<script>
                    setTimeout(function() {
                        window.location.href = '/wikie/public/login.php?error=Invalid username or password';
                    }, 3000); // Introduce a 3-second delay
                  </script>";
            exit();
        }
    }
    }




    if (isset($_POST['register'])) {
        $idUser = "MYSQLI_AUTO_INCREMENT_FLAG";
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $nameRole = "author";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        if ($UserService->isEmailTaken($email)) {
            echo 'username already taken redirection into register please wait...';

            echo "<script>
               setTimeout(function() {
                   window.location.href = '/wikie/public/register.php';
               }, 3000);
             </script>";
            exit();
        } elseif ($UserService->isUsernameTaken($username)) {
            echo 'email already taken redirection into register please wait...';

            echo "<script>
                setTimeout(function() {
                    window.location.href = '/wikie/public/register.php';
                }, 3000);
              </script>";
            exit();
        }

        $User = new User($idUser, $username, $email, $hashedPassword, $nameRole);
        $UserService->insert($User);
        header("location:/wikie/public/login.php");
        exit();
    }

