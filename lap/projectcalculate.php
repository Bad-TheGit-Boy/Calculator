<?php
// Function to convert numbers to English words
function numberToEnglishWords($number) {
    $ones = array(
        0 => "ZERO", 1 => "ONE", 2 => "TWO", 3 => "THREE", 4 => "FOUR", 5 => "FIVE",
        6 => "SIX", 7 => "SEVEN", 8 => "EIGHT", 9 => "NINE", 10 => "TEN",
        11 => "ELEVEN", 12 => "TWELVE", 13 => "THIRTEEN", 14 => "FOURTEEN", 15 => "FIFTEEN",
        16 => "SIXTEEN", 17 => "SEVENTEEN", 18 => "EIGHTEEN", 19 => "NINETEEN"
    );
    
    $tens = array(
        2 => "TWENTY", 3 => "THIRTY", 4 => "FORTY", 5 => "FIFTY",
        6 => "SIXTY", 7 => "SEVENTY", 8 => "EIGHTY", 9 => "NINETY"
    );
    
    if ($number == 0) {
        return $ones[0];
    }
    
    $words = "";
    
    // Process billions
    if ($number >= 1000000000) {
        $billions = floor($number / 1000000000);
        
        if ($billions == 1) {
            $words .= "ONE BILLION ";
        } else if ($billions < 20) {
            $words .= $ones[$billions] . " BILLION ";
        } else if ($billions < 100) {
            $tensDigit = floor($billions / 10);
            $onesDigit = $billions % 10;
            
            $words .= $tens[$tensDigit];
            if ($onesDigit > 0) {
                $words .= "-" . $ones[$onesDigit];
            }
            $words .= " BILLION ";
        } else {
            $hundredsDigit = floor($billions / 100);
            $remainder = $billions % 100;
            
            $words .= $ones[$hundredsDigit] . " HUNDRED";
            
            if ($remainder > 0) {
                $words .= " AND ";
                if ($remainder < 20) {
                    $words .= $ones[$remainder];
                } else {
                    $tensDigit = floor($remainder / 10);
                    $onesDigit = $remainder % 10;
                    
                    $words .= $tens[$tensDigit];
                    if ($onesDigit > 0) {
                        $words .= "-" . $ones[$onesDigit];
                    }
                }
            }
            $words .= " BILLION ";
        }
        
        $number %= 1000000000;
    }
    
    // Process millions
    if ($number >= 1000000) {
        $millions = floor($number / 1000000);
        
        if ($millions == 1) {
            $words .= "ONE MILLION ";
        } else if ($millions < 20) {
            $words .= $ones[$millions] . " MILLION ";
        } else if ($millions < 100) {
            $tensDigit = floor($millions / 10);
            $onesDigit = $millions % 10;
            
            $words .= $tens[$tensDigit];
            if ($onesDigit > 0) {
                $words .= "-" . $ones[$onesDigit];
            }
            $words .= " MILLION ";
        } else {
            $hundredsDigit = floor($millions / 100);
            $remainder = $millions % 100;
            
            $words .= $ones[$hundredsDigit] . " HUNDRED";
            
            if ($remainder > 0) {
                $words .= " AND ";
                if ($remainder < 20) {
                    $words .= $ones[$remainder];
                } else {
                    $tensDigit = floor($remainder / 10);
                    $onesDigit = $remainder % 10;
                    
                    $words .= $tens[$tensDigit];
                    if ($onesDigit > 0) {
                        $words .= "-" . $ones[$onesDigit];
                    }
                }
            }
            $words .= " MILLION ";
        }
        
        $number %= 1000000;
    }
    
    // Process thousands
    if ($number >= 1000) {
        $thousands = floor($number / 1000);
        
        if ($thousands == 1) {
            $words .= "ONE THOUSAND ";
        } else if ($thousands < 20) {
            $words .= $ones[$thousands] . " THOUSAND ";
        } else if ($thousands < 100) {
            $tensDigit = floor($thousands / 10);
            $onesDigit = $thousands % 10;
            
            $words .= $tens[$tensDigit];
            if ($onesDigit > 0) {
                $words .= "-" . $ones[$onesDigit];
            }
            $words .= " THOUSAND ";
        } else {
            $hundredsDigit = floor($thousands / 100);
            $remainder = $thousands % 100;
            
            $words .= $ones[$hundredsDigit] . " HUNDRED";
            
            if ($remainder > 0) {
                $words .= " AND ";
                if ($remainder < 20) {
                    $words .= $ones[$remainder];
                } else {
                    $tensDigit = floor($remainder / 10);
                    $onesDigit = $remainder % 10;
                    
                    $words .= $tens[$tensDigit];
                    if ($onesDigit > 0) {
                        $words .= "-" . $ones[$onesDigit];
                    }
                }
            }
            $words .= " THOUSAND ";
        }
        
        $number %= 1000;
    }
    
    // Process hundreds
    if ($number >= 100) {
        $words .= $ones[floor($number / 100)] . " HUNDRED ";
        $number %= 100;
    }
    
    // Process tens and ones
    if ($number > 0) {
        // If there's a previous word, add "AND"
        if ($words != "") {
            $words .= "AND ";
        }
        
        if ($number < 20) {
            $words .= $ones[$number];
        } else {
            $words .= $tens[floor($number / 10)];
            if ($number % 10 > 0) {
                $words .= "-" . $ones[$number % 10];
            }
        }
    }
    
    return trim($words);
}

// Function to convert numbers to Khmer words
function numberToKhmerWords($number) {
    $ones = array(
        0 => "សូន្យ", 1 => "មួយ", 2 => "ពីរ", 3 => "បី", 4 => "បួន", 5 => "ប្រាំ",
        6 => "ប្រាំមួយ", 7 => "ប្រាំពីរ", 8 => "ប្រាំបី", 9 => "ប្រាំបួន"
    );
    
    $tens = array(
        1 => "ដប់", 2 => "ម្ភៃ", 3 => "សាមសិប", 4 => "សែសិប", 5 => "ហាសិប",
        6 => "ហុកសិប", 7 => "ចិតសិប", 8 => "ប៉ែតសិប", 9 => "កៅសិប"
    );
    
    if ($number == 0) {
        return $ones[0];
    }
    
    $words = "";
    
    // Process billions
    if ($number >= 1000000000) {
        $billions = floor($number / 1000000000);
        
        if ($billions == 1) {
            $words .= "មួយ ប៊ីលាន ";
        } else if ($billions < 10) {
            $words .= $ones[$billions] . " ប៊ីលាន ";
        } else if ($billions == 10) {
            $words .= "ដប់ ប៊ីលាន ";
        } else if ($billions < 20) {
            $words .= "ដប់" . $ones[$billions - 10] . " ប៊ីលាន ";
        } else if ($billions < 100) {
            $tensDigit = floor($billions / 10);
            $onesDigit = $billions % 10;
            
            $words .= $tens[$tensDigit];
            if ($onesDigit > 0) {
                $words .= $ones[$onesDigit];
            }
            $words .= " ប៊ីលាន ";
        } else {
            $hundredsDigit = floor($billions / 100);
            $remainder = $billions % 100;
            
            $words .= $ones[$hundredsDigit] . "រយ";
            
            if ($remainder > 0) {
                $words .= " ";
                if ($remainder < 10) {
                    $words .= $ones[$remainder];
                } else if ($remainder < 20) {
                    $words .= "ដប់" . ($remainder > 10 ? $ones[$remainder - 10] : "");
                } else {
                    $tensDigit = floor($remainder / 10);
                    $onesDigit = $remainder % 10;
                    
                    $words .= $tens[$tensDigit];
                    if ($onesDigit > 0) {
                        $words .= $ones[$onesDigit];
                    }
                }
            }
            $words .= " ប៊ីលាន ";
        }
        
        $number %= 1000000000;
    }
    
    // Process millions
    if ($number >= 1000000) {
        $millions = floor($number / 1000000);
        
        if ($millions == 1) {
            $words .= "មួយ លាន ";
        } else if ($millions < 10) {
            $words .= $ones[$millions] . " លាន ";
        } else if ($millions == 10) {
            $words .= "ដប់ លាន ";
        } else if ($millions < 20) {
            $words .= "ដប់" . $ones[$millions - 10] . " លាន ";
        } else if ($millions < 100) {
            $tensDigit = floor($millions / 10);
            $onesDigit = $millions % 10;
            
            $words .= $tens[$tensDigit];
            if ($onesDigit > 0) {
                $words .= $ones[$onesDigit];
            }
            $words .= " លាន ";
        } else {
            $hundredsDigit = floor($millions / 100);
            $remainder = $millions % 100;
            
            $words .= $ones[$hundredsDigit] . "រយ";
            
            if ($remainder > 0) {
                $words .= " ";
                if ($remainder < 10) {
                    $words .= $ones[$remainder];
                } else if ($remainder < 20) {
                    $words .= "ដប់" . ($remainder > 10 ? $ones[$remainder - 10] : "");
                } else {
                    $tensDigit = floor($remainder / 10);
                    $onesDigit = $remainder % 10;
                    
                    $words .= $tens[$tensDigit];
                    if ($onesDigit > 0) {
                        $words .= $ones[$onesDigit];
                    }
                }
            }
            $words .= " លាន ";
        }
        
        $number %= 1000000;
    }
    
    // Process thousands
    if ($number >= 1000) {
        $thousands = floor($number / 1000);
        
        if ($thousands == 1) {
            $words .= "មួយ ពាន់ ";
        } else if ($thousands < 10) {
            $words .= $ones[$thousands] . " ពាន់ ";
        } else if ($thousands == 10) {
            $words .= "ដប់ ពាន់ ";
        } else if ($thousands < 20) {
            $words .= "ដប់" . $ones[$thousands - 10] . " ពាន់ ";
        } else if ($thousands < 100) {
            $tensDigit = floor($thousands / 10);
            $onesDigit = $thousands % 10;
            
            $words .= $tens[$tensDigit];
            if ($onesDigit > 0) {
                $words .= $ones[$onesDigit];
            }
            $words .= " ពាន់ ";
        } else {
            $hundredsDigit = floor($thousands / 100);
            $remainder = $thousands % 100;
            
            $words .= $ones[$hundredsDigit] . "រយ";
            
            if ($remainder > 0) {
                $words .= " ";
                if ($remainder < 10) {
                    $words .= $ones[$remainder];
                } else if ($remainder < 20) {
                    $words .= "ដប់" . ($remainder > 10 ? $ones[$remainder - 10] : "");
                } else {
                    $tensDigit = floor($remainder / 10);
                    $onesDigit = $remainder % 10;
                    
                    $words .= $tens[$tensDigit];
                    if ($onesDigit > 0) {
                        $words .= $ones[$onesDigit];
                    }
                }
            }
            $words .= " ពាន់ ";
        }
        
        $number %= 1000;
    }
    
    // Process hundreds
    if ($number >= 100) {
        $words .= $ones[floor($number / 100)] . "រយ ";
        $number %= 100;
    }
    
    // Process tens and ones
    if ($number > 0) {
        if ($number < 10) {
            $words .= $ones[$number];
        } else if ($number < 20) {
            $words .= "ដប់" . ($number > 10 ? $ones[$number - 10] : "");
        } else {
            $tensDigit = floor($number / 10);
            $onesDigit = $number % 10;
            
            $words .= $tens[$tensDigit];
            if ($onesDigit > 0) {
                $words .= $ones[$onesDigit];
            }
        }
    }
    
    return trim($words);
}

// Function to convert Arabic numerals to Khmer numerals
function convertToKhmerNumerals($number) {
    $khmerNumerals = array('០', '១', '២', '៣', '៤', '៥', '៦', '៧', '៨', '៩');
    $numberString = (string)$number;
    $result = '';
    
    for ($i = 0; $i < strlen($numberString); $i++) {
        $digit = (int)$numberString[$i];
        $result .= $khmerNumerals[$digit];
    }
    
    return $result;
}

// Function to format currency
function formatCurrency($number, $language) {
    // Convert to US dollars (assuming 4000 KHR = 1 USD for example)
    // You may want to use a real-time exchange rate API in production
    $exchangeRate = 4000; // 4000 KHR = 1 USD
    $usdAmount = $number / $exchangeRate;
    
    // Format as decimal with 2 decimal places
    $formattedUSD = number_format($usdAmount, 2, '.', ',');
    
    if ($language == "english") {
        return "$" . $formattedUSD . " USD";
    } else if ($language == "khmer") {
        return "$" . $formattedUSD . " ដុល្លារ";
    }
    return "";
}

// Function to save calculation to text file
function saveCalculationToFile($inputNumber, $outputFormat, $result) {
    $logFile = "calculations_log.txt";
    $timestamp = date("Y-m-d H:i:s");
    $logEntry = "[{$timestamp}] Input: {$inputNumber}, Format: {$outputFormat}, Result: {$result}" . PHP_EOL;
    
    // Append to the file
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

// Function to clear history
function clearHistory() {
    $logFile = "calculations_log.txt";
    // Create an empty file (effectively clearing it)
    file_put_contents($logFile, "");
    return true;
}

// Process form submission
$result = "";
$number = "";
$language = "english";
$letterCase = "UPPERCASE";
$outputFormat = "";
$historyCleared = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["calculate"])) {
        $number = filter_input(INPUT_POST, "number", FILTER_SANITIZE_NUMBER_INT);
        $language = filter_input(INPUT_POST, "language", FILTER_SANITIZE_STRING);
        $letterCase = filter_input(INPUT_POST, "letterCase", FILTER_SANITIZE_STRING);
        $isCurrency = isset($_POST["currency"]) && $_POST["currency"] == "on";
        
        // Determine output format for logging
        if ($isCurrency) {
            $outputFormat = "Currency ({$language})";
        } else {
            $outputFormat = "{$language} Words ({$letterCase})";
        }
        
        if ($isCurrency) {
            // For currency option, display as US dollars
            $result = formatCurrency($number, $language);
        } else if ($language == "english") {
            $result = numberToEnglishWords($number);
        } else if ($language == "khmer") {
            $result = numberToKhmerWords($number);
        }
        
        // Apply letter case (only for word results, not for currency format)
        if (!$isCurrency && $language == "english") {
            if ($letterCase == "lowercase") {
                $result = strtolower($result);
            } else if ($letterCase == "titlecase") {
                $result = ucwords(strtolower($result));
            }
            // UPPERCASE is the default, no need to modify
        }
        
        // Save the calculation to the log file
        saveCalculationToFile($number, $outputFormat, $result);
    } elseif (isset($_POST["clear_history"])) {
        // Handle clear history button click
        $historyCleared = clearHistory();
    }
}

// Function to get all saved calculations
function getSavedCalculations() {
    $logFile = "calculations_log.txt";
    if (file_exists($logFile) && filesize($logFile) > 0) {
        return file_get_contents($logFile);
    }
    return "No calculations saved yet.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numbers to Words Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 500px;
            margin: 20px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #d9534f;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
        }
        .radio-group {
            margin: 10px 0;
        }
        .radio-option {
            margin: 5px 0;
        }
        select {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            cursor: pointer;
        }
        button:hover {
            background-color: #e0e0e0;
        }
        .result {
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .result-box {
            border: 1px solid #ddd;
            padding: 15px;
            min-height: 100px;
        }
        .history-section {
            margin-top: 30px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        .history-box {
            border: 1px solid #ddd;
            padding: 15px;
            max-height: 200px;
            overflow-y: auto;
            font-family: monospace;
            font-size: 12px;
            white-space: pre-wrap;
            background-color: #f9f9f9;
        }
        .tab-container {
            margin-top: 20px;
        }
        .tab-buttons {
            display: flex;
            border-bottom: 1px solid #ddd;
        }
        .tab-button {
            padding: 10px 15px;
            background-color: #f0f0f0;
            border: 1px solid #ddd;
            border-bottom: none;
            cursor: pointer;
            margin-right: 5px;
        }
        .tab-button.active {
            background-color: #fff;
            border-bottom: 1px solid #fff;
            margin-bottom: -1px;
        }
        .tab-content {
            display: none;
            padding: 15px;
            border: 1px solid #ddd;
            border-top: none;
        }
        .tab-content.active {
            display: block;
        }
        .clear-history-btn {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            margin-top: 10px;
        }
        .clear-history-btn:hover {
            background-color: #f1b0b7;
        }
        .alert {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            Numbers to Words Calculator
        </div>
        <div class="content">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="number">Convert this Number:</label>
                    <input type="text" id="number" name="number" value="<?php echo htmlspecialchars($number); ?>" required>
                </div>
                
                <div class="form-group">
                    <label>To:</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="khmer" name="language" value="khmer" <?php echo $language == "khmer" ? "checked" : ""; ?>>
                            <label for="khmer">Khmer Words</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="english" name="language" value="english" <?php echo $language == "english" ? "checked" : ""; ?>>
                            <label for="english">English Words</label>
                        </div>
                        <div class="radio-option">
                            <input type="checkbox" id="currency" name="currency" <?php echo isset($_POST["currency"]) ? "checked" : ""; ?>>
                            <label for="currency">currency</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="letterCase">Letter Case:</label>
                    <select id="letterCase" name="letterCase">
                        <option value="UPPERCASE" <?php echo $letterCase == "UPPERCASE" ? "selected" : ""; ?>>UPPERCASE</option>
                        <option value="lowercase" <?php echo $letterCase == "lowercase" ? "selected" : ""; ?>>lowercase</option>
                        <option value="titlecase" <?php echo $letterCase == "titlecase" ? "selected" : ""; ?>>Title Case</option>
                    </select>
                </div>
                
                <div class="button-group">
                    <button type="reset">Clear</button>
                    <button type="submit" name="calculate">Calculate</button>
                </div>
                
                <div class="result">
                    <label>Answer:</label>
                    <div class="result-box">
                        <?php echo htmlspecialchars($result); ?>
                    </div>
                </div>
            </form>
            
            <div class="tab-container">
                <div class="tab-buttons">
                    <div class="tab-button active" onclick="openTab(event, 'current-project')">Current Project</div>
                    <div class="tab-button" onclick="openTab(event, 'history')">Calculation History</div>
                </div>
                
                <div id="current-project" class="tab-content active">
                    <p>Current calculation project data is being stored in a text file.</p>
                    <?php if (!empty($result)): ?>
                    <p>Last calculation: <strong><?php echo htmlspecialchars($result); ?></strong></p>
                    <?php endif; ?>
                </div>
                
                <div id="history" class="tab-content">
                    <h3>Calculation History</h3>
                    
                    <?php if ($historyCleared): ?>
                    <div class="alert alert-success">
                        History has been cleared successfully!
                    </div>
                    <?php endif; ?>
                    
                    <div class="history-box">
                        <?php echo nl2br(htmlspecialchars(getSavedCalculations())); ?>
                    </div>
                    
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <button type="submit" name="clear_history" class="clear-history-btn">Clear History</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    function openTab(evt, tabName) {
        // Hide all tab content
        var tabContents = document.getElementsByClassName("tab-content");
        for (var i = 0; i < tabContents.length; i++) {
            tabContents[i].classList.remove("active");
        }
        
        // Remove "active" class from all tab buttons
        var tabButtons = document.getElementsByClassName("tab-button");
        for (var i = 0; i < tabButtons.length; i++) {
            tabButtons[i].classList.remove("active");
        }
        
        // Show the current tab and add "active" class to the button
        document.getElementById(tabName).classList.add("active");
        evt.currentTarget.classList.add("active");
    }
    </script>
</body>
</html>