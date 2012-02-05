<?

if ($func_isitdate_PLUS!=1)
{
$func_isitdate_PLUS=1;




function is_it_date($date)
{

    /*
    узнаёт, является ли строка датой вида 12.12.1980 (от "сто лет назад" до наших дней)
    */

    if (!$date)
    {
        return false;
    }

    $date = explode('.', $date);

    if (count($date) != 3)
    {
        return false;
    }

    $day = (int)$date[0];
    $month = (int)$date[1];
    $year = (int)$date[2];

     
    if (!checkdate($month, $day, $year))
    {
        return false;
    }
    
    
    $now_year = getdate();
    $now_year = $now_year['year']; // текущий год
    
    
    $delta = $now_year - $year;
    
    if ($delta <= 1)
    {
        return false;
    }

    if ($delta > 100)
    {
        return false;
    }


    return true;
}




}

?>