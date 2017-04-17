    <?php include "db.php"; ?>

   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
                   <?php 

                        //mysql_fetch_array()
                        //從資料集取得的陣列，索引值可以是 "數字" ，也可以是 "字串"

                        //mysql_fetch_assoc()
                        //從資料集取得的陣列，索引值只能是 "字串" ，如下：
                        
                        //mysql_fetch_row()
                        //從資料集取得的陣列，索引值只能是 "數字" ，如下：
                       

                        $query = "SELECT * FROM categories";
                        //選取categories表

                        $select_all_categories_query = mysqli_query($connection,$query);
                        //連線主機＋選取categories表

                        while($row = mysqli_fetch_assoc($select_all_categories_query)){
                        //從資料表取得索引值屬於字串的值

                            $cat_title = $row['cat_title'];
                            //取cat_title值(value)
                            echo "<li><a href='#'>$cat_title</a></li>";

                        }



                    ?>

                    <li>
                        <a href="admin">Admin</a>
                    </li>
                   <!--  <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>