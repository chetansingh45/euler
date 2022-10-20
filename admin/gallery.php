<?php 
include 'php/helper/db.php';

use DB\DB;

$db = new DB();
include 'includes/header.php';
require_once 'php/helper/alert.php';
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

<div class="row">
    <div class="col-12">
        <a class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addImage"><i class="bi bi-upload"></i></a>
        <div class="card">
            <div class="gallery my-gallery card-body row text-center gallery_data"></div>
        </div>
    </div> 
</div>

<!-- Modal -->
<div class="modal fade" id="addImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<?php include 'includes/footer.php' ?>
<script>
$(document).ready(function() {
    get_s3_images();
})

function get_s3_images(){
    $.get("s3_handle.php?action=get_images",function(data){
        data = JSON.parse(data);
        show_images(data)
    })
}

function show_images(s3_images){
    let gallery = '';
    for(x in s3_images) {
        gallery += `<figure class="col-xl-2 col-md-4 col-6">
                    <div class="gellery_img" >
                        <img class="img-thumbnail" src="${s3_images[x]}" itemprop="thumbnail" >
                        <div class="copy_img" data-url="${s3_images[x]}" onclick="copyToClipboard('${s3_images[x]}')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                                <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z"/>
                                <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z"/>
                            </svg>
                        </div>
                    </div>
                    <figcaption itemprop="caption description"></figcaption>
                </figure>`;
    }
    $(".gallery_data").append(gallery)
}

</script>

