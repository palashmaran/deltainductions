<?php 

  function generate_num()
	    {   $num=0;$sum=0;$flag=0;
		    $r=array(0,1,2,3,4,5,6,7,8,9); 
             shuffle($r);
			 while($r[0]==0)
			   shuffle($r);
		   for($i=0;$i<8;$i++)
		    {  
			     $num=$r[$i];
			      
			   $flag=!$flag;
			   if($flag)
                {
				   $num=$num*2;
				   if($num>9)
				     $num=$num%10+(int)($num/10); 
                }				
			    
			     $sum=$sum*10+$num;
			}
			  
			 return $sum*10;
		}  
		
		function input($str)
		{
		    $str=trim($str);
           $str=preg_replace('/\s\s+/',' ',$str);
		   
		    return $str;
		}
            
 function isvalid_name($name)
 {  
   
       $len=strlen($name);
        for($i=0;$i<$len;$i++)
			{
				if(!(($name[$i]>='a' && $name[$i]<='z') ||($name[$i]>='A' && $name[$i]<='Z') || $name[$i]===' '))
				   
				       return 0;
            			  
					     
			    
			}
		return 1;
 }	
 
 

 
 
 //chk password is valid or not;
 function isvalid_password($password)
 {  
   
    $len=strlen($password);
	
    for($i=0;$i<$len;$i++)
			{
				if(!(($password[$i]>='0' && $password[$i]<='9') ||($password[$i]>='a' && $password[$i]<='z') ||($password[$i]>='A' && $password[$i]<='Z')))
				  if ($password[$i]!='@' && $password[$i]!='_') 
				       return 0;
            			  
					     
			    
			}
	return 1;
 }

           function isvalid_email($email)
			   {
			      $len=strlen($email);
			      for($i=0;$i<$len;$i++)
				     if($email[$i]==='@' && $email[$i+1]==='.')
				       return 0;
					 
				  return 1;
				} 
?>