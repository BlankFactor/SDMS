<!DOCTYPE html>
    <head>
        <title>一峰航班信息修改</title>
        <meta charset="utf-8">
        <link href="/css/admin.css" rel="stylesheet" type="text/css">
        <script src="/js/dataOpr.js" type="text/javascript"></script>
    </head>

    <body bgcolor="black">
        <div id="InsertOprDiv">
        <?php
            $con = mysqli_connect('localhost','root','root','web');

            if(!$con)
                die('could not connect : '.mysqli_error($con));

            mysqli_set_charset($con,'utf8');
            
            $number = $_GET['number'];

            $sql = "SELECT * from flights where number=".$number;
            $rl = mysqli_query($con,$sql) or die('删除数据出错：'.mysqli_error($con));  
            $res = mysqli_fetch_array($rl);
            echo "<form action='action_Update.php' method='post' onsubmit='return Confirm()'>
            <p><input type='submit' value='确认修改'></p>
                    <p>
                    <form action='search.php' method='post'>
                        <label >
                            <font color='white'>航班编号 : </font>
                            <input name='number' size='10' readonly=".$res["number"]." value=".$res["number"].">
                        </label>
                        <label ><font color='white'>出发地点 : 
                        <select name='sources' value=''>
                            <option value=''></option>
                            <option value='西湖底'>西湖低</option>
                            <option value='拱墅驾校'>拱墅驾校</option>
                            <option value='浑元星际门'>浑元星际门</option>
                            <option value='黄浦江底'>黄浦江底</option>
                        </select>
                        <label ><font color='white'>到达地点 : 
                        <select name='destination' value=''>
                            <option value=''></option>
                            <option value='西湖底'>西湖低</option>
                            <option value='拱墅驾校'>拱墅驾校</option>
                            <option value='浑元星际门'>浑元星际门</option>
                            <option value='黄浦江底'>黄浦江底</option>
                        </select>
                        </label>
                        <label ><font color='white'>日期 : 
                        <input type='date' name='date' value='".$res["date"]."'>
                        </label>
                        </label>
                        <label ><font color='white'>起飞时间 : 
                        <input type='time' name='start' value='".$res["start"]."'>
                        </label>
                        <label ><font color='white'>到达时间 : 
                        <input type='time' name='end' value='".$res["end"]."'>
                        </label>
                        <p>
                        <label ><font color='white'>价格 : 
                        <input value='".$res["price"]."' name='price' size='3px' type='text' name=' oninput='value=value.replace(/[^\d]/g,'')'>
                        </label>
                        <label ><font color='white'>折扣票数 : 
                        <input value='".$res["count"]."' name='count' size='3px' type='text' name=' oninput='value=value.replace(/[^\d]/g,'')'>
                        </label>
                        <label ><font color='white'>座位 : 
                        <input value='".$res["seat"]."' name='seat' size='3px' type='text' name=' oninput='value=value.replace(/[^\d]/g,'')'>
                        </label>
                        </p>
                    </form>
                    </p>
            </form>";

            mysqli_close($con);
            ?>
        </div>
    </body>

</html>

