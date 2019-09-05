<?php

$todos = DB::query('SELECT * FROM todos');
?>
<div>
	<div>
		<h4 style="float: left;">TO-DO</h4>
		<!-- <select style="float: right;">
			<option>Today</option>
			<option>Yesterday</option>
			<option>Tomorrow</option>
		</select> -->
	</div>
	<!-- <form action="ajax/addTodo.php" method="POST"> -->
		<br>
		<br>
		<input type="text" name="todo-name" placeholder="Add to-do item" id="todo-name">
		Priority
		<select id="priority">
			<option value="1">High</option>
			<option value="2">Medium</option>
			<option value="3">Low</option>
		</select>
		<button onclick="addTodo()">Add</button>
	<!-- </form> -->
	<br>
	<hr>
	<div class="todo-container">
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
	</div>

	<script>
		function addTodo() {
			name = $('#todo-name').val()
			priority = $('#priority').val()
			$.ajax({
	            url: "./ajax/addTodo.php",
	            type: "POST",
	            data: { 'todo-name': name, 'priority': priority},
	            success: function(data)
                    {
                        id = data;
                        if (priority == 1) {
							priority = "<p class='text-danger'>High priority</p>";
						} else if (priority == 2) {
							priority = "<p class='text-warning'>Medium priority</p>";
						} else if (priority == 3) {
							priority = "<p class='text-success'>Low priority</p>";
						}

				        $('.todo-container').append("<div class='row'><div class='col-7'><p class='todo-title'>"+name+"</p></div><div class='col-4'>"+priority+"</div><div class='col-1'><input type='checkbox' id='check-"+id+"' onclick='crossTodo(this, "+id+")'></div></div><hr class='todo-hr'>")
                    }
	        });

		}

		function crossTodo(state, id) {
			console.log(state)
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
				console.log(elem)
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
