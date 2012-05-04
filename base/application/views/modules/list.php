<?php defined('SYSPATH') or die('No direct access allowed.');
/*
* Author : Mike Dyer
* @List.php
* 
* @params : 
*   list_type : Defaults to UL if not provided
*   list_class : List class
*   list_id : List id
*   list_attributes : Iterate over associative array for valid element attributes
*
*/
if(!isset($items) && !empty($items)) exit;
$list_type = isset($list_type) ? $list_type : 'ul';
$list_class = isset($list_class) ? ' class="'.$list_class.'"' : '';
$list_id = isset($list_id) ? ' id="'.$list_id.'"' : '';
$list_attr = '';
$item_type = $list_type != 'dl' ? $item_type = 'li' : $item_type = 'dd';
$item_attributes = '';
if(isset($list_attributes)) {
    foreach ($list_attributes as $key => $attr) {
        $list_attr .= ' '. $key . '="' . $attr .'"';
    }
}
if(isset($render)) { 
    $options = isset($render['options']) ? $render['options'] : null;
}
?>
<?php 
    echo '<' . $list_type . $list_class . $list_id . $list_attr . '>';
    foreach ($items as $key => $item) {
        if(is_array($item)){
            $item_attributes = HTML::attributes($item);
            $item = $key;
        }
        if(isset($render)){
          $data = View::factory($render['path'], array(
            'item' => $item,
            'attributes' => $options,
          ));
          $item = $data->render();
        }
        echo '<'. $item_type . $item_attributes . '>'. $item .'</'. $item_type .'>';        
    }
    echo '</' . $list_type . '>';
?>