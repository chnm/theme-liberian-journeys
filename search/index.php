<?php
$pageTitle = __('Search Results ') . __('(%s total)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>
<h1><?php echo $pageTitle; ?></h1>
<?php echo search_filters(); ?>
<?php if ($total_results): ?>
<?php echo pagination_links(); ?>
<div class="items-list">
        <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
        <?php foreach (loop('search_texts') as $searchText): ?>
        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
        <?php $recordType = $searchText['record_type']; ?>
        <?php set_current_record($recordType, $record); ?>

        <div class="item hentry">
            <h5><a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a></h5>

            <div class="item-meta">
            <?php if ($recordImage = record_image($recordType, 'square_thumbnail')): ?>
                <div class="item-thumb">
                    <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>                    
                </div>
            <?php endif; ?>
                
            </div>
            
        </div>

        <?php endforeach; ?>
</div>
<?php echo pagination_links(); ?>
<?php else: ?>
<div id="no-results">
    <p><?php echo __('Your query returned no results.');?></p>
</div>
<?php endif; ?>
<?php echo foot(); ?>