// function to show/hide password
function showPassword() {
    const passwordField = document.querySelector('#password');
    const showPassword = document.querySelector('#showPassword');

    if (showPassword.innerText === 'Show Password') {
        showPassword.innerText = 'Hide Password';
        passwordField.type = 'text';
    } else if (showPassword.innerText === 'Hide Password') {
        passwordField.type = 'password';
        showPassword.innerText = 'Show Password';
    }
}

// Check if logged in

// Define Variables
const login = document.querySelector('#login');
const logout = document.querySelector('#logout');
const message = document.querySelector('#message');
const h1 = document.querySelector('h1');

fetch('helper/is_logged_in.php')
    .then(res => res.json())
    .then(function (res) {
        if (res.status === 'yes') {
            login.style.display = 'none';
            logout.style.display = 'inline';
            logout.addEventListener('click', function (e) {
                e.preventDefault();
                fetch('helper/logout_ajax.php')
                    .then(res => res.json())
                    .then(function (res) {
                        if (res.status === 'success') {
                            login.style.display = 'inline-block';
                            logout.style.display = 'none';
                            message.innerHTML = '<p>You have successfully been logged out.</p>';
                            h1.innerText = 'Welcome to the Image Gallery!';
                        }
                    })
            })
        } else {
            login.style.display = 'inline-block';
            logout.style.display = 'none';
        }
    })