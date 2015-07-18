<?php
       class Image
	   {
	      private $name,$size,$source_path,$type,$finalpath,$newname;
		  public function __construct($rollno,$name,$type,$size,$source_path)
		  {
              $this->name=$name;
			  $this->source_path=$source_path;
			  $this->type='.'.$type;	      
		      $this->newname=$rollno.$this->type;
			  
			  $this->size=round($size,2);
			  
			  $this->finalpath=$this->newname;
		  }
		  public function getImageName()
		  {
		     return $this->name;
		  }
		  public function getnewName()
		  {
		    return $this->newname;
		  }
		  public function getImagesource()
		  {
		     return $this->source_path;
		  }
		  public function getImagepath()
		  {
		    return $this->finalpath;
		  }
		  public function getImagesize()
		  {
		     return $this->size;
		  }
		  public function getImagetype()
		  {
		      return $this->type;
		  }
		  public function upload()
		  {
		     if(move_uploaded_file($this->source_path,'../../'.$this->finalpath))
			       return 1;
			  return 0;
		  }
	   };
              