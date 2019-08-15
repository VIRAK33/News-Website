<?php
    // function execute select statement
    function run_query($sql)
    {
        $con = mysqli_connect('localhost', 'root', '', 'news_website');
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
    }
    // function to execute none query
    function run_non_query($sql)
    {
        $con = mysqli_connect('localhost', 'root', '', 'news_website');
        $i = mysqli_query($con, $sql);
        mysqli_close($con);
        return $i;
    }
?>