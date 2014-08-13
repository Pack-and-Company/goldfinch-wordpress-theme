    </div> <!--.story-->
</div> <!--#third-->

<div id="fourth" class="mainsection">
    <div class="story">
    	<?php
			$file_url = "http://wordpress.pack.co.nz/goldfinch/wp-content/uploads/sites/20/2014/08/goldfinch.pdf";
            $embed_url = "http://docs.google.com/gview?url=$file_url&embedded=true"
		?>
    	<a name="pdf"></a>
		<div id="pdf" class="section">
			<iframe src="<?=$embed_url;?>" style="width:800px; height:500px;" frameborder="0"></iframe>
		</div><!--PDF-->
    </div> <!--.story-->
</div> <!--#fourth-->

<a name="whatson"></a>
<div id="fifth" class="mainsection">
    <div class="story">
        <!--crazy floating thing-->
        <div class="ct"></div>
        <div id="whats_on" class="section">
			<div id="events">
			</div>
		</div>
    </div> <!--.story-->
    <div class="footer"><a href="http://www.mukuna.co.nz/auckland/viaduct/goldfinchbar.htm"><img src="<?=get_template_directory_uri();?>/images/mukuna-trans.png" height="50px" /></a><br /><br /><a href="http://www.saltinteractive.com" target="_blank">site by salt</a></div>
</div> <!--#whatson-->

<?php wp_footer(); ?>
</body>
</html>