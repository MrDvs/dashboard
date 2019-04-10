<?php  


$bookmarks = DB::query('SELECT * FROM bookmarks');
?>

<h4 style="float: left;">BOOKMARKS</h4>
<br>
<hr>

<div class="row">
<?php  
foreach ($bookmarks as $bookmark) {
	echo "<div style='text-align: center;'>";
		if (isset($bookmark['url']) && $bookmark['logo_path'] != '') {
			$img = "<img src='".$bookmark['logo_path']."' alt='".$bookmark['name']." logo'>";
		}
		else {
			$img = '';
		}
		echo $img."<p><a href='".$bookmark['url']."' target='blank'>".$bookmark['name']."</a></p>";
	echo "</div>";
}
?>
</div>