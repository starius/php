<?


#############################
# защита от всего нехорошего
#############################


function protect($str)
{
    return preg_replace('/[^a-zа-я0-9\[\]\(\)\,\.\-\!\@\#\%*\/\+\?;: ]|href|script|src/iu', '', $str);

    //$bad = array("'", '"', "\\", "\n", "\t", 'href', 'script', 'src', '<', '>', '&', '$', chr(0));
    
    //return str_replace($bad, "", $str);
}


?>