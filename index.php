<?php
echo head(array('bodyid'=>'home')); 
?>

<div id="about">
    <?php if (get_theme_option('Homepage Text')): ?>
        <p><?php echo get_theme_option('Homepage Text'); ?></p>
    <?php endif; ?>   
</div>

<div id="home-map">
    <a href="<?php echo url('map'); ?>"><img src="<?php echo img('liberia-map.png'); ?>"></a>
</div>

<div id="portals">

    <div class="large-4">
      <div id="exhibits-portal-wrap" class="portal-wrap">
        <div id="exhibits-portal" class="portal">
          <div id="exhibits-portal-overlay" class="overlay">
            <a href="<?php echo url('exhibits'); ?>"><span class="overlay-text" id="exhibits-link">exhibits</span></a>
          </div>
        </div>    
      </div>              
    </div>

    <div class="large-4">
      <div id="collections-portal-wrap" class="portal-wrap">
        <div id="collections-portal" class="portal">
          <div id="collections-portal-overlay" class="overlay">
            <a href="<?php echo url('items/browse?type=6'); ?>"><span class="overlay-text" id="collections-link">collections</span></a>
          </div>
        </div>
      </div>        
    </div>

    <div class="large-4 last">
      <div id="stories-portal-wrap" class="portal-wrap last">
        <div id="stories-portal" class="portal">
          <div id="stories-portal-overlay" class="overlay">
            <a href="<?php echo url('contribution'); ?>"><span class="overlay-text" id="stories-link">share</span></a>
          </div>
        </div>
      </div>
    </div>

</div>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
