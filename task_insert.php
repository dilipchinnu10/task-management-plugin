<?php
function task_insert()
{
    
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
    
    
    
<table cellpadding="0" cellspacing="0" border="0">    <thead>
    <tr>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <form name="frm" action="#" method="post">
    <tr>
        <td>Task Name:</td>
        <td><input type="text" name="nm" required></td>
    </tr>
    <tr>
        <td>Task Notes:</td>
        <td><input type="text" name="adrs" required></td>
    </tr>
    <tr>
        <td>Assign To:</td>
        <td><?php
    $blogusers = get_users();
    echo '<select name="des" required>';
    foreach ( $blogusers as $user ) {
        echo '<option value="'. esc_html( $user->user_nicename).'">' . esc_html( $user->user_nicename ) . '</option>';
        }
    echo '</select>';
?>
        </td>
    </tr>
    <tr>
        <td>Deadline:</td>
        <td><input type="date" name="date" required></td>
    </tr>
   
    <tr>
        <td></td>
        <td><input type="submit" value="Add" name="ins"></td>
    </tr>
    </form>
    </tbody>
</table>
<?php
    if(isset($_POST['ins'])){
        global $wpdb;
        $nm=$_POST['nm'];
        $ad=$_POST['adrs'];
        $d=$_POST['des'];
        $m=$_POST['date'];
        $s=$_POST['status'];
        $table_name = $wpdb->prefix . 'task';

        $wpdb->insert(
            $table_name,
            array(
                'name' => $nm,
                'address' => $ad,
                'role' => $d,
                'date'=>$m,
                'status'=>$s
            )
        );
        echo "inserted";
       wp_redirect( admin_url('admin.php?page=page=Task_List'),301 );
 
        ?>
       
        <?php
        exit;
    }
}

?>