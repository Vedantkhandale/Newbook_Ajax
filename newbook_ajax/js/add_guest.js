$('document').ready(function(){
	$('.flash').hide();
	$('#submit').click(function(){

		var name= $('#name').val();
		var email= $('#email').val();
		var add= $('#address').val();
		var phone= $('#phone').val();
		var gender1= document.getElementById('gender1').checked;
		var gender2= document.getElementById('gender2').checked;
		var avatar= $('#photo').val();
		var hobbies1= document.getElementById('hobbies1').checked;
		var hobbies2= document.getElementById('hobbies2').checked;

		if(name=='')
		{
			var ename= "Please enter name";
			$('#errorname').text(ename).show();
			setTimeout(function()
			{
			$('#errorname').hide();
			},3000);
			
			$('#name').focus();
			return false;
		}
		else if(email=='')
		{
			var eemail= "Please enter email";
			$('#erroremail').text(eemail).show();
			setTimeout(function()
			{
			$('#erroremail').hide();
			},3000);
			
			$('#email').focus();
			return false;
		}
		else if(add=='')
		{
			var eadd= "Please enter address";
			$('#erroradd').text(eadd).show();
			setTimeout(function()
			{
			$('#erroradd').hide();
			},3000);
			
			$('#email').focus();
			return false;
		}
		else if(phone=='')
		{
			var ephone= "Please enter phone number";
			$('#errorphone').text(ephone).show();
			setTimeout(function()
			{
			$('#errorphone').hide();
			},3000);
			
			$('#phone').focus();
			return false;
		}
		else if(gender1=='' && gender2=='')
		{
			var egen= "Please enter gender";
			$('#errorgender').text(egen).show();
			setTimeout(function()
			{
			$('#errorgender').hide();
			},3000);
			
		}
		else if(avatar=='')
		{
			var eavatar= "Please select your photo";
			$('#errorphoto').text(eavatar).show();
			setTimeout(function()
			{
			$('#errorphoto').hide();
			},3000);
		}
		else if(hobbies1=='' && hobbies2=='')
		{
			var hob= "Please select hobbies";
			$('#errorhobbies').text(hob).show();
			setTimeout(function()
			{
			$('#errorhobbies').hide();
			},3000);
			
		}
		else
		{
			if( gender1== true)
			{
				var gen1='male';
			}
			if(gender2== true)
			{
				var gen1='female';
			}
			if(hobbies1== true)
			{
				var hob1='reading';
			}
			if(hobbies2== true)
			{
				var hob1='listening';
			}
			if((hobbies1== true) && (hobbies2== true))
			{
				var hob1='reading listening';
			}
			
			$.ajax
			({
				type : 'POST',
				url : 'add_guest.php',
				data :'name='+name+'&email='+email+'&address='+add+'&phone='+phone+'&gender='+gen1+'&avatar='+avatar+'&hobbies='+hob1,
				cache : false,
				
				success : function(getdata)
				{
				//alert(getdata);
				if(getdata=='true')
				{
					window.location = "guests.html";
				}
				else
				{
					var msg = "Guest not added";
					$('#msg').text(msg).show();
					$('.flash').show();
				}
				}
			});
		}
	});
});