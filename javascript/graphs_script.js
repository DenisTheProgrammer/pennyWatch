window.onload = function () {
    dashboardChart();
}

function dashboardChart()
{
    fetch('../controller/graphsFunctions_controller.php') // Fetch data from data.php
        .then(response => response.json()) // Parse the JSON from the response
        .then(data => {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Push-ups Over a Week"
                },
                axisY: {
                    title: "Number of Push-ups"
                },
                data: [
                    {
                        type: "line",
                        name: "Person A", // Name for the first line
                        showInLegend: true,
                        dataPoints: data.series1 // Data for the first line
                    },
                    {
                        type: "line",
                        name: "Person B", // Name for the second line
                        showInLegend: true,
                        dataPoints: data.series2 // Data for the second line
                    }
                ]
            });
            chart.render(); // Render the chart with both lines
        })
        .catch(error => {
            console.error('Error fetching data:', error); // Handle errors
        });
}