$(document).ready(function(){
	$("#state").change(function(){
		var state_id = $(this).val();

		get_city(state_id);

	});

	$("#state").show(function(){
		var state_id = $(this).val();

		get_city(state_id);
	});
});

function get_city(state_id)
{
	if(state_id == '')
	{
		alert("Please choose a state");
	}
	else
	{
		$.get("http://localhost/sdms/controller/ajax.php", {state : state_id},function(data){

			
			var city = data.split("||");
			var city = city.slice(0,-1);
			var str  = "<select name = 'stud_city'>";
			for( var i=0;i<city.length;i++ )
			{
				str = str + ("<option value="+"'"+city[i]+"'>"+city[i]+"</option>");
			}

			str = str + "</select>";	
			$("#city").html(str);
		});
	}		
}