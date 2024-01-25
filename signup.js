const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

form.addEventListener('submit', (e) => {
    const x = validateInputs()
    if (x) {
        e.preventDefault(); 
    } else {
        console.log('Form submitted successfully!');
    }
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success');
    hasErrors = true
};

const setSuccess = (element) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
    
};

const isValidEmail = (email) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
};

const validateInputs = () => {
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    let hasErrors = false

    if (usernameValue === '') {
        setError(username, 'Username is required!');
        hasErrors = true
    } else {
        setSuccess(username);
        hasErrors = false
    }

    if (emailValue === '') {
        setError(email, 'Email is required');
        hasErrors = true
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address!');
        hasErrors = true
    } else {
        setSuccess(email);
        hasErrors = false
    }

    if (passwordValue === '') {
        setError(password, 'Password is required');
        hasErrors = true
    } else if (passwordValue.length < 8) {
        setError(password, 'Password must be at least 8 characters!');
        hasErrors = true
    } else {
        setSuccess(password);
        hasErrors = false
    }

    if (password2Value === '') {
        setError(password2, 'Please confirm your password!');
        hasErrors = true
    } else if (password2Value !== passwordValue) {
        setError(password2, 'Passwords do not match!');
        hasErrors = true
    } else {
        setSuccess(password2);
        hasErrors = false
    }

    console.log(hasErrors)
    return hasErrors;
};