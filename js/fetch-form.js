fetch("./update-modal.html")
    .then(response => {
        return response.text()
    })
    .then(data => {
        document.querySelector("updateForm").innerHTML = data;
    });
