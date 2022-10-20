const snackbar = (m) => {
    const { success, message } = m
    if (message === '' || message === undefined) return;
    let x = document.getElementById("snackbar");
    x.innerHTML = message;
    x.style.backgroundColor = success ? "#32502E" : "#FF5C58";
    x.className = "show";
    setTimeout(function () { x.className = x.className.replace("show", ""); }, 3000);
}

//alert snackbar
const snackbarMod = (alert_type, status, msg) => {

    const snackbar_elem = document.createElement('div');
    snackbar_elem.id = 'snackbar'
    snackbar_elem.className = 'show';

    const alert_elem = `<div class='alert alert-${alert_type} alert-dismissible fade show' role='alert'><strong>${status}! </strong>${msg}</div>`;
    snackbar_elem.innerHTML = alert_elem;
    document.body.appendChild(snackbar_elem);

    setTimeout(function () {
        document.body.removeChild(snackbar_elem)
    }, 4000);
}

const changeStatus = (page_name, section_id, section_status) => {
    let status = section_status.checked ? '1' : '0';
    fetch(`ajax-request.php?page_name=${page_name}&section_id=${section_id}&section_status=${status}`).then(response => response.json()).then((data) => {
        if (data.status == "success") {
            snackbarMod("primary", "Success", data.msg);
        } else {
            snackbarMod("danger", "Failed", data.msg);
        }
    });
}


const commonAjax = (o) => {

    const { page, params, type, header, addonUrl, cors } = o;

    const customHeader = new Headers();
    // customHeader.append("Content-Type", "application/json");
    customHeader.append("Accept", "application/json");
    customHeader.append("Access-Control-Allow-Origin", "*")
    customHeader.append('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'))

    const method = type || 'POST';
    let url = addonUrl || 'http://localhost/euler-new1';
    let request = url + page;
    const raw = params || '';
    const myHeaders = header || customHeader;
    const corspolicy = cors || 'cors'
    request = request.replace(/&amp;/g, '&')
    var requestOptions = {
        method: method,
        headers: myHeaders,
        body: raw,
        mode: corspolicy
    };

    if (method === 'GET') { delete requestOptions['body']; }

    const myPromise = new Promise(function (myResolve, myReject) {
        fetch(request, requestOptions)
            .then(response => response.json())
            .then(response => myResolve(response))
            .catch(error => {
                console.log(error);
                return myReject({ "success": false });
            });
    });
    return myPromise;
}

const JqueryAjax = async (page) => {
    const rawResponse = await $.ajax({
        url: page,
        type: 'GET',
        dataType: 'json',
        async: true,
    })
    let temp = await rawResponse;
    return temp;
}

/*
State City API
==================== */
const reSetToken = async () => {
    const myHeaders = new Headers();
    myHeaders.append("api-token", "cMa6_xhAPb2CgE5CiSdb2eLupuJNwQRfwqfnzILgKswRo96bBRQ4WBZI4zQiF9MMi7I");
    myHeaders.append("Accept", "application/json")
    myHeaders.append('user-email', 'anku.pathak@webeesocial.com')
    return await commonAjax({
        page: '/api/getaccesstoken',
        header: myHeaders,
        addonUrl: 'https://www.universal-tutorial.com',
        type: 'GET'
    })
        .then(response => {
            localStorage.setItem("access-token", response.auth_token);
            // getCollection(n)
            return true;
        })
        .catch(err => { localStorage.removeItem("access-token"); return false; })
}

let flag = 0;
let reset = 0;
const getCollection = (n, p, prop) => {

    const myPromise = new Promise(function (myResolve, myReject) {
        if (reset > 10) return myResolve({ "success": 1 });
        if (!localStorage.getItem("access-token")) {
            // reSetToken(n);
            return myResolve({ "success": 0 });
        } else {
            let url = '';
            if (n === 'country') url = 'countries/'
            else if (n === 'state') url = `states/${(p === false ? document.querySelector(`select[data-world-${prop}="country"]`).value : p)}`
            else if (n === 'city') url = `cities/${(p === false ? document.querySelector(`select[data-world-${prop}="state"]`).value : p)}`

            if (url === '') return;

            const myHeaders = new Headers();
            myHeaders.append("Authorization", `Bearer ${localStorage.getItem("access-token")}`);
            myHeaders.append("Accept", "application/json")
            commonAjax({
                page: url,
                header: myHeaders,
                addonUrl: 'https://www.universal-tutorial.com/api/',
                type: 'GET'
            })
                .then(response => {
                    if (response?.error) {
                        // reSetToken(n);
                        reset++
                        return myResolve({ "success": 0 });
                    }
                    let collection = "";
                    if (n === 'country') {
                        collection = "<option selected disabled>Select Country</option>";
                        for (let i = 0; i < response.length; i++) collection += `<option value="${response[i].country_name}">${response[i].country_name}</option>`;
                        document.querySelector(`select[data-world-${prop}="country"]`).innerHTML = collection;
                        return myResolve({ "success": 200 })
                    } else if (n === 'state') {
                        collection = "<option selected disabled>Select State</option>";
                        for (let i = 0; i < response.length; i++) collection += `<option value="${response[i].state_name}">${response[i].state_name}</option>`;
                        document.querySelector(`select[data-world-${prop}="state"]`).innerHTML = collection;
                        return myResolve({ "success": 200 })
                    }
                    else if (n === 'city') {
                        collection = "<option selected disabled>Select City</option>";
                        for (let i = 0; i < response.length; i++) collection += `<option value="${response[i].city_name}">${response[i].city_name}</option>`;
                        document.querySelector(`select[data-world-${prop}="city"]`).innerHTML = collection;
                        return myResolve({ "success": 200 })
                    }

                })
                .catch(err => { reset++; return myResolve({ "success": 0 }) })
        }
    });
    return myPromise;
}


//download data in excel format
function ExportToExcel(fileName = 'untitled') {
    var elt = document.getElementById('tableList');
    var wb = XLSX.utils.table_to_book(elt, {
        sheet: "sheet1"
    });
    XLSX.write(wb, {
        bookType: 'xlsx',
        type: 'base64',
        bookSST: true,
    });
    XLSX.writeFile(wb, `${fileName}`);
}

/////s3 images

function copyToClipboard(text) {
    var sampleTextarea = document.createElement("textarea");
    document.body.appendChild(sampleTextarea);
    sampleTextarea.value = text; //save main text in it
    sampleTextarea.select(); //select textarea contenrs
    document.execCommand("copy");
    document.body.removeChild(sampleTextarea);
    
    swal({
        title: "Copied!",
        text: text,
        type: "success",
        timer: 1000
    });
}

// function get_s3_images(){
//     $.get("s3_handle.php?action=get_images",function(data){
//         data = JSON.parse(data);
//         show_images(data)
//     })
// }

$(document).ready(function () {
    $.get("s3_handle.php?action=get_images", function (data) {
        data = JSON.parse(data);
        s3_images = data;
        let gallery = '';
        for (x in s3_images) {
            gallery += `<figure class="col-xl-2 col-md-4 col-6">
                            <div class="gellery_img" >
                                <img class="img-thumbnail" src="${s3_images[x]}" itemprop="thumbnail" >
                                <div class="copy_img" data-url="${s3_images[x]}" onclick="copy_image_url('${s3_images[x]}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                                        <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
                                        <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
                                    </svg>
                                </div>
                            </div>
                            <figcaption itemprop="caption description">Image caption 12</figcaption>
                        </figure>`;
        }
        $(".modal_gallery").append(gallery)
    })
})

function copy_image_url(path) {
    $("#temp_input").val(path);
    var copyText = $("#temp_input");
    copyText.select();
    navigator.clipboard.writeText(copyText.val());
    let s3_image = localStorage.getItem('s3_image')
    let ino = document.querySelectorAll(`[temp_rand_number='${s3_image}']`);
    $(ino).val(path)

    swal({
        title: "Copied!",
        text: path,
        type: "success",
        timer: 1000
    });
    $('#gellery_modal').modal('hide');
}

$(".open_gallery").click(function () {
    let selected_input = $(this).parent().find('input');
    let temp_rand_number = Math.floor((Math.random() * 100000000) + 1);
    $(selected_input).attr('temp_rand_number', temp_rand_number);
    localStorage.setItem("s3_image", temp_rand_number)
    $("#gellery_modal").modal('show');
})

