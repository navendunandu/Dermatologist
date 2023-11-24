<?php
ob_start();
include("../Assets/Connection/Connection.php");
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaints</title>
</head>
<form action="" method="post">
    <table cellpadding="10">
        <tr>
            <th colspan="6">User Complaint</th>
        </tr>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>User</th>
            <th>Action</th>
        </tr>
        <?php
        $i=0;
        $sel="select * from tbl_complaint c inner join tbl_newuser nu on c.user_id=nu.user_id where c.user_id!=0";
        $res=$conn->query($sel);
        while($row=$res->fetch_assoc())
        {
            $i++;
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row["complaint_title"]; ?></td>
                <td><?php echo $row["complaint_content"]; ?></td>
                <td><?php echo $row["complaint_date"]; ?></td>
                <td><?php echo $row["user_name"] ?></td>
                <td><a href="Reply.php?cmpid=<?php echo $row["complaint_id"]?>">Reply</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
</form>
<body>
</body>
</html>
<?php
ob_flush();
include("Foot.php");
?>