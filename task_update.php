<?php
function task_update(){
    $i=$_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'task';
    $tasks = $wpdb->get_results("SELECT id,name,address,contact,role,user_nicename from $table_name where id=$i");
    echo $tasks[0]->id;
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
    <table cellpadding="0" cellspacing="0" border="0">
        <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <form name="frm" action="#" method="post">
            <input type="hidden" name="id" value="<?= $tasks[0]->id; ?>">
            <tr>
                <td>Task Name:</td>
                <td><input type="text" name="nm" value="<?= $tasks[0]->name; ?>"required></td>
            </tr>
            <tr>
                <td>Notes:</td>
                <td><input type="text" name="adrs" value="<?= $tasks[0]->address; ?>" required></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td><select name="status" required>
                        <option value="Completed" <?php if($tasks[0]->status=="completed"){echo "selected";} ?> >Completed</option>
                        <option value="Pending" <?php if($tasks[0]->role=="Pending"){echo "selected";} ?> >Pending</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Deadline</td>
                <td><input type="date" name="date" value="<?= $tasks[0]->date; ?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="upd"></td>
            </tr>
        </form>
        </tbody>
    </table>
    <?php
}
if(isset($_POST['upd']))
{
    global $wpdb;
    $table_name=$wpdb->prefix.'task';
    $id=$_POST['id'];
    $nm=$_POST['nm'];
    $ad=$_POST['adrs'];
    $d=$_POST['status'];
    $m=$_POST['date'];
    $wpdb->update(
        $table_name,
        array(
            'name'=>$nm,
            'address'=>$ad,
            'status'=>$d,
            'date'=>$m
        ),
        array(
            'id'=>$id
        )
    );
    
    $url=admin_url('admin.php?page=Task_List');

}
?>