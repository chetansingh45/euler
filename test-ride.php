<?php
session_start();
unset($_SESSION['testride_otp']);
$page_title = 'Test Ride';
include('admin/php/helper/db.php');
use DB\DB;
$db = new DB();
include 'includes/header.php'; 
?>
<!-- Hero Banner -->
<section class="home-hero py-5" style="background-image: url(https://maryjane-assests.s3.ap-south-1.amazonaws.com/images/test-ride.png)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="heading text-white mb-3">Experience the Future</h2>
                <p class="heading-sm text-primary">Book a Test Drive <i class="fas fa-arrow-right"></i></p>
            </div>
            <div class="col-md-6">
                <div class="test-form">
                    <form class="main-form bg-white" name="testride">
                        <div class="row g-3">
                            <div class="col mb-3">
                                <label for="">Name</label>
                                <input type="name" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="col mb-3">
                                <label for="">Phone *</label>
                                <input type="tel" name="mobile" pattern="(6|7|8|9)\d{9}" title="Invalid phone number (avoid country code)" class="form-control" placeholder="Phone" minlength="10" maxlength="10" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-sm mb-3">
                                <label for="">State</label>
                                <select class="form-select form-control" aria-label="Default select example" name="state" data-world-testride="state" required>
                                    <option value="" disabled selected>Select State</option>
                                </select>
                            </div>
                            <div class="col-sm mb-3">
                                <label for="">City</label>
                                <select class="form-select form-control" name="city" data-world-testride="city" required>
                                    <option value="" disabled selected>Select City</option>
                                </select>
                            </div>
                            <div class="col-sm mb-3">
                                <label for="">Pincode</label>
                                <input type="number" class="form-control" placeholder="Pincode" name="pincode" required>
                                <small class="text-success" data-small="testride-pincode"></small>
                            </div>
                        </div>
                        <div class="row g-3 my-2">
                            <div class="col-12">
                                <label for=""><b>When are you planning to purchase the vehicle?</b></label>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="purchaseplan" id="exampleRadios1" value="Within 7 days" checked>
                                    <label class="form-check-label" for="exampleRadios1">Within 7 days</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="purchaseplan" id="exampleRadios2" value="Within a month">
                                    <label class="form-check-label" for="exampleRadios2">Within a month</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="purchaseplan" id="exampleRadios2" value="After a month">
                                    <label class="form-check-label" for="exampleRadios2">After a month</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="purchaseplan" id="exampleRadios2" value="Not decided">
                                    <label class="form-check-label" for="exampleRadios2">Not decided</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 my-2">
                            <div class="col-12">
                                <label for=""><b>Do you own any vehicle?</b></label>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vehicle_owned" id="vehicle1" value="1" checked>
                                    <label class="form-check-label" for="vehicle1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vehicle_owned" id="vehicle2" value="0">
                                    <label class="form-check-label" for="vehicle2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 my-2 vehicle_yes">
                            <div class="col-12 mb-3">
                                <label for=""><b>If Yes, previous vehicle owned type</b></label>
                                <select id="select1" class="form-select form-control" name="vehicle_owned_type" required onchange="getSelectValue(this.value);" required>
                                    <option selected value="" disabled>Select vehicle type</option>
                                    <option value="3 Wheeler">3 Wheeler</option>
                                    <option value="4 Wheeler">4 Wheeler</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-3 my-2 vehicle_yes">
                            <div class="col-sm mb-3">
                                <label for=""><b>Brand</b></label>
                                <select id="select2" class="form-select form-control other_select" name="vehicle_owned_brand" required>
                                    <option selected value="" disabled>Select brand</option>
                                    <option value="Mahindra" style="display: none">Mahindra</option>
                                    <option value="Bajaj Auto" style="display: none">Bajaj Auto</option>
                                    <option value="Tata Motor" style="display: none">Tata Motors</option>
                                    <option value="Ashok Leyland" style="display: none">Ashok Leyland</option>
                                    <option value="Maruti Suzuki" style="display: none">Maruti Suzuki</option>
                                    <option value="Piaggio" style="display: none">Piaggio</option>
                                    <option value="others" style="display: none">Others</option>
                                </select>
                                <input type="text" class="form-control others_input d-none mt-2" name="vehicle_owned_brand_other" placeholder="Other brand name" maxlength="20">
                            </div>
                            <div class="col-sm mb-3">
                                <label for=""><b>Model</b></label>
                                <select class="form-select form-control other_select" name="vehicle_owned_model" required>
                                    <option selected value="" disabled>Select model</option>
                                    <option value="Ace">Ace</option>
                                    <option value="Champion">Champion</option>
                                    <option value="Dost">Dost</option>
                                    <option value="Pickup">Pickup</option>
                                    <option value="Ape">Ape</option>
                                    <option value="others">Others</option>
                                </select>
                                <input type="text" class="form-control others_input d-none mt-2"  name="vehicle_owned_model_other" placeholder="Other model name" maxlength="30">
                            </div>
                        </div>
                        <div class="row g-3 align-items-end" data-section="testrideotp" style="display:none">
                            <div class="col mb-3">
                                <label for="">OTP</label>
                                <input type="tel" name="otp" class="form-control" placeholder="Enter OTP">
                            </div>
                            <div class="col mb-3">
                                <a href="javascript: void(0)" style="text-decoration: underline;" data-action="testride-change"><small>Change Number</small></a> &nbsp;
                                <a href="javascript: void(0)" style="text-decoration: underline;" data-action="testride-resend-otp"><small>Resend OTP</small></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                    <label class="form-check-label" for="invalidCheck">I authorise Euler Motors to contact me via SMS, Email, Whatsapp and other modes of communication.</label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-primary mb-2" type="submit" name="submit"><span>Request OTP</span></button>
                                <p class="d-block p-3 mb-0" data-message="testride"></p>
                                <input type="hidden" name="request_for" value="otp">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function getSelectValue(select1)
    {
        if(select1!='')
        {
            $("#select2 option[value='"+select1+"']").hide();
            $("#select2 option[value!='"+select1+"']").show();
        }
    }
</script>
<?php include 'includes/footer.php';?>
<script>
    getCollection('state', 'India', 'testride')
	.then(res => {
        console.log(res);
		if(res.success == 0)
		{
			reSetToken()
			.then(tokenresponse => {
				if(tokenresponse) getCollection('state', 'India', 'testride')
			})
		}
	});

    document.forms.testride.state.addEventListener('change', () => getCollection('city', false, 'testride'));
    
    document.forms.testride.vehicle_owned.forEach((vehicleowned) => {
        vehicleowned.addEventListener('click', event => {
            let status = false;
            if(event.target.value == '1') status = true;
            document.forms.testride.vehicle_owned_type.required = status;
            document.forms.testride.vehicle_owned_brand.required = status;
            document.forms.testride.vehicle_owned_model.required = status;
        })  
    })
    
    
    document.forms.testride.pincode.addEventListener('change', event => {
        document.querySelector(`small[data-small="testride-pincode"]`).innerHTML = ''
        JqueryAjax('https://api.postalpincode.in/pincode/'+event.target.value)
        .then(pincoderesult => {
            if(pincoderesult[0].Status === "Success" && pincoderesult[0].PostOffice.length > 0)
            {
                document.querySelector(`small[data-small="testride-pincode"]`).innerHTML = pincoderesult[0].PostOffice[0]['State']+', '+pincoderesult[0].PostOffice[0]['District'];
            }
        })
    })
    
    // | vehicle_owned_type |
    const brandModal = {
        '3 Wheeler': {
            'Mahindra': 'Alfa Plus/Treo Zor/others', 'Piaggio': 'Ape Xtra LDX/others', 'TVS': 'King Kargo/others', 'Bajaj': 'Maxima/others', 'others': 'others'
        },
        '4 Wheeler': {
            'Tata Motors': 'Ace/Intra/Gold/others',
            'Ashok Leyland': 'Dost/BadaDost/other', 
            'Maruti': 'Super Carry/Eeco Cargo/others', 
            'Mahindra': 'Bolero PickUp/Jeeto/MAxitruck', 
            'others': 'others'
        }
    }

    // | vehicle_owned_type |
    document.forms.testride.vehicle_owned_type.addEventListener('change', event => {
        document.forms.testride.vehicle_owned_brand.value = '';
        let options = '<option value="" selected disabled>Select brand</option>';
        for (const [key, value] of Object.entries(brandModal[event.target.value])) {
            options += `<option value="${key}">${key}</option>`;
        }
        document.forms.testride.vehicle_owned_brand.innerHTML = options;
    })

    document.forms.testride.vehicle_owned_brand.addEventListener('change', event => {
        document.forms.testride.vehicle_owned_model.value = '';
        let options = '<option value="" selected disabled>Select Model</option>';

        const modalOptions = brandModal[document.forms.testride.vehicle_owned_type.value][event.target.value].split('/');
        for (let value of modalOptions) {
          options += `<option value="${value}">${value}</option>`;
        }
        document.forms.testride.vehicle_owned_model.innerHTML = options;
    })
    
    let testrideText = "Request OTP";
    document.querySelector('a[data-action="testride-resend-otp"]').addEventListener('click', event => {
        document.forms.testride.request_for.value = 'resend';
        document.forms.testride.submit.click();
    });
    
    // | change number for OTP |
    document.querySelector('a[data-action="testride-change"]').addEventListener('click', event => {
        $('div[data-section="testrideotp"]').fadeOut();
        document.forms.testride.mobile.readOnly = false;
        document.forms.testride.request_for.value = 'otp';
        testrideText = `Request OTP`;
        document.forms.testride.submit.innerHTML = "<span>"+testrideText+"</span>";
        // document.forms.testride.submit.click();
    });
     
    
    const submitTestRide = event => {
		event.preventDefault();
		
		let dataMessage = document.querySelector('p[data-message="testride"]');
		dataMessage.innerHTML = '';
		event.target.submit.innerHTML = `<div class="spinner-grow text-dark" role="status"><span class="visually-hidden">Loading...</span></div>`;

        // Check pincode
        const pat1 = /^\d{6}$/;
        if(!pat1.test(event.target.pincode.value)) {
            showMessage({message: "Enter the valid pincode!", color: 'red'})
            event.target.submit.innerHTML = "<span>"+testrideText+"</span>";
            return false;
        }

        JqueryAjax('https://api.postalpincode.in/pincode/'+event.target.pincode.value)
        .then(pincoderesult => {
            if(pincoderesult[0].Status === "Success" && pincoderesult[0].PostOffice.length > 0)
            {
                const fd = new FormData(event.target);
                if(event.target.request_for.value === 'resend') event.target.request_for.value = 'verify';
                commonAjax({
                    page: '/php/module/other/testride.php',
                    params: fd
                })
                .then(response => {
                    event.target.submit.innerHTML = "<span>"+testrideText+"</span>";
                    snackbar({success: response.success, message: response.message});
                    
                    if(response.success)
                    {
                        if(response.request_for === 'verify')
                        {
                            event.target.request_for.value = 'verify';
                            event.target.mobile.readOnly = true
                            $('div[data-section="testrideotp"]').fadeIn();
                            testrideText = "Verify and Submit";
                            event.target.submit.innerHTML = "<span>Verify and Submit</span>";
                            showMessage({message: response.message, color: 'green'})
                            return;
                            
                        } else
                        {
                            showMessage({message: "Thank you for booking a Test Drive. We will notify you soon.", color: 'green'})
                            event.target.reset();
                            window.location.href = "./thankyou-test-ride.php?booking_id="+response.testride;
                            return;
                        }
                    }
                    showMessage({message: response.message, color: 'red'})
                })
                .catch(err => {console.log(err); event.target.submit.innerHTML = "<span>"+testrideText+"</span>";})
            } else
            {
                showMessage({message: "Enter the valid pincode!", color: 'red'})
                event.target.submit.innerHTML = "<span>"+testrideText+"</span>";
            }
        })
        .catch(err => {console.log(err); event.target.submit.innerHTML = "<span>"+testrideText+"</span>";})

        function showMessage(m) {
            if(m.color === 'green') {
		        dataMessage.classList.add('bg-light-blue');
		        dataMessage.classList.remove('bg-danger');
		    } else
		    {
		        dataMessage.classList.add('bg-danger');
		        dataMessage.classList.remove('bg-light-blue');
		    }
            dataMessage.innerHTML = m.message;
        }
	}
	document.forms.testride.addEventListener("submit", submitTestRide);
</script>
