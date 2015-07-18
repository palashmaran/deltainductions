<?php class compression
	  {
	     private $filedata,$compressed_file;
		 
		 function __construct()
		 {
		   
                
		 }
		 function encode($filename,$path)
		 {
		   $compressed_file=gzencode(file_get_contents($path));
		   $myfile=fopen($filename,"w");
			fwrite($myfile,$compressed_file);
			fclose($myfile);
		 }
		 function decode($file)
		 {
		   return gzinflate(substr($file,10,-8));
		   
		 }
	    
	  };
	  ?>