<html>

<head>
    <title>Bootswatch: Paper</title>
    <?php include( "../css.php");?>
    <script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
    </script>
    <script src="./select_area.js"></script>
    <script src="./add_uuid.js"></script>
    <script src="./del_uuid.js"></script>
    
</head>

<body>
    <?php include( "../bar.php");?>
    <div class="container">
        <div class="row" >
            <div class="col-md-6 text-center">
                    <h4>選擇防護區域</h4>
                    
                    <div class="input-group">
                    <select class="form-control" name="select_location" id="select_area">
                            <option selected>區域名稱</option>
                            <?php
                                $i=0;
                                include("../connMysql.php");
                                $sql= "SELECT * FROM `main_area` ORDER BY `location` ASC";
                                $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // 輸出每行數據
                                while ($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row["location"].'">'.$row["location"].'</option>"';
                                    $i++;
                                }
                            } else {
                                echo "無資料";
                            }
                                $conn->close();
                                ?>
                    </select>
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" id="select_area_bt">查詢</button>
                    </span>
                    </div>
                <br/>
                <table class="table table-hover column" >
                <thead>
                <tr>
                    <th>姓名</th>
                    <th>工號</th>
                    <th>電話</th>
                    <th>廠商名稱</th>
                    <th>iBeacon MAC</th>
                </tr>
                </thead>
                
                <thead id="select_area_show"></thead>    
                <!--<div id="select_area_show">
                <tr id="user_content">
                    <td></td>
                    <td id="name">出票機</td>
                    <td id="phone">188885</td>
                    <td id="manager">0</td>
                    <td id="ip">10.8.0.54</td>
                </tr>
                </div>-->
                
                
                
                
            </table>
                        
                
                
                
            </div>
            
            <div class="col-md-6 ">
                
                <br/><!--
                <button type="button" class="btn  btn-info" id="add_uuid_bt">新增</button>         
                <input class="form-control" id="add_uuid" type="text" name="add_uuid" placeholder="准入人員代號">-->

                <button type="submit" class="modal_add_uuid_bt btn btn-primary" id="modal_add_uuid_bt'" data-toggle="modal" data-target="#myModal_add" >
                新增允許人員
                    </button>
                    <div class="modal fade" id="myModal_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">允許人員</h4>
                                </div>
                                
                                <div><!--
                                <form action="add_fence.php" method="post">-->
                                
                                <div class="input-group">
                                <input type="text" id="add_user_name" class="form-control" placeholder="姓名" aria-label="Username" aria-describedby="basic-addon1">
                                <span class="input-group-addon" id="basic-addon2">ex:王大明</span>
                                </div>
                                <br>
                                <div class="input-group">
                                <input type="text" id="add_user_ID" class="form-control" placeholder="工號" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">ex:1009111</span>
                                </div>
                                <br>
                                <div class="input-group">
                                <input type="text" id="add_Phone" class="form-control" placeholder="電話" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">ex:0912345678</span>
                                </div>
                                <br>
                                <div class="input-group">
                                <input type="text" id="add_Vendor" class="form-control" placeholder="廠商名稱" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">ex:偉翔工程</span>
                                </div>
                                <br>
                                <div class="input-group">
                                <input type="text" id="add_UUID" class="form-control" placeholder="iBeacon mac" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">XX:XX:XX:XX:XX</span>
                                </div>

                                </div>




                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" id="add_uuid_bt">新增允許人員</button>    
                                </div>
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
            </div>
            <!--
            <div class="col-md-4 text-center">
                        
                        <select  id="del_uuid_list" class="form-control">
                        <option selected>移除准入人員</option>
                        </select>
                        
                
            <button type="button" class="btn btn-primary btn-lg btn-block btn-danger" id="del_uuid_bt" name="363" value="3345678">移除</button>
            </div>
            -->
            
            </div>
        </div>
    </div>
    <?php include( "../footer.php");?>
</body>

</html>
