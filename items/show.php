<?php echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show')); ?>
<?php $itemType = metadata('item', 'item_type_name'); ?>

<div id="primary">
    <h2><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h2>
        
    <div class="element">
        <?php echo metadata('item', array('Dublin Core', 'Description')); ?>
    </div>

    <div class="element">
        <h5>Date</h5>
        <div class="element-text">
            <?php echo metadata('item', array('Dublin Core', 'Date')); ?>
        </div>
    </div>

    <div class="element">
        <h5>Creator</h5>
        <div class="element-text">
            <?php echo metadata('item', array('Dublin Core', 'Creator')); ?>
        </div>
    </div>

    <div class="element">
        <h5>Subject</h5>
        <div class="element-text">
            <?php echo metadata('item', array('Dublin Core', 'Subject')); ?>
        </div>     
    </div>

    <?php if($itemType == 'Document' || $itemType == 'Diary'): ?>
        <?php if (metadata('item', 'has files')): ?>
            <div id="itemfiles" class="element">
                <h3><?php echo __('Files'); ?></h3>
                <div class="element-text"><?php echo files_for_item(); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
        
    
    
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
    
    <?php $location = get_db()->getTable('Location')->findLocationByItem($item, true); ?>
    <?php if($location): ?>
    <div class="map-show">
        <?php echo $this->itemGoogleMap($item, $width = '100%', $height = '250px');?>    
    </div>
    <?php endif; ?>

    <!-- The following returns all of the files associated with an item. -->
    <?php if($itemType != 'Document' && $itemType != 'Diary'): ?>
        <?php if (metadata('item', 'has files')): ?>
            <div id="itemfiles" class="element">
                <h3><?php echo __('Files'); ?></h3>
                <div class="element-text"><?php echo files_for_item(); ?></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</div>

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
