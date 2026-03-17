$('document').ready(function(){
$('.flash').hide();
$('#change').click(function(){
	var oldpass= $('#opass').val();
	var newpass= $('#npass').val();
	var confirmpass= $('#cpass').val();
	
	
	if(oldpass=='')
	{
		var eopass= "Please enter password";
		$('#erroroldpass').text(eopass).show();

		setTimeout(function(){
		$('#erroroldpass').hide();
		},3000);
		
		$('#opass').focus();
		return false;
	}
	
	if(newpass=='')
	{
		var enpass= "Please enter new password";
		$('#errornewpass').text(enpass).show();

		setTimeout(function(){
		$('#errornewpass').hide();
		},3000);
		
		$('#npass').focus();
		return false;
		}
		
	else if(confirmpass=='')
	{
		var ecpass= "Please enter password";
		$('#errorconfirmpass').text(ecpass).show();

		setTimeout(function(){
		$('#errorconfirmpass').hide();
		},3000);
		
		$('#cpass').focus();
		return false;
		}
	else if(confirmpass!=newpass)
	{
		var ecpass= "Password are not matched";
		$('#errorconfirmpass').text(ecpass).show();

		setTimeout(function(){
		$('#errorconfirmpass').hide();
		},3000);
		
		$('#cpass').focus();
		return false;
		}
		else
		{
		$.ajax
		({
			type : 'POST',
			url : 'change_password.php',
			data : 'opass='+oldpass+'&npass='+newpass+'&cpass='+confirmpass,
			cache : false,
			
			success : function(returndata){
				//alert(returndata);
				if(returndata== 'true')
				{
					window.location="password_sent.html";
					
				}
				else
				{
					//alert('change');
					var m = "Password could not be changed";
					$('#msg').text(m).show();
					$ ('.flash').show();
						
				}
				}
		});
		}
	});
});