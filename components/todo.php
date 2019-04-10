<?php  

$todos = DB::query('SELECT * FROM todos');
?>
<div>
	<div>
		<h4 style="float: left;">TO-DO</h4>
		<select style="float: right;">
			<option>Today</option>
			<option>Yesterday</option>
			<option>Tomorrow</option>
		</select>
	</div>
	<br>
	<hr>
	<?php
		foreach ($todos as $todo) {
			switch ($todo['priority']) {
				case 1:
					$priority = "<p class='text-danger'>High priority</p>";
					break;
				case 2:
					$priority = "<p class='text-warning'>Medium priority</p>";
					break;
				case 3:
					$priority = "<p class='text-success'>Low priority</p>";
					break;
			}
			echo "<div class='row'>";

				if ($todo['done'] == 1) {
					$titleStyle = "style='text-decoration: line-through'";
				} else {
					$titleStyle = "style='text-decoration: none'";
				}
				
				echo "<div class='col-7'>";
					echo "<p class='todo-title ".$todo['id']."' ".$titleStyle.">".$todo['title']."</p>";
				echo "</div>";

				echo "<div class='col-4'>";
					echo $priority;
				echo "</div>";

				echo "<div class='col-1'>";
					echo "<input type='checkbox' id='check-".$todo['id']."' onclick='crossTodo(this, ".$todo['id'].")' ".($todo['done'] == 1 ? 'checked' : '').">";
				echo "</div>";
			echo "</div>";
			echo "<hr class='todo-hr'>";
			
		}
	?>

	<script>
		function crossTodo(state, id) {
			if (state.checked) {
				var elem = document.getElementsByClassName(id)[0]
				elem.style.textDecoration = "line-through"
				$.ajax({
		            url: "./ajax/updateTodoState.php",
		            type: "POST",
		            data: { 'id': id, 'done': '1' },                   
		            success: function()
		                        {
		                            console.log("Updated");                                    
		                        }
		        });
			} else {
				var elem = document.getElementsByClassName(id)[0]
				elem.style.textDecoration = "none"
				$.ajax({
		            url: "./ajax/updateTodoState.php",
		            type: "POST",
		            data: { 'id': id, 'done': '0' },                   
		            success: function()
		                        {
		                            console.log("Updated");                                    
		                        }
		        });
			}
		}
	</script>
</div>