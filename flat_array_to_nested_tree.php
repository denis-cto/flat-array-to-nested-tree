<?php

$flat_array = array (
  0 => 
  array (
    'id' => '989',
    'parent_id' => NULL,
    'title' => 'Parent 1 level 1',
  ),
  1 => 
  array (
    'id' => '990',
    'parent_id' => NULL,
    'title_' => 'Parent 1 level 2',
  ),
 2 => 
  array (
    'id' => '1002',
    'parent_id' => '990',
    'title' => 'Child 2 level 1',
  ),
  3 => 
  array (
    'id' => '998',
    'parent_id' => '1002',
    'title' => 'Child 3 level 1',

  ),
 );

function get_nested_tree(&$elements = null)
{
    $hashTable = [];
    $tree = [];
    foreach ($elements as $element) {
        $hashTable[$element['id']] = $element;
        $hashTable[$element['id']]['children'] = [];
    }
    foreach ($hashTable as &$hashItem) {
        if (!empty($hashItem['parent_id'])) {
            $parentId = $hashItem['parent_id'];
            $hashTable[$parentId]['children'][] = &$hashItem;
        } else {
            $tree[] =& $hashItem;
        }
    }

    return $tree;
}

$tree = get_nested_tree($flat_array);
