<?php
          session_start();
       require ('app/init.php');
               $_SESSION['flag']=1;  
	     if(isset($_POST['register']))
		 {    
		     $flag=0;
			 $rollno=trim($_POST['rollno']);
			 $name=input($_POST['name']);
			 $dept=input($_POST['dept']);
			 $yos=trim($_POST['yos']);
			 $email=trim($_POST['email']);
			 $password=trim($_POST['password']); 
			 $profile_pic=$_FILES['profile_pic']['name'];
			
			$compress_files=new compression();
			$compress_files->encode($_FILES['file']['name'],$_FILES['file']['tmp_name']);
			  if($_FILES['profile_pic']['error']>0)
			    $Imagetype[1]="";
			  else	
		       $Imagetype=explode('/',$_FILES['profile_pic']['type']);
			  
			 $Image=new Image($rollno,$_FILES['profile_pic']['name'],$Imagetype[1],$_FILES['profile_pic']['size']/1024,$_FILES['profile_pic']['tmp_name']);
				  
		   	if(strlen($rollno)==0)
        	 {
			   $roll_err="fields cannot be empty";
			   $flag++;
             }
			  else if(!is_numeric($rollno))
			 {
			   $roll_err="rollno should be numeric";
			   $flag++;
			 }
			 else 
			 if(strlen($rollno)!=9)
				  {
				    $roll_err="rollno should contain exactly nine digits";
					$flag++;
				  }			 
			else if($db->getrowCount("select * from register where rollno='$rollno'")!=0)
			 {
			        $roll_err="rollno already exist";
					$flag++;
			 }
			 if(strlen($name)==0)
        	 {
			   $name_err="fields cannot be empty";
			   $flag++;
             }	
			 else
			 if(!isvalid_name($name))
			  {
			     $name_err="Name can contain only alphabets";
			     $flag++;
			  }
			  	if(strlen($dept)==0)
        	  {
			    $dept_err="fields cannot be empty";
			   $flag++;
              }
               else			  
			  if(!isvalid_name($dept))
			  {
			    $dept_err="Department name should contain only alphabets ";
			     $flag++;
			  }
			  if(strlen($yos)==0)
        	  {
			    $yos_err="fields cannot be empty";
			   $flag++;
              }
			  else
			  if(!is_numeric($yos))
			   {
			      $yos_err="year should be numeric";
			      $flag++;
			   }
			  else 
			   if(strlen($yos)!=4)
			   {
			     $yos_err="year should can four digits";
			     $flag++;
			   }
			   if(strlen($email)==0)
        	   {
			    $email_err="fields cannot be empty";
			    $flag++;
               }
			   else
			   if(!isvalid_email($email))
			   {
			       $email_err="Invalid email";
			       $flag++;
			   }
			   else if($db->getrowCount("select * from register where email='$email'")!=0)
			   {
			       $email_err="email already exist";
					$flag++;
			   }
			   if(strlen($password)==0)
			   {
			     $password_err="fields cannot be empty";
			     $flag++;
			   }
			   else
			  if(!isvalid_password($password))
			  {
			    $password_err="Password can contain alphabets,numbers,@,_";
			    $flag++;
			  }
			  else if(strlen($password)<6)
			  {
			    $password_err="Password length should at least six digits long";
				$flag++;
			  }
		       if($Image->getImagesize()==0)  
			    {
				   
			     $profile_pic_err="Fields cannot be empty";
				 $flag++;
			   
				}
				else
			  if(!($Image->getImagetype()==='.jpg'||$Image->getImagetype()==='.png'||$Image->getImagetype()==='.jpeg'||$Image->getImagetype()==='.bmp'||$Image->getImagetype()==='.gif'))
			   {
			     $profile_pic_err="supported image types jpg,gif,png,bmp";
				 $flag++;
			   }
			   else
			    if($Image->getImagesize()>500)
			   {
			     $profile_pic_err="Maximum image size is 500 KB";
				 $flag++;
			   }
			  
			   if($flag==0 && !$Image->upload()) 
                  {
				      $profile_pic_err="unable to move try again";
				      $flag++;
				  }
                 if(strlen($_POST['captcha_code'])==0)
				  {
				    $captcha_err="fields cannot be empty";
				    $flag++;
				  }
				 else
			  if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
			   {
			       $captcha_err="Validation code does not matched";
				   $flag++;
			   }
			   
			   if($_FILES['file']['type']!='text/plain')
			   {
			     $file_err="supported format is txt only";
			     $flag++;
			   }
			 if($flag==0)
			 {   
			    $uid=generate_num();
				$count=$db->getrowCount("select * from register where uid='$uid'");
				  while($count!=0)
                   $count=$db->getrowCount("select * from register where uid='$uid'");
				  
	               $db->insert_record($uid,$rollno,$name,$dept,$yos,$email,sha1($password),$Image->getImagepath());
				     
				     $_SESSION['flag']=1;     
				    header("location:index.php");
		     }		 
	     }
?>
<!Doctype HTML>
<html>
      <link rel="stylesheet" type="text/css" href="app/css/register.css">
	  
	  <script type="text/javascript" src="app/js/validation.js"> </script>
	  
  
   
  <body onload="confirm('<?php if(isset($_SESSION['flag'])){echo $_SESSION['flag']; unset($_SESSION['flag']); } ?>');"  >   
  
            <div class="heading">
		           <h1 > Registration form </h1>	     
			</div>
          <form action="" method="post" id="register"  enctype="multipart/form-data">
		    <div class="reg_div" >
             <table class="reg_table" style="font-size:22px;" >
			    <tr>
			        <td class="reg_table" > Rollno:   </td>  
			   </tr>   
			   <tr>
			        <td class="reg_table" > Name:   </td>  
			   </tr>
			   <tr>
			        <td class="reg_table"> Department:    </td>  
			   </tr>
			   <tr>
			        <td class="reg_table"> Year of Study: </td>  
			   </tr>
			   <tr>
			        <td class="reg_table"> Email:        </td>  
			   </tr>
			   <tr>
			        <td class="reg_table"> Password:      </td>  
			   </tr>
			   <tr>
			   <td class="">  </td>
			   </tr>
			   <tr>
			        <td class="reg_table" > Profile Picture: </td>  
			   </tr>
			   <tr>
			        <td class="reg_table" > Upload resume: </td>  
			   </tr>
			  
			   </table>
			 
            </div>
			  <div class="reg_first">
             <table class="reg_table" style="height:100%;width:100%;" >
			 
			    <tr>
			        <td  class="reg_table" >  <input type="text" name="rollno" value="<?php if(isset($rollno) && !isset($rollno_err)) echo $rollno; ?>" onkeyup="valid_rollno(this.value)"; placeholder="Enter rollno" required> </td>  
			   </tr>   
			   <tr>
			        <td class="reg_table" >  <input type="text" name="name" value="<?php if(isset($name) && !isset($name_err)) echo $name; ?>" onkeyup="valid_name(this.value);" placeholder="Enter name" required> </td>  
			   </tr>
			   <tr>
			        <td class="reg_table">   <input type="text" name="dept" value="<?php if(isset($dept) && !isset($dept_err)) echo $dept; ?>"onkeyup="valid_deptname(this.value);"placeholder="Enter department"  required> </td>  
			   </tr>
			   <tr>
			        <td class="reg_table">   <input type="text" name="yos" value="<?php if(isset($yos) && !isset($yos_err))  echo $yos; ?>"onkeyup="valid_yos(this.value);" placeholder="Enter year of study" required> </td>  
			   </tr>
			   <tr>
			        <td class="reg_table">    <input type="text" name="email" value="<?php if(isset($email) && !isset($email_err)) echo$email;?>"onkeyup="valid_email(this.value);" placeholder="Enter Email" required> </td>  
			   </tr>
			   <tr>
			        <td class="reg_table">    <input type="password" id="pass" name="password" value="<?php if(isset($password) && !isset($password_err)) echo $password;?>"onkeyup="valid_password(this.value);"placeholder="Enter password" required > </td>  
			   </tr>
			   <tr>
			        <td style="position:absolute;top:53%;left:15%"> <input type="checkbox" value="sfsd" onchange="show_password();" name="check" > show Password </td>   
			   </tr>
			  
			   <tr>
			        <td class="reg_table" > <input type="file" name="profile_pic" onkeyup="valid_profilepic(this);"placeholder="upload image" required></td>  
			   </tr>
			   <tr>
                       <td class="reg_table" > <input type="file" name="file" onkeyup="valid_file(this.value);"placeholder="upload resume" required></td>  
			     
			   </tr>
			   <tr>
			      <td class="reg_table">
				   <img src="app/captcha/captcha.php?rand=<?php echo rand();?>" id='captchaimg'>
				   
			  </tr>
			  <tr>
			        
				<td>	 <label class="reg_table" >   Enter the above code here </label> </td>
					 
			  </tr>
			   <tr> 
			        
			         <td class="reg_table">
					            
					       
						<input id="captcha_code" name="captcha_code" type="text">
        		     </td>
			 </tr>
             <tr>			 
				<td>	<label class="reg_table" >	Can't read the image?<br> click <a href='javascript: refreshCaptcha();' style="color:red;">here</a> to refresh. </label></td> 
				
			  </tr>
			 </table>
            </div>	
			<div class="button_div">
              
				<button class="button_div" id="reg" style="left:53%" type="submit" name="register" >Submit</button> 
				
			   
			     <button class="button_div" id="reset" style="left:38%";  type="submit" name="Reset" >Reset </button> 
              
			  
			 	
			</div>	
             <div class="reg_second">
             <table class="reg_table" style="width:80%;font-size:20px;" >
			    <tr>
			        <td class="reg_table" id="roll_err"><?php if(isset($roll_err)) echo $roll_err;  ?></td>  
			   </tr>   
			   <tr>
			        <td class="reg_table" id="name_err"><?php if(isset($name_err)) echo $name_err; ?></td>  
			   </tr>
			   <tr>
			        <td class="reg_table" id="dept_err"><?php if(isset($dept_err)) echo $dept_err;    ?></td>  
			   </tr>
			   <tr>
			        <td class="reg_table"id="yos_err"><?php if(isset($yos_err)) echo $yos_err; ?></td>  
			   </tr>
			   <tr>
			        <td class="reg_table" id="email_err"><?php if(isset($email_err)) echo $email_err; ?>       </td>  
			   </tr>
			   <tr>
			        <td class="reg_table" id="password_err"><?php if(isset($password_err)) echo $password_err;       ?></td>  
			   </tr>
			   <tr>
			        <td class="reg_table" id="profile_pic_err"><?php if(isset($profile_pic_err)) echo $profile_pic_err;  ?></td>  
			   </tr>
			   <tr>
			        <td class="reg_table" id="file_err"><?php if(isset($file_err)) echo $file_err;  ?></td>  
			   </tr>
			   <tr>
			       <td class="reg_table" id="captcha_err" ><?php if(isset($captcha_err)) echo $captcha_err;   ?></td>
			   </tr>
			  
			   
			 </table>
            </div>				
		</form>	 
  </body>
</html>