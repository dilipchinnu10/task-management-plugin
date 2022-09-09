<?php

function task_list_editor() {
    ?>
    <style>
  h1{
  font-size: 50px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 600;
  font-size: 14px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 400;
  font-size: 14px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}




@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}



::-webkit-scrollbar {
    width: 6px;
} 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
} 
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
}
    </style>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
            <tr>
                <th>No</th>
                <th>Task Name</th>
                <th>Notes</th>
                <th>Assigned To</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Update</th>
               <!-- <th>Delete</th> -->
            </tr>
            </thead>
            <tbody>
                
                
            
                
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'task';
            $current_user = wp_get_current_user();
            $tasks = $wpdb->get_results("SELECT * FROM $table_name where wp_task.role='$current_user->user_nicename'" );
            foreach ($tasks as $task) {
                ?>
                <tr>
                    <td><?= $task->id; ?></td>
                    <td><?= $task->name; ?></td>
                    <td><?= $task->address; ?></td>
                    <td><?= $task->role; ?></td>
                    <td><?= $task->date;?></td>
                    <td><?= $task->status; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=Task_Update_Editor&id=' . $task->id); ?>">Update</a> </td>
                  
                </tr>

                
            <?php } 
            
            ?>

            </tbody>
            
        </table>
    </div>
    <?php

}
add_shortcode('short_task_list', 'task_list');
?>

       