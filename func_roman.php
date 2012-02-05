<?php

########################################
# Функция для получения римского числа
########################################


function roman_encode($in)
{
    $in = (int)$in;
    
    $Rom = array('I', 'IV', 'V', 'IX', 'X', 'XL', 'L', 'XC', 'C', 'CD', 'D', 'CM', 'M');
    $Dec = array(1, 4, 5, 9, 10, 40, 50, 90, 100, 400, 500, 900, 1000);
    
    if ($in <= 0 || $in >= 4000)
    {
        return $in;
    }

    $out = '';

    for ($i = 12; $i >= 0; $i--)
    {
        while ($in >= $Dec[$i])
        {
            $in -= $Dec[$i];
            $out .= $Rom[$i];
        }
    }


    return $out;
}






function roman_decode($in)
{
    $in = (string)$in;
    
    $Rom = array('I', 'V', 'X', 'L', 'C', 'D', 'M', 'IV', 'IX', 'XL', 'XC', 'CD', 'CM');
    $Dec = array(1, 5, 10, 50, 100, 500, 100, 4, 9, 40, 90, 400, 900);
    
    
    for ($i = 12; $i >= 0; $i--)
    {
        $in = str_replace($Rom[$i], ' ' . $Dec[$i] . ' ', $in);
    }
    
    $in = explode(' ', $in);
    
    $out = 0;
    
    foreach ($in as $e)
    {
        $out += (int)$e;
    }

    return $out;
}









?>