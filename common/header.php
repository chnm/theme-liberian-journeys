<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts','style'));
    echo head_css();
    ?>



    <!-- JavaScripts -->
    <?php queue_js_file(array('vendor/modernizr', 'globals')); ?>
    <?php echo head_js(); ?>

    <script>
 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

 ga('create', 'UA-73570479-1', 'auto');
 ga('send', 'pageview');

</script>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">

        <header>

            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            
            <nav id="top-nav">
                <?php 
                $navArray = array();
                $navArray[] = array('label' => 'Map', 'uri' => url('map'), 'class' => 'map');
                $navArray[] = array('label' => 'Exhibits', 'uri' => url('exhibits'), 'class' => 'exhibits');
                $navArray[] = array('label' => 'Collections', 'uri' => url('items/browse?type=6'), 'class' => 'collections');
                //$navArray[] = array('label' => 'Stories', 'uri' => url('items/browse?contributed=1'), 'class' => 'stories');
                $navArray[] = array('label' => 'Share', 'uri' => url('contribution'), 'class' => 'share');
                $navArray[] = array('label' => 'About', 'uri' => url('about'), 'class' => 'about');
                ?>
               <?php
                    echo nav($navArray)->addPageClassToLi();
               ?>
            </nav>

            <div id="mobile-nav">
                <?php 
                $navArray = array();
                $navArray[] = array('label' => 'Map', 'uri' => url('map'), 'class' => 'map');
                $navArray[] = array('label' => 'Exhibits', 'uri' => url('exhibits'), 'class' => 'exhibits');
                $navArray[] = array('label' => 'Collections', 'uri' => url('items/browse?type=6'), 'class' => 'collections');
                //$navArray[] = array('label' => 'Stories', 'uri' => url('items/browse?contributed=1'), 'class' => 'stories');
                $navArray[] = array('label' => 'Share', 'uri' => url('contribution'), 'class' => 'share');
                $navArray[] = array('label' => 'About', 'uri' => url('about'), 'class' => 'about');
                ?>
               <?php
                    echo nav($navArray)->addPageClassToLi();
               ?>
                
            </div>

            <div id="search-container">
                <form id="search-form" action="<?php echo url('/items/browse'); ?>" method="GET">
                <input type="text" name="search" id="search" value="" title="Search" placeholder="Search the archive...">
                <button name="submit_search" id="submit_search" type="submit" value="Search">Search</button>    
                </form>
            </div>

        </header>
        
        <article id="content">

        <div id="site-title">
            <h1><a href="<?php echo url(''); ?>">A Liberian Journey </a></h1>
            <h4><a href="<?php echo url(''); ?>">History, Memory, and the Making of a Nation</a></h4>
        </div>
        
            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
        <div id="main">
