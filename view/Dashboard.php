<?php
    use DeviceController\DeviceController;
    include("../model/database/DBConnect.php");
    include("../controller/DeviceController.php");
    include("../model/device/Device.php");
    include("../model/device/DeviceDB.php");
    $deviceController = new DeviceController();

    $deviceController = new DeviceController();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $result = $deviceController->addNewDevice();
    }
    
    $allDevices = $deviceController->getAllDevices();

    $arrayLabels = [];
    $arrayConsumptions = [];
    foreach ($allDevices as $key => $device) {
        array_push($arrayConsumptions, $device->getConsumption());
        array_push($arrayLabels, $device->getName());
    }
    $total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Dữ liệu cho biểu đồ
        const allLabels = <?php echo json_encode($arrayLabels);?>;
        const arrayConsumptions = <?php echo json_encode($arrayConsumptions);?>;
        console.log(38742, allLabels, arrayConsumptions)
        var data = {
            labels: allLabels,
            datasets: [{
                data: arrayConsumptions,
            }]
        };

        // Tạo biểu đồ hình bánh
        function createChart() {
            var ctx = document.getElementById("myPieChart").getContext("2d");
            var myPieChart = new Chart(ctx, {
                type: "doughnut",
                data: data
            });
        }
    </script>

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
            margin-top: 30px;
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
        #MAC-address-values, #IP-values, #created-date-values {
            text-align: center;
        }
        #power-consumption-values, #total-value {
            text-align: end;
        }
        #total-row {
            background-color: #f0f0f0;
        }
        .total {
            font-weight: bold;
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
            margin-top: 20px;
        }
        button:active {
            opacity: 0.9;
            scale: 0.98;
        }
        form {
            display: flex;
            flex-direction: column;
            /* align-self: center; */
        }
        #form {
            border-radius: 7px;
            padding: 20px;
            background-color: #ffffff;
            justify-content: center;
            align-items: center;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }

        #bottom {
            margin: 30px 0px;
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
            <div class="tab">
                <i class='fas fa-chart-pie'></i>
                <p class="drawer-item" id="dashboard">Dashboard</p>
            </div>
            <div class="tab">
                <i class='fas fa-history'></i>
                <p class="drawer-item" id="logs">Logs</p>
            </div>
            <div class="tab">
                <i class='fas fa-cog'></i>
                <p class="drawer-item" id="settings">Settings</p>
            </div>
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
                <table>
                    <tr id="theader">
                        <th>Devices</th>
                        <th>MAC Address</th>
                        <th>IP</th>
                        <th>Created Date</th>
                        <th>Power Consumption (Kw/H)</th>
                    </tr>
                    <?php
                        foreach ($allDevices as $key => $device) {
                            $name = $device->getName();
                            $macAddress = $device->getMacAddress();
                            $ip = $device->getIp();
                            $date = $device->getDate();
                            $consumption = $device->getConsumption();
                            $total += $consumption;
                            echo "
                                <tr>
                                    <td id='devices-values'>$name</td>
                                    <td id='MAC-address-values'>$macAddress</td>
                                    <td id='IP-values'>$ip</td>
                                    <td id='created-date-values'>$date</td>
                                    <td id='power-consumption-values'>$consumption</td>
                                </tr>
                            ";
                        }
                    ?>
                    <tr id='total-row'>
                       <td class='total'>Total</td>
                       <td class='total'></td>
                       <td class='total'></td>
                       <td class='total'></td>
                       <?php 
                       echo "<td class='total' id='total-value'>$total</td>"
                       ?>
                    </tr>
                </table>
                
                <div id="bottom">
                    <div id="chart">
                        <canvas id="myPieChart" width="400" height="400"></canvas>
                        <script>createChart()</script>
                    </div>
                    <div id="form">
                        <form method="post">
                            <input type="text" id="name" name="device" placeholder="name" required>
                            <input type="text" id="ip" name="ip" placeholder="IP" required>
                                <button type="submit">ADD DEVICE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>