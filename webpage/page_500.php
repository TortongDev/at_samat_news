<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        html , body {
            background-color: silver;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .not_found_section {
            font-size: 2rem;
            font-weight:100;
            background-color: white;
            text-align: center;
            padding: 20px;
            border: 1px solid white;
            border-radius: 3px;
        }
    </style>
</head>
<body>

    <div class="not_found_section">
        <h3>Server Error Responses ( 500 Code )</h3>        
        <?php 
            require_once dirname(dirname(__FILE__)).'\class\Connection.php';

            http_response_code(500);
            $path = dirname(dirname(__FILE__)); 
            echo $path;
        ?>
    </div>

</body>
</html>