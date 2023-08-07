function getStarted() {
    // Fetch the input values
    const firstName = document.getElementById("firstName").value;
    const lastName = document.getElementById("lastName").value;
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // In a real-world scenario, you would send this data to the server for registration
    // Here, we just show a simple alert with the entered values
    alert(`First Name: ${firstName}\nLast Name: ${lastName}\nUsername: ${username}\nEmail: ${email}\nPassword: ${password}`);
}

function redirectTo(url) {
    // Redirect the user to the specified URL
    window.location.href = url;
}
