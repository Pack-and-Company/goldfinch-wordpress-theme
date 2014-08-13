<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title>
    <?php
      if( ! is_home() ):
        wp_title( '|', true, 'right' );
      endif;
      bloginfo( 'name' );
    ?>
  </title>

  <?php wp_head(); ?>

  <META name="Description" content="Goldfinch Bar, Lounge by day, club by night, offering quality cocktails, champagne &amp; music in plush, intimate surroundings.">
  <META name="Keywords" content="Goldfinch, Goldfinch Bar, Waterfront Bar, Viaduct, Quay Street, Lounge Bar, cocktails, champagne, Auckland">

  <link rel="shortcut icon" href="<?=get_template_directory_uri();?>/images/favicon.ico" type="image/x-icon">

  <link href="<?=get_template_directory_uri();?>/css/style.css" rel="stylesheet" type="text/css" />
  <link href="<?=get_template_directory_uri();?>/css/prettyPhoto.css" rel="stylesheet" media="screen" type="text/css"/>

  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/jquery.localscroll-1.2.7-min.js"></script>
  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/jquery.scrollTo-1.4.2-min.js"></script>
  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/jquery.prettyPhoto.js" charset="utf-8"></script>
  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/jquery.inview.js"></script>
  <script type="text/javascript" src="<?=get_template_directory_uri();?>/js/nbw-parallax.js"></script>

</head>

<body <?php body_class(); ?>>

<div id="fblink">
    <a href="https://www.facebook.com/GoldfinchLoungeclub" target="_blank" title="Our facebook page">
        <img src="<?=get_template_directory_uri();?>/images/facebook.png" />
    </a>
</div>

<ul id="nav">
  <li class="home"><a href="#intro" title="HOME"><img src="<?=get_template_directory_uri();?>/images/logo.png" alt="GOLDFINCH" width="120"/></a></li>
    <li><a href="#second" title="Contact">CONTACT</a></li>
    <li><a href="#third" title="Gallery">GALLERY</a></li>
    <li><a href="#fourth" title="Drinks">DRINKS</a></li>
    <li><a href="#fifth" title="DJ Listings">DJs</a></li>
</ul>

<div id="intro" class=""> 
  <div class="mainsection">
        <div class="story">
            <img src="<?=get_template_directory_uri();?>/images/divider.png" class="centered"/><h1 class="">
            Lounge by day, club by night, offering quality cocktails, champagne &amp; music in plush, intimate surroundings.
            </h1>
            <img src="<?=get_template_directory_uri();?>/images/divider.png" class="centered"/>
        </div>
    </div>
</div> <!--#intro-->

<div id="second">
    <div class="mainsection">
        <div class="story blue">
            <img src="<?=get_template_directory_uri();?>/images/divider.png" class="centered" width="100%"/>
            <h1>
                <span class="heavy">Phone:</span> <a class="blue" href="tel:+6493576147">(09) 357 6147</a>
            </h1>
            <h1>
                <span class="heavy">Email:</span> <a class="blue" href="mailto:info@goldfinchbar.co.nz">info@goldfinchbar.co.nz</a>
            </h1>
            <h1>
                <span class="heavy">Opening hours:</span> Wed to Sat, 5pm to late.
            </h1>
            <h1>
                <span class="heavy">Address:</span> 204 Quay St, Auckland.
            </h1>
            <img src="<?=get_template_directory_uri();?>/images/map.jpg" class="centered" width="100%" />
            <img src="<?=get_template_directory_uri();?>/images/divider.png" class="centered" width="100%"/>
        </div>
    </div>
</div> <!--#second-->

<div id="third" class="mainsection">
  <div class="story">

