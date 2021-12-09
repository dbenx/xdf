<?php
/**
 * template_lite strip modifier plugin
 *
 * Type:     modifier
 * Name:     print_r
 * Purpose:  Removes all repeated spaces, newlines, tabs
 *           with a single space or supplied character
 * Credit:   Taken from the original Smarty
 *           http://smarty.php.net
 */
function tpl_modifier_print_r($vars)
{
    echo '<pre>';
    print_r($vars);
    echo '</pre>';
}
