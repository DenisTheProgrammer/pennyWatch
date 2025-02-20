<?php
require "../vendor/autoload.php"; // Load PhpSpreadsheets

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function downloadBreakdown($incomes, $costs, $totalIncome, $totalCost, $disposableIncome, $startDate, $endDate)
{
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $headers = ["Reference", "Amount", "Category", "Date", "Type"];
    $sheet->fromArray([$headers], NULL, 'A1'); // basically by putting an array inside of [] this tells the function its a 2d array making it go across e.g. A1,B1,C1,D1
    //An array full of arrays would know to go down the columns

    //example:
    // $data = [
    //     ['Date', 'Category', 'Amount', 'Type'],
    //     ['2024-02-01', 'Salary', 1000, 'Income'],
    //     ['2024-02-02', 'Groceries', -50, 'Expense'],
    // ];

    $rowNumber = 2; // Start below the headers
    foreach ($incomes as $income) {
        $sheet->setCellValue("A$rowNumber", $income->incomeReference);
        $sheet->setCellValue("B$rowNumber", $income->incomeAmount);
        $sheet->setCellValue("C$rowNumber", $income->category);
        $sheet->setCellValue("D$rowNumber", $income->date);
        $sheet->setCellValue("E$rowNumber", "Income");
        $rowNumber++;
    }

    $rowNumber = $rowNumber + 3;

    foreach ($costs as $cost) {
        $sheet->setCellValue("A$rowNumber", $cost->costReference);
        $sheet->setCellValue("B$rowNumber", $cost->costAmount);
        $sheet->setCellValue("C$rowNumber", $cost->category);
        $sheet->setCellValue("D$rowNumber", $cost->date);
        $sheet->setCellValue("E$rowNumber", "Cost");
        $rowNumber++;
    }

    $rowNumber = $rowNumber + 3;

    $sheet->setCellValue("A$rowNumber", "Total Income:");
    $sheet->setCellValue("B$rowNumber", $totalIncome);
    $rowNumber++;
    $sheet->setCellValue("A$rowNumber", "Total Cost:");
    $sheet->setCellValue("B$rowNumber", $totalCost);
    $rowNumber++;
    $sheet->setCellValue("A$rowNumber", "Disposable Income:");
    $sheet->setCellValue("B$rowNumber", $disposableIncome);

    // Set auto column width
    foreach (range('A', 'E') as $columnID) {
        $sheet->getColumnDimension($columnID)->setAutoSize(true);
    }

    // Save to file and trigger download
    $filename = "Financial_Breakdown_{$startDate}_to_{$endDate}.xlsx"; //set name
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //tell its an excel sheet
    header('Content-Disposition: attachment; filename="' . $filename . '"'); //download file

    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: 0'); //ensure no cache data is being downloaded

    $writer = new Xlsx($spreadsheet); //write the spreadsheet
    $writer->save('php://output'); //save it to the browser
    exit;//stop the script
}
?>
