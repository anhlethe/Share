<?php

class CI_ShayaUser
{
    function get_ranking($top=10)
    {
        global $db;
        $database=new myPDO($db[4][dbhost],$db[4][dbuser],$db[4][dbpw],$db[4][dbname],'sqlsrv',1433);
        $sql="select top $top * from  Chars where Family in (0,1) order by K1 desc";
        $data=$database->executionQuery($sql);
        $re[1]=$data;

        $sql="select top $top * from  Chars where Family in (2,3) order by K1 desc";
        $data=$database->executionQuery($sql);
        $re[2]=$data;
        return $re;
    }


}

?>