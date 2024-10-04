function showMemberInfo(name, role, image, age, birthday, sex) {
    document.getElementById('modal-name').innerText = name;
    document.getElementById('modal-role').innerText = 'Role: ' + role;
    document.getElementById('modal-image').src = image;
    document.getElementById('modal-age').innerText = 'Age: ' + age;
    document.getElementById('modal-birthday').innerText = 'Birthday: ' + birthday;
    document.getElementById('modal-sex').innerText = 'Sex: ' + sex;

    document.getElementById('member-modal').style.display = 'block';
}

function closeModal() {
    document.getElementById('member-modal').style.display = 'none';
}

function closeContactModal() {
    document.getElementById('contact-modal').style.display = 'none';
}

document.getElementById('contact-button').addEventListener('click', function() {
    document.getElementById('contact-modal').style.display = 'block';
});

window.onclick = function(event) {
    if (event.target === document.getElementById('member-modal')) {
        closeModal();
    } else if (event.target === document.getElementById('contact-modal')) {
        closeContactModal();
    }
};

document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('contact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('form-response').innerText = data.message;
        if (data.status === 'success') {
            this.reset();
        }
    })
    .catch(error => {
        document.getElementById('form-response').innerText = 'An error occurred. Please try again.';
    });
});
