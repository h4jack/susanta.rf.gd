export const isValidName = (name) => {
    return name.length < 50;
}

export function isValidEmail(email) {
    if (email.length < 6 || email.length > 50) {
        return false;
    }
    const pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Basic email format validation
    return pattern.test(email);
}

export function isValidUsername(username) {
    // Check length constraints
    if (username.length < 3 || username.length > 30) {
        return false;
    }

    // Regular expression pattern to match the criteria:
    // - Starts with a lowercase letter
    // - Contains only lowercase letters, numbers, underscores, and periods
    // - No consecutive periods
    // - Length is already checked before this pattern
    const pattern = /^[a-z](?:[a-z0-9_]*(?:\.[a-z0-9_]+)*)?$/;

    return pattern.test(username);
}

export function isValidPhone(number) {
    // Define a regex pattern for phone numbers with country code
    const pattern = /^\+(?:\d{1,4})\s?\d{4,15}$/;

    // Test the phone number against the pattern
    return pattern.test(number);
};



export function isValidPassword(password, email = null) {
    // Define error messages
    const errors = [];

    // Check length
    if (password.length < 8 || password.length > 64) {
        errors.push("Password must be between 8 and 64 characters.");
    }

    // Check if password matches the email or contains parts of the email
    if (email && (password.toLowerCase() === email.toLowerCase())) {
        errors.push("Password must not match or contain parts of the email.");
    }

    // Check for required character types
    if (!/[a-z]/.test(password)) {
        errors.push("Password must contain at least one lowercase letter.");
    }
    if (!/[A-Z]/.test(password)) {
        errors.push("Password must contain at least one uppercase letter.");
    }
    if (!/[0-9]/.test(password)) {
        errors.push("Password must contain at least one number.");
    }
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        errors.push("Password must contain at least one special character.");
    }

    // Return false if no errors, otherwise return the error messages
    return errors.length === 0 ? false : errors.join(`
`);
}

export const showError = (object, message = null, type = null) => {
    object.style.display = 'block';
    object.innerText = (message === null) ? object.innerText : message;
    if (type !== null) {
        object.classList.remove("warning")
        object.classList.remove("positive")
        object.classList.remove("error")
        object.classList.add(type);
    }
};


export const hideError = (object) => {
    object.style.display = 'none';
}