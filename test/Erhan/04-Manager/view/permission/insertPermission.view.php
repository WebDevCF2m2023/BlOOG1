<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Permission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        require 'menu.comment.view.php';
        if(isset($error)) echo "<h4>$error</h4>";
    ?>
    <!--<h3 class="messages ">Ajouter un Permission</h3>-->
    <form method="POST" >
        <div class="container border-start border-end border-success rounded-5 p-3">
        <div class="row mb-4 mt-5">
            <div class="col">   
                <div data-mdb-input-init class="form-outline">
                    <input type="text" class="form-control" name="permission_name" placeholder="Permission Nom" required/>
                </div>
            </div>
        </div>
        <div class="row mb-4 mt-5">
            <div class="col">
                <div data-mdb-input-init class="form-outline">
                    <input type="text" name="permission_description"  class="form-control" placeholder="Permission Description"  required/>
                </div>
            </div>
        </div>
        <div class="text-center">
            <button data-mdb-ripple-init type="submit" class="btn btn-outline-success btn-rounded mb-4">Ajouter</button>
        </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>