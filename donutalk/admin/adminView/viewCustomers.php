<div >
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">I.D.</th>
        <th class="text-center">Fullname </th>
        <th class="text-center">Username </th>
        <th class="text-center">Password </th>
        <th class="text-center">Email</th>
        <th class="text-center">Contact Number</th>
        <th class="text-center">Address</th>
        <th class="text-center">Joining Date</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from users where user_type='U'";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
           
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["user_fullname"]?></td>
      <td><?=$row["username"]?></td>
      <td><?=$row["password"]?></td>
      <td><?=$row["user_email_address"]?></td>
      <td><?=$row["user_contact_number"]?></td>
      <td><?=$row["user_address"]?></td>
      <td><?=$row["user_date_joined"]?></td>
    </tr>
    <?php
            $count=$count+1;
           
        }
    }
    ?>
  </table>