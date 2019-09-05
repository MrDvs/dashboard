<h4 style="float: left;">BOOKMARKS</h4>
<br>
<hr>

<div class="row">

	<?php
	require 'classes/bookmark.php';
	if(isset($_POST['submit'])) {
		$name = $_POST['name'];
		$url = $_POST['url'];
		$logo_path = $_POST['logo_path'];
		bookmark::addBookmark($name, $url, $logo_path);
	}
		$bookmarks = DB::query('SELECT * FROM bookmarks');		
		
		foreach ($bookmarks as $bookmark){
			echo "<div  style='padding: 5px;'>";
			echo "<img  src='" . $bookmark['logo_path'] . "'></img>";
			echo "<a target='_blank' href='".$bookmark['url']."'> <p>" . $bookmark['name'] . "</p></a>";
			
			echo "</div>";
		}

	 ?>

	<form action="#" method="POST">
		<input type="text" name="name" placeholder="Name Website" >
		<input  type="text" name="url" placeholder="Name Url">
		<input type="text" name="logo_path" placeholder="Link Picture">
		<br>
		<br>
		<button  style="padding-top: 5px;" class="btn btn-success" type="submit" name="submit">Add Bookmark</button>
	</form>

	
</div>



