<?

function razryad_correct($r)
{

    if ($r != 1 && $r != 2 && $r != 3 && $r != 4 && 
    $r != 11 && $r != 12 && $r != 13 && $r != 14 && $r != 15 && $r != 20)
    {
        return 20;
    }
    
    return $r;
    
}

?>