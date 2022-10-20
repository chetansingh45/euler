<?php 
include('admin/php/helper/db.php');
use DB\DB;
$db = new DB();
/*
|Validating and fetching Product
================================= */
$metaData = false;
if(!(isset($_GET['product']))) header("Location: ./book-now.php");
$product_id = $db->input($_GET['product']);
$res = $db->db("select id, reference_id, name, sku_name, selling_price, image_url from product_sku where reference_id = '$product_id'");
if(mysqli_num_rows($res) === 0) header("Location: ./book-now.php");
$product = mysqli_fetch_assoc($res);

$page_title = 'Checkout';
$page_description = "Checkout";
include 'includes/header.php'; 
?>
<!-- Hero Banner -->
<section class="bg-dark sec-space">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center wow zoomIn">
				<h2 class="hero-title text-primary">Checkout</h2>
			</div>
		</div>
	</div>
</section>
<!-- Checkout -->
<section class="sec-space">
    <div class="container">
        <form name="billing">
            <input type="hidden" name="product" value="<?php echo $product['reference_id']; ?>">
            <div class="row">
                <div class="col-md-7 mb-4 mb-md-0">
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="checkout-form-box">
                                <h4 class="text-md text-dark">Choose your location</h4>
                                <label>State<span class="text-danger">*</span></label>
                                <select class="form-control sel-state" name="state" data-world-billing="state" required>
                                    <option value="" disabled selected>-- Select State --</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Haryana">Haryana</option>
                                </select>
                                <div class="status-card others-status">
                                    <small>We haven’t launched in your city yet. However you can be amongst the first ones in the city to own an Euler HiLoad by booking now &amp; reserving your place. Meanwhile we’ll keep you posted on the timelines.</small>
                                </div>
                                <div class="others-status">
                                    <label class="mt-3">City<span class="text-danger">*</span></label>
                                    <select id="other" class="form-control" name="city" data-world-billing="city" required>
                                        <option value="" disabled selected>-- Select City --</option>
                                        <option value="Delhi" data-state-from="Delhi">Delhi</option>
                                        <option value="Gurgaon" data-state-from="Haryana">Gurgaon</option>
                                    </select>
                                </div>
                                <div class="others-status">
                                    <label class="mt-3">Showroom<span class="text-danger">*</span></label>
                                    <select class="form-control" name="showroom" id="" required>
                                        <option value="" disabled selected>-- Select Showroom --</option>
                                        <option value="Delhi" data-state-from="Delhi">Okhla</option>
                                        <option value="Delhi" data-state-from="Delhi">Govindpuri</option>
                                        <option value="Delhi" data-state-from="Delhi">Azadpur</option>
                                        <option value="Haryana" data-state-from="Haryana">Sector 17A</option>
                                    </select>
                                </div>
                                
                                <div class="others-status">
                                    <label class="mt-3">Pincode<span class="text-danger">*</span></label>
                                    <input type="text" name="pincode" placeholder="Enter Pincode" required class="form-control">
                                    <small class="text-success" data-small="billing-pincode"></small>
                                </div>
                                
                                
                                <div class="others-status">
                                    <label class="mt-3 d-flex">Finance Required<span class="text-danger">*</span></label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="finance" id="inlineRadio1" value="1" required>
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="finance" id="inlineRadio2" value="0" selected required>
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                    <small data-small="finance" style="display: none;">Please contact at <a href="tel:+919953093075"><span>+91 99530 93075</span></a></small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-3 mb-md-0">
                            <div class="checkout-form-box">
                                <h4 class="text-md text-dark">Enter Your Contact Details</h4>
                                <label>Email Address<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="Enter Email Address" name="email" required>
                                <p class="mt-2 mb-0"><small><b>Note:</b> Your order will be linked to this email ID and you’ll receive all your order related information on this email address. We recommend you to use your active personal email ID to avoid a case of order transfer in the future.</small></p>
                                <label class="mt-3">Confirm Email Address<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="Enter Email Address" name="confirmemail" required>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="mt-3">First Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mt-3">Last Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                <label class="mt-3">Phone Number<span class="text-danger">*</span></label>
                                <input type="tel" name="phone" pattern="(6|7|8|9)\d{9}" title="Invalid phone number (avoid country code)" class="form-control" placeholder="Enter Phone Number" minlength="10" maxlength="10" required>

                                <div class="row mt-3 align-items-end" style="display: none" data-section="billing-otp">
                                    <div class="col mb-3">
                                        <label for="">OTP</label>
                                        <input type="tel" name="otp" class="form-control" placeholder="Enter OTP">
                                        <input type="hidden" name="request_for" value="otp">
                                    </div>
                                    <div class="col mb-3">
                                        <a href="javascript: void(0)" style="text-decoration: underline;" data-action="billing-change"><small>Change Number</small></a> &nbsp;
                                        <a href="javascript: void(0)" style="text-decoration: underline;" data-action="billing-resend-otp"><small>Resend OTP</small></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="checkout-box">
                        <h4 class="text-md text-primary">Booking Summary</h4>
                        <hr class="bg-grey-black">
                        <div class="check-pro-img"><img src="<?php echo APP_URL.$product['image_url'] ?>"></div>
                        <div class="order-summary-detail-wrap">
                            <div class="order-summary-detail first">
                                <span><?php echo $product['name'].' '.$product['sku_name']; ?></span>
                                <span class="mt-2">Quantity: <b>1</b></span>
                            </div>
                            <div class="order-summary-detail second align-items-end text-right">
                                <div class="pro-price">
                                    <label class="actual-price">₹<?php echo BOOKING_AMOUNT ?></label>
                                </div>
                                <span>Fully refundable</span>
                            </div>
                        </div>
                        <hr class="bg-grey-black">
                        <div class="order-delivery">
                            <label class="mb-0">Delivery Timeline of <?php echo $product['name'].' '.$product['sku_name']; ?></label>
                            <span class="js-delivery-timeline align-items-end text-right">
                                <span class="delivery-placeholder" style="color:red"><sup>*</sup> Pincode required</span>
                            </span>
                        </div>
                        <hr class="bg-grey-black">
                        <div class="order-delivery-notes">
                            <ul class="list-style">
                                <li>You can select your preferred ownership model and mode of payment for your HiloadX or HiloadXR at the time of purchase.</li>
                            </ul>
                        </div>
                        <hr class="bg-grey-black">
                        <div class="order-accept">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" required>
                                    <span class="label-copy">I agree to the</span>
                                </label>
                                <a href="#" class="text-grey text-t-c" data-toggle="modal" data-target="#priceterms">Terms &amp; Conditions</a>
                            </div>
                        </div>
                        <div class="order-btn-wrapper mt-3 mt-md-4">
                            <button type="submit" name="submit" id="updateUserProfile" class="btn btn-white w-100" data-action="payment"><span>Proceed and Pay</span></button>
                            <!-- <button type="submit" id="updateUserProfile" class="btn btn-white w-100"><span>Proceed and Pay</span></button> -->
                            <p class="mb-0 mt-3 mb-2"><small>Trouble booking? Reach out to us at <a href="tel:+91 99530 93075" class="text-grey">+91 99530 93075</a></small></p>
                            <p class="d-block p-3 mb-0 text-dark" data-message="billing"></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php include 'includes/footer.php';?>
<script type="application/javascript" src="https://securegw.paytm.in/merchantpgpui/checkoutjs/merchants/<?php echo MID_STAGING; ?>.js"></script>
<script>
    // | Country Api |
//     getCollection('state', 'India', 'billing')
// 	.then(res => {
// 		if(res.success == 0)
// 		{
// 			reSetToken()
// 			.then(tokenresponse => {
// 				if(tokenresponse) getCollection('state', 'India', 'billing')
// 			})
// 		}
// 	});
	document.forms.billing.state.addEventListener('change', (event) => {
	    document.forms.billing.city.value = ''
	    document.forms.billing.showroom.value = ''
	    let options = document.forms.billing.city.options
	    for(let op of options) if(op.value != '') op.style.display = event.target.value === op.getAttribute('data-state-from') ? "block" : 'none'
	    
	    options = document.forms.billing.showroom.options
	    for(let op of options) if(op.value != '') op.style.display = event.target.value === op.getAttribute('data-state-from') ? "block" : 'none'
	});
	
	// | Pincode Check | 
	document.forms.billing.pincode.addEventListener('change', event => {
        document.querySelector(`small[data-small="billing-pincode"]`).innerHTML = ''
        JqueryAjax('https://api.postalpincode.in/pincode/'+event.target.value)
        .then(pincoderesult => {
            if(pincoderesult[0].Status === "Success" && pincoderesult[0].PostOffice.length > 0)
            {
                document.querySelector(`small[data-small="billing-pincode"]`).innerHTML = pincoderesult[0].PostOffice[0]['State']+', '+pincoderesult[0].PostOffice[0]['District'];
                $(".delivery-placeholder").html('');
            }
        })
    })
    
    // | Paytm Gateway | 	
    function onScriptLoad(data){
        var config = {
            "root": "",
            "flow": "DEFAULT",
            "data": data,
            "handler": {
            "notifyMerchant": function(eventName,data){
                console.log("notifyMerchant handler function called");
                console.log("eventName => ",eventName);
                console.log("data => ",data);
            } 
            }
        };
        if (window.Paytm && window.Paytm.CheckoutJS) {
                // initialze configuration using init method
                window.Paytm.CheckoutJS.init(config).then(function onSuccess() {
                    // console.log('Before JS Checkout invoke');
                    // after successfully update configuration invoke checkoutjs
                    window.Paytm.CheckoutJS.invoke();
                }).catch(function onError(error) {
                    console.log("Error => ", error);
                });
            }
    }
    document.forms.billing.finance.forEach(fce => {
        fce.addEventListener('click', event => {
            // alert(event.target.value)
            document.querySelector('small[data-small="finance"]').style.display = event.target.value == 1 ? 'block' : 'none'
        })
    })
    
    // | Resend OTP |
    let testrideText = "Request OTP";
    document.querySelector('a[data-action="billing-resend-otp"]').addEventListener('click', event => {
        document.forms.billing.request_for.value = 'resend';
        document.forms.billing.submit.click();
    });
    
    // | change number for OTP |
    document.querySelector('a[data-action="billing-change"]').addEventListener('click', event => {
        $('div[data-section="billing-otp"]').fadeOut();
        document.forms.billing.phone.readOnly = false;
        document.forms.billing.request_for.value = 'otp';
        testrideText = `Request OTP`;
        document.forms.billing.submit.innerHTML = "<span>"+testrideText+"</span>";
    });
    
    document.forms.billing.addEventListener('submit', event => {
        event.preventDefault();
        
        let dataMessage = document.querySelector('p[data-message="billing"]');
		dataMessage.innerHTML = '';
		
        // Check pincode
        const pat1 = /^\d{6}$/;
        if(!pat1.test(event.target.pincode.value)) {
            showMessage({message: "Enter the valid pincode!", color: 'red'})
            event.target.submit.disabled = false;
            event.target.submit.innerHTML = "<span>Proceed and Pay</span>";
            return false;
        }
        
        JqueryAjax('https://api.postalpincode.in/pincode/'+event.target.pincode.value)
        .then(pincoderesult => {
            if(pincoderesult[0].Status === "Success" && pincoderesult[0].PostOffice.length > 0)
            {
                if(event.target.email.value != event.target.confirmemail.value) {
                    showMessage({message: "Confirm Email do not match with Email", color: 'red'})
                    return false;
                }
                event.target.submit.disabled = true;
                document.querySelector('button[data-action="payment"]').innerHTML = `<div class="spinner-grow text-dark" role="status"><span class="visually-hidden">Loading...</span></div>`;
                const fd = new FormData(event.target);
                commonAjax({
                    page: '/php/module/order/pay.php',
                    params: fd
                })
                .then(response => {
                    event.target.submit.disabled = false;
                    document.querySelector('button[data-action="payment"]').innerHTML = "<span>"+testrideText+"</span>";
                    if(response.success)
                    {
                        if(response.request_for === 'verify')
                        {
                            event.target.request_for.value = 'verify';
                            event.target.phone.readOnly = true
                            $('div[data-section="billing-otp"]').fadeIn();
                            testrideText = "Verify and Pay";
                            event.target.submit.innerHTML = "<span>"+testrideText+"</span>";
                            showMessage({message: response.message, color: 'green'})
                            return;
                            
                        } else
                        {
                            let data;
                            if(response.finance == '1' && 1 == 2)
                            {
                                data = {
                                "orderId": response.order.order_id,
                                "emiSubventionToken": {},
                                "token": response.data.body.accessToken,
                                "tokenType": "TXN_TOKEN",
                                "transactionAmount": <?php echo BOOKING_AMOUNT ?>,
                                "amount": <?php echo BOOKING_AMOUNT ?>,
                                };
                                
                                
                            } else
                            {
                                data = {
                                "orderId": response.order.order_id,
                                "token": response.data.body.txnToken,
                                "tokenType": "TXN_TOKEN",
                                "transactionAmount": <?php echo BOOKING_AMOUNT ?>
                                }
                            }
                            // console.log(data);
                            onScriptLoad(data);
                        }
                    } else 
                    {
                        snackbar({success: false, message: response.message})
                        showMessage({message: response.message, color: 'red'})
                    }
                })
                .catch(err => {console.log(err); event.target.submit.disabled = false; document.querySelector('button[data-action="payment"]').innerHTML = "<span>"+testrideText+"</span>"; showMessage({message: "Something went wrong!", color: 'red'})})
            } else
            {
                showMessage({message: "Enter the valid pincode!", color: 'red'})
                snackbar({success: false, message: "Enter the valid pincode!"})
                event.target.submit.disabled = false;
                event.target.submit.innerHTML = "<span>Proceed and Pay</span>";
            }
        })
        .catch(err => {console.log(err); event.target.submit.disabled = false; event.target.submit.innerHTML = "<span>Proceed and Pay</span>";})
        
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
    })
</script>
