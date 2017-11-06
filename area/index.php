<html>

<head>
    <title>Bootswatch: Paper</title>
    <?php include( "../css.php"); ?>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <!--<script src="./select_area.js"></script>
    <script src="./add_fence.js"></script>
    <script src="./del_fence.js"></script>
    <script src="./select_area_fence.js"></script>-->
    <script src="./check_bt.js"></script>
</head>

<body>
<?php include( "../bar.php");
?>
<div class="container">
    <div class="row">
        <div class="text-center">

        <button type="submit" class="btn btn-primary btn-lg" id="add" data-toggle="modal" data-target="#madd_area" >
            新增防護區域
            </button>
            <div class="modal fade" id="madd_area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">新增防護區域名稱</h4>
                        </div>

                        <form action="add_area.php" method="post">
                        <div id="select_area_show">
                        <input class="form-control" id="add_area" type="text" name="add_area" placeholder="例如:大門，倉庫門口">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" id="add_area_bt">確認</button>
                            
                        </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-danger btn-lg" id="del" data-toggle="modal" data-target="#mdel_area" >
            移除防護區域
            </button>
            <div class="modal fade" id="mdel_area" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">移除防護區域名稱</h4>
                        </div>

                        <form action="del_area.php" method="post">
                        <div>

                        <select class="form-control" name="del_area" id="del_area">
                        <option selected>防護區域名稱</option>
                        <?php $i=0;
                        include("../connMysql.php");
                        $sql="SELECT * FROM `main_area` ORDER BY `location` ASC";
                        $result=$conn->query($sql);
                        if ($result->num_rows > 0) {
                            // 輸出每行數據
                            while ($row=$result->fetch_assoc()) {
                                echo '<option value="'.$row["location"].'">'.$row["location"].'</option>"';
                                $i++;
                            }
                        } else {
                            echo "0 個結果";
                        }

                        $conn->close();
                        ?>
                         </select>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-default" id="del_area_bt">確認</button>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <table class="table table-bordered ">
                <thead>
                <tr >
                    <th width="4%" class="text-center">#</th>
                    <th class="text-center">防護區域</th>
                    <th class="text-center">已綁定Pi</th>
                    <th class="text-center">設定Pi綁定</th>
                </tr>

                <!--
                <tr>
                    <th width="4%" class="text-center">1</th>
                    <th class="text-center" data-id="select_area_1" >大門口</th>
                    <th class="text-center">
                    <button type="submit" class="btn btn-success btn-sm" id="data_bt" data-toggle="modal" data-target="#myModal_1_111" >
                    查詢綁定的Pi
                    </button>

                    <div class="modal fade" id="myModal_1_111" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">大門口 圍籬代號</h4>
                                </div>
                                <div id="select_area_show">
                                    <li class="list-group-item">A</li>
                                    <li class="list-group-item">B</li>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">確認</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary btn-sm" id="add" data-toggle="modal" data-target="#myModal_1_222" >
                    新增
                    </button>
                    <div class="modal fade" id="myModal_1_222" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">大門口 新增圍籬代號</h4>
                                </div>
                                <div >
                                
                                <form action="test.php" method="post">
                                <input class="form-control" id="add_fence" type="text" name="add_fence" placeholder="電子圍籬代號">
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-primary btn-lg btn-block" data-dismiss="modal" id="add_fence_bt">新增</button>    
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>


                    
                    
                    <button type="submit" class="btn btn-danger btn-sm"id="del" data-toggle="modal" data-target="#myModal_1_333" >
                    移除
                    </button>
                    <div class="modal fade" id="myModal_1_333" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">大門口 刪除圍籬代號</h4>
                                </div>
                                <div >

                                <select id="del_fence_list" class="form-control">
                                <option selected>選擇圍籬代號</option>
                                </select>
                                
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" id="add_fence_bt">移除</button>    
                                </div>
                            </div>
                        </div>
                    </div>

                    </th>


                </tr>-->

                <?php
                function fun_print_area_add_fence($fun_area)
                {
                    echo '<div>';
                    echo '<form action="add_fence.php" method="post">';
                    echo'<input type="text" name="select_area" value="'.$fun_area.'" style="display: none" >';
                    echo '<input class="form-control" id="add_fence" type="text" name="add_fence" placeholder="所綁定之Pi代號(例如:gate_0,storage_3)">';
                    echo '</div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default btn-primary btn-lg btn-block" id="add_fence_bt">新增綁定</button>    
                    </div>';
                    echo '</form>';
                }
                function fun_print_area_del_fence($fun_area)
                {
                    echo '
                    <div >
                    <form action="del_fence.php" method="post">
                    <input type="text" name="select_area" value="'.$fun_area.'" style="display: none" >
                    <select id="del_fence_list_'.$fun_area.'" class="form-control" name="del_fence_list">
                    <option selected>選擇Pi代號</option>';
                    include("../connMysql.php");
                    $sql= "SELECT fence_id FROM `main_fence` WHERE `location` = '".$fun_area."'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // 輸出每行數據
                        //echo '<select class="form-control">';
                        //echo '<option selected>移除圍籬</option>';
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="'.$row["fence_id"].'">'.$row["fence_id"].'</option>"';
                        }
                        //echo '</select>';
                    } else {
                        echo "0 個結果";
                    }
                    $conn->close();
                    echo '
                    </select>   
                    <div class="modal-footer">
                    <button type="submit" class="delfence btn btn-danger btn-lg btn-block" id="del_fence_bt" value="'.$fun_area.'">解除綁定</button>   
                    </div>
                    </form>                     
                    </div>
                    ';
                }
                function fun_print_area_del($fun_area, $fun_i)
                {
                    echo '
                    <button type="submit" class="btn btn-danger" id="del'.$fun_i.'" data-toggle="modal" data-target="#myModal_'.$fun_i.'_3" >
                    移除綁定Pi
                    </button>
                    <div class="modal fade" id="myModal_'.$fun_i.'_3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">'.$fun_area.' 解除綁定</h4>
                                </div>';
                                fun_print_area_del_fence($fun_area);
                                echo '
                                
                            </div>
                        </div>
                    </div>
                    
                    ';
                }

                function fun_print_area_add($fun_area, $fun_i)
                {
                    echo '
                    <td class="text-center">
                    <button type="submit" class="btn btn-primary" id="add'.$fun_i.'" data-toggle="modal" data-target="#myModal_'.$fun_i.'_2" >
                    新增綁定Pi
                    </button>
                    <div class="modal fade" id="myModal_'.$fun_i.'_2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">'.$fun_area.'新增綁定Pi</h4>
                                </div>';
                                

                                fun_print_area_add_fence($fun_area);
                                
                                
                                echo'
                            </div>
                        </div>
                    </div>';
                }
                function fun_print_area_detailed_fence($fun_area)
                {
                    include("../connMysql.php");
                    $sql= "SELECT fence_id FROM `main_fence` WHERE `location` = '".$fun_area."'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // 輸出每行數據
                        
                        while ($row = $result->fetch_assoc()) {
                            //echo '<li class="list-group-item">'.$row["fence_id"].'</li> ';
                            echo $row["fence_id"].',';
                        }
                    } else {
                        echo "尚未綁定任何Pi";
                    }
                    $conn->close();
                }

                function fun_print_area_detailed($fun_area, $fun_i)
                {
                    /*echo '
                    <td class="text-center">
                    <button type="submit" class="btn btn-success " id="data_'.$fun_i.'" data-toggle="modal" data-target="#myModal_'.$fun_i.'_1" >
                    查詢綁定的Pi
                    </button>

                    <div class="modal fade" id="myModal_'.$fun_i.'_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">'. $fun_area.' 所代號</h4>
                                </div>
                                <div class="modal-body">';
                                fun_print_area_detailed_fence($fun_area);
                                echo '
                                </div> 
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">確認</button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    ';*/
                    echo '<td class="text-center">';
                    fun_print_area_detailed_fence($fun_area);
                }
                
                $i=0;
                include("../connMysql.php");
                $sql="SELECT * FROM `main_area` ORDER BY `location` ASC";
                $result=$conn->query($sql);
                
                echo '<tr>';
                if ($result->num_rows > 0) {
                    // 輸出每行數據
                    while ($row=$result->fetch_assoc()) {
                        echo '<td width="4%" class="text-center">'.$i.'</td>';
                        echo '<td class="text-center">'.$row["location"].'</td>';
                        fun_print_area_detailed($row["location"], $i);
                        fun_print_area_add($row["location"], $i);
                        fun_print_area_del($row["location"], $i);
                        echo '</td></tr>';
                        $i++;
                    }
                } else {
                    //echo "0 個結果";
                }
                $conn->close();
                ?>


                </thead>
                <tbody>


                </tbody>
            </table>
        </div>
    </div>







    <hr/>
    <hr/>
</div>
<?php include( "../footer.php");
?>
</body>

</html>
