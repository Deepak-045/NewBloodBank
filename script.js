function validateForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let bloodType = document.getElementById('blood-type').value;
    let phone = document.getElementById('phone').value;

    if (!name || !email || !bloodType || !phone) {
        alert("All fields are required!");
        return false;
    }

    return true;
}
