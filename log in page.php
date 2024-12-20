<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    display: flex;
    width: 1940px auto;
    height: 980px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.left-section {
    width: 50%;
    background-color: white;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 20px;
}

.left-section .icon {
    font-size: 50px;
    margin-bottom: 10px;
}

.left-section h1 {
    font-size: 30px;
    font-weight: bold;
    margin-bottom: 10px;
    line-height: 1.2;
}

.left-section p {
    font-size: 16px;
    color: #555;
}

.right-section {
    background-color: #d4e7f7;
    flex: 1;
    padding: 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.right-section h2, p{
    padding-left: 80px;
}

.login-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    max-width: 500px;
    padding-left: 80px;
    padding-top: 50px;
}

.login-form h2 {
    font-size: 20px;
    margin-bottom: 20px;
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: normal;
}

.login-form label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.login-form input {
    width: 100%;
    height: 30px;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-radius: 20px;
    background-color: #a2c1e1;
    color: white;
    font-size: 18px;
}

.login-form input::placeholder {
    color: #e5f1fa;
}

.forgot-link {
    font-size: 12px;
    color: #888;
    text-align: right;
    text-decoration: underline;
    margin-top: -10px;
}

.login-form button {
    width: 50%;
    height: 15%;
    padding: 10px;
    background-color: #005b9a;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-form button:hover {
    background-color: #004175;
}

.new-admin-link {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 15px;
    color: #005b9a;
    text-decoration:underline;
    font-weight: bold;
}

.powered-by {
    position: absolute;
    bottom: 20px;
    left: 20px;
    font-size: 12px;
    position: absolute;
    top: 20px;
    left: 10px;

}

.powered-by img {
    width: 30px;
    height: auto;
    margin-left: 10px;
    margin-top: -3px;
    position:inherit;
}
footer {
    text-align: center;
    font-size: 12px;
    margin: 10px 0;
}

footer span {
    font-weight: bold;
    text-transform: uppercase;
}

</style>
<body>
    <div class="container">
        <div class="left-section">
            <div class="Upper-left">
                <p class="powered-by">POWERED BY: <img src="Topline_LOGO.png" alt="Company Logo"></p>
            </div>
            <div class="logo">
                <img src="Bus LOGO.png" alt="Bus Logo" class="logo-img">
                <h1>Online Bus Ticket-Booking</h1>
            </div>
        </div>
        <div class="right-section">
        <h2>Welcome, Admin!</h2>
            <p>Here are the latest updates and tools to manage the system efficiently.</p>
            <form class="login-form">
                <label for="username">USERNAME:</label>
                <input type="text" id="username" name="username" placeholder="E.g. ADMIN00123232">
                
                <label for="password">PASSWORD:</label>
                <input type="password" id="password" name="password" placeholder="Enter Password">

                
                <a href="#" class="forgot-link">Forgot Password?</a>
                <button type="submit">LOG IN</button>
            </form>
            <a href="#" class="new-admin-link">+ ADD NEW ADMIN</a>
        </div>
    </div>
    <footer>
        <p>© 2024. All rights reserved | Design by <span>Power Puff Girls</span></p>
    </footer>
    </div> <!-- end of container-->
</body>
</html>
