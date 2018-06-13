<?php
    $finalMessage = "
    
    <html>
        <head>
            <meta charset=\"UTF-8\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
            <link rel=\"stylesheet\" href=\"css/dist/main.css\">
            <title>You have recieved a new reply!</title>
        </head>
        <body>
            <div class=\"container\">
                <h2> Username: ".$_POST['inputName']." </h2>
                <h2> Contact Email: ".$_POST['inputEmail']." </h2>
                <p>".$message."> </p>
            </div>
        </body>
    </html>
    "
?>