<script language="javascript" type="text/javascript">
	//http://www.cssnewbie.com/intelligent-navigation/#.UoJFfb8W1fM
	function setActive() {
	  aObj = document.getElementById('nav').getElementsByTagName('a');
	  for(i=0;i<aObj.length;i++) { 
	    if(document.location.href.indexOf(aObj[i].href)>=0) {
	      aObj[i].className='active';
	    }
	  }
	}
	window.onload = setActive;
</script>

<style>
</style>

<div id="my_menu<?php echo $id; ?>">
	
	<ul id="nav">
		<li><a href="<?php echo site_url('template/store'); ?>" class="mymenu" title="view IT's store">Store</a></li>
		<li><a href="<?php echo site_url('template/process'); ?>" class="mymenu" title="view all process">Process</a></li>
		<li><a href="<?php echo site_url('invoiceController/show_invoice'); ?>" class="mymenu" title="view invoice on inventory system">Invoice</a></li>
		<li><a href="<?php echo site_url('template/manual'); ?>" class="mymenu" title="view inventory system's user guide">User Guide</a></li>
		<li><a href="<?php echo site_url('template/contact'); ?>" class="mymenu" title="contact us - helpdesk">Contact Us</a></li>
	</ul>
</div>
