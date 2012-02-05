<?

##############
# шифрация ip
##############

function ip_pack($ip)
{
    
    $parts = explode('.', $ip);
    
    $t = chr((int)$parts[0]) . chr((int)$parts[1]) . 'A';
    
//    for ($i = 0; $i < 4; $i++)
//    {
//        $part = $parts[$i];
//        $part = (int)$part;
//        
//        $t += chr($part);
//    }
    
    return base64_encode($t);
}

?>