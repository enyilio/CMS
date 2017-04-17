<?php 

function comfirmQuery($result){

    global $connection;

   if (!$result) {
                    
                die('FAILD'. mysqli_error($connection));
            }



}

function insert_categories(){

		//ADD Category
		global $connection;

        if (isset($_POST['submit'])) {
            
            $cat_title = $_POST['cat_title'];

            if ($cat_title == " " || empty($cat_title)) {
                //如果是空值
                    echo "請輸入資料";
            }else{

                $query = "INSERT INTO categories(cat_title)";
                $query .= "VALUE('$cat_title')";


                $create_category_query = mysqli_query($connection, $query);

                if (!$create_category_query) {
                    die('QUERY FAILED' . mysqli_error($connection));
                }
            }
        }
    }

 function FindAllCategories(){

		global $connection;
		$query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_categories)){
        //從資料表取得索引值屬於字串的值
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        //取cat_title值(value)
        echo "<tr>";
        echo "<td>$cat_id</td>";
        echo "<td>$cat_title</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";

 }
}

function DeleteCategory(){
	global $connection;
	 //Delete Categories
     if (isset($_GET['delete'])) {
    //檢查網址的delete名稱是否正確

    $categoy_delete = $_GET['delete'];

    $query = "DELETE FROM categories WHERE cat_id = {$categoy_delete}";

    $dete_query = mysqli_query($connection, $query);

    header("Location: categories.php");

                    }


}



 ?>