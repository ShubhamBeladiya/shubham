<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location:login.php');
    die;
} else {
    $username = $_SESSION['username'];
}
$file = 'data/login.json';
$jsonString = file_get_contents('data/login.json');
$data = json_decode($jsonString);
$content = json_decode($jsonString, true);

$email = $data->email;
$name = $data->name;
$chatid = $data->chatid;
$pass = $data->password;
$token = $data->token;

if(isset($_POST['nameUpdate'])){
    $newName = $_POST['newName'];
    $content['name'] = $newName;
    $updatedJsonData = json_encode($content);
    file_put_contents($file , $updatedJsonData);
    header('Location:data.php');
}

if(isset($_POST['emailUpdate'])){
    $newMail = $_POST['newEmail'];
    $content['email'] = $newMail;
    $updatedJsonData = json_encode($content);
    file_put_contents($file , $updatedJsonData);
    header('Location:data.php');
}

if(isset($_POST['botupdate'])){
    $newbot = $_POST['newbot'];
    $content['token'] = $newbot;
    $updatedJsonData = json_encode($content);
    file_put_contents($file , $updatedJsonData);
    header('Location:data.php');
}
if(isset($_POST['chatidUpdate'])){
    $newChatid = $_POST['newChatid'];
    $content['chatid'] = $newChatid;
    $updatedJsonData = json_encode($content);
    file_put_contents($file , $updatedJsonData);
    header('Location:data.php');
}

if(isset($_POST['passUpdate'])){
    $newPass = $_POST['newPass'];
    $content['password'] = $newPass;
    $updatedJsonData = json_encode($content);
    file_put_contents($file , $updatedJsonData);
    header('Location:data.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASIM WEB LOGIN</title>
    <link rel="stylesheet" href="styles/data.css">
    <style>
        label {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header"><img src="styles/header.jpg" alt=""></div>
        <div class="login-box">
            <div class="heading">
                <h2>NASIM WEB PANEL</h2>
            </div>
            <div class="form">
                <div class="inputs">
                    <div id="old">
                    <label for="currentMail" style="display: block;">
                        <p>Current Email Address</p>
                    </label>
                    <input type="text" class="input" name="currentMail" readonly value="<?php echo $email ?>"><br><br>
                    <label for="currentMail" style="display: block;">
                        <p>Current Results Name</p>
                    </label>
                    <input type="text" class="input" name="currentMail" readonly value="<?php echo $name ?>"><br><br>
                    <label for="currentMail" style="display: block;">
                        <p>Current Chat Id</p>
                    </label>
                    <input type="text" class="input" name="currentMail" readonly value="<?php echo $chatid ?>"><br><br>
                    
                    </div>
                    <form method="post">
                        <div class="change-box-email">
                            <div id="emailUpdate" style="display: none;">
                                <input type="text" name="newEmail" required class="input" placeholder="Enter New Email Address"><br>
                                <button name = "emailUpdate" class="btn-change" type="submit" style="max-width: 100%;position: relative;left: 50%;transform: translate(-50%, 4px);">UPDATE</button><br><br>
                            </div>
                        </form>
                        <form method="post">
                            <div id="botupdate" style="display: none;">
                                <input type="text" name="newbot" required class="input" placeholder="Enter New Bot Token"><br>
                                <button name="botupdate" class="btn-change" type="submit" style="max-width: 100%;position: relative;left: 50%;transform: translate(-50%, 4px);">UPDATE</button><br><br>
                            </div>
                        </form>
                        <br>
                        <form method="post">
                            <div id="nameUpdate" style="display: none;">
                                <input type="text" name="newName" required class="input" placeholder="Enter New Results Name"><br>
                                <button name="nameUpdate" class="btn-change" type="submit" style="max-width: 100%;position: relative;left: 50%;transform: translate(-50%, 4px);">UPDATE</button><br><br>
                            </div>
                        </form>
                        <form method="post">
                            <div id="chatidUpdate" style="display: none;">
                                <input type="number" name="newChatid" required class="input" placeholder="Enter New Chat Id"><br>
                                <button name="chatidUpdate" class="btn-change" type="submit" style="max-width: 100%;position: relative;left: 50%;transform: translate(-50%, 4px);">UPDATE</button><br><br>
                            </div>
                        </form>
                        <form method="post">
                            <div id="passUpdate" style="display: none;">
                                <input type="text" name="newPass" required class="input" placeholder="Enter New Password"><br>
                                <button name="passUpdate" class="btn-change" type="submit" style="max-width: 100%;position: relative;left: 50%;transform: translate(-50%, 4px);">UPDATE</button><br><br>
                            </div>
                        </form>
                        </div>
                    <button class="btn-change" onclick="changeEmail()">Change Data Mail</button>
                    <button class="btn-change" onclick="changeBot()">Change Bot Token</button>
                    <button class="btn-change" onclick="changeName()">Change Result Name</button><br><br>
                    <button class="btn-change" onclick="changeChatid()" style="position: relative;
    left: 50%;
    transform: translate(-50%, 0);">Change Chat Id</button><br>
                    <button class="btn-change" onclick="changePass()" style="position: relative;
    left: 50%;
    transform: translate(-50%, 0);margin:4px 0">Change Panel Passsword</button>
                </div>
            </div>
            <div class="help">
            <p>Need Help? <a href="https://telegram.me/Nasim_Gaming_786">CONTACT</a></p>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    emailChange = document.getElementById('emailUpdate');
    nameChange = document.getElementById('nameUpdate');
    botChange = document.getElementById('botupdate');
    chatidChange = document.getElementById('chatidUpdate');
    old = document.getElementById('old');
    password = document.getElementById('passUpdate');

    
    function changeEmail(){
        emailChange.style.display = "block";
        old.style.display = "none";
        chatidChange.style.display = "none";
        botChange.style.display = "none";
        nameChange.style.display = "none";
        password.style.display = "none";
    }
    function changeBot(){
        emailChange.style.display = "none";
        old.style.display = "none";
        botChange.style.display = "block";
        nameChange.style.display = "none";
        chatidChange.style.display = "none";
        password.style.display = "none";
    }
    function changeName(){
        emailChange.style.display = "none";
        old.style.display = "none";
        botChange.style.display = "none";
        nameChange.style.display = "block";
        chatidChange.style.display = "none";
        password.style.display = "none";
    }
    function changeChatid(){
        emailChange.style.display = "none";
        old.style.display = "none";
        botChange.style.display = "none";
        nameChange.style.display = "none";
        chatidChange.style.display = "block";
        password.style.display = "none";
    }
    function changePass(){
        emailChange.style.display = "none";
        old.style.display = "none";
        botChange.style.display = "none";
        nameChange.style.display = "none";
        chatidChange.style.display = "none";
        password.style.display = "block";
    }
</script>