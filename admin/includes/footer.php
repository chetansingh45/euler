</div>
        </div>
		<input type="hidden" id="temp_input">
        <!--**********************************
            Content body end
        ***********************************-->
		<!--Gallery Model  -->
<div class="modal fade " id="gellery_modal" tabindex="-1" aria-labelledby="gellery_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gellery_modalLabel">Image Gellery</h5>
                <div class="gellery_head_right">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#saveImage"class="upload_btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
                        </svg>
                    </a>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
            </div>
            <div class="modal-body">
                <div class="modal_gallery my-gallery card-body row text-center">
                    <!-- <figure class="col-xl-2 col-md-4 col-6">
                        <div class="gellery_img">
                            <img class="img-thumbnail" src="http://admin.pixelstrap.com/cuba/assets/images/lightgallry/01.jpg" itemprop="thumbnail" alt="Image description">
                            <div class="copy_img">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                                    <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
                                    <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
                                </svg>
                            </div>
                        </div>
                        <figcaption itemprop="caption description">Image caption 1</figcaption>
                    </figure> -->
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- image upload modal -->
<div class="modal fade" id="saveImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add new image</h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="file" required name="s3_image" class="form-control h-auto">
            <input type="hidden" name="save_s3_image">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
    if(isset($_POST['save_s3_image'])){
        $name=$_FILES['s3_image']['name'];
        $tmp_name=$_FILES['s3_image']['tmp_name'];
        $type=$_FILES['s3_image']['type'];
        $url = 'https://dy39755fpk.execute-api.ap-south-1.amazonaws.com/dev/file-upload?file_name='.$name;
        $ch=curl_init();
        $data=array("file"=>curl_file_create($tmp_name,$type,$name));
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:multipart/form-data'));
        curl_setopt($ch,CURLOPT_POST,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $result=curl_exec($ch);
        alert('Uploaded','New Image Uploaded','success');
    }
?>
		
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://www.webeesocial.com/" target="_blank">Webeesocial</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
	
	<!-- Chart piety plugin files -->
   <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
   <script src="js/plugins-init/datatables.init.js"></script>
	
	<!-- Dashboard 1 -->
	 
	
	
	
    <script src="js/custom.min.js"></script>
	<script src="js/dlabnav-init.js"></script>
	<script src="js/demo.js?v=<?php echo time() ?>"></script>
    <script src="js/bootstrapdatatable.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script src="js/common.js?v=<?php echo time() ?>"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="js/form-builder.min.js"></script>
    <script src="js/form-render.min.js"></script>
</body>
</html>