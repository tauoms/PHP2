<?php
/* Write your PHP code here

Step 1: Use and declare php strict types */
declare(strict_types=1); // 1 = true


/* Step 2:  Create a class for account (with its properties e.g. number, type and balance) 

Step 3: Create a PHP constructor with argument types e.g. number, type and balance
If a balance is not given when creating the object, a default value of 0.00 should be used. 

Step 4: Create two methods for deposit and withdraw which will update the value
stored in the balance property. They should be given arguments and return type declaration of float.*/

class Account {
  public $number;
  public $type;
  public $balance;

  function __construct(string $number, string $type, float $balance = 0.00) {
    $this->number = $number;
    $this->type = $type;
    $this->balance = $balance;
  }

  function deposit($deposit_amount): float {
    return $this->balance += $deposit_amount;
  }
  function withdraw($withdraw_amount): float {
    return $this->balance -= $withdraw_amount;
  }
}

/* 
Step 5: Create two objects to represent a checking account and savings account. */

$checking_account = new Account("124124-768", "Checking", 300.20);
$savings_account = new Account("904234-723", "Savings", 3000.75);

/* Step 6:  An HTML skeleton is drawn. The first row should show headings using 
the type property of two objects. To access property use the:
 - Name of the variable that holds the object
 - Object operator
 - Property name

Step 7: In the next table row show the balance property of the objects.

Step 8: In the third row of the table, the balance of each account is updated by calling deposit() or
withdraw() methods. These methods return the new value of balance property and this should be shown in page.
To call a method, you can use
- Name of the variable that holds the object
- Object operator
- Method name with its argument in parantheses

Step 9: In the final row of the table, previous step is repeated using different values. 



*/

?>

<?php include 'includes/header.php'; ?>
<h2>Account Balances</h2>
<table>
  <tr>
    <th>Date</th>
    <th><?= $checking_account->type ?></th>
    <th><?= $savings_account->type ?></th>

  </tr>
  <tr>
    <td>23 June</td>
    <td><?= $checking_account->balance . " €" ?></td>
    <td><?= $savings_account->balance . " €" ?></td>

  </tr>
  <tr>
    <td>24 June</td>
    <td><?= $checking_account->deposit(340) . " €" ?></td>
    <td><?= $savings_account->withdraw(2040) . " €" ?></td>

  </tr>
  <tr>
    <td>25 June</td>
    <td><?= $checking_account->withdraw(1000) . " €" ?></td>
    <td><?= $savings_account->deposit(40) . " €" ?></td>
  </tr>
</table>
<?php include 'includes/footer.php'; ?>