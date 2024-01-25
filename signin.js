    const form = document.getElementById('form');
    const username = document.getElementById('username');
    const password = document.getElementById('password');

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
        hasErrors=true;
    };

    const setSuccess = element => {
        const inputControl = element.parentElement;
        const errorDisplay = inputControl.querySelector('.error');

        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    };

    const validateInputs = () => {
        const usernameValue = username.value.trim();
        const passwordValue = password.value.trim();
        let hasErrors = false

        if (usernameValue === '') {
            setError(username, 'Username is required!');
            hasErrors = true
        } else {
            setSuccess(username);
            hasErrors = false
        }

        if (passwordValue === '') {
            setError(password, 'Password is required!');
            hasErrors = true
        } else if (passwordValue.length < 8) {
            setError(password, 'Password must be at least 8 characters!');
            hasErrors = true
        } else {
            setSuccess(password);
            hasErrors = false
        }
        console.log(hasErrors)
        return hasErrors;
    };
