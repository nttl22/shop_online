<?php
// Multiple recipients
$to = 'nttl.19it1@vku.udn.vn'; // note the comma

// Subject
$subject = 'Đặt hàng thành công. Cám ơn bạn đã mua hàng!!!';

// Message
$message = '
<html>
<head>
  <title>Đặt hàng thành công</title>
</head>
<body>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <?php
        for($i=1;$i<3;$i++){
            echo "<tr>";
            echo "<td>Johny</td><td>10th</td><td>August</td><td>1970</td>";
            echo "</tr>";
        }
    ?>
  </table>
</body>
</html>
';
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';

// Mail it


// send email
if(mail($to, $subject, $message, implode("\r\n", $headers))){
    echo 'a';
}else echo 'b';

?>