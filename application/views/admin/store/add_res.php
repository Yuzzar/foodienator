<div class="conatiner">
    <form action="<?php echo base_url().'admin/store/create_restaurant';?>" method="POST"
        class="form-container mx-auto  shadow-container" id="myForm" style="width:90%" enctype="multipart/form-data">
        <h3 class="mb-3 p-2 text-center mb-3">Add New Restaurant Details</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Kategori Kue</label>
                    <input type="text" name="res_name" id="rname" class="form-control
                    <?php echo (form_error('res_name') != "") ? 'is-invalid' : '';?>" placeholder="Tambahkan Nama Kue"
                    value="<?php echo set_value('res_name');?>">

                    <?php echo form_error('res_name'); ?>
                    <span></span>
                </div>
               
            <div class="col-md-6">
            <div class="form-group">
                    <label class="control-label">Range Harga Tinggi</label>
                    <select name="o_hr" id="o_hr" class="form-control
                    <?php echo (form_error('o_hr') != "") ? 'is-invalid' : '';?>">
                        <option value="">--Select Range harga--</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="600">600</option>
                        <?php echo set_select('o_hr'); ?>
                    </select>
                    <?php echo form_error('o_hr');?>
                    <span></span>
                </div>
                <div class="form-group">
                    <label class="control-label">Range Harga Rendah</label>
                    <select name="c_hr" id="c_hr" class="form-control
                    <?php echo (form_error('c_hr') != "") ? 'is-invalid' : '';?>">
                        <option value="">--Select Range Harga--</option>
                        <option value="100">100 rb</option>
                        <option value="200">200 rb</option>
                        <option value="300">300 rb</option>
                        <option value="400">400 rb</option>
                        <option value="500">500 rb</option>
                        <option value="600">600 rb</option>
                        <option value="700">700 rb</option>
                        <option value="800">800 rb</option>
                        <option value="900">900 rb</option>
                    </select>
                    <?php echo form_error('c_hr');?>
                    <span></span>
                </div>
                
                <div class="form-group">
                    <label class="control-label">Ketersediaan</label>
                    <select name="o_days" id="o_days" class="form-control <?php echo (form_error('o_days') != "") ? 'is-invalid' : '';?>">
                        <option value="">--Select your Available--</option>
                        <option value="Ready Stock">Ready Stock</option>
                        <option value="Sold">Sold</option>
                        <option value="Open PO">Open PO</option>
                 
                    </select>
                    <?php echo form_error('o_days');?>
                    <span></span>
                </div> 
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control 
                    <?php echo(!empty($errorImageUpload))  ? 'is-invalid' : '';?>">
                    <?php echo (!empty($errorImageUpload)) ? $errorImageUpload : '';?>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Select Category</label>
            <select name="c_name" id="c_name" class="form-control <?php echo (form_error('c_name') != "") ? 'is-invalid' : '';?>">
                <option value="">--Select Category--</option>
                <?php 
                if (!empty($cats)) { 
                    foreach($cats as $cat) {
                        ?>
                <option value="<?php echo $cat['c_id'];?>">
                    <?php echo $cat['c_name'];?>
                    <?php echo set_select('c_name');?>
                </option>
                <?php }
                }
                ?>
            </select>
            <?php echo form_error('c_name');?>
            <span></span>
        </div>
       
            <span></span>
        </div>
        <div class="form-actions">
            <input type="submit" id="btn" name="submit" class="btn btn-success" value="Save">
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