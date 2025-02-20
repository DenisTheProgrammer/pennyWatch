<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "../css/main.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/navBar.css">
    <link rel = "stylesheet" type = "text/css" href = "../css/breakdown_style.css">

    <script src = "../javascript/breakdown_script.js"></script>
</head>

<body>
    <div class = "navBar">
        <a href = "../controller/dashboard_controller.php">Dashboard</a>
        <a class = "active" href = "../controller/breakdown_controller.php">Breakdown</a>
        <a href = "../controller/incomes_controller.php">Incomes</a>
        <a href = "../controller/costs_controller.php"> Costs</a>
        <a href = "../controller/savings_controller.php"> Savings</a>
        <form method = "post" action = "../controller/logIn_controller.php" class = "navForm">
            <button type="submit" class="manageButton" name = "manageAccount">
                <img src="../images/profile.png" alt="Profile Icon" class="buttonIcon">
                Manage Account
            </button>
        </form><!-- purpose of this is to take to a manage account page-->
    </div>

    <div id = "showSummary">
        <h2>Disposable Income Breakdown</h2>
        <form id="filterForm" method="post" action="breakdown_controller.php">
            <label for="filterMonth">Filter by Month:</label>
            <select id="filterMonth" name="filterMonth" onchange="filterDisplay()">
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
                <option value="2025" <?= ($filterYear == '2025') ? 'selected' : ''; ?>>2025</option>
                <option value="2024" <?= ($filterYear == '2024') ? 'selected' : ''; ?>>2024</option>
                <option value="2023" <?= ($filterYear == '2023') ? 'selected' : ''; ?>>2023</option>
                <option value="2022" <?= ($filterYear == '2022') ? 'selected' : ''; ?>>2022</option>
            </select>
        </form>

        <p>Total Income: £<?=$totalIncome?></p>
        <p>Total Spent: £<?=$totalCost?></p>
        <p id="disposableIncome" data-disposable-income="<?=$disposableIncome?>">Total Disposable Income: £<?=$disposableIncome?></p>
    </div>
    <div id = "downloadButton">
        <form method="post" action="breakdown_controller.php">
            <input type="hidden" name="filterMonth" value="<?= $filterMonth?>">
            <input type="hidden" name="filterYear" value="<?= $filterYear?>">
            <input type="submit" value="Download Breakdown" name="downloadSummary" id = "downloadSummary" class="button">
        </form>
    </div>

    <?php if (isset($downloadMessage)): ?>
        <script>
            alert("<?= $downloadMessage; ?>");
        </script>
    <?php endif; ?>
</body>

</html>