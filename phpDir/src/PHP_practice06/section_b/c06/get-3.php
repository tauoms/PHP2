<?php
/* Write your code here 
OPTIONAL TASK:
Overall idea here is to validate query string data. 
It builds on top of previous ones and uses validation 
to check if the query string holds a valid location.

Step 1: If the query string contains a city, it should be stored in some variable
 and if not, that variable should hold a blank string. 

Step 2: Use array function e.g. array_key_exits() to check if the value in variable 
is a key in the defined list of cities array. If it is, some variable should hold a 
value of true. If not, that variable will hold a value of false. 

Step 3: Check the validity with if condition. The address for city is collected from list of arrays you define
and if any of the cities are valid, and if those cities are not defined, you can ask users to "Please select a city"

*/

$cities = [
    'London' => '48 Store Street, WC1E 7BS',
    'Helsinki' => 'Kaivokatu 1, 00100 Helsinki',
    'Sydney' => '1242 7th Street, 10492'
  ];
  
  $city = $_GET['city'] ?? '';
  $cityExists = array_key_exists($city, $cities) ? true : false;

  if ($cityExists) {
    $address = $cities[$city];
  } elseif ($city == '') {
    $address = "Please select a city";
  } else {
    header("Location: ./page-not-found.php");
  }
?>
<?php include 'includes/header.php' ?>
  
  <?php foreach ($cities as $key => $value) { ?>
    <a href="get-3.php?city=<?= $key ?>"> <?= $key ?></a>
  <?php } ?>
  
  <p>
  <?= 
  !$city == '' ? "{$city} store address:<br> {$address}" : $address;
  
   ?>
  </p>
<?php include 'includes/footer.php' ?>