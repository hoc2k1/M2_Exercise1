<?php
   use LogController\LogController;
   include("../model/database/DBConnect.php");
   include("../controller/LogController.php");
   include("../model/log/Log.php");
   include("../model/log/LogDB.php");
   $logController = new LogController();
   $data = $logController->getListLogs();
   $count = $logController->getCount();
   $total = 0;
   $numberPage = ceil($count / $GLOBALS["limit"]);
   $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
   $keyword = isset($_GET['name']) ? $_GET['name'] : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <style>
        #container {
            width: 100vw;
            height: 100vh;
            background-color: #ffffff;
            display: flex;
            flex-direction: row;
        }
        #left {
            border-right: 2px solid #e0e0e0;
            height: 100vh;
            overflow: hidden;
        }
        .tab {
            padding-left: 30px;
            padding-right: 40px;
        }
        .tab:hover {
            cursor: pointer;
        }
        i {

        }
        .drawer-item {

        }

        #right {
            display: flex;
            flex: 1;
            flex-direction: column;
            
        }
        #header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-end;
            padding-right: 20px;
        }
        #content {
            display: flex;
            flex-direction: column;
            flex: 1;
            background-color: #f5f5f5;
            justify-content: center;
            align-items: center;
        }
        table {
            margin-top: 10px;
            border-collapse: collapse;
            border-radius: 7px;
            background-color: #ffffff;
            width: 80%;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }
        tr {
            border-bottom: 1px solid #ddd;
        }
        th {
            padding: 7px;
        }
        #theader {
            border-bottom: 2px solid #ddd;
        }
        td {
            padding: 7px 5px;
        }
        #total-value, #date {
            text-align: end;
        }
        #total-row {
            background-color: #f0f0f0;
        }
        .total {
            font-weight: bold;
        }
        input {
            background-color: #e9e4e4;
            padding-right: 15px;
            padding-left: 15px;
            padding-top: 10px;
            padding-bottom: 10px;
            border: none;
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
        #top {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            width: 80%;
            margin-top: 20px;
        }
        form {
            align-items: center;
            justify-content: center;
        }
        #bottom {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            width: 100%;
        }
        .round-button {
            margin: 0px 5px;
            border-radius: 50%;
            padding: 5px 10px 5px 10px;
        }
        #input-device-name {
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="left">
            <div class="tab" id="tab-device-management">
                <i class='fas fa-laptop-house' style='font-size:50px;'></i>
                <p class="drawer-item" id="device-management">Device Management</p>
            </div>
            
            <a href="/view/dashboard.php">
                <div class="tab">
                    <i class='fas fa-chart-pie'></i>
                    <p class="drawer-item" id="dashboard">Dashboard</p>
                </div>
            </a>
            
            <a href="/view/logs.php">
                <div class="tab">
                    <i class='fas fa-history'></i>
                    <p class="drawer-item" id="logs">Logs</p>
                </div>
            </a>
            <a href="#">
                <div class="tab">
                    <i class='fas fa-cog'></i>
                    <p class="drawer-item" id="settings">Settings</p>
                </div>
            </a>
        </div>
        <div id="right">
            <div id="header">
                <i class="fas fa-user-circle"></i>
                <?php
                    $username = "";
                    if (sizeof($GLOBALS) != 0 && $GLOBALS['username']) {
                        $username = $GLOBALS['username'];
                    }
                    echo "<p>Welcome $username</p>";
                ?>
            </div>
            <div id="content">
                <div id="top">
                    <strong>Action Logs</strong>
                    <form>
                        <input type="text" id="input-device-name" name="name" placeholder="name" value="<?php echo $keyword ?>"/>
                        <button type="submit">Search</button>
                    </form>
                </div>
                <table>
                    <tr id="theader">
                        <th>Device ID #</th>
                        <th>Name</th>
                        <th>Action</th>
                        <th>Date</th>
                    </tr>
                    <?php
                        foreach ($data as $key => $item) {
                            $id = $item->getId();
                            $name = $item->getName();
                            $action = $item->getAction();
                            $date = $item->getDate();
                            $total += $date;
                            echo "
                                <tr>
                                    <td id='id'>$id</td>
                                    <td id='name'>$name</td>
                                    <td id='action'>$action</td>
                                    <td id='date'>$date</td>
                                </tr>
                            ";
                        }
                    ?>
                    <tr id='total-row'>
                        <td class='total'>Total</td>
                        <td class='total'></td>
                        <td class='total'></td>
                        <?php 
                        echo "<td class='total' id='total-value'>$total</td>"
                        ?>
                    </tr>
                </table>
                <div id="bottom">
                    <form>
                        <input type="hidden" name="name" value="<?php echo $keyword ?>"/>
                        <?php for($i=1; $i<=$numberPage; $i++) {
                            $color = ($i == $currentPage) ? "#f28e19" : "#d0d0d0";
                            echo "<button class='round-button' style='background-color: $color;' type='submit' name='page' value=$i>$i</button>";
                        }?>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>