const form = document.getElementById('form');
const inputName = document.getElementById('name');
const inputNumber = document.getElementById('number');
const inputEmail = document.getElementById('email');
const inputMessage = document.getElementById('message');

form.addEventListener('submit', (e) => {
    let hasErrors = validateInputs();

    if (hasErrors) {
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
};

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
};

const isValidNumber = value => {
    const numberRegex = /^\s*\d+\s*$/;
    return numberRegex.test(value);
};

const validateInputs = () => {
    let hasErrors = false;
    const nameValue = inputName.value.trim();
    const numberValue = inputNumber.value.trim();
    const emailValue = inputEmail.value.trim();
    const messageValue = inputMessage.value.trim();

    if (nameValue === '') {
        setError(inputName, 'Name is required!');
        hasErrors = true;
    } else {
        setSuccess(inputName);
    }

    if (emailValue === '') {
        setError(inputEmail, 'Email is required!');
        hasErrors = true;
    } else if (!isValidEmail(emailValue)) {
        setError(inputEmail, 'Provide a valid email address!');
        hasErrors = true;
    } else {
        setSuccess(inputEmail);
    }

    if (!numberValue) {
        setError(inputNumber, 'Number is required!');
        hasErrors = true;
    } else if (!isValidNumber(numberValue)) {
        setError(inputNumber, 'This field should only contain numbers');
        hasErrors = true;
    } else {
        setSuccess(inputNumber);
    }

    if (!messageValue) {
        setError(inputMessage, 'Please leave your message!');
        hasErrors = true;
    } else if (messageValue.length < 20) {
        setError(inputMessage, 'Your message must be at least 20 characters!');
        hasErrors = true;
    } else {
        setSuccess(inputMessage);
    }

    return hasErrors;
};
