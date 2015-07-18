function node(item)
{
   this.item=item;
   this.left=null;
   this.right=null;
}
function bst()
{
  this.root=null;
}
bst.prototype.push(root,item)
{  
}
bst.prototype.show(root)
{
   if(root!=null)
   {
     console.log(root.item);
	 root=root.left;
	 root=root.right;
   }
}
 