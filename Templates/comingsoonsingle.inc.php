<?php
  $errors = $newcomment->errors;
?>
<div class="row">
      <div class="col-xs-12">
        <img class="homepageimg" src="images/comingsoonimg.jpg" alt="guitar image">
        <img class="comingsoon_logo" src="images/comingsoon.png" alt="comingsoon">
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 text-center musicquote">
        <h3>“Music is the divine way to tell beautiful, poetic things to the heart.” - Pablo Casals</h3>
      </div>
    </div>

  <div class="row">
    <div class="col-md-9 col-md-offset-2">
      <ol class="breadcrumb">
        <li><a href=".\">Home</a></li>
        <li><a href=".\?page=comingsoon">Coming Soon</a></li>
        <li class="active"><?= $songs->title ?></li>
      </ol>

        <h2><?= $songs->title; ?> - <?= $songs->artist; ?></h2>
        <p>Released <?= $songs->date; ?></p>
        <p><?= $songs->description; ?></p>

  <?php if(static::$auth->isAdmin()): ?>
    <p>
      <a href=".\?page=comingsoon.edit&amp;id=<?= $songs->id; ?>" class="btn btn-info">
      <span class="glyphicon glyphicon-pencil"></span> Edit Song</a>
    </p>
  <?php endif; ?>

<ul class="list-inline">
  <?php foreach ($tags as $tag): ?>
      <li><span class="label label-primary"><?= $tag->tag; ?></span></li>
    <?php endforeach; ?>
</ul>

<div class="commentsinglemovie col-lg-12">
  <h2>Comments</h2>
      <?php if(count($comments) > 0) : ?>
          <?php $count = 0; ?>
          <?php foreach ($comments as $comment) : ?>
            <?php $count++; ?>
            <div class="media">
              <div class="media-left">
                  <img class="media-object" src="<?= $comment->user()->gravatar(48, 'identicon') ; ?>" alt="avatar">
              </div>
              <div class="media-body">
                <h4 class="media-heading"># <?= $count;?> <?= $comment->user()->username;?></h4>
                <p><?= $comment->comment;?></p>
              </div>
            </div>
        
          <?php endforeach; ?>

    <?php else: ?>
      <p>No Comments Yet......</p>
    <?php endif; ?>

  <h4>Add Comment to '<?= $songs->title ?>'</h4>
  <?php if(static::$auth->check()): ?>
    <div class="row">
      <div class="col-xs-12">
        <form action=".\?page=comment.create" method="POST" class="form-horizontal">

        <input type="hidden" name="song_id" value="<?= $movie->id ?>">

          <div class="form-group <?php if($errors['comment']): ?> has-error <?php endif; ?>">
              <label for="comment" class="col-sm-4 col-md-2 control-label">Comment</label>
              <input type="hidden" value="<?= $songs->id; ?>" name="song_id">
              <div class="col-sm-8 col-md-10">
              <textarea id="comment" class="form-control" name="comment" rows="5"></textarea>
              <div class="help-block"><?= $errors['comment']; ?></div>
              </div>
          </div>

              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
                  <button class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span> Add Comment
                  </button>
                </div>
              </div>
            </form>
          <?php else: ?>
            <p>You need to be <a href="./?page=login">logged in</a> to add a comment.</p>
          <?php endif; ?>
    </div>
    </div>
  </div>
  </div>
  </div>
  




        




  