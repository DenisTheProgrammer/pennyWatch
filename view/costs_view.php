<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costs</title>
    <link rel="stylesheet" type = "text/css" href="../css/main.css">
    <link rel="stylesheet" type = "text/css" href="../css/navBar.css">
    <link rel="stylesheet" type = "text/css" href = "../css/incomesCosts_style.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/charts_style.css">

    <script type="module" src="../javascript/costs_script.js"></script>
    <script src="../javascript/costsGraphs_script.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    </head>
    <body>
        <div class = "navBar">
            <a href = "../controller/dashboard_controller.php">Dashboard</a>
            <a href = "../controller/breakdown_controller.php">Breakdown</a>
            <a href = "../controller/incomes_controller.php">Incomes</a>
            <a class = "active" href = "../controller/costs_controller.php"> Costs</a>
            <a href = "../controller/savings_controller.php"> Savings</a>
            <form method = "post" action = "../controller/logIn_controller.php" class = "navForm">
                <button type="submit" class="manageButton" name = "manageAccount">
                    <img src="../images/profile.png" alt="Profile Icon" class="buttonIcon">
                    Manage Account
                </button>
            </form><!-- purpose of this is to take to a manage account page-->
        </div>

        <div class="costPage">
            <div id="costDisplay">
                <!-- Filter form -->
                <form id="filterForm" method="post" action="costs_controller.php">
                    <label for="filterCategory">Filter by Category:</label>
                    <select id="filterCategory" name="filterCategory" onchange="filterDisplay()">
                        <option value="All" <?= ($filterCategory == 'All') ? 'selected' : ''; ?>>All</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?= $category ?>" <?= ($filterCategory == $category) ? 'selected' : ''; ?>><?= $category?></option>
                        <?php endforeach; ?>
                    </select>

                    <label for="filterMonth">Filter by Month:</label>
                    <select id="filterMonth" name="filterMonth" onchange="filterDisplay()">
                        <option value="All" <?= ($filterMonth == 'All') ? 'selected' : ''; ?>>All</option>
                        <option value="1" <?= ($filterMonth == '1') ? 'selected' : ''; ?>>January</option>
                        <option value="2" <?= ($filterMonth == '2') ? 'selected' : ''; ?>>February</option>
                        <option value="3" <?= ($filterMonth == '3') ? 'selected' : ''; ?>>March</option>
                        <option value="4" <?= ($filterMonth == '4') ? 'selected' : ''; ?>>April</option>
                        <option value="5" <?= ($filterMonth == '5') ? 'selected' : ''; ?>>May</option>
                        <option value="6" <?= ($filterMonth == '6') ? 'selected' : ''; ?>>June</option>
                        <option value="7" <?= ($filterMonth == '7') ? 'selected' : ''; ?>>July</option>
                        <option value="8" <?= ($filterMonth == '8') ? 'selected' : ''; ?>>August</option>
                        <option value="9" <?= ($filterMonth == '9') ? 'selected' : ''; ?>>September</option>
                        <option value="10" <?= ($filterMonth == '10') ? 'selected' : ''; ?>>October</option>
                        <option value="11" <?= ($filterMonth == '11') ? 'selected' : ''; ?>>November</option>
                        <option value="12" <?= ($filterMonth == '12') ? 'selected' : ''; ?>>December</option>
                    </select>

                    <label for="filterYear">Filter by Year:</label>
                    <select id="filterYear" name="filterYear" onchange="filterDisplay()">
                        <option value="All" <?= ($filterYear == 'All') ? 'selected' : ''; ?>>All</option>
                        <option value="2025" <?= ($filterYear == '2025') ? 'selected' : ''; ?>>2025</option>
                        <option value="2024" <?= ($filterYear == '2024') ? 'selected' : ''; ?>>2024</option>
                        <option value="2023" <?= ($filterYear == '2023') ? 'selected' : ''; ?>>2023</option>
                        <option value="2022" <?= ($filterYear == '2022') ? 'selected' : ''; ?>>2022</option>
                    </select>

                    <button type="submit" name = "resetButton" class="button">Reset</button>
                </form>

                <div id="tableContainer">
                    <table id = "costTable">
                        <thead>
                            <tr>
                                <th>Reference</th>
                                <th>Amount</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($costs as $cost): ?>
                            <tr>
                                <td><?= strlen($cost->costReference) > 20 ? substr($cost->costReference, 0, 20) . '...' : $cost->costReference ?></td>
                                <td>£<?= $cost->costAmount ?></td>
                                <td><?= $cost->category ?></td>
                                <td><?= $cost->date ?></td>
                                <td>
                                    <form method="post" action="costs_controller.php">
                                        <input type="submit" value="Delete" name="deleteButton" class="button">
                                        <input type="hidden" value="<?= $cost->costID ?>" name="IDPass">
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div id="pagination"></div>
            </div>
            <div id="rightSide">
                <div id = "verticalBarChart"></div>
                <div id = "addButton">
                    <form method="post" action="costs_controller.php">
                        <input type="submit" value="Add Cost" name="addCostButton" class="button">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>