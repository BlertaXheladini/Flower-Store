const form = document.getElementById('form');
const name = document.getElementById('name');
const number = document.getElementById('number');
const email = document.getElementById('email');
const message = document.getElementById('message');

form.addEventListener('submit', e => {
    e.preventDefault();
    validateInputs();
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
    return numberRegex.test(number);
};

const validateInputs = () => {
    const nameValue = name.value.trim();
    const numberValue = number.value.trim();
    const emailValue = email.value.trim();
    const messageValue = message.value.trim();

    if (nameValue === '') {
        setError(name, 'Name is required');
    } else {
        setSuccess(name);
    }

    if (emailValue === '') {
        setError(email, 'Email is required');
    } else if (!isValidEmail(emailValue)) {
        setError(email, 'Provide a valid email address');
    } else {
        setSuccess(email);
    }

    if(numberValue === ''){
        setError(number, 'Number is required');
    }else if(!isValidNumber(numberValue)){
        setError(number,'This field should only contain numbers');
    }else{
        setSuccess(number);
    }

    if (messageValue === '') {
        setError(message, 'Please leave your message!');
    } else if (messageValue.length < 20) {
        setError(message, 'Your message must be at least 20 characters');
    } else {
        setSuccess(message);
    }
};
