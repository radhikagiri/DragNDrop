<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Drag and drop demo</title>

        <link href="inettuts.css" rel="stylesheet" type="text/css" />
</head>
<body>

    <div id="head">
        <h1>Sample drag and drop</h1>
    </div>
    <div id="columns">
<?php
    $con = mysql_connect( 'localhost', 'root', '' );
    mysql_select_db( 'dragndrop', $con );

    $sql = "SELECT *
            FROM `widgets`
            ORDER BY `column` , `order`";

    $result = mysql_query( $sql );

    $colNum = 0;
    $index = 0;
    while( $row = mysql_fetch_assoc($result) )
    {
        if( $colNum !=  $row['column'] )
        {
            if( $index > 0 )
                echo '</ul>';
            echo '<ul id="column' . $row['column'] . '" class="column">';
        }
        echo '<li class="widget color-green ' . (($index==0)?'intro':'').'" id="li'.$row['id'].'" order="'.$row['order'].'">
                <div class="widget-head">
                    <h3>' . ((strlen($row['header'])>20)?substr($row['header'],0,20).'...':$row['header']) . '</h3>
                </div>
                <div class="widget-content">
                    <p>' . $row['content'] . '</p>
                </div>
            </li>';
        $colNum = $row['column'];
        $index++;
    }
    echo '</ul>';
?>

    </div>


    <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.2.6.min.js"></script>
    <script type="text/javascript" src="jquery-ui-personalized-1.6rc2.min.js"></script>
    <script type="text/javascript" src="jsonStringify.js"></script>
    <script type="text/javascript" src="inettuts.js"></script>

</body>
</html>