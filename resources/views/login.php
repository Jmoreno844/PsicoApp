<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../resources/css/app.css">

</head>

<body>


<div class="container">
    <h2>Login</h2>
    <form id="loginForm"  method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required style="width: 90%;" autocomplete="username">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required style="width: 90%;" autocomplete="current-password">

        <button type="button" onclick="submitForm()">Login</button>
    </form>

<form action="create_account" method="get">
<button type="submit" class="create-account-button">Create Account</button>
</form>
</div>

<script>
function submitForm() {
    // Collect form data
    var formData = $("#loginForm").serialize();

    // Send AJAX request
    $.ajax({
    type: "POST",
    url: "../resources/php/login_method.php",
    data: formData,
    dataType: "json", // Expecting JSON response
    success: function(response) {
        console.log(response);
        if (response.status === "success") {
            // Redirect or perform actions for a successful login
            window.location.href = "account"; // Change the URL accordingly
        } else {
            // Handle unsuccessful login
            alert("Login failed. " + response.message);
        }
    },
    error: function(jqXHR, textStatus, errorThrown) {
    // Handle the AJAX request error
    alert("Error submitting the form.\n" +
          "Status: " + textStatus + "\n" +
          "Error: " + errorThrown);
}
});

}
</script>

</body>

</html>