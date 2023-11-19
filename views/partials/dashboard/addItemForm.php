<div class="card-body">
    <h4 class="card-title">Add Item </h4>
    <p class="card-description">
        Add Product To Menu
    </p>
    <form class="forms-sample" method="post" action="<?php echo $projectFolder ?>/dashboard/additem">
        <div class="form-group">
            <label for="exampleInputName1">Product Name</label>
            <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Product Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Product Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
        </div>
        <div class="form-group">
            <label for="exampleSelectGender">Type</label>
            <select class="form-control" id="itemtype" name="itemtype">
                <option>breakfast</option>
                <option>dinner</option>
                <option>drinks</option>
                <option>sides</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail3">Category</label>
            <input type="text" class="form-control" id="category" name="category" placeholder="Category">
        </div>
        <!-- <div class="form-group">
                      <label>Product Image </label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div> -->
        <div class="form-group">
            <label for="exampleTextarea1">Description</label>
            <textarea class="form-control" id="descriptions" name="descriptions" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit</button>
        <a href="<?php echo $projectFolder ?>/" class="btn btn-light">Cancel</a>
    </form>
</div>