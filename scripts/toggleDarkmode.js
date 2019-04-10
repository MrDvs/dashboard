function toggleDarkmode(state) {
	if (state.checked) {
		$.ajax({
	        url: "./ajax/toggleDarkmode.php",
	        type: "POST",
	        data: { 'mode': "dark" },                   
	        success: function()
	            {
	            	location.reload();
	                console.log("Updated");                                    
	            }
	    });
	} else {
		$.ajax({
	        url: "./ajax/toggleDarkmode.php",
	        type: "POST",
	        data: { 'mode': "light" },                   
	        success: function()
	            {
	            	location.reload();
	                console.log("Updated");                                    
	            }
	    });
	}
}