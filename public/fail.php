<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<title>Login Page</title>
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #d2d8be;
    margin: 0;
    padding: 0;
  }

  .container {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #777e5c, #d2d8be);
  }

  .login-box {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    text-align: center;
  }

  .login-box h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
  }

  .logo img {
    width: 150px; /* ขนาดโลโก้ที่ต้องการ */
    margin-bottom: 150px;
  }

  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
  }

  input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #0072ff;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #005bb5;
  }

  a {
    display: inline-block;
    margin-top: 15px;
    color:#FF0004;
    text-decoration: none;
    font-size: 16px;
  }

  a:hover {
    text-decoration: underline;
  }

  .footer {
    text-align:center;
    font-size: 14px;
    color: #888;
    margin-top: 20px;
  }
</style>
</head>

<body style="background-color: #d2d8be">

<div class="container">
  <div class="login-box">
    <!-- โลโก้ -->
    
      <img src="images/logo2.png" alt="Logo" width="300" height="300">
   
    
    <h2>เข้าสู่ระบบ</h2>
    <form action="chk.php" method="post">
      <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
      </div>
		<small style="color: #FF0004">Username หรือ Password ผิดกรุณาลองใหม่</small>
		<br>
		<br>
      <div>
        <input type="submit" name="submit" id="submit" value="LOGIN">
      </div>
    </form>
   
  </div>
</div>

</body>
</html>
