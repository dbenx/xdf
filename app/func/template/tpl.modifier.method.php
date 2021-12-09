<?php
/**
 * iPHP explode modifier plugin
 *
 * Type:     modifier<br>
 * Name:     method<br>
 * Date:     17:39 2009-7-31
 * Purpose:  call object method
 * Input:    object
 * Example:  {$object|method:'method()'}
 * @param string
 * @param string
 * @return string
 * @version 1.0
 * @author   coolmoo
 */
function tpl_modifier_method($object, $methodStr)
{
    if (empty($object)) return;

    $val = array();
    if ($methodArray = explode(':', $methodStr)) foreach ($methodArray as $methods) {
        list($method, $arg) = explode('(', $methods);
        $arg = explode(',', str_replace(')', '', $arg));
        $val[] = call_user_func_array(array($object, $method), $arg);
    }
    return implode('', $val);
}

