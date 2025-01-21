function filterDisplay()
{
    const form = document.getElementById('filterForm');
    form.submit();
}

function checkPayment()
{
    const form = document.getElementById('paymentForm');
    const disposableIncome = parseFloat(document.getElementById("disposableIncome").getAttribute("data-disposable-income").trim());
    const payment = parseFloat(document.getElementById("paymentInput").value);
    if (payment > disposableIncome)
    {
        alert("Payment cannot exceed disposable income");
        event.preventDefault();
    }
}