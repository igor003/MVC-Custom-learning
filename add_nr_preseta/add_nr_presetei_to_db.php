<?
require '../my_db.php';
?>
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
            <form action="/add_nr_preseta/new_nr_presetei.php" method="post">
                <div class="form-group">
                    <label for="usr">Nr presetei:</label>
                    <input name="new_nr_presetei" type="text" class="form-control" id="usr">
                </div>
                <button class="btn btn-success" type="submit">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
