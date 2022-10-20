document.getElementById('hiLoadLaunchForm').addEventListener('submit', (event) => {
    event.preventDefault();
    const form = new FormData(event.target);
    const data = {
        name: form.get('name'),
        mobile: form.get('mobile'),
        org: form.get('org'),
        email: form.get('email'),
        designation: form.get('designation')
    }
    fetch('https://0u5hre4gwf.execute-api.ap-south-1.amazonaws.com/prod/api/register-for-hiload-launch',
        {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            },
        }).then(response => {
        const formElement = document.getElementById('hiLoadLaunchForm');
        formElement.setAttribute('style', 'display: none');
        const title = document.getElementById('hiLoadRegisterTitle');
        title.setAttribute('style', 'display: none');
        const successElement = document.getElementById('successHiLoad');
        successElement.setAttribute('style', 'display: block; text-align: center');
        formElement.reset();
    }).catch(err => console.error(err));
});
