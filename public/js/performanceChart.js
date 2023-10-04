var ctx = document.getElementById("classPerformanceChart").getContext("2d");

var data = {
    labels: [
        "Top Performing Students",
        "Average Students",
        "Needs Improvement Students",
    ],
    datasets: [
        {
            data: [20, 50, 30], // Mock data for the number of students in each category
            backgroundColor: ["green", "yellow", "red"], // Colors for each category
        },
    ],
};

var options = {
    responsive: true,
};

var myPieChart = new Chart(ctx, {
    type: "pie",
    data: data,
    options: options,
});
