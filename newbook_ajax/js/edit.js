$('document').ready(function(){
	//alert('hi');	
	$('.flash').hide();
	$('#submit').click(function(){
	//alert('hello');
	
	var name=$('#name').val();
	var pattern_name = /^[A-Za-z']{1,80}$/i;
	var email=$('#email').val();
	var pattern_email= /^[a-z0-9]+@[a-z.]+.[a-z]{2,5}$/i;
	var address=$('#address').val();
	var phone=$('#phone').val();
	var photo=$('#photo').val();
	var g1=document.getElementById('gender1').checked;
	var g2=document.getElementById('gender2').checked;
	var h1=document.getElementById('hobbies1').checked;
	var h2=document.getElementById('hobbies2').checked;
	var gender;
	var hobbies;
	var hobbies1;
	var hobbies2;
	
		
	
	if(name=='')
	{
		var ename="Please enter name";
		$('#errorname').text(ename).show();
		
		setTimeout(function(){
		$('#errorname').hide();					
		},3000);
	}
	else if (!pattern_name.test(name))
	{
		aname="Please enter valid name";
		$('#errorname').text(aname).show();
		
		setTimeout(function(){
		$('#errorname').hide();					
		},4000);
	}
	
	if(email=='')
	{
		var eemail="Please enter email address";
		$('#erroremail').text(eemail).show();
		
		setTimeout(function(){
		$('#erroremail').hide();					
		},3000);
	}
	else if(!pattern_email.test(email))
	{
		var aemail="Please enter valid email address";
		$('#erroremail').text(aemail).show();
		
		setTimeout(function(){
		$('#erroremail').hide();					
		},4000);
	}
	
	if(address=='')
	{
		var eadd="Please enter address";
		$('#erroradd').text(eadd).show();
		
		setTimeout(function(){
		$('#erroradd').hide();					
		},3000);
	}
	
	if(phone=='')
	{
		var ephone="Please enter phone number";
		$('#errorphone').text(ephone).show();
		
		setTimeout(function(){
		$('#errorphone').hide();					
		},3000);
	}
	
	if(photo=='')
	{
		var ephoto="Please enter photo";
		$('#errorphoto').text(ephoto).show();
		
		setTimeout(function(){
		$('#errorphoto').hide();					
		},3000);
	}
	
	if(g1== false && g2== false)
	{
		var gender="Please select gender";
		$('#errorgender').text(gender).show();
		
		setTimeout(function(){
		$('#errorgender').hide();					
		},3000);
	}
	
	
	if(h1== false && h2== false)
	{
		var gender="Please select hobbies";
		$('#errorhobb').text(gender).show();
		
		setTimeout(function(){
		$('#errorhobb').hide();					
		},3000);
	}
	
	
	else
	{
		if(g1==true)
		{
			var gm=	document.getElementById('gender1').value;
			gender=gm;
		}
		else if(g2==true)
		{
			var gf=	document.getElementById('gender2').value;
			gender=gf;
		}
	  // alert(gender);
	  
	  
		var hr="Reading Book";
		var hl="Listening to Music";
		if(h1==true)
		{
			hobbies=hr;
		}
		if(h2==true)
		{
			hobbies=hl;	
		}
		 if(h1==true && h2==true)
		{
			hobbies=hr+hl;	
		}
		$.ajax({
			   
			   type:'POST',
			   url:'update.php',
			   data:"name="+name+"&email="+email+"&address="+address+"&phone="+phone+"&gender="+gender+
			  "&photo="+photo+"&hobbies="+hobbies,
			   cache:false,
			   
			   success:function(returndata)
			   {
					if(returndata=='true')
					{
						//alert('Successfully Added');
						window.location="dashboard.html";
					}
					else
					alert('Not Added');
			   }
			   
			   
			   });
	}
	});
});