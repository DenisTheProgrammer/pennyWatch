<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/addForm_style.css">
    </head>

    <body>
        <div class = "topSection">
            <form method = "post" action = "../controller/costs_controller.php" id = "form">
                <button type="submit" class="backButton" name = "backButton">
                    <img src = "../images/backButton.png" id = "backImage" alt = "back button">
                </button>
            </form>

            <h1 id = "title">Add Cost</h1>
        </div>
        <div class = "form">
            <div id = "details">
                <form name = "addCostForm" method="post" action = "costs_controller.php">
                    <label for="reference">Reference</label><br>
                    <input type="text" id = "costReference" name = "costReference"><br><br>

                    <label for="amount">Amount</label><br>
                    <input type="text" id = "costAmount" name = "costAmount"><br><br>

                    <label for="category">Category</label><br>
                    <input list = "categories" name = "category" id = "category"><br><br>

                    <datalist id = "categories">
                        <?php foreach ($categories as $category): ?>
                            <option value = "<?= $category ?>"></option>
                        <?php endforeach; ?>
                    </datalist>

                    <label for="date">Date</label><br>
                    <input type="date" id = "date" name = "date"><br><br>

                    <input type="checkbox" id = "recurring" name = "recurring">
                    <label for="recurring">recurring</label><br><br>

                    <input type="submit" value = "Confirm Details" name = "confirmDetails" class = "button" id = "confirmDetails">
                </form>
            </div>
        </div>
    </body>
</html>