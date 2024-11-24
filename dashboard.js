
    // Set up the chart data
    var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    var usageData = [100, 120, 130, 140, 160, 150, 170, 180, 190, 200, 210, 220];  // Example data for public transport usage
    var carbonReductionData = [5, 6, 7, 8, 9, 10, 12, 11, 13, 14, 15, 16];  // Example data for carbon reduction

    // Get the canvas element for Chart.js
    var ctx = document.getElementById('usage-chart').getContext('2d');

    // Create the line chart
    var usageChart = new Chart(ctx, {
        type: 'line', // Define the type of chart
        data: {
            labels: months, // X-axis labels (months)
            datasets: [{
                label: 'Public Transport Usage (hours)',
                data: usageData, // Y-axis data for public transport usage
                borderColor: 'rgba(75, 192, 192, 1)', // Line color for usage
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Fill color for usage
                fill: true, // Fill the area under the line
                tension: 0.1, // Smoother line
            }, {
                label: 'Carbon Reduction (kg)',
                data: carbonReductionData, // Y-axis data for carbon reduction
                borderColor: 'rgba(255, 99, 132, 1)', // Line color for carbon reduction
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Fill color for carbon reduction
                fill: true, // Fill the area under the line
                tension: 0.1, // Smoother line
            }]
        },
        options: {
            responsive: true, // Make the chart responsive to screen size
            scales: {
                y: {
                    beginAtZero: true, // Ensure the y-axis starts from 0
                    title: {
                        display: true,
                        text: 'Value'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true, // Show the legend to distinguish between the two lines
                },
                tooltip: {
                    mode: 'index', // Tooltip mode
                    intersect: false, // Show tooltip for all data points
                }
            }
        }
    });
