document.addEventListener("DOMContentLoaded", function() {
    const recurringCheckbox = document.getElementById("recurring");
    const recurringOptions = document.getElementById("recurringOptions");

    recurringOptions.style.display = "none";

    recurringCheckbox.addEventListener("change", function() {
        if (recurringCheckbox.checked) {
            recurringOptions.style.display = "block";
        } else {
            recurringOptions.style.display = "none";
        }
    });

    weeklyMonthlyToggle();
});

function weeklyMonthlyToggle() {
    const recurringInterval = document.getElementById('recurringInterval').value;
    const weeklyDayContainer = document.getElementById('weeklyDay');
    const monthlyDayContainer = document.getElementById('monthlyDay');

    if (recurringInterval == '1') {
        weeklyDayContainer.style.display = 'block';
        monthlyDayContainer.style.display = 'none';
    } else if (recurringInterval == '2') {
        weeklyDayContainer.style.display = 'none';
        monthlyDayContainer.style.display = 'block';
    }
}