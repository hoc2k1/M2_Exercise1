<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        #container {
            width: 100vw;
            height: 100vh;
            background-color: #f5f5f5;
            justify-content: center;
            align-items: center;
            display: flex;
        }
        #block {
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            width: 60vw;
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.1), 0 4px 4px 0 rgba(0, 0, 0, 0.1);
        }
        #title {
            color: #747272;
            text-align: center;
            margin-top: 20px;
            font-size: larger;
        }
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            width: 60%;
            align-self: center;
        }
        input {
            background-color: #f9f4f4;
            padding-right: 15px;
            padding-left: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
            margin-top: 20px;
            border: none;
        }
        #bottom {
            flex-direction: row;
            display: flex;
            margin-top: 20px;
            margin-bottom: 40px;
            align-items: center;
            justify-content: center;
        }
        button {
            background-color: #f28e19;
            color: #ffffff;
            padding-left: 30px;
            padding-right: 30px;
            border: none;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 2px 8px 0 rgba(0, 0, 0, 0.2), 0 2px 5px 0 rgba(0, 0, 0, 0.19);
            cursor: pointer;
        }
        button:active {
            opacity: 0.9;
            scale: 0.98;
        }
        a {
            color: #368af1;
            margin-left: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="block">
            <strong id="title">SOIOT SYSTEM</strong>
            <form>
                <input type="text" id="name" placeholder="user name">
                <input type="text" id="password" placeholder="password">
            </form>
            <div id="bottom">
                <button>LOGIN</button>
                <a href="">or create new account</a>
            </div>
        </div>
    </div>
</body>
</html>
