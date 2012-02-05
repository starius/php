<?

if ($func_isitemail_PLUS!=1)
{
$func_isitemail_PLUS=1;

######################################
# узнаёт, является ли строка e-mail
######################################

function is_it_email($email)
{
    $email=strtolower($email);


    # разделяем по собаке


    $bank=explode('@',$email);

    if (count($bank)!=2)
    {
        return false;
    }



    # находим логин


    $login=$bank[0];

    if (strlen($login)==0)
    {
        return false;
    }


    # проверимкаждый символ логина


    for ($p=0;$p<strlen($login);$p++)
    {
        $ord1 = ord($login[$p]);
        $da = false;

        if ($ord1>=97 && $ord1<=122) # a-z
        {
            $da=true;
        }
        if ($ord1>=48 && $ord1<=57) # 0-9
        {
            $da=true;
        }
        if ($ord1==95 || $ord1==45 || $ord1==46) # _-.
        {
            $da=true;
        }

        if (!$da)
        {
            return false;
        }

    }



    # находим часть вида mail.ru


    $serverRU=$bank[1];
    if (strlen($serverRU)==0)
    {
        return false;
    }

    $bank=explode('.',$serverRU);

    if (count($bank)<2)
    {
        return false;
    }




    # находим зону и проверяем наличие её в списке


    $zona=$bank[(count($bank)-1)];

    $spisokZon=explode('|','ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|са|cc|cf|cg|сн|ci|ck|cl|cm|cn|со|cr|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ес|ee|eg|eh|er|es|et|fi|fj|fk|fm|fo|fr|fx|ga|gb|gd|ge|gf|gg|gh|gi|gl||gn|gp|gq|gr|gs|gt|gu|gw|gy|нк|hm|hn|hr|ht|hu|id|ie|il|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|mv|mw|mx|my|na|nc|ne|nf|ng|ni|nl|no|np|nr|nt||nz|om|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pt|pw|py|qa|re|ro|rw|ru|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zr|zw|com|net|org|biz|gov|mil|info|name|mobi');
    $da=false;

    for ($p=0;$p<count($spisokZon);$p++)
    {
        if ($spisokZon[$p]==$zona)
        {
            $da=true;
        }
    }

    if (!$da)
    {
        return false;
    }




    # проверяем все остальные части имени


    for ($n=0;$n<count($bank);$n++)
    {
    $part=$bank[$n];
    if ($part=='')
    {
    return false;
    }

    for ($p=0;$p<strlen($part);$p++)
    {
        $ord1=ord($part[$p]);
        $da=false;

        if ($ord1>=97 && $ord1<=122) # a-z
        {
            $da=true;
        }
        if ($ord1>=48 && $ord1<=57) # 0-9
        {
            $da=true;
        }
        if ($ord1==45) # -
        {
            $da=true;
        }

        if (!$da)
        {
            return false;
        }

        }

    }


    return true;
} 





}

?>