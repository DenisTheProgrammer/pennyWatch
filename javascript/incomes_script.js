import { pagination } from "./pagination.js";

document.addEventListener("DOMContentLoaded", () => pagination(9, "incomeTable"));
function filterDisplay()
{
    const form = document.getElementById('filterForm');
    form.submit();
}

//makes the function globally accessible
window.filterDisplay = filterDisplay;