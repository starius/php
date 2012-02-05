<?

#####################################
# save all protocols in zip format
#####################################

[inc]func/zip.lib.php


function zip_backup_save($maska = "*", $zip_filename = '')
{
    if ($zip_filename === '')
    {
        $zip_filename = time() . '.zip';
    }

    $zipfile = new zipfile();

    $dir = opendir('.');
    
    while($f = readdir($dir))
    {
        if (is_file ($f))
        {
            if (preg_match($maska, $f))
            {
                $fsize = @filesize($f);
                $fh = fopen($f, 'rb', false);
                $d = fread($fh, $fsize);             
                $zipfile -> addFile($d, $f);
            }
        }
    }


    closedir ($dir);
    
    $zzz = $zipfile -> file();

    header("Content-type: application/octet-stream");
    header('Content-Disposition: attachment; filename="' . $zip_filename . '"');
    header("Content-length: " . strlen($zzz) . "\n\n");


    echo $zzz;
}

?>