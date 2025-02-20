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
    handleDetails();
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

function handleDetails()
{
    let form = document.forms["addGoalForm"];

    form.addEventListener("submit", function(event)
    {
        let name = form.elements["goalName"].value.trim();
        let target = form.elements["goalTarget"].value.trim();
        let amount = form.elements["recurringAmount"].value.trim();

        if(name === "")
        {
            alert("Please enter a valid name");
            event.preventDefault();
        }
        else if(target === "")
        {
            alert("Please enter a target");
            event.preventDefault();
        }
        else if(recurring.checked)
        {
            if(amount === "")
            {
                alert("Please enter an amount");
                event.preventDefault();
            }
        }

    });
}