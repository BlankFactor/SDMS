<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>一峰航空管理器</title>
    <link href="/css/admin.css" rel="stylesheet" type="text/css">
    <script src="/js/dataOpr.js" type="text/javascript"></script>
</head>

<body bgcolor="black">
<?php
$usrn = $_POST["adminName"];
$pwd = $_POST["password"];

if($usrn==null||$pwd==null){
    header("location:index.html");
}


$con = mysqli_connect('localhost','root','root','web','3306');

if (!$con)
{
    die('Could not connect: ' . mysqli_error($con));
}
    mysqli_set_charset($con, "utf-8");

    $sql="SELECT * FROM admin WHERE adminname = '$usrn' AND password = '$pwd'";
    $result = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result)  > 0){

    }else{
        header("location:index.html");
    }

    mysqli_close($con);
?>

<div id="mainDiv">
            <table border="1px" cellspacing="0" id="table">
                <tr>
                    <th>操作</th>
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
                        echo "<td>
                        <a href='javascript:Delete({$row['number']})'>删除</a>
                        <a href='action_Edit.php?number={$row['number']}'>修改</a>
                        </td>";
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

        <div id="InsertOprDiv">
            <form action="action_Insert.php" method="post" onsubmit="return Insert()">
            <p><input type="submit" value="增加航班"></p>
                    <p>
                    <form action="search.php" method="post">
                        <label >
                            <font color="white">航班编号 : </font>
                            <input name="number" size="10" type="text" value="">
                        </label>
                        <label ><font color="white">出发地点 : 
                        <select name="sources" value="">
                            <option value=""></option>
                            <option value="西湖底">西湖低</option>
                            <option value="拱墅驾校">拱墅驾校</option>
                            <option value="浑元星际门">浑元星际门</option>
                            <option value="黄浦江底">黄浦江底</option>
                        </select>
                        <label ><font color="white">到达地点 : 
                        <select name="destination" value="">
                            <option value=""></option>
                            <option value="西湖底">西湖低</option>
                            <option value="拱墅驾校">拱墅驾校</option>
                            <option value="浑元星际门">浑元星际门</option>
                            <option value="黄浦江底">黄浦江底</option>
                        </select>
                        </label>
                        <label ><font color="white">日期 : 
                        <input type="date" name="date" value="">
                        </label>
                        </label>
                        <label ><font color="white">起飞时间 : 
                        <input type="time" name="start" value="">
                        </label>
                        <label ><font color="white">到达时间 : 
                        <input type="time" name="end" value="">
                        </label>
                        <p>
                        <label ><font color="white">价格 : 
                        <input value="" name="price" size="3px" type="text" name="" oninput="value=value.replace(/[^\d]/g,'')">
                        </label>
                        <label ><font color="white">折扣票数 : 
                        <input value="" name="count" size="3px" type="text" name="" oninput="value=value.replace(/[^\d]/g,'')">
                        </label>
                        <label ><font color="white">座位 : 
                        <input value="" name="seat" size="3px" type="text" name="" oninput="value=value.replace(/[^\d]/g,'')">
                        </label>
                        </p>
                    </form>
                    </p>
            </form>
            </div>
    
</body>
</html>



