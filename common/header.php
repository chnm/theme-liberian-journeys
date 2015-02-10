<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
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
    queue_css_file('style');
    echo head_css();
    ?>



    <!-- JavaScripts -->
    <?php queue_js_file('vendor/modernizr'); ?>
    <?php queue_js_file('globals'); ?>
    <?php echo head_js(); ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap">

        <header>

            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            
            <nav id="top-nav">
                <?php 
                $navArray = array();
                $navArray[] = array('label' => 'Map', 'uri' => url('geolocation/map/browse'), 'class' => 'map');
                $navArray[] = array('label' => 'Exbhibits', 'uri' => url('exhibits'), 'class' => 'exhibits');
                $navArray[] = array('label' => 'Collections', 'uri' => url('items/browse?type=6'), 'class' => 'collections');
                $navArray[] = array('label' => 'Stories', 'uri' => url('items/browse?contributed=1'), 'class' => 'stories');
                $navArray[] = array('label' => 'Share', 'uri' => url('contribution'), 'class' => 'share');
                $navArray[] = array('label' => 'About', 'uri' => url('about'), 'class' => 'about');
                ?>
               <?php
                    echo nav($navArray)->addPageClassToLi();
               ?>
            </nav>

            <div id="search-container">
                <?php echo search_form(); ?>
            </div>

        </header>
        
        <article id="content">

        <div id="site-title">
            <h1><a href="<?php echo url(''); ?>">A Liberian Journey </a></h1>
            <h4><a href="<?php echo url(''); ?>">History, Memory, and the Making of a Nation</a></h4>
        </div>
        
            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
        <div id="main">
