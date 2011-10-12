<?php
    $arr = (json_decode($_POST['param']));
    $q = $_POST['q'];

    $con = mysql_connect( 'localhost', 'root', '' );
    mysql_select_db( 'dragndrop', $con );

    switch($q)
    {
        case "update":
                print_r($arr);

                $sql = "update widgets set header = '" . $arr->header . "' where id = " . $arr->id;

                mysql_query( $sql, $con );
            break;

        case "delete":
                print_r($arr);

                $sql = "delete from widgets where id = " . $arr->id;

                mysql_query( $sql, $con );
            break;

        default:
                $sql = "DELETE
                    FROM `widgets`";

                $result = mysql_query( $sql );

                $sql = "INSERT INTO widgets( `header`, `content`, `column`, `order` ) VALUES";
                $index = 0;
                foreach( $arr as $col  )
                {
                    foreach( $col as $widget )
                    {
                        if( $index > 0 ) $sql .= ", ";
                        $sql .= "('" . $widget->header . "', '" . $widget->content . "', '" . $widget->column . "', '" . $widget->order . "' )";
                        $index++;
                    }
                }
                $sql .= ";";

                mysql_query( $sql, $con );
            break;
    }

    mysql_close($con);
?>