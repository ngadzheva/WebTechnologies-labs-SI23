(function () {
    /**
     * Get the login button
     */
    var login = document.getElementById('login');

    /**
     * Listen for click event on the login button
     */
    login.addEventListener('click', sendForm);
})();

/**
 * Handle the click event by sending an asynchronous request to the server
 * @param {*} event
 */
function sendForm(event) {
    /**
     * Prevent the default behavior of the clicking the form submit button
     */
     event.preventDefault();

    /**
     * Get the values of the input fields
     */
    var userName = document.getElementById('user-name').value;
    var password = document.getElementById('password').value;
    var rememberMe = document.getElementById('remember-me').checked;

    /**
     * Create an object with the user's data
     */
    var user = {
        userName,
        password,
        remember: rememberMe
    };

    console.log(rememberMe);

    /**
     * Send POST request with user's data to api.php/login
     */
    var options = {
        method: 'POST',
        data: `data=${JSON.stringify(user)}`
    }
    sendRequest('./src/login.php', options, load, handleError)
}

/**
 * Handle the received response from the server
 * If there were no errors found on validation, the index.html is loaded.
 * Else the errors are displayed to the user.
 * @param {*} response
 */
function load(response) {
    var errorLabel = document.getElementById('errors');
    errorLabel.style.display = 'none';

    window.location = './index.html';
}

function handleError(errors) {
    var errorLabel = document.getElementById('errors');
    errorLabel.innerHTML = '';
    errors.forEach(function (error) {
      errorLabel.innerHTML += ' ' + error;
    });
    errorLabel.style.color='red';
    errorLabel.style.display = 'block';
}