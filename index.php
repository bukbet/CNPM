<?php 
session_start();

?>
 <!DOCTYPE html>
<html>
<head>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" type="text/css" href="style1.css">

</head>

<body>

  <form class="modal-content animate" action="login_submit.php" method="post">
    <div class="imgcontainer">

      <img src="image/login.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="taikhoan"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="taikhoan" required>

      <label for="matkhau"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="matkhau" required>
        
      <button type="submit" name="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>


