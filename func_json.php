<?

/*
если подается строка - раскодирует и возвращает массив

если массив - кодирует и возвращает строку
маскирует \ для вставки в бд
*/


function json($in)
{
    if (gettype($in) == 'string')
    {
        $quote = strpos($in, '"');
        
        if ($quote > 0)
        {
            if ($in[$quote - 1] == "\\")
            {
                $in = str_replace("\\\"", '"', $in);
                $in = str_replace("\\\\", "\\", $in);
            }
        }

        return json_decode($in, true);
    }
    else
    {
        $str = json_encode($in);
        
        if (!strpos($str, "\\\\"))
        {
            $str = str_replace("\\", "\\\\", $str);
        }
        
        //$str = str_replace("'", "\\'", $str);
        
        return $str;
    }
}

?>