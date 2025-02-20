window.onload = function () {
    handleDetails();
};

function handleDetails()
{
    let form = document.forms["addIncomeForm"];

    form.addEventListener("submit", function(event)
    {
        let reference = form.elements["incomeReference"].value.trim();
        let amount = form.elements["incomeAmount"].value.trim();
        let category = form.elements["category"].value.trim();
        let date = form.elements["date"].value.trim();

        if(reference === "")
        {
            alert("Please enter a reference");
            event.preventDefault();
        }
        else if(amount === "")
        {
            alert("Please enter an amount");
            event.preventDefault();
        }
        else if(category === "")
        {
            alert("Please enter a category");
            event.preventDefault();
        }

        else if(date === "")
        {
            alert("Please enter a date");
            event.preventDefault();
        }

    });
}