document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll(".paymentForm");

    forms.forEach(form => {
        form.addEventListener("submit", function (event) {
            const disposableIncome = parseFloat(form.querySelector(".disposableIncome").value.trim());
            const payment = parseFloat(form.querySelector(".paymentInput").value);

            if (isNaN(payment) || payment <= 0) {
                alert("Please enter a valid payment amount.");
                event.preventDefault();
                return;
            }

            if (payment > disposableIncome) {
                alert("Payment cannot exceed disposable income.");
                event.preventDefault();
            }
        });
    });
});
