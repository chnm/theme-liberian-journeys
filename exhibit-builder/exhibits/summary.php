<?php echo head(array('title' => metadata('exhibit', 'title'), 'bodyclass'=>'exhibits summary')); ?>

<h1><?php echo metadata('exhibit', 'title'); ?></h1>
<?php echo exhibit_builder_page_nav(); ?>

<div id="primary">
    <?php $file = $exhibit->getFile(); ?>
    <?php if ($file): ?>
        <?php $exhibitImage = metadata($file, 'fullsize_uri'); ?>
        <?php $exhibitImageTitle = metadata($file, array('Dublin Core', 'Title')); ?>
        <div class="representative-image">
            <img src="<?php echo $exhibitImage; ?>" alt="<?php echo $exhibitImageTitle; ?>">
        </div>
    <?php endif; ?>
<?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
<div class="exhibit-description">
    <?php echo $exhibitDescription; ?>
</div>
<?php endif; ?>

<?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
<div class="exhibit-credits">
    <h3><?php echo __('Credits'); ?></h3>
    <p><?php echo $exhibitCredits; ?></p>
</div>
<?php endif; ?>
</div>

<?php
$pageTree = exhibit_builder_page_tree();
if ($pageTree):
?>
<nav id="exhibit-pages">
    <?php echo $pageTree; ?>
</nav>

<div id="mobile-exhibit-pages">
    <nav>
        <?php echo $pageTree; ?>
    </nav>
</div>
<?php endif; ?>

<?php echo foot(); ?>