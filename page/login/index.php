<?php
 require '../../config/conn.php';

 session_start();

 if(isset($_SESSION['user_id'])){
  header("Location: ../home");
}

	if(isset($_POST["login"])){

		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		// cek username
		if (mysqli_num_rows($result)=== 1) {
			// cek password

			$row = mysqli_fetch_assoc($result);
		if(	password_verify($password, $row["password"]) ){
      $_SESSION['user_id'] = $row['id']; // Simpan ID pengguna dalam session
      $_SESSION['username'] = $row['username']; // Simpan username dalam session
      $_SESSION['name'] = $row['nama']; // Simpan username dalam session
			header("location:../home?berhasil= Login Berhasil, Selamat Datang ". $row['nama']);
			exit;
		}else{
      header("location:../login?gagal= Login Gagal, Password Salah");
    }
		}
    else{
      header("location:../login?gagal= Login Gagal, username tidak ada");
    }
	} 	
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back</title>
    <!-- bootsrap 5.3-->
    <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.min.css">
    <!-- bootstrap 5.3 end -->
    <!-- css-->
    <link rel="stylesheet" href="../../src/css/login.css">
    <!-- css end -->
    <!-- bootstrap-icon -->
    <link rel="stylesheet" href="../../src/icon/bootstrap-icons/bootstrap-icons.min.css">
    <!-- bootstrap-icon end -->
    <script src="../../src/sweetalert/sweetalert2@11.js"></script>
</head>
<body>
<?php
if(isset($_GET['berhasil'])){
    $berhasil = strval($_GET['berhasil']);
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '$berhasil',
        showConfirmButton: true,
        timer: 1500
    })
    </script>
    ";
}

if(isset($_GET['berhasil'])){
    $berhasil = strval($_GET['berhasil']);
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: $berhasil,
        showConfirmButton: true,
        timer: 1500
    })
    </script>
    ";
}
if(isset($_GET['gagal'])){
    $gagal = strval($_GET['gagal']);
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: '$gagal',
        showConfirmButton: false,
        timer: 1500
    })
    </script>
    ";
}
if(isset($_GET['gagal'])){
    $gagal = strval($_GET['gagal']);
    echo "
    <script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: $gagal,
        showConfirmButton: false,
        timer: 1500
    })
    </script>
    ";
}
?>
    <!-- login -->
    <div class="container-fluid ps-md-0">
  <div class="row g-0">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-grad">
      <!-- ctr-buku -->
      <div class="buku-ctr">
        <div class="sampul-buku shadow rounded" data-tilt data-tilt-max="20" data-tilt-speed="300" data-tilt-perspective="1000" data-tilt-glare data-tilt-max-glare="0.8">
          <img class="" src="../../src/img/tilt-img/1.png" alt="">
          <div class="glass rounded " ></div>
        </div>
      </div>
      <!-- ctr-buku-end -->
    </div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4 fw-bold">Hi!, Welcome back!</h3>

              <!-- Sign In Form -->
              <form action="" method="post">
                <div class="form-floating mb-3">
                  <input class="form-control" id="floatingInput" placeholder="username" name="username">
                  <label for="floatingInput" >Username</label>
                </div>
                <div class="form-floating mb-3 form-password">
                  <input type="password" class="form-control" id="password" placeholder="password" name="password">
                  <label for="floatingPassword" >Password</label>
                  <div class="eye-icon p-3">
                    <button type="button" class="btn p-0 shadow-none outline-none border-0" id="togglePassword">
                      <i class=" fs-4 bi bi-eye eye-icons" id="eye"></i>
                    </button>
                  </div>
                </div>

                <div class="d-grid">
                  <button class="btn btn-lg btn-dark btn-login text-uppercase fw-bold mb-2" type="submit" name="login">Sign in</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <!-- login end -->

    <script src="../../src/datatables/jquery-3.7.1.min.js"></script>
    <script src="../../src/tiltjs/vanilla-tilt.js"></script>
    <script>
        const passwordInput = document.getElementById("password");
        const toggleButton = document.getElementById("togglePassword");
        const eyeIcon = document.getElementById("eye");

        toggleButton.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.add("bi-eye-slash");
                eyeIcon.classList.remove("bi-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.add("bi-eye");
                eyeIcon.classList.remove("bi-eye-slash");
            }
        });
    </script>
</body>
</html>