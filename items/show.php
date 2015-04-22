<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>
<?php $itemType = metadata('item', 'item_type_name'); ?>

<div id="primary">
    <h2><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h2>

    <?php if (metadata('item', 'has files')): ?>
        <div id="itemfiles" class="element">
            <div class="element-text"><?php echo files_for_item(array('imageSize' => 'fullsize')); ?></div>
        </div>
    <?php endif; ?>
        
    <div class="element">
        <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
    </div>
    
    <button class="more-info">More information about this item</button>
    <div id="secondary-metadata">

        <?php echo all_element_texts('item'); ?>
        <!-- The following prints a citation for this item. -->
        <div id="item-citation" class="element">
            <h3><?php echo __('Citation'); ?></h3>
            <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
        </div>
        
    </div>
</div> <!-- end primary -->

<div id="secondary">

<div class="locations">
    <h3>Locations</h3>
    <?php $locations = metadata('item', array('Dublin Core', 'Coverage'), 'all');?>
    <ul>
    <?php foreach ($locations as $location): ?>
        <li><?php echo $location; ?></li>
    <?php endforeach; ?>
    </ul>
</div><!-- end locations -->

<div class="themes">
    <h3>Themes</h3>
    <?php echo tag_string('item'); ?>
</div>

</div><!-- end secondary -->

<nav>
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
</nav>


<script>
jQuery( ".more-info" ).click(function() {
  jQuery( "#secondary-metadata" ).toggle( "blind", 500 );
});
</script>

<?php echo foot(); ?>
