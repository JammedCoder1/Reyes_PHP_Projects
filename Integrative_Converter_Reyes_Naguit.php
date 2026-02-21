<?php

$Result = "";
$Error = "";
$ConvertedOz = "";
$ConvertedKg = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Input field for the user
	$Number1 = $_POST["Number1"];  
	//24k
	$Karat = 9300;
	//oz, g, kg
	$Oz = 28.3495;
    $Kg = 1000;

	if ($Number1 === "" || $Number1 === "0"){   //Checks for null or 0 inputs
		$Error = "Field must be filled or not 0";
	} elseif (!is_numeric($Number1)){ //Checks if input is numeric
		$Error = "Input must be numeric";
	} else{ //Runs the Main Program
        $Result = $Number1 * $Karat;
        $ConvertedOz = $Number1 * $Oz;
        $ConvertedKg = $Number1 / $Kg;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gold To Php</title>

    <style>
        body{
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #ffdd44, #ffaa00, #ff7733);
            font-family: system-ui, -apple-system, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #222;
        }

        .container{
            text-align: center;
            max-width: 420px;
            width: 100%;

        }

        h1{
            font-size: 2.8rem;
            margin: 0 0 2rem 0;
            color: white;
            text-shadow: 0 13px 12px rgba(0,0,0,0.35);
        }
        
        .card{
            background: white;
            overflow: hidden;
            border-radius: 28px;
            padding-bottom: 1.5rem;
            box-shadow: 0 16px 48px rgba(0,0,0,0.22);
        }

        .illustration-box{
            background: #ffde59;
            padding: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
            min-height: 180px; 
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .illustration-box img{
            max-width: 45%;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 6px 12px rgba(0,0,0,0.25));
            opacity: 0.6;
        }

        .gold{
            transform: rotate(-6deg) translateY(-10px) translateX(-40px);
        }
        .money{
            transform: rotate(8deg) translateY(5px) translateX(40px);
        }

        input[type="text"]{
            width: 85%;
            padding: 16px;
            margin-bottom: 1.6rem;
            border: 2px solid #ddd;
            border-radius: 12px;
            font-size: 1.1rem;
            box-sizing: border-box;
        }

        /*
        select{
            width: 85%;
            padding: 16px;
            margin-bottom: 1.6rem;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 1.1rem;
            background: white;

        }
        */

        button{
            width: 50%;
            padding: 16px;
            background: linear-gradient(to right, #f4c430, #daa520);
            color: #1a1a1a;
            font-weight: bold;
            font-size: 1.2rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(212, 160, 23, 0.4);
            transition: all 0.2s;
        }

        button:hover{
            background: linear-gradient(to right, #ffdd44, #ffcc00);
            transform: translateY(-3px);
        }

        .result{
            margin-top: 2rem;
            padding:  1.4rem;
            background: rgba(241, 202, 74, 0.65);
            border-radius: 16px;
            font-size: 1.4rem;
            font-weight: bold;
            color: black;
            width: 85%;
            min-height: 50px;
            align-content: center;
            justify-self: center;
            backdrop-filter: blur(4px);
        }

    </style>
</head>

<body>
    <div class="container">

        <h1>Gold Converter</h1>
        <form method="POST">
        <div class="card">
            <div class="illustration-box">
                    <img class = "gold" src="ingots.png" alt="gold bars">
                    <img class = "money" src="money.png" alt="stack of money">
            </div>

            <input type="text" name="Number1" placeholder="Enter Gold Weight (in Grams)">

            <!--
            <select>
                <option>Grams</option>
                <option>Ounces</option>
                <option>Kilograms</option>
            </select>
            -->

            <button type="submit">Convert</button>

            <!--
            
            -->
  
        </div>

        <?php
        if ($Error != "") {
            echo"<div class='result'>result: $Error </div>";
        }

        if ($Error == "" && $Result !== "") {

            echo"<div class='result'>result:
                 <p>₱$Result </p>
                 <p>{$ConvertedOz}oz</p>
                 <p>{$ConvertedKg}kg</p></div>";
        }
        ?>

    </div>
</body>

</html>