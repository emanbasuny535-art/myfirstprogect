<?php
// Assignment 1 - PHP


// -------------------- Q1: if / else --------------------
function checkAge($age) {
    if ($age > 18) {
        return "Access approved. You can log in.";
    } else {
        return "Access denied. You must be older than 18.";
    }
}

// -------------------- Q2: Function with two parameters --------------------
function calculateNumbers($num1, $num2) {
    echo "<p>Multiplication: " . ($num1 * $num2) . "</p>";
    echo "<p>Difference: " . ($num1 - $num2) . "</p>";
    if ($num2 != 0) {
        echo "<p>Division: " . ($num1 / $num2) . "</p>";
    } else {
        echo "<p>Division: Cannot divide by zero.</p>";
    }
}

// -------------------- Q3: Function with array --------------------
function sumArray($numbers) {
    $sum = 0;
    foreach ($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

// -------------------- Q4: Search for a movie --------------------
function searchMovie($films, $keyword) {
    foreach ($films as $film) {
        if (strtolower($film) === strtolower($keyword)) {
            return "Yes";
        }
    }
    return "No";
}

// -------------------- Q5: Bubble Sort function --------------------
function RouteBubble($array) {
    $length = count($array);

    for ($i = 0; $i < $length - 1; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }

    return $array;
}

// -------------------- Q6: Find maximum number --------------------
function findMaximum($numbers) {
    $max = $numbers[0];

    foreach ($numbers as $number) {
        if ($number > $max) {
            $max = $number;
        }
    }

    return $max;
}

// -------------------- Q7: Count movie repetitions --------------------
function countMovie($films, $keyword) {
    $count = 0;

    foreach ($films as $film) {
        if (strtolower($film) === strtolower($keyword)) {
            $count++;
        }
    }

    return $count;
}

// -------------------- Q8: Generate random password --------------------
function RouteRandomPass($length) {
    if ($length <= 0) {
        return "";
    }

    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = "";

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = random_int(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }

    return $password;
}

// -------------------- Q9: Display values and handle Boolean --------------------
function displayValuesFor($tests) {
    echo "<h3>Using for loop</h3><ul>";

    for ($i = 0; $i < count($tests); $i++) {
        if (is_bool($tests[$i])) {
            echo "<li>" . ($tests[$i] ? "Yes" : "No") . "</li>";
        } else {
            echo "<li>" . htmlspecialchars((string)$tests[$i]) . "</li>";
        }
    }

    echo "</ul>";
}

function displayValuesWhile($tests) {
    echo "<h3>Using while loop</h3><ul>";

    $i = 0;
    while ($i < count($tests)) {
        if (is_bool($tests[$i])) {
            echo "<li>" . ($tests[$i] ? "Yes" : "No") . "</li>";
        } else {
            echo "<li>" . htmlspecialchars((string)$tests[$i]) . "</li>";
        }
        $i++;
    }

    echo "</ul>";
}

// -------------------- Q10: Sort array using PHP sort() --------------------
function sortNumbers($numbers) {
    sort($numbers);
    return $numbers;
}

// -------------------- Q11: Find common values between two arrays --------------------
function sameValues($arr1, $arr2) {
    return array_values(array_unique(array_intersect($arr1, $arr2)));
}

// -------------------- Q12: GET / POST form and discount calculation --------------------
function calculateBill($price, $quantity) {
    $total = $price * $quantity;

    
    $discountRate = ($total > 1000) ? 0.15 : 0.10;
    $discountValue = $total * $discountRate;
    $finalTotal = $total - $discountValue;

    return [
        "total" => $total,
        "discount_rate" => $discountRate * 100,
        "discount_value" => $discountValue,
        "final_total" => $finalTotal
    ];
}
?>
