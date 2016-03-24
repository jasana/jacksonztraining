<?php 
    $errors = $songs->errors;
    $verb = ( $songs->id ? "Edit" : "Add");
    if($songs->id){
      $submitAction = ".\?page=comingsoon.update";
    } else {
      $submitAction = ".\?page=comingsoon.store";
    }
 ?>

<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <form id="comingsooncreate" action="<?= $submitAction; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
      <?php if($songs->id): ?>
        <input type="hidden" name="id" value="<?= $songs->id?>">
      <?php endif; ?>
        <h2><?= $verb; ?> Song</h2>

    <ol class="breadcrumb">
      <li><a href=".\">Home</a></li>
      <li><a href=".\?page=comingsoon">Coming Soon</a></li>
      <li class="active"><?= $verb; ?> A Song</li>
    </ol>

        <div class="form-group <?php if($errors['title']): ?> has-error <?php endif; ?>">
             <label for="title" class="col-sm-4 col-md-2 control-label">Song Title:</label>
             <div class="col-sm-8 col-md-10">
               <input class="form-control" id="title" name="title" placeholder="Fantasy"
               value="<?php echo $songs->title; ?>">
               <div class="help-block"><?php echo $errors['title']; ?></div>
             </div>
         </div>

        <div class="form-group <?php if($errors['artist']): ?> has-error <?php endif; ?>">
             <label for="artist" class="col-sm-4 col-md-2 control-label">Song Artist:</label>
             <div class="col-sm-8 col-md-10">
               <input class="form-control" id="artist" name="artist" placeholder="John Smith"
               value="<?php echo $songs->artist; ?>">
               <div class="help-block"><?php echo $errors['artist']; ?></div>
             </div>
         </div>

        <div class="form-group <?php if($errors['date']): ?> has-error <?php endif; ?>">
          <label for="date" class="col-sm-4 col-md-2 control-label">Release Date: </label>
          <div class="col-sm-8 col-md-10">
            <input type="date" class="form-control" id="date" name="date" placeholder="1990" value="<?php echo $date; ?>">
            <div class="help-block">
              <?php echo $errors['date']; ?>
            </div>
          </div>
        </div>

        <div class="form-group <?php if($errors['description']): ?> has-error <?php endif; ?>">
          <label for="description" class="col-sm-4 col-md-2 control-label">Description </label>
          <div class="col-sm-8 col-md-10">
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="A paragraph about the song."><?php echo $songs->description; ?></textarea>
            <div class="help-block"><?php echo $errors['description']; ?></div>
          </div>
        </div>

        <div class="form-group <?php if($errors['tags']): ?> has-error <?php endif; ?>">
          <label for="tags" class="col-sm-4 col-md-2 control-label">Tags </label>
          <div class="col-sm-8 col-md-10">
          <div id="tags" class="form-control">
          <script type="text/javascript">
            var inputTags = "<?= $songs->tags; ?>";
          </script>
          </div>
            <div class="help-block"><?php echo $errors['tags']; ?></div>
          </div>
        </div> 

        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
            <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> <?= $verb; ?> Song</button>
          </div>
        </div>
      </form>

      <?php if($songs->id): ?>
        <form action=".\?page=comingsoon.destroy" method="POST" class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
          <input type="hidden" name="id" value="<?= $songs->id?>">
            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete Song</button>
          </div>
        </div>
      </form> 
    <?php endif; ?>
    </div>
  </div>
</div>