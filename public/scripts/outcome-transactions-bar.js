console.log('outcome');
console.log(outcomeTransactions);
console.log(outcomeCategories);

// Group the amounts by transaction_category_id
const groupedOutcome = outcomeTransactions.reduce((acc, transaction) => {
    // If the transaction_category_id is not in the accumulator, initialize it
    if (!acc[transaction.transaction_category_id]) {
        acc[transaction.transaction_category_id] = 0;
    }
    // Add the transaction amount to the corresponding category
    acc[transaction.transaction_category_id] += transaction.amount;
    return acc;
}, {});

console.log(groupedOutcome);

// Convert the grouped data into arrays for Chart.js
const outcomeCategoryLabels = Object.keys(groupedOutcome).map(id => outcomeCategories[id]);
const outcomeCategoryData = Object.values(groupedOutcome);

// Create the bar chart
new Chart(document.getElementById('outcome-transactions-bar'), {
    type: 'bar',
    options: {
        scales: {
            y: {
                beginAtZero: true, // Start the y-axis at 0
                ticks: {
                    color: '#FFFFFF', // Change the font color of y-axis labels to white
                    font: {
                        size: 7 // Change the font size of y-axis labels
                    }
                }
            },
            x: {
                ticks: {
                    color: '#FFFFFF', // Change the font color of x-axis labels to white
                    font: {
                        size: 7 // Change the font size of x-axis labels
                    }
                }
            }
        },
        plugins: {
            legend: {
                display: true, // Display the legend
                labels: {
                    color: '#FFFFFF', // Change the font color of legend labels to white
                    font: {
                        size: 10 // Change the font size of x-axis labels
                    }
                }
            },
            tooltip: {
                enabled: true, // Enable tooltips
                titleColor: '#FFFFFF', // Change the font color of tooltip title to white
                bodyColor: '#FFFFFF', // Change the font color of tooltip body to white
                titleFont: {
                    size: 10 // Change the font size of tooltip title
                },
                bodyFont: {
                    size: 10 // Change the font size of tooltip body
                }
            }
        }
    },
    data: {
        labels: outcomeCategoryLabels, // Use category labels
        datasets: [
            {
                label: 'Outcome by Category',
                data: outcomeCategoryData, // Use the grouped data
                backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF'], // Customize colors as needed
                borderColor: ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF'], // Border colors for bars
                borderWidth: 1 // Width of the bar borders
            }
        ]
    }
});
