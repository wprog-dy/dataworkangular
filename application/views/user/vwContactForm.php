<?php
$this->load->view('user/vwadminheader.php');
?>
<div id="wrapper">
<div class="main-content">
<div class="row small-spacing ">
<div class="col-lg-12">
    <div class="box-content">
        <h4 class="box-title">
            <?php echo $page_title; ?>
            <hr>
        </h4>
        <!-- /.box-title -->
        <?php $this->load->view('user/vwError'); ?>
        <form action="<?= base_url("user/Dashboard/contact/")?>" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="subject">Subject<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="subject"  required="required" >
            </div>
            <div class="form-group col-lg-6">
                <label for="message" >Description</label>
                    <textarea class="form-control" name="message" maxlength="250" required="required" placeholder="Max 250 Chars"></textarea>
            </div>
            <div class="form-group col-lg-6">
                <label for="attachment">Attachment<span class="text-danger">*</span></label>
                <input type="file"  name="attachment">
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-sm waves-effect waves-light"  name="submit" value="Send">
    </form>
    </div>
    <!-- /.box-content -->
</div>
<?php
$this->load->view('user/vwadminfooter.php');
?>
