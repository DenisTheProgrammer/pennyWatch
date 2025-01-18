import { pagination } from "./pagination";

document.addEventListener("DOMContentLoaded", pagination(9, "costTable"));
function filterDisplay()
{
    const form = document.getElementById('filterForm');
    form.submit();
}