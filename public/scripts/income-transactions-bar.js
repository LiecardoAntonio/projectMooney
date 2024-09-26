console.log('income');
console.log(incomeTransactions);
console.log(incomeCategories);

// Group the amounts by transaction_category_id
const groupedIncome = incomeTransactions.reduce((acc, transaction) => {
    // If the transaction_category_id is not in the accumulator, initialize it
    if (!acc[transaction.transaction_category_id]) {
        acc[transaction.transaction_category_id] = 0;
    }
    // Add the transaction amount to the corresponding category
    acc[transaction.transaction_category_id] += transaction.amount;
    return acc;
}, {});

console.log(groupedIncome);

// Convert the grouped data into arrays for Chart.js
const categoryLabels = Object.keys(groupedIncome).map(id => incomeCategories[id]);
const categoryData = Object.values(groupedIncome);

// Create the bar chart
new Chart(document.getElementById('income-transactions-bar'), {
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
                    color: '#FFFFFF', // Change the font color of x-axis labels to white\
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
        labels: categoryLabels, // Use category labels
        datasets: [
            {
                label: 'Income by Category',
                data: categoryData, // Use the grouped data
                backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF'], // Customize colors as needed
                borderColor: ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0', '#9966FF'], // Border colors for bars
                borderWidth: 1 // Width of the bar borders
            }
        ]
    }
});
