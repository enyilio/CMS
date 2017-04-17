<?php 

		if (isset($_POST['create_post'])) {
				
			$post_title = $_POST['title'];
			$post_author = $_POST['author'];
			$post_category_id = $_POST['post_category'];
			$post_status = $_POST['post_status'];

			$post_image = $_FILES['image']['name'];//上傳檔案的原始名稱
			$post_image_temp = $_FILES['image']['tmp_name'];//上傳檔案後的暫存資料夾位置

			//檔案上傳文件http://www.webtech.tw/info.php?tid=24


			$post_tags = $_POST['post_tags'];
			$post_content = $_POST['post_content'];
			$post_date = date('y-d-m');
			$post_comment_count = 4;

			move_uploaded_file($post_image_temp, "../images/$post_image");

			$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
			
			$query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}')";

			$create_post_query = mysqli_query($connection, $query);
			
			comfirmQuery($create_post_query);

		}


 ?>

<form action="" method="post" enctype="multipart/form-data">
	
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>

	<div class="form-group">
			<select name="post_category" id="">
		
			<?php 

				$query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection,$query);
                
                comfirmQuery($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)){
                //從資料表取得索引值屬於字串的值
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                //取cat_title值(value)

                echo "<option value='$cat_id'>{$cat_title}</option>";


			}
			 ?>

			 
		</select>
	</div>

	<div class="form-group">
		<label for="post_author">post_author</label>
		<input type="text" class="form-control" name="author">
	</div>
	<div class="form-group">
		<label for="post_status">post_status</label>
		<input type="text" class="form-control" name="post_status">
	</div>

	<div class="form-group">
		<label for="post_image">post_image</label>
		<input type="file" class="form-control" name="image">
	</div>

	<div class="form-group">
		<label for="post_tags">post_tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">post_content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>		

	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_post" value="Publish">
	</div>
</form>