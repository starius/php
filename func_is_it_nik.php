<?

if ($func_isitnik_PLUS!=1)
{
$func_isitnik_PLUS=1;








function is_it_nik($login)
{

    /*
    Не более 30 символов
    */
    
    
    if (!preg_match('|^[a-zа-я][0-9a-zа-я_\-\.\ ]{2,29}$|iu', $login))
    {
        return false; // вообще не годится
    }

    if (substr_count($login, "  ") != 0)
    {
        return false; // повторяющиеся пробелы
    }
    
    if (preg_match('/[a-z][а-я]|[а-я][a-z]/iu', $login))
    {
        return false; // буквы из разных алфавитов в одном слове
    }    
    
    
    return true;
}









//function is_it_nik($nik)
//{

//    /*
//    узнаёт, является ли строка nik'ом,
//    который может содержать латинские буквы любого регистра
//    цифры
//    знаки дефиса и подчеркивания и точки

//    а также русские буквы и пробел

//    его длина должна быть не меньше 3 символовов
    
//    первый символ - буква
    
    //нелья и русские и латинские буквы
//    */

//    #print_r($_POST);

//    if ($nik != trim($nik))
//    {
//        return false;
//    }

//    if (!preg_match('|^[a-zа-я][0-9a-zа-я_\-\.]{2,29}$|iu', str_replace(' ', '', $nik)))
//    {
//        return false;
//    }
    
//    #//if ((preg_match("|[a-z]+|i", $nik)) && (preg_match("|[а-я]+|i", $nik)))
//    #//{
//    #//    return false;
//    #//}

//    return true;
//}




}

?>