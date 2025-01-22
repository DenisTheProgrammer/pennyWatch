<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
        <link rel = "stylesheet" type = "text/css" href = "../css/addForm_style.css">

        <script src="../javascript/addGoal_script.js"></script>
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

                    <div id = "recurringOptions">
                        <label for="recurringAmount">Recurring Amount</label><br>
                        <input type="text" id = "recurringAmount" name = "recurringAmount"><br><br>

                        <label for="recurringInterval">Recurring Interval: </label>
                        <select id="recurringInterval" name="recurringInterval" onchange="weeklyMonthlyToggle()">
                            <option value="1">Weekly</option>
                            <option value="2">Monthly</option>
                        </select><br><br>
                        <div id = "weeklyDay">
                            <label for="weeklyDay">Preferred Weekly Day: </label>
                            <select id="weeklyDay" name="weeklyDay">
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                            </select><br><br>
                        </div>

                        <div id = "monthlyDay">
                            <label for="monthlyDay">Preferred Monthly Day (1-31)</label><br>
                            <input type="text" id = "monthlyDay" name = "monthlyDay"><br><br>
                        </div>
                    </div>

                    <input type="submit" value = "Confirm Details" name = "confirmDetails" class = "button" id = "confirmDetails">
                </form>
            </div>
        </div>
    </body>
</html>