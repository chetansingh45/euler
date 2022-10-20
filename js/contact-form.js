document.getElementById('kontaktForm').addEventListener('submit', (event) => {
    event.preventDefault();
    const form = new FormData(event.target);
    const data = {
        name: form.get('name'),
        mobile: form.get('mobile'),
        enquiry_type: form.get('enquiry'),
        email: form.get('email'),
        message: form.get('message')
    }
    fetch('https://0trpw062b3.execute-api.ap-south-1.amazonaws.com/test/api/v2/contact-us',
        {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            },
        }).then(response => {
        const formElement = document.getElementById('kontaktForm');
        formElement.setAttribute('style', 'display: none');
        const successElement = document.getElementById('successKontakt');
        successElement.setAttribute('style', 'display: block; text-align: center');
        successElement.setAttribute('class', 'form-popup main-form');
        formElement.reset();
    }).catch(err => console.error(err));
});
