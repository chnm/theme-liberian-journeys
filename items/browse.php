<?php if (!empty($_GET['contributed'])): ?>

    <?php
    $pageTitle = __('Browse Stories');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse stories'));
    ?>

    <div class="page-info">
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>

    <nav class="items-nav navigation secondary-nav">
        <a href="#">Themes</a>
    </nav>

    <div class="items-list">

        <?php foreach (loop('items') as $item): ?>

        <div class="item hentry">
            <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h2>
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
    $pageTitle = __('Browse Photos');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse standard photos'));
    queue_js_file('lightbox.min', 'javascripts/vendor');
    queue_css_file('lightbox');
    ?>

    <div class="page-info">
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>


    <nav class="items-nav navigation secondary-nav">
        <ul>
            <li><a href="<?php echo url('items/browse/?type=6'); ?>" <?php if($_GET['type'] == 6) echo ' class=current';?>>Historic Photos</a></li>
            <li><a href="<?php echo url('items/browse/?type=3'); ?>" <?php if($_GET['type'] == 3) echo ' class=current';?>>Historic Film</a></li>
            <li><a href="<?php echo url('items/browse/?type=18'); ?>" <?php if($_GET['type'] == 18) echo ' class=current';?>>Documents</a></li>
        </ul>
    </nav>

    <div class="items-list">

        <?php foreach (loop('items') as $item): ?>

            <?php if (metadata('item', 'has files')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail')); ?>
            </div>
            <?php endif; ?>

        <?php endforeach; ?>
    </div><!-- items-list-->

<?php elseif($_GET['type'] == 3): ?>

    <?php
    $pageTitle = __('Browse Films');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse standard films'));
    ?>

    <div class="page-info">
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>


    <nav class="items-nav navigation secondary-nav">
        <ul>
            <li><a href="<?php echo url('items/browse/?type=6'); ?>" <?php if($_GET['type'] == 6) echo ' class=current';?>>Historic Photos</a></li>
            <li><a href="<?php echo url('items/browse/?type=3'); ?>" <?php if($_GET['type'] == 3) echo ' class=current';?>>Historic Film</a></li>
            <li><a href="<?php echo url('items/browse/?type=18'); ?>" <?php if($_GET['type'] == 18) echo ' class=current';?>>Documents</a></li>
        </ul>
    </nav>

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
    $pageTitle = __('Browse Documents');
    echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse standard documents'));
    ?>

    <div class="page-info">
        <p>Some text about exploring the content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam amet possimus porro, libero facere.</p>   
    </div>


    <nav class="items-nav navigation secondary-nav">
        <ul>
            <li><a href="<?php echo url('items/browse/?type=6'); ?>" <?php if($_GET['type'] == 6) echo ' class=current';?>>Historic Photos</a></li>
            <li><a href="<?php echo url('items/browse/?type=3'); ?>" <?php if($_GET['type'] == 3) echo ' class=current';?>>Historic Film</a></li>
            <li><a href="<?php echo url('items/browse/?type=18'); ?>" <?php if($_GET['type'] == 18) echo ' class=current';?>>Documents</a></li>
        </ul>
    </nav>

    <div class="items-list">

        <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
        <h5><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title'), array('snippet'=>20)), array('class'=>'permalink')); ?></h5>
            <div class="item-meta">
                <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>200))): ?>
                    <div class="item-description">
                        <?php echo $description; ?><?php echo link_to_item('Read more&rarr;'); ?>
                    </div>
                <?php endif; ?>
            </div><!-- end class="item-meta" -->
        </div><!-- end class="item hentry" -->
        <?php endforeach; ?>
    </div><!-- items-list-->

<?php else: ?>

    <div class="items-list">

        <?php foreach (loop('items') as $item): ?>
        <div class="item hentry">
            <h2><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></h2>
            <div class="item-meta">
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

            <?php if (metadata('item', 'has tags')): ?>
            <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
                <?php echo tag_string('items'); ?></p>
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
