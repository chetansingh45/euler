<?php
include('admin/php/helper/db.php');

use DB\DB;

$db = new DB();

///selecting meta data
$metaData = false;
$meta = $db->db("SELECT * FROM dealership_page WHERE section_name = 'meta' AND `status` = '1'");
if (mysqli_num_rows($meta) > 0) {
    $metaData = mysqli_fetch_assoc($meta);
}

////selecting hero data
$hero = $db->db("SELECT * FROM dealership_page WHERE section_name = 'hero' AND `status` = '1'");
$heroData = false;
if (mysqli_num_rows($hero) > 0) {
    $heroData = mysqli_fetch_assoc($hero);
}

////selection section two
$sectionTwo = $db->db("SELECT * FROM dealership_page WHERE section_name = 'section_two' AND `status` = '1'");
$sectionTwoData = false;
if ($sectionTwo) {
    $sectionTwoData = mysqli_fetch_assoc($sectionTwo);
}

include 'includes/header.php';
?>
<?php if ($heroData) : ?>
    <!-- Hero Banner -->
    <section class="hero-banner overflow-hidden" style="background-image: url(<?php echo $heroData['main_image'] ?>); background-position:center;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center wow zoomIn">
                    <div class="hero-banner-text mt-lg-5">
                        <h2 class="hero-title text-primary"><?php echo $heroData['main_title']; ?></h2>
                        <h5 class="hero-sub-title text-white mb-2"><?php echo $heroData['title']; ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php if ($sectionTwoData) : ?>
    <!-- Dealer Content -->
    <section class="sec-space bg-light" data-section="dealer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h2 class="heading mb-3"><?php echo $sectionTwoData['main_title']; ?></h2>
                    <?php echo $sectionTwoData['main_description']; ?>
                    <a class="btn btn-dark" href="javascript:void(0)" data-action="next-step"><span><?php echo $sectionTwoData['btn_text']; ?></span></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<div id="dealer-form"></div>
<!-- Dealer Form -->
<section class="sec-space" style="display: none" data-section="dealer-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto text-center mb-3 mb-md-4">
                <h2 class="heading-sm mb-3 mb-md-4">Submit Your Application Form Below or Download the Application Form</h2>
                <p>All that you need to do is to fill up a simple form online and we shall get back to you!</p>
            </div>
        </div>
        <form name="dealership" class="dealer-form">
            <hr>
            <div>
                <h4 class="heading-sm mb-3 mb-md-4">Personal Information</h4>
                <div class="mb-3">
                    <label><b>Solution<span class="text-danger">*</span></b></label>
                    <div class="d-flex">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="genderprefix" id="solution1" value="Mr" checked="" required>
                            <label class="form-check-label" for="solution1">Mr.</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="genderprefix" id="solution2" value="Ms" required>
                            <label class="form-check-label" for="solution2">Ms.</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label><b>Name<span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" placeholder="Your Name" name="name" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><b>Email<span class="text-danger">*</span></b></label>
                        <input type="email" class="form-control mb-3" placeholder="Your Email" name="email" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><b>Phone<span class="text-danger">*</span></b></label>
                        <input type="tel" name="phone" pattern="(6|7|8|9)\d{9}" title="Invalid phone number (avoid country code)" class="form-control" placeholder="Phone" minlength="10" maxlength="10" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><b>Date of Birth<span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" placeholder="Enter Your Date of Birth" name="dob" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label><b>Educational Qualification</label>
                    <input type="text" class="form-control" placeholder="Your Qualification" name="qualification">
                </div>
                <div class="mb-3">
                    <label><b>Address<span class="text-danger">*</span></b></label>
                    <textarea id="" cols="30" rows="3" class="form-control" placeholder="Your Address" name="address" required></textarea>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label><b>State<span class="text-danger">*</span></b></label>
                        <select class="form-control" name="state" required data-world-dealership="state">
                            <option selected disabled value="">Select Your State</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><b>City<span class="text-danger">*</span></b></label>
                        <select class="form-control" name="city" required data-world-dealership="city">
                            <option selected value="" disabled>Select Your City</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><b>Pincode<span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" placeholder="Your Pincode" name="pincode" required>
                        <small class="text-success" data-small="pincode"></small>
                    </div>
                </div>
            </div>
            <hr>
            <div>
                <h4 class="heading-sm mb-3 mb-md-4">Business Information</h4>
                <div class="mb-3">
                    <label><b>Partnership<span class="text-danger">*</span></b></label>
                    <div class="d-flex">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" id="partnership1" value="Dealership" checked="" name="partnership" required>
                            <label class="form-check-label" for="partnership1">Dealership</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" id="partnership2" value="Authorized Service Center" name="partnership" required>
                            <label class="form-check-label" for="partnership2">Authorized Service Center</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><b>State Applied For<span class="text-danger">*</span></b></label>
                        <select class="form-control" name="state_applied_for" required>
                            <option selected value="" disabled>Select Your State</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Haryana">Haryana</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><b>City Applied For<span class="text-danger">*</span></b></label>
                        <select class="form-control" name="city_applied_for" required>
                            <option selected value="" disabled>Select Your City</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Gurgaon">Gurgaon</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label><b>Current Business Details<span class="text-danger">*</span></b></label>
                        <textarea cols="30" rows="3" class="form-control" placeholder="Business Details" name="current_business_detail" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label><b>Automotive industry experience<span class="text-danger">*</span></b></label>
                        <textarea cols="30" rows="3" class="form-control" placeholder="Experience" name="experience" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3 d-flex flex-column justify-content-between">
                        <label><b>Number of years in business<span class="text-danger">*</span></b></label>
                        <input type="number" class="form-control" placeholder="Years" name="years" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><b>Which companies have you partnered with?<span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" placeholder="Partnership" name="partnered_with" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label><b>Annual turnover of your business (In lacs)<span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" placeholder="Turnover" name="annual_turnover" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label><b>Land Details<span class="text-danger">*</span></b></label>
                    <div class="d-flex">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="land_detail" required id="land1" value="Owned" checked="">
                            <label class="form-check-label" for="land1">Owned</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="land_detail" required id="land2" value="Leased">
                            <label class="form-check-label" for="land2">Leased</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="land_detail" required id="land3" value="Others">
                            <label class="form-check-label" for="land3">Others</label>
                        </div>
                    </div>
                    <div class="form-check mt-3 mb-1">
                        <input class="form-check-input" type="radio" name="land_detail" required id="land4" value="Comment">
                        <label class="form-check-label" for="land4">Comment</label>
                    </div>
                    <textarea name="comment" id="" cols="30" rows="3" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label><b>What is the approximate amount you are willing to invest? (In Rupees)<span class="text-danger">*</span></b></label>
                    <div class="d-flex">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="amount_willing_to_invest" required id="invest1" value="30 to 50 Lakhs" checked="">
                            <label class="form-check-label" for="invest1">30 to 50 Lakhs</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="amount_willing_to_invest" required id="invest1" value="50 Lakhs to 1 Crore">
                            <label class="form-check-label" for="invest1">50 Lakhs to 1 Crore</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="amount_willing_to_invest" required id="invest1" value="1 to 3 Crore">
                            <label class="form-check-label" for="invest1">1 to 3 Crore</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="amount_willing_to_invest" required id="invest2" value="3 to 5 Crore">
                            <label class="form-check-label" for="invest2">3 to 5 Crore</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="amount_willing_to_invest" required id="invest3" value="5 Crore and above">
                            <label class="form-check-label" for="invest3">5 Crore and above</label>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary mt-4"><span>Submit</span></button>
        </form>
        <p class="p-3 mb-0" data-message="dealership"></p>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
<script>
    document.querySelector('a[data-action="next-step"]').addEventListener('click', event => {
        $('section[data-section="dealer-content"]').fadeOut()
        $('section[data-section="dealer-form"]').fadeIn('slow')
    })

    document.forms.dealership.pincode.addEventListener('change', event => {
        document.querySelector(`small[data-small="pincode"]`).innerHTML = ''
        JqueryAjax('https://api.postalpincode.in/pincode/' + event.target.value)
            .then(pincoderesult => {
                if (pincoderesult[0].Status === "Success" && pincoderesult[0].PostOffice.length > 0) {
                    document.querySelector(`small[data-small="pincode"]`).innerHTML = pincoderesult[0].PostOffice[0]['State'] + ', ' + pincoderesult[0].PostOffice[0]['District'];
                }
            })
    })

    getCollection('state', 'India', 'dealership')
        .then(res => {
            if (res.success == 0) {
                reSetToken()
                    .then(tokenresponse => {
                        if (tokenresponse) getCollection('state', 'India', 'dealership')
                    })
            }
        });

    document.forms.dealership.state.addEventListener('change', () => getCollection('city', false, 'dealership'));

    const submitDealership = event => {
        event.preventDefault();

        let dataMessage = document.querySelector('p[data-message="dealership"]');
        dataMessage.innerHTML = '';
        dataMessage.classList.remove('bg-light-blue');
        dataMessage.classList.remove('bg-danger');

        // Check pincode
        const pat1 = /^\d{6}$/;
        if (!pat1.test(event.target.pincode.value)) {
            showMessage(false, "Enter the valid pincode!");
            return false;
        }

        JqueryAjax('https://api.postalpincode.in/pincode/' + event.target.pincode.value)
            .then(pincoderesult => {
                if (pincoderesult[0].Status === "Success" && pincoderesult[0].PostOffice.length > 0) {
                    if (event.target.land_detail.value === 'Comment' && event.target.comment.value === '') {
                        showMessage(false, "Comment is required");
                        return false;
                    }
                    event.target.submit.innerHTML = `<div class="spinner-grow text-dark" role="status"><span class="visually-hidden">Loading...</span></div>`;
                    const fd = new FormData(event.target);
                    commonAjax({
                            page: '/php/module/dealership/dealership-add.php',
                            params: fd
                        })
                        .then(response => {
                            event.target.submit.innerHTML = "<span>Submit</span>";
                            snackbar({
                                success: response.success,
                                message: response.message
                            });
                            showMessage(response.success, response.message);
                            if (response.success) {
                                event.target.reset();
                                return;
                            }
                        })
                        .catch(err => {
                            console.log(err);
                            event.target.submit.innerHTML = "<span>Submit</span>";
                        })
                } else showMessage(false, "Enter the valid pincode!");
            })

        function showMessage(e, m) {
            if (e) {
                dataMessage.classList.add('bg-light-blue');
                dataMessage.classList.remove('bg-danger');
            } else {
                dataMessage.classList.add('bg-danger');
                dataMessage.classList.remove('bg-light-blue');
            }
            dataMessage.innerHTML = m;
        }
    }
    document.forms.dealership.addEventListener("submit", submitDealership);
</script>