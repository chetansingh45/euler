<?php include 'includes/header.php' ?>
<div class="d-flex align-items-center mb-4 flex-wrap">
	<h4 class="fs-20 font-w600  me-auto">New Job</h4>
</div>

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Position<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control solid" placeholder="Name" aria-label="name">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Job Type<span class="text-danger scale5 ms-2">*</span></label>
                        <select  class="form-select form-control solid">
                            <option selected>Choose...</option>
                            <option>Part-Time</option>
                            <option>Full-Time</option>
                            <option>Freelancer</option>
                        </select>
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">No. of Vancancy<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control solid" placeholder="Name" aria-label="name">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Select Experience<span class="text-danger scale5 ms-2">*</span></label>
                        <select  class="form-select form-control solid">
                            <option selected>1 yr</option>
                            <option>2 Yr</option>
                            <option>3 Yr</option>
                            <option>4 Yr</option>
                        </select>
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Posted Date<span class="text-danger scale5 ms-2">*</span></label>
                        <div class="input-group">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            <input size="16" type="text" value="2012-06-15" readonly class="form-control form_datetime solid">
                        </div>
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Last Date To Apply<span class="text-danger scale5 ms-2">*</span></label>
                        <div class="input-group">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            <input size="16" type="text" value="2012-06-15" readonly class="form-control form_datetime solid">
                        </div>
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Salary Form<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control solid" placeholder="$" aria-label="name">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Salary To<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control solid" placeholder="$" aria-label="name">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Enter City:<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control solid" placeholder="City" aria-label="name">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Enter State:<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control solid" placeholder="State" aria-label="name">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Enter Counter:<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control solid" placeholder="State" aria-label="name">
                    </div>
                    <div class="col-xl-6  col-md-6 mb-4">
                        <label  class="form-label font-w600">Enter Education Level:<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="text" class="form-control solid" placeholder="Education Level" aria-label="name">
                    </div>
                    <div class="col-xl-12 mb-4">
                            <label  class="form-label font-w600">Description:<span class="text-danger scale5 ms-2">*</span></label>
                            <textarea class="form-control solid" aria-label="With textarea"></textarea>
                    </div>
                </div>
                <div>
                    <span>Status:<label class="radio-inline mx-3"><input type="radio" name="optradio"> Active</label></span>
                    <span><label class="radio-inline me-3"><input type="radio" name="optradio"> In Active</label></span>
                </div>
            </div>
            <div class="card-footer text-end">
                <div>
                    <a href="javascript:void(0);" class="btn btn-primary me-3">Close</a>
                    <a href="javascript:void(0);" class="btn btn-secondary">Submit</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php' ?>
            