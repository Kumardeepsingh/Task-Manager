

<!DOCTYPE html>
<html>
<body>

<h2>Investment Growth Calculator</h2>

<form method="POST">
  <label for="initialDeposit">Initial Deposit:</label><br>
  <input type="number" id="initialDeposit" name="initialDeposit" step="0.01" required><br><br>
  
  <label for="annualInterest">Annual Interest Rate (%):</label><br>
  <input type="number" id="annualInterest" name="annualInterest" step="0.01" required><br><br>
  
  <label for="yearsToGrow">Number of Years to Grow:</label><br>
  <input type="number" id="yearsToGrow" name="yearsToGrow" required><br><br>
  
  <input type="submit" value="Calculate">
</form>


<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$initialDeposit = isset($_POST["initialDeposit"])? floatval($_POST["initialDeposit"]):0;
$annualInterest = isset($_POST["annualInterest"])? floatval($_POST["annualInterest"]):0;
$yearsToGrow = isset($_POST["yearsToGrow"])? intval($_POST["yearsToGrow"]):0;
}
?>

<table>
  <tr>
    <th>Year</th>
    <th>Starting Value</th>
    <th>Interest Earned</th>
    <th>Ending Value</th>
  </tr>
  <?php for($i=1; $i<=$yearsToGrow; $i++): ?>
  <tr>
    <td><?php echo $i?></td>
    <td><?php echo $initialDeposit ?></td>
    <?php $interest = $initialDeposit * ($annualInterest/100); ?>
    <td><?php echo $interest ?></td>
    <?php $amount = $initialDeposit + $interest;?>
    <td><?php echo $amount ?></td>
    <?php $initialDeposit = $amount;  ?>
  </tr>
  <?php endfor?>
  
</table>

</body>
</html>
