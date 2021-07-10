<?php
include_once('web-config.php');
getHeader("Sizes", "includes/header.php");
?>
<div class="content-body">
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="<?= getHTMLRoot() . "/dashboard" ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sizes</li>
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
                <h5 class="card-title">Add Size</h5>
                <form action="controllers/size" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12 col-12">
                            <label for="SizeValue">Size Value</label>
                            <input type="text" name="SizeValue" class="form-control" id="SizeValue" placeholder="Please type size value">
                        </div>
                        <button name="Create" id="Create" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>
        <h2>Sizes</h2>
        <div data-label="Sizes" class="normal-table">

            <?php
            include_once('models/size-model.php');
            $SizeModel = new Size();
            $SizeList = $SizeModel->List();
            $SNo = 1;
            while ($row = mysqli_fetch_array($SizeList)) {
            ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['SizeValue'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $row['SizeValue'] ?></h6>
                        <p class="card-text"><?= $row['SizeValue'] ?></p>
                        <a href="edit-size?id=<?= $row['PK_ID'] ?>" class="card-link">Edit</a>
                        <a href="#modal5" data-toggle="modal" class="card-link" data-id="<?= $row['PK_ID'] ?>">Delete</a>
                    </div>
                </div>
            <?php
                $SNo++;
            }
            ?>
        </div>
    </div>
</div>
<div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel5" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content tx-14">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel5">Delete Confirmation</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mg-b-0">Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <a id="delete-modal-yes" href="<?= getHTMLRoot() ?>.'/controllers/size?Delete='" type="button" class="btn btn-primary tx-13">Yes, Delete</a>
            </div>
        </div>
    </div>
</div>
<?php
getFooter("includes/footer.php");
?>
<script>
    $('#modal5').on('shown.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id');
        $('#delete-modal-yes').attr('href', '<?= getHTMLRoot() ?>/controllers/size?Delete=true&id=' + id)
    })
</script>