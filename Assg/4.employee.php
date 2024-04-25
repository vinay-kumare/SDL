<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Employee Search</title> 
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            background-color: #f4f4f4; 
            text-align: center; 
        } 
        h1 { 
            color: #333; 
        } 
        form { 
            margin-top: 20px; 
        } 
        label { 
            font-weight: bold; 
        } 
        input[type="text"] { 
            padding: 8px; 
            font-size: 16px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            margin-right: 10px; 
        } 
        button { 
            padding: 8px 16px; 
            font-size: 16px; 
            background-color: #4CAF50; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        } 
        button:hover { 
            background-color: #45a049; 
        } 
        p { 
            margin-top: 10px; 
            color: #333; 
        } 
    </style> 
</head> 
<body> 
    <h1>Employee Search</h1> 
    <?php 
    $employee_names = array( 
        "Rameshwar","Kunal","Raj","Vinay","Rahul","Rohit","Hrithvik","Pranav","Pratham","Vaibhav", 
        "Aditya","Ganesh","Pratik","Aniket","Prajwal","Ayush","Tushar","Prashik","Mayur", "Shantanu" 
    ); 
 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $search_name = $_POST["search_name"]; 
        if (in_array($search_name, $employee_names)) { 
            echo "<p>$search_name exists in the list of employees.</p>"; 
        } else { 
            echo "<p>$search_name does not exist in the list of employees.</p>"; 
        } 
    } 
    ?> 
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"> 
        <label for="search_name">Enter a name to search:</label> 
        <input type="text" id="search_name" name="search_name" required> 
        <button type="submit">Search</button> 
    </form> 
</body> 
</html> 