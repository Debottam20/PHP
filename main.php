<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Basic Calculator in Backend</title>
   <link rel="stylesheet" href="main.css">
</head>

<body>
   <h1 class="head">BASIC CALCULATOR</h1>
   <div class="form-main">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <input class="input" type="number" name="num01" placeholder="Number one">
         <select class="opp" name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
         </select>
         <input class="input" type="number" name="num02" placeholder="Number two">
         <button class="btn">Calculate</button>
         <br>
      </form>
   </div>
   <div class="result">
      <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

         $num01 = filter_input(INPUT_POST, "num01", FILTER_SANITIZE_NUMBER_FLOAT);
         $num02 = filter_input(INPUT_POST, "num02", FILTER_SANITIZE_NUMBER_FLOAT);
         $operator = htmlspecialchars($_POST["operator"]);

         $value = 0;
         switch ($operator) {
            case "add":
               $value = $num01 + $num02;
               break;
            case "subtract":
               $value = $num01 - $num02;
               break;
            case "multiply":
               $value = $num01 * $num02;
               break;
            case "divide":
               $value = $num01 / $num02;
               break;
            default:
               echo "<p class='calc-error'>Something went wrong</p>";
         }

         echo "<p>Result &nbsp= &nbsp</p>" . $value;
      }
      ?>
   </div>
</body>

</html>