<?php

function task_delete(){
    echo "Task Delete";
    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'task';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
        echo "deleted";
    }
    ?>
    <?php
    wp_redirect('admin.php?page=page=Task_List');
    exit();
}
?>