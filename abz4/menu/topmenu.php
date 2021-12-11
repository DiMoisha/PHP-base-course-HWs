<ul class="menu">
   <li class="item-1"><a href="/"><?php echo htmlspecialchars($topMenu1); ?></a></li>
   <li class="item-2"><a href="/index.php?page=contact"><?php echo htmlspecialchars($topMenu2); ?></a></li>
   <li class="item-3"><a href="http://193.104.14.66"><?php echo htmlspecialchars($topMenu3); ?></a></li>
</ul>

<script type="text/javascript">
// "getElementsByClassName" не определен IE,
// так что этот метод можно реализовать в JavaScript
if(document.getElementsByClassName == undefined) {
   document.getElementsByClassName = function(cl) {
      var retnode = [];
      var myclass = new RegExp('\\b'+cl+'\\b');
      var elem = this.getElementsByTagName('*');
      for (var i = 0; i < elem.length; i++) {
         var classes = elem[i].className;
         if (myclass.test(classes)) {
            retnode.push(elem[i]);
         }
      }
      return retnode;
   }
};
   try{
      var links = document.getElementsByClassName('menu')[0].getElementsByTagName('a');
      for(var i = 0; i < links.length; i++){
      if(links[i].href == location.href)
         links[i].parentNode.className += ' current active';
      };
   }catch(e){}
</script>
