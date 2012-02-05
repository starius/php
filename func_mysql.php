<?


###############################
#      Функции MySql:
###############################

# выполняет sql-запрос
function do_sql($query)
{
    mysql_query($query);
} 



# возвращает результат едининого запроса
function get_sql($query)
{
    return mysql_fetch_assoc(mysql_query($query));
} 


# возвращает поле результата едининого запроса
function cell_sql($query)
{
    $q = mysql_fetch_row(mysql_query($query));

    return $q[0];
} 


# возвращает результат запроса - массив
function arr_sql($query)
{
    $arr = array();

    $q1 = mysql_query($query);
    
    while($q2 = mysql_fetch_assoc($q1))
    {
        $arr[] = $q2;
    }
    
    return $arr;
} 

?>