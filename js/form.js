function handleForm() {
    const formElement = document.getElementById('updateForm');
    formElement.setAttribute('style', 'display: block');
    formElement.reset();
    const successElement = document.getElementById('success');
    successElement.setAttribute('style', 'display: none');
};

(() => {
    setTimeout(() => {
        document.getElementById('updateForm').addEventListener('submit', (event) => {
            event.preventDefault();
            const form = new FormData(event.target);
            const data = {
                first_name: form.get('first_name'),
                last_name: form.get('last_name'),
                mobile: form.get('mobile'),
                org: form.get('org'),
                designation: form.get('designation'),
                industry: form.get('industry'),
                email: form.get('email'),
            }
            fetch('https://0trpw062b3.execute-api.ap-south-1.amazonaws.com/test/api/v2/get-updates',
                {
                    method: 'post',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    },
                }).then(response => {
                const formElement = document.getElementById('updateForm');
                formElement.setAttribute('style', 'display: none');
                const successElement = document.getElementById('success');
                successElement.setAttribute('style', 'display: block; text-align: center;');
                formElement.reset();
            }).catch(err => console.error(err));
        });
    }, 1000);
})();
