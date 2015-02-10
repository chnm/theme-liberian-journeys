<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>

<?php if (count($exhibits) > 0): ?>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
        <?php $file = $exhibit->getFile(); ?>
        <?php if ($exhibitImage = metadata($file, 'fullsize_uri')): ?>
            <div class="exhibit-image" style="background-image:url(<?php echo $exhibitImage; ?>)"> <?php echo exhibit_builder_link_to_exhibit($exhibit,$text = ' '); ?></div>
        <?php endif; ?>
        
        <div class="exhibit-text">
            <h2><?php echo link_to_exhibit(); ?></h2>
            <?php if ($exhibitDescription = metadata('exhibit', 'description', array('snippet' => 150, 'no_escape' => true))): ?>
            <div class="description"><?php echo $exhibitDescription; ?></div>
            <?php endif; ?>
        </div>

    </div>
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
