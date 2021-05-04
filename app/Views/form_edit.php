<!--Database Fields: -->
<!-- Title -->
<!-- Description  -->
<!-- Amount  -->
<!-- Price -->

<?php if (\Config\Services::validation()->getErrors()){
?>
<div class="alert alert-danger" role="alert">
<?= \Config\Services::validation()->listErrors();?>
</div>
<?php
}
?>


<div class= "col-4 mx-4">
    <form action ="/product/edit/<?=$id?>"  method="post">
        <div class="row mb-3">
            <label for="FormControlInputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="FormControlInputTitle" id="FormControlInputTitle" value="<?=$title?>" placeholder="<?=$title?>">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputDescription" class="form-label">Description</label>
            <textarea  class="form-control" name="FormControlInputDescription" id="FormControlInputDescription" ><?=$description?></textarea>
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Quantity</label>
            <input type="number" min="0" class="form-control" name="FormControlInputQuantity" id="FormControlInputQuantity" value="<?=$quantity?>" >
        </div>

        <div class="row mb-3">
            <label for="FormControlInputPrice" class="form-label">Price (U$)</label>
            <input type="text" class="form-control" name="FormControlInputPrice" id="FormControlInputPrice" value="<?=$price?>">
        </div>

    
        <button type="submit" class="btn btn-primary">Update product</button>    

    </form>
</div>
