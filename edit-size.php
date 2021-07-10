<?php
include_once('web-config.php');
getHeader("Edit Size", "includes/header.php");
$id = $_REQUEST['id'];
include_once('models/size-model.php');
$SizeModel = new Size();
$Size = $SizeModel->View($id);
$Size = mysqli_fetch_array($Size);
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Size</li>
                </ol>
            </nav>
        </div>
    </div>
    <?php
    HTMLToast();
    ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Size</h5>
                <form action="controllers/size" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12 col-12">
                        <input type="hidden" name="SizeID" value="<?= $Size['PK_ID'] ?>"/>
                            <label for="SizeValue">Size Value</label>
                            <input type="text" name="SizeValue" class="form-control" id="SizeValue" placeholder="Please type size value" value="<?= $Size['SizeValue'] ?>">
                        </div>
                        <button name="Edit" id="Edit" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>