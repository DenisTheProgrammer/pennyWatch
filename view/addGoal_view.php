<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/addForm_style.css">
    </head>

    <body>
        <div class = "topSection">
            <form method = "post" action = "../controller/savings_controller.php" id = "form">
                <button type="submit" class="backButton" name = "backButton">
                    <img src = "../images/backButton.png" id = "backImage" alt = "back button">
                </button>
            </form>

            <h1 id = "title">Add Goal</h1>
        </div>
        <div class = "form">
            <div id = "details">
                <form name = "addGoalForm" method="post" action = "savings_controller.php">
                    <label for="goalName">Goal Name</label><br>
                    <input type="text" id = "goalName" name = "goalName"><br><br>

                    <label for="goalTarget">Goal Target</label><br>
                    <input type="text" id = "goalTarget" name = "goalTarget"><br><br>

                    <input type="checkbox" id = "recurring" name = "recurring">
                    <label for="recurring">recurring</label><br><br>

                    <label for="recurringAmount">Goal Target</label><br>
                    <input type="text" id = "recurringAmount" name = "recurringAmount"><br><br>

                    <label for="recurringInterval">Recurring Interval</label><br>
                    <input list = "Intervals" name = "recurringInterval" id = "recurringInterval"><br><br>

                    <datalist id = "Intervals">
                        <option value="1">Weekly</option>
                        <option value="2">Monthly</option>
                    </datalist>

                    <label for="weeklyDay">Weekly Day</label><br>
                    <input type="text" id = "weeklyDay" name = "weeklyDay"><br><br>

                    <label for="monthlyDay">Weekly Day</label><br>
                    <input type="text" id = "monthlyDay" name = "monthlyDay"><br><br>

                    <input type="submit" value = "Confirm Details" name = "confirmDetails" class = "button" id = "confirmDetails">
                </form>
            </div>
        </div>
    </body>
</html>