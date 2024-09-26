// Calculate the total amounts
const incomeTotal = incomeTransactions.reduce((sum, transaction) => sum + transaction.amount, 0);
const outcomeTotal = outcomeTransactions.reduce((sum, transaction) => sum + transaction.amount, 0);

new Chart(
  document.getElementById('transactions-pie'),
  {
    type: 'doughnut',
    options: {
      animation: true,
      plugins: {
        legend: {
          display: true, // Display the legend
          labels: {
              color: '#FFFFFF', // Change the font color of legend labels to white
          }
      },
      tooltip: {
          enabled: true, // Enable tooltips
          titleColor: '#FFFFFF', // Change the font color of tooltip title to white
          bodyColor: '#FFFFFF', // Change the font color of tooltip body to white
      }
      }
    },
    data: {
      labels: ['income', 'outcome'],
      datasets: [
        {
          label: '',
          data: [incomeTotal, outcomeTotal]
        }
      ]
    }
  }
);
