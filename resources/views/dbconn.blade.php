<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel & MYSQL DB connection</title>
</head>
<body>
    <section>
        <?php 
            if (DB::connection()->getPdo()) {
                echo "Successfully Connected to DB and DB name is";
            }
        ?>
    </section>
</body>a
</html>