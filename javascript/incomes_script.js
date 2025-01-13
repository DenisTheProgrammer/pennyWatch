document.addEventListener("DOMContentLoaded", () => {
    const rowsPerPage = 9;
    let currentPage = 1;

    // Get all table rows
    const table = document.getElementById("incomeTable");
    const rows = Array.from(table.querySelectorAll("tr")).slice(1); // Minus the header row
    const totalRows = rows.length;

    // Function to display the table for a specific page
    function displayTable(page) {
        const startIndex = (page - 1) * rowsPerPage;
        const endIndex = startIndex + rowsPerPage;

        // Displays only the rows on the current page
        rows.forEach((row, index) => {
            row.style.display = index >= startIndex && index < endIndex ? "" : "none";
        });

        // Update controls
        updatePagination(page);
    }

    // Function to update controls
    function updatePagination(currentPage) {
        const pageCount = Math.ceil(totalRows / rowsPerPage);
        const paginationContainer = document.getElementById("pagination");
        paginationContainer.innerHTML = ""; // Remove previous page

        for (let i = 1; i <= pageCount; i++) {
            const pageLink = document.createElement("a");
            pageLink.href = "#";
            pageLink.innerText = i;
            pageLink.className = "pageLink";
            pageLink.style.margin = "0 5px";
            pageLink.style.cursor = "pointer";

            if (i === currentPage) {
                pageLink.style.fontWeight = "bold";
                pageLink.style.textDecoration = "underline";
            }

            pageLink.onclick = function (e) {
                e.preventDefault(); // Prevents the default link behaviour and instead executes following code
                displayTable(i);
            };

            paginationContainer.appendChild(pageLink);
        }
    }

    displayTable(currentPage);
});
function filterDisplay()
{
    const form = document.getElementById('filterForm');
    form.submit();
}