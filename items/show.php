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
        <?php if (metadata('item', array('Dublin Core', 'Creator'))): ?>
            <div class="element">
                <h3>Creator</h3>
                <?php echo metadata('item', array('Dublin Core', 'Creator')); ?>
            </div>
        <?php endif; ?>

        <?php if (metadata('item', array('Dublin Core', 'Date'))): ?>
            <div class="element">
                <h3>Date</h3>
                <?php echo metadata('item', array('Dublin Core', 'Date')); ?>
            </div>
        <?php endif; ?>

        <?php if (metadata('item', array('Dublin Core', 'Coverage'))): ?>
            <div class="element">
                <h3>Coverage</h3>
                <?php echo metadata('item', array('Dublin Core', 'Coverage')); ?>
            </div>
        <?php endif; ?>

        <?php if (metadata('item', array('Item Type Metadata', 'Transcription'))): ?>
            <div class="element">
                <h3>Transcription</h3>
                <?php echo metadata('item', array('Item Type Metadata', 'Transcription')); ?>
            </div>
        <?php endif; ?>

        <?php if (metadata('item', array('Item Type Metadata', 'Text'))): ?>
            <div class="element">
                <h3>Text</h3>
                <?php echo metadata('item', array('Item Type Metadata', 'Text')); ?>
            </div>
        <?php endif; ?>

        <?php if (metadata('item', 'item_type_name')): ?>
            <div class="element">
                <h3>Type</h3>
                <?php echo metadata('item', 'item_type_name'); ?>
            </div>
        <?php endif; ?>
        
        <?php if (metadata('item', array('Dublin Core', 'Identifier'))): ?>
            <div class="element">
                <h3>Identifier</h3>
                <?php echo metadata('item', array('Dublin Core', 'Identifier')); ?>
            </div>
        <?php endif; ?>

        <?php echo all_element_texts('item'); ?>
        <!-- The following prints a citation for this item. -->
        <div id="item-citation" class="element">
            <h3><?php echo __('Citation'); ?></h3>
            <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
        </div>
        
    </div>
</div> <!-- end primary -->

<div id="secondary">

<?php $locations = metadata('item', array('Dublin Core', 'Coverage'), 'all');?>
<?php if($locations): ?>
<div class="locations">
    <h3>Locations</h3>
    <ul>
    <?php foreach ($locations as $location): ?>
        <li><?php echo $location; ?></li>
    <?php endforeach; ?>
    </ul>
</div><!-- end locations -->
<?php endif; ?>

<?php if (metadata('item', 'has tags')): ?>
<div class="themes">
    <h3>Themes</h3>
    <?php echo tag_string('item'); ?>
</div>
<?php endif; ?>

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
