mkdir folder{1..100};
 
  for folder in {1..100}; do
    touch folder$folder/folder$folder.txt  
   chmod 700 -R folder$folder
   done
