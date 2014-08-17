        </div>
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
</div> <!--#third-->

<a name="whatson"></a>
<div id="fifth" class="mainsection">
    <div class="story">
        <!--crazy floating thing-->
        <div class="ct"></div>
        <div id="whats_on" class="section">
			<div id="events">
                <?php

                $args = array(
                    'post_type'        => 'events',
                    'post_status'      => 'publish',
                );
                $events = get_posts( $args );

                foreach ( $events as $event ) {
                    setup_postdata($event);
                        printf('<div class="event" data-id="eventID">');
                        printf('    <div class="info"><span class="title"><a href="%s">%s</a></span></div>', get_post_meta($event->ID, '_event_url', true), the_title());
                        printf('    <div class="info"><span class="deets">%s</span><br/><span class="deets">%s<br/>$%s</span></div>', get_post_meta($event->ID, '_event_date', true), get_post_meta($event->ID, '_event_time', true), get_post_meta($event->ID, '_event_price', true));
                        printf('    <div class="image"><img src="%s" /></div>', the_post_thumbnail());
                        printf('    <div class="dots"><img src="http://clients.saltinteractive.com/goldfinch/images/dots.png" /></div>');
                        printf('</div>');
                }
                wp_reset_postdata();
                ?>
			</div>
		</div>
    </div> <!--.story-->
    <div class="footer"><a href="http://www.saltinteractive.com" target="_blank">site by salt</a></div>
</div> <!--#third-->

<?php wp_footer(); ?>
</body>
</html>