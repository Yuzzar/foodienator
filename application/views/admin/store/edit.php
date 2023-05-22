<head>
    <title>Contoh Halaman HTML</title>
    <!-- Kode-kode lainnya di sini -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#o_days').change(function() {
            var selectedOption = $(this).val();
            $(this).removeClass('ready-stock sold');
            if (selectedOption == 'ready-stock') {
                $(this).addClass('ready-stock');
            } else if (selectedOption == 'sold') {
                $(this).addClass('sold');
            }
        });
    });
    </script>
</head>

<div class="conatiner">
    <form action="<?php echo base_url().'admin/store/edit/'.$store['r_id'];?>" method="POST"
        class="form-container mx-auto  shadow-container" style="width:90%" enctype="multipart/form-data">
        <h3 class="mb-3 p-2 text-center mb-3">Edit "<?php echo $store['name'] ?>" Details</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Restaurant Name</label>
                    <input type="text" name="res_name"  class="form-control
                    <?php echo (form_error('res_name') != "") ? 'is-invalid' : '';?>" placeholder="Add restaurant name"
                        value="<?php echo set_value('res_name', $store['name']);?>">
                    <?php echo form_error('res_name'); ?>
                </div>
                
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">list harga rendah</label>
                    <select name="o_hr" id="o_hr" class="form-control
                    <?php echo (form_error('o_hr') != "") ? 'is-invalid' : '';?>" data-placeholder="Choose a Category">
                        <option value="">--Select your Hours--</option>
                        <option value="100" <?php echo $store['o_hr'] == "100" ? "selected" : "";?>>100</option>
                        <option value="200" <?php echo $store['o_hr'] == "200" ? "selected" : "";?>>200</option>
                        <option value="300" <?php echo $store['o_hr'] == "300" ? "selected" : "";?>>300</option>
                        <option value="400" <?php echo $store['o_hr'] == "400" ? "selected" : "";?>>400</option>
                    </select>
                    <?php echo form_error('o_hr'); ?>
                </div>
                <div class="form-group">
                    <label class="control-label">list harga tinggi</label>
                    <select name="c_hr" id="c_hr" class="form-control
                    <?php echo (form_error('c_hr') != "") ? 'is-invalid' : '';?>" data-placeholder="Choose a Category">
                        <option value="">--Select your Hours--</option>
                        <option value="200 rb <?php echo $store['c_hr'] == "200 rb" ? "selected" : "";?>">200 rb</option>
                        <option value="300 rb " <?php echo $store['c_hr'] == "300 rb" ? "selected" : "";?>>300 rb</option>
                        <option value="400 rb" <?php echo $store['c_hr'] == "400 rb" ? "selected" : "";?>>400 rb</option>
                    </select>
                    <?php echo form_error('c_hr'); ?>
                </div>
                <div class="form-group">
                <label class="control-label">Availability</label>
                <select name="o_days" id="o_days" class="form-control <?php echo (form_error('o_days') != "") ? 'is-invalid' : '';?>" data-placeholder="Choose Availability" tabindex="1">
                    <option value="">--Select Availability--</option>
                    <option value="ready-stock" <?php echo $store['o_days'] == "ready-stock" ? "selected" : "";?>>Ready Stock</option>
                    <option value="open-po" <?php echo $store['o_days'] == "open-po" ? "selected" : "";?>>Open PO</option>
                    <option value="Sold" <?php echo $store['o_days'] == "sold" ? "selected" : "";?>>Sold</option>
                </select>
                <?php echo form_error('o_days'); ?>
            </div>
            </div>
            <div class="col-md-12">
                <div class="form-group has-danger">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control 
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <br>
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>

                    <?php if($store['img'] != '' && file_exists('./public/uploads/restaurant/thumb/'.$store['img'])) { ?>
                    <img class="mt-1" src="<?php echo base_url().'public/uploads/restaurant/thumb/'.$store['img']; ?>">
                    <?php } else {?>
                    <img width="300" src="<?php echo base_url().'public/uploads/no-image.png'?>">
                    <?php } ?>
                </div>
                <div class="form-group">
                    <label class="control-label">Select Category</label>
                    <select name="c_name" id="c_name"
                        class="form-control <?php echo (form_error('c_name') != "") ? 'is-invalid' : '';?>">
                        <option value="">--Select Category--</option>
                        <?php 
                if (!empty($cats)) { 
                    foreach($cats as $cat) {
                        ?>
                        <option value="<?php echo $cat['c_id'];?>">
                            <?php echo $cat['c_name'];?>
                        </option>
                        <?php }
                }
                ?>
                    </select>
                    <?php echo form_error('c_name');?>
                </div>
              
        </div>
        <div class="form-actions">
            <input type="submit" name="submit" class="btn btn-success" value="Make Changes">
            <a href="<?php echo base_url().'admin/store/index'?>" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
<script>
    const o_hr = document.getElementById("o_hr");
    const c_hr = document.getElementById("c_hr");
    const o_days = document.getElementById("o_days");
    const c_name = document.getElementById("c_name");

    o_hr.value = "<?php echo $_POST['o_hr']; ?>";
    c_hr.value = "<?php echo $_POST['c_hr']; ?>";
    o_days.value = "<?php echo $_POST['o_days']; ?>";
    c_name.value = "<?php echo $_POST['c_name']; ?>";
</script>