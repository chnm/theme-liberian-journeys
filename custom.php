<?php 

function print_secondary_nav() 
{

    $html = '<div class="item-filter">';

    $html .= '<nav class="items-nav navigation secondary-nav">';
    $html .= '<ul>';
    $html .= '<li><a href="' . url('items/browse/?type=6') . '"' . ($_GET['type'] == 6 ? ' class="current"' : '') . '>Images</a></li>';
    $html .= '<li><a href="' . url('items/browse/?type=3') . '"' . ($_GET['type'] == 3 ? ' class="current"' : '') . '>Historic Film</a></li>';
    $html .= '<li><a href="' . url('items/browse/?type=18') . '"' . ($_GET['type'] == 18 ? ' class="current"' : '') . '>Diaries</a></li>';
    $html .= '<li><a href="' . url('items/browse/?type=1') . '"' . ($_GET['type'] == 1 ? ' class="current"' : '') . '>Documents</a></li>';
    $html .= '<li><a href="' . url('items/browse/?type=4') . '"' . ($_GET['type'] == 4 ? ' class="current"' : '') . '>Stories</a></li>';
    $html .= '</ul>';
    $html .= '</nav>'; 
    
    $html .= '<div class="mobile-secondary-nav">';
    $html .= '<nav>';
    $html .= '<ul class="navigation">';
    $html .= '<li><a href="' . url('items/browse/?type=6') . '"' . ($_GET['type'] == 6 ? ' class="current"' : '') . '>Images</a></li>';
    $html .= '<li><a href="' . url('items/browse/?type=3') . '"' . ($_GET['type'] == 3 ? ' class="current"' : '') . '>Historic Film</a></li>';
    $html .= '<li><a href="' . url('items/browse/?type=18') . '"' . ($_GET['type'] == 18 ? ' class="current"' : '') . '>Diaries</a></li>';
    $html .= '<li><a href="' . url('items/browse/?type=1') . '"' . ($_GET['type'] == 1 ? ' class="current"' : '') . '>Documents</a></li>';
    $html .= '<li><a href="' . url('items/browse/?type=4') . '"' . ($_GET['type'] == 4 ? ' class="current"' : '') . '>Stories</a></li>';
    $html .= '</ul>';
    $html .= '</nav>';
    $html .= '</div>';

    $html .= '<div class="item-themes">';
    $tags = get_records('Tag', array('sort_field' => 'name'), 0);
    $html .= '<form action="' . $_SERVER['REQUEST_URI'] . '">';
    $html .= '<input type="hidden" name="type" value="' . htmlspecialchars($_GET['type']) . '">';
    $html .= '<select name="tag" onchange="this.form.submit()">';
    $html .= '<option value="">Themes</option>';
    foreach ($tags as $tag) {
    $html .= '<option value="' . $tag . '"' . (isset($_GET["tag"]) && $_GET["tag"] == $tag ? ' selected' : '') . '>' . $tag . '</option>';
    }
    $html .= '</select>';
    $html .= '</form>';
    $html .= '</div>';

    $sortLinks[__('Title')] = 'Dublin Core,Title';
    $sortLinks[__('Date')] = 'Dublin Core, Date';

    $html .= '<div id="sort-links">';
    $html .= '<span class="sort-label">Sort by:</span>' . browse_sort_links($sortLinks);
    $html .= '</div>';

    $html .= '</div>';

    return $html;
}

    