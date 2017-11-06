<html>

<head>
    <title>Bootswatch: Paper</title>
    <meta http-equiv="refresh" content="2;url=index.php" />
    <?php include( "css.php");?>
    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous">
    </script>
  
    <!--<script src="./echo2.js" >-->
    </script>
    <style>/*
    .carousel-control {
        position: absolute;
        top: 40%;
        left: 15px;
        width: 40px;
        height: 40px;
        margin-top: -20px;
        font-size: 60px;
        font-weight: 100;
        line-height: 30px;
        color: #ffffff;
        text-align: center;
        background: #222222;
        border: 3px solid #ffffff;
        -webkit-border-radius: 23px;
        -moz-border-radius: 23px;
        border-radius: 23px;
        opacity: 0.5;
        filter: alpha(opacity=50);
    }
    
    .carousel-control.right {
        right: 15px;
        left: auto;
    }
    
    .carousel-caption {
        position: absolute;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 15px;
        background: #333333;
        background: rgba(0, 0, 0, 0.55);
    }
    
    .carousel-caption p {
        margin-bottom: 0;
    }
    
    @media screen and (max-width: 700px) {
        .carousel-caption p {
            font-size: 13px;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.55);
        }
        .carousel-control {
            top: 20%;
        }
    }*/
    </style>
</head>

<body>
    <?php include( "bar.php");?>
    <div class="container">
        <div class="row" >
            <div class="col-md-12 text-center">
            <h1>狀態</h1>
            </div>
        </div>
        <div class="row " >
        <div class="col-md-10 text-center">
        <table class="table table-hover column" >
            <thead>
            <tr>
                <th>防護區域</th>
                <th>綁定的Pi</th>
            </tr>
            </thead>

            <?php
            function fn_get_alert($fence)
            {
                include("./connMysql.php");
                $sql="SELECT * FROM `alert` WHERE `fence_id`= '".$fence."' ORDER BY ID DESC LIMIT 1";
                
                $result=$conn->query($sql);
                if ($result->num_rows > 0) {
                    // 輸出每行數據
                    while ($row=$result->fetch_assoc()) {
                        //echo $row["state"];
                        if ($row["state"]==0) {
                            echo '<form action="del_alert.php" method="post">';
                            echo '<input type="text" name="alert_fence" value="'.$fence.'" style="display: none" >';
                            echo '<button type="button" class="btn btn-danger btn-sm" name="alert_fence" >
							<span class="glyphicon glyphicon-remove-sign"></span>遭到入侵
							</button>
							<button type="submit" class="btn btn-warning">解除警報</button>';
                            echo '</form>';
                        } else {
                            echo '<button type="button" class="btn btn-success btn-sm">
							<span class="glyphicon glyphicon-ok-sign"></span> OK
							</button>';
                        }


                        echo '</td>';
                    }
                } else {
                    //echo "0 個結果";
                }
                $conn->close();
            }
            function fn_get_fence($area)
            {
                include("./connMysql.php");
                $sql="SELECT * FROM main_fence where `location`='".$area."'";
                $result=$conn->query($sql);
                if ($result->num_rows > 0) {
                    // 輸出每行數據
                    while ($row=$result->fetch_assoc()) {
                        echo '<td>
						<h4>'.$row["fence_id"].'</h4>';
                        fn_get_alert($row["fence_id"]);
                    }
                } else {
                    //echo "0 個結果";
                }
                $conn->close();
            }
            $i=0;
            include("./connMysql.php");
            $sql="SELECT * FROM main_area";
            $result=$conn->query($sql);
            
            echo '<tr>';
            if ($result->num_rows > 0) {
                // 輸出每行數據
                while ($row=$result->fetch_assoc()) {
                    echo '<td class="text-center"><h2>'.$row["location"].'</h2></td>';
                    fn_get_fence($row["location"]);
                    
                    
                    echo '</td></tr>';
                    $i++;
                }
            } else {
                //echo "0 個結果";
            }
            $conn->close();
            ?>






            <!--
            <tr>
                <td><h2>大門口</h2></td>
                <td>
                
                <button type="button" class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-remove-sign"></span>遭到入侵
                </button>
                <h4>gate_0</h4>
                <button type="button" class="btn btn-danger" value="">解除警報</button>
                </td>

                <td>
                <button type="button" class="btn btn-success btn-sm">
                <span class="glyphicon glyphicon-ok-sign"></span> OK
                </button>

                <h4>gate_1</h4>
                <button type="button" class="btn btn-danger" value="">解除警報</button>
                </td>
            -->
            </tr>
        </table>


        
    </div>
        <!--
        <div class="row" >
            <div class="col-md-12 text-center">
                <h1 class="card-text-title">查詢綁定的Pi</h1>
            </div>
        </div>
        <div class="row" >
            <div class="col-md-3 text-center">
                <a href="#" class="btn btn-success">
                <span class="glyphicon glyphicon-off"></span> Off 
                </a>
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
            </div>
            <div class="col-md-3 text-center">
                <a href="#" class="btn btn-danger ">
                <span class="glyphicon glyphicon-remove"></span> Off 
                </a>
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
            </div>
            <div class="col-md-3 text-center">
                <a href="#" class="btn btn-success">
                <span class="glyphicon glyphicon-off"></span> Off 
                </a>
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
            </div>
            <div class="col-md-3 text-center">
                <a href="#" class="btn btn-success">
                <span class="glyphicon glyphicon-off"></span> Off 
                </a>
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
            </div>          
        </div>
        <div class="row" >
            <div class="col-md-3 text-center">
                <a href="#" class="btn btn-success">
                <span class="glyphicon glyphicon-off"></span> Off 
                </a>
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
            </div>
            <div class="col-md-3 text-center">
                <a href="#" class="btn btn-success">
                <span class="glyphicon glyphicon-off"></span> Off 
                </a>
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
            </div>
            <div class="col-md-3 text-center">
                <a href="#" class="btn btn-success">
                <span class="glyphicon glyphicon-off"></span> Off 
                </a>
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
            </div>
            <div class="col-md-3 text-center">
                <a href="#" class="btn btn-success">
                <span class="glyphicon glyphicon-off"></span> Off 
                </a>
                <h4>Label</h4>
                <div class="text-muted">Something else</div>
            </div>          
        </div>
        -->
    </div>
    
    
    
    <?php include( "footer.php");?>

</body>

</html>
