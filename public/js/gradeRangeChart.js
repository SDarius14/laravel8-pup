var ctx = document.getElementById("gradeRangeChart").getContext("2d");

var data = {
    labels: ["75-80", "81-85", "86-90", "91-95", "96-100"],
    datasets: [
        {
            label: "Grade Range",
            data: [10, 20, 30, 25, 15], // Mock data for the number of students in each grade range
            backgroundColor: ["blue", "green", "yellow", "orange", "red"], // Colors for each grade range
        },
    ],
};

var options = {
    responsive: true,
    scales: {
        x: {
            display: true,
            title: {
                display: true,
                text: "Grade Ranges",
            },
        },
        y: {
            display: true,
            title: {
                display: true,
                text: "Number of Students",
            },
        },
    },
};

var myBarChart = new Chart(ctx, {
    type: "bar",
    data: data,
    options: options,
});
