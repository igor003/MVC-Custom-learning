<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php
    require '../heders.php';
    ?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-4 col-xs-offset-4">
            <form action="/add_nr_mini/new_nr_mini.php" method="post">
                <div class="form-group">
                    <label for="usr">Nr miniaplicatorului:</label>
                    <input name="new_nr_mini" type="text" class="form-control" id="usr">
                </div>
                <input class="btn btn-success" type="submit">
            </form>
        </div>
    </div>
</div>
</body>
</html>