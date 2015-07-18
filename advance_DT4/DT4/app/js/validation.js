        var flag=0;
    function confirm(c)
    {  
	   if(c==1)
	     window.confirm('You have registered successfully');
     } 
 function valid_name(name)
			 { 
			   var error="";
			   for(i in name)
			     if(!((name[i]>='a' && name[i]<='z') || (name[i]>='A' && name[i]<='Z') || name[i]==" "))
				    { error="Name can contain alphabets only";
					  flag++;
					}
				 else
                    flag=0;				 
					document.getElementById("name_err").innerHTML=error;
			 }
			 function valid_rollno(rollno)
			 { 
			    var error="";
				
				if(rollno.length!=9)
				  {
				    error="rollno should contain exactly nine digits";
					flag++;
				  }
				 
			   for(i in rollno)
			    if(!(parseInt(rollno[i])>=0 && parseInt(rollno[i])<=9))
				   {
				     error="rollno should be numeric";
					  flag++;
				   }
				  else
                    flag=0;
               					
				   document.getElementById("roll_err").innerHTML=error;
			 }
			 function valid_deptname(deptname)
			 { 
			   var error="";
			   for(i in deptname)
			     if(!((deptname[i]>='a' && deptname[i]<='z') || (deptname[i]>='A' && deptname[i]<='Z')|| deptname[i]==" "))
				    {
					  error="Department name should contain  alphabets  only";
					  flag++;
					}
				  else
                    flag=0;	
				    document.getElementById("dept_err").innerHTML=error;
			 }
			  function valid_yos(year)
			   {
			      
			     var error="";
			     for(i in year)
			    if(!(parseInt(year[i])>=0 && parseInt(year[i])<=9) )
				  {
    				  error="year should be numeric";
	   			      flag++;
				  }
				  else if(year.length!=4 )
                   {
				      error="year should can four digits";
				      flag++;
                    }				   
				    else if ( year<2005 || year>2015)
					 {
					   error="year range 2005 to 2015";
					    flag++;
					 }
                  else 
				    flag=0;
 				   document.getElementById("yos_err").innerHTML=error;
			   }
               function valid_email(email)
			   {
			     var error="",pos=email.lastIndexOf('@'),pos2=email.lastIndexOf('.');
			      for(i in email)
				   if(pos=='-1' || pos2-pos<2 || email.length-pos2<=2 )
				     { 
					   error="Invalid email";
					   flag++;
					 }
					else
                     flag=0; 
				     document.getElementById("email_err").innerHTML=error;
			   }
               function valid_password(password)
			    {
				   var error="";
				   
				  for(i in password)
				    if(!((parseInt(password[i])>=0 && parseInt(password[i])<=9)||(password[i]>='a' && password[i]<='z') || (password[i]>='A' && password[i]<='Z') || password[i]==='@'))
					    {
						  error="Password can contain alphabets,numbers,@,_";
						  flag++;
						}
					 else if(password.length<6)
                        {
                          error="password should contain at least six alphanumeric digits";
						  flag++;
                        }						 
					 else
                       flag=0;	
					  
					  document.getElementById("password_err").innerHTML=error;
					   
				
			    }
				function show_password()
				{
				   var obj=document.getElementById("pass");
				   
				   if(obj.type=='text')
				     obj.type='password';
				   else 
                     obj.type='text';				   
				}
                function valid_profilepic(profile_pic)
			    {  var type,size,error="",file;
				   file=profile_pic.files[0];
					size=file.size/1024;
			       type=profile_pic.value.substring(profile_pic.value.lastIndexOf('.')+1).toLowerCase();
				   if(!(type==='jpg' || type=='jpeg' || type==='png' || type==='gif' || type==='bmp'))
				     {
     					 flag++;
					     error="supported formats are jpg,jpeg,png,bmp,gif";
					 } 
					 else if(parseInt(size)>500)
                      { 
					       flag++;
					       error="Maximum image size is 500 KB";

                      }
                      else
                         flag=0;
          	          
					  document.getElementById('profile_pic_err').innerHTML=error;					 
				     
				}
				function valid_file(file)
			    {  var type;
 				
			       type=file.substring(file.lastIndexOf('.')+1).toLowerCase();
				   if(!(type==='txt'))
				     {
     					 flag++;
					     error="supported formats is txt only";
					 } 
					 else
                         flag=0;
          	          
					  document.getElementById('file_err').innerHTML=error;					 
				     
				}
                function refreshCaptcha(){
						var img = document.images['captchaimg'];
						img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
					}
					
				function all_fields_filled()
                   {   
				       var fields=["rollno","name","dept","yos","email","password","profile_pic","captcha_code"];
				        var s=document.forms["register"];
				      for(i in fields)
					  {
					     if(s[fields[i]].value==="")
						     return 0;
			 
					  }
					  
					  return 1; 
                    }				   
			  onkeydown=function  disablebutton()
				{   
                    var button=document.getElementById("reg");  				
				   if(flag==0 && all_fields_filled()) 
				     {
					    button.disabled=false;
					    
					 }
					else  
					  button.disabled=true;

				}