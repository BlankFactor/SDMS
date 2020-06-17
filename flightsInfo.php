<!DOCTYPE html>
    <head>
        <title>一峰航班信息</title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/flightsInfo.css"/>
    </head>

    <body bgcolor="black">
        <h3 id="headline"><font color="white">当前航班信息</font></h3>

        <div id="mainDiv">
            <table border="1px" cellspacing="0" id="table">
                <tr>
                    <th>航班号</th>
                    <th>起点</th>
                    <th>终点</th>
                    <th>日期</th>
                    <th>起飞时间</th>
                    <th>到达时间</th>
                    <th>价格</th>
                    <th>折扣票数</th>
                    <th>剩余座位数</th>
                </tr>

                <?php
                    $con = mysqli_connect('localhost','root','root','web');

                    if(!$con){
                        die('could not connect : '.mysqli_error($con));
                    }else{
                        mysqli_set_charset($con,"utf-8");
                        
                        $sql="SELECT * from flights";
                        $result = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$row['number']."</td>";
                        echo "<td>".$row['sources']."</td>";
                        echo "<td>".$row['destination']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['start']."</td>";
                        echo "<td>".$row['end']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['count']."</td>";
                        echo "<td>".$row['seat']."</td>";
                        }
                        mysqli_close($con);
                    }
                ?>

            </table>
        </div>

        <div id="settingDiv">
                    <p><font color="white" size="5px">查询设置</font></p>
                    <p>
                    <form action="search.php" method="post">
                        <label ><font color="white">航班编号 : </font></label><input name="Fnumber" size="10" type="text" value="">
                        <label ><font color="white">出发地点 : 
                        <select name="Fsources">
                            <option value=""></option>
                            <option value="西湖底">西湖低</option>
                            <option value="拱墅驾校">拱墅驾校</option>
                            <option value="浑元星际门">浑元星际门</option>
                            <option value="黄浦江底">黄浦江底</option>
                        </select>
                        <label ><font color="white">到达地点 : 
                        <select name="Fdestination">
                            <option value=""></option>
                            <option value="西湖底">西湖低</option>
                            <option value="拱墅驾校">拱墅驾校</option>
                            <option value="浑元星际门">浑元星际门</option>
                            <option value="黄浦江底">黄浦江底</option>
                        </select>
                        </label>
                    </form>
                    </p>
                    <p>
                        <input type="submit" name="query" value="查询" id="query">
                    </p>
            </div>
    </body>
</html>