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
                    'post_type'   => 'events',
                    'post_status' => 'publish',
                    'sort_column' => 'menu_order',
                );
                $events = get_posts( $args );

                foreach ( $events as $event ) {
                    $event_time = get_post_meta($event->ID, '_event_time', true);
                    if ( $event_time != '' ){
                        $event_time = "<br/>" . $event_time;
                    }

                    $door_charge = get_post_meta($event->ID, '_event_price', true);
                    if ( $door_charge != '' ) {
                        $door_charge = "<br/>$" . $door_charge;
                    }

                    setup_postdata($event);
                        printf('<div class="event" data-id="eventID">');
                        printf('    <div class="info"><span class="title"><a href="%s">%s</a></span></div>', get_post_meta($event->ID, '_event_url', true), $event->post_title);
                        printf('    <div class="info"><span class="deets">%s</span><span class="deets">%s%s</span></div>', get_post_meta($event->ID, '_event_date', true), $event_time, $door_charge);
                        printf('    <div class="image">%s</div>', get_the_post_thumbnail($event->ID, array(300,425)));
                        printf('    <div class="dots"><img src="%s/images/dots.png" /></div>', get_template_directory_uri());
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