                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat-title">Update Category</label>
                            <?php 
                                if (isset($_GET['edit'])) {
                                
                                $cat_id = $_GET['edit'];

                                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                $select_categories_id = mysqli_query($connection,$query);
                                
                                while($row = mysqli_fetch_assoc($select_categories_id)){
                                //從資料表取得索引值屬於字串的值
                                $cat_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                //取cat_title值(value)
                               ?>

                                <input value="<?php echo $cat_title; ?>" class="form-control" type="text" name="cat_title">


                                <?php } } ?>
                               
                                <?php 
                                //update categories

                                 if (isset($_POST['update_category'])) {
                                //檢查網址的delete名稱是否正確

                                $category_title = $_POST['cat_title'];

                                $query = "UPDATE categories SET cat_title = '$category_title' WHERE cat_id = $cat_id";

                                $update_query = mysqli_query($connection, $query);
                                if (!$update_query) {
                                    
                                    die("QUERY FAILD" . mysqli_error($connection));

                                }

                                  header("Location: categories.php");
                             }

                                 ?>
                        


                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                            </form>
