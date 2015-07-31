<?php if (!empty($_GET['contributed'])): ?>

    <?php
    $pageTitle = __('Browse Stories');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse stories'));
    ?>

    <div class="page-info">
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>

    <?php
        $sortLinks[__('Title')] = 'Dublin Core,Title';
        $sortLinks[__('Date')] = 'Dublin Core, Date';
    ?>
    <div id="sort-links">
        <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
    </div>
    
    <div class="item-themes">
        <?php $tags = get_records('Tag', array('sort_field' => 'name'), 0); ?>

        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <input type="hidden" name="type" value="<?php echo htmlspecialchars($_GET['type']); ?>">
            <select name="tag" onchange="this.form.submit()">
                <option value="">Themes</option>
                <?php foreach ($tags as $tag): ?>
                    <option value="<?php echo $tag; ?>"><?php echo $tag; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>

    <div class="items-list">

        <?php foreach (loop('items') as $item): ?>

        <div class="item hentry">
            <h5><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h5>
            <div class="item-meta">

            <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
            <div class="item-description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
        <?php endforeach; ?>

    </div> <!-- items-list -->

<?php elseif($_GET['type'] == 6): ?>

    <?php
    $pageTitle = __('Browse Images');
    queue_js_file('vendor/lightGallery.min');
    queue_js_string("
            jQuery(document).ready(function() {
                jQuery('#lightGallery').lightGallery(); 
                });
        ");
    queue_css_file('lightGallery');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse standard photos'));
    ?>

    <div class="page-info">
        <h3>Collection: Images</h3> 
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>
    </div>

    <?php echo print_secondary_nav(); ?>

    <div class="items-list">
        <ul id="lightGallery">

            <?php foreach (loop('items') as $item): ?>

                <?php if (metadata('item', 'has_thumbnail')): ?>
                <?php $file = $item->getFile(); ?>
                    <li data-src="<?php echo file_display_url($file, 'fullsize'); ?>" data-sub-html='#html<?php echo metadata('item', 'id'); ?>' class="item-img">

                        <?php echo item_image('square_thumbnail'); ?>
                    </li>

                <?php endif; ?>

            <?php endforeach; ?>
            
        </ul>

            <?php foreach (loop('items') as $item): ?>

                <?php if (metadata('item', 'has files')): ?>
                <?php
                    set_loop_records('files', get_current_record('item')->Files);
                    foreach(loop('files') as $file): 
                ?>

                    <div class="hidden" id="html<?php echo metadata('item', 'id'); ?>">
                        <div class="customHtml">
                            <h3><?php echo metadata('item', array('Dublin Core', 'Title')); ?></h3>
                            <?php echo link_to_item('See Item&rarr;'); ?>
                        </div>
                    </div>

                 <?php endforeach; ?>
                <?php endif; ?>

            <?php endforeach; ?>

    </div><!-- items-list-->

<?php elseif($_GET['type'] == 3): ?>

    <?php
    $pageTitle = __('Browse Historic Film');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse standard films'));
    ?>

    <div class="page-info">
        <h3>Collection: Historic Film</h3> 
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>

    <?php echo print_secondary_nav(); ?>

    <div class="items-list">

        <?php foreach (loop('items') as $item): ?>

            <?php if (metadata('item', 'has files')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail')); ?>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div><!-- items-list-->

<?php elseif($_GET['type'] == 18): ?>

    <?php
    $pageTitle = __('Browse Diaries');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse standard documents'));
    ?>

    <div class="page-info">
        <h3>Collection: Diaries</h3> 
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>

    <?php echo print_secondary_nav(); ?>

    <div class="items-list">
        <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
        <h5><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h5>
            <div class="item-meta">
                <?php if(metadata('item', array('Dublin Core', 'Date'))): ?>
                    <div class="item-date">
                        <span class="ital">Date: <?php echo metadata('item', array('Dublin Core', 'Date')); ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>500))): ?>
                    <div class="item-description">
                        <?php echo $description; ?>&nbsp;&nbsp;<?php echo link_to_item('Read more&rarr;'); ?>
                    </div>
                <?php endif; ?>
            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
        <?php endforeach; ?>
    </div><!-- items-list-->

<?php elseif($_GET['type'] == 1): ?>

    <?php
    $pageTitle = __('Browse Documents');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse standard documents'));
    ?>

    <div class="page-info">
        <h3>Collection: Documents</h3> 
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>

    <?php echo print_secondary_nav(); ?>

    <div class="items-list">
        <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
        <h5><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h5>
            <div class="item-meta">
                <?php if(metadata('item', array('Dublin Core', 'Date'))): ?>
                    <div class="item-date">
                        <span class="ital">Date: <?php echo metadata('item', array('Dublin Core', 'Date')); ?></span>
                    </div>
                <?php endif; ?>
                <?php if (metadata('item', 'has_thumbnail')): ?>
                    <div class="item-img">
                        <?php echo item_image('square_thumbnail'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>500))): ?>
                    <div class="item-description">
                        <?php echo $description; ?>&nbsp;&nbsp;<?php echo link_to_item('Read more&rarr;'); ?>
                    </div>
                <?php endif; ?>
            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
        <?php endforeach; ?>
    </div><!-- items-list-->


<?php elseif($_GET['type'] == 4): ?>

    <?php
    $pageTitle = __('Browse Stories');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse standard documents'));
    ?>

    <div class="page-info">
        <h3>Collection: Stories</h3> 
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>

    <?php echo print_secondary_nav(); ?>

    <div class="items-list">
        <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
        <h5><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h5>
            <div class="item-meta">
                <?php if(metadata('item', array('Dublin Core', 'Date'))): ?>
                    <div class="item-date">
                        <span class="ital">Date: <?php echo metadata('item', array('Dublin Core', 'Date')); ?></span>
                    </div>
                <?php endif; ?>

                <?php if (metadata('item', 'has files')): ?>
                    <div class="item-img">
                        <?php echo link_to_item(item_image('square_thumbnail')); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>500))): ?>
                    <div class="item-description">
                        <?php echo $description; ?>&nbsp;&nbsp;<?php echo link_to_item('Read more&rarr;'); ?>
                    </div>
                <?php endif; ?>
            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
        <?php endforeach; ?>
    </div><!-- items-list-->

<?php else: ?>

    <?php
    $pageTitle = __('Browse Items');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse all'));
    ?>

    <div class="items-list">

        <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
        <h5><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h5>
            <div class="item-meta">
            <?php if(metadata('item', 'item_type_name')): ?>
                    <div class="item-type">
                        <span class="ital"><?php echo metadata('item', 'item_type_name'); ?></span>
                    </div>
                <?php endif; ?>
            <?php if (metadata('item', 'has files')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail')); ?>
            </div>
            <?php endif; ?>

            <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
            <div class="item-description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>

            <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
        <?php endforeach; ?>
    </div><!-- items-list-->

<?php endif; ?>

<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
