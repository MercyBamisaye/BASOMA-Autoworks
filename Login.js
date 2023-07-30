function login() {
    // Fetch the input values
    const usernameOrEmail = document.getElementById("usernameOrEmail").value;
    const password = document.getElementById("password").value;

    // In a real-world scenario, you would send this data to the server for authentication
    // Here, we just show a simple alert with the entered values
    alert(`Username/Email: ${usernameOrEmail}\nPassword: ${password}`);
}

function redirectTo(url) {
    // Redirect the user to the specified URL
    window.location.href = url;
}