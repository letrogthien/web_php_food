<?
require '../services/userService.php';
$userService = new UserService();
$sessionData = $userService->getSession();
echo '<pre>';
print_r($sessionData);
echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
</body>
</html>