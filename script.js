document.addEventListener("DOMContentLoaded", function () {
    // Listen for form submission
    const form = document.getElementById("contactForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Create a FormData object to send data via AJAX
        const formData = new FormData(form);

        // Send form data to the server using Fetch API
        fetch("insert.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.text())
            .then((data) => {
                // Check server response for success or error
                if (data.includes("Contact added successfully")) {
                    alert("Your data has been inserted successfully!");
                    form.reset(); // Reset the form fields
                    window.location.href = "home.html"; // Redirect to home page
                } else {
                    alert("Error: " + data);
                }
            })
            .catch((error) => {
                alert("An error occurred: " + error.message);
            });
    });
});
