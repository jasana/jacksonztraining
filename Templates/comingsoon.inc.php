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
    <div class="col-md-8 col-md-offset-2 comingsoonlist">
      <ol class="breadcrumb">
        <li><a href=".\">Home</a></li>
        <li class="active">Coming Soon</li>
      </ol>
      <h1>Music Coming Soon</h1>

  <?php if(static::$auth->isAdmin()): ?>
    <p>
      <a href=".\?page=comingsoon.create" class="btn btn-success"><span class="glyphicon glyphicon-music"></span> Add Song</a>
    </p>
  <?php endif; ?>
    <?php if(count($songs) > 0): ?>
      <ul>
      <?php 
        foreach($songs as $song): ?>
            <li><a href=".\?page=comingsoonsingle&amp;id=<?= $song->id ?>"><?= $song->artist; ?> - <?= $song->title; ?></a></li>
      <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p>Weirdly enough, there are no songs to display. Spooky!!!</p>
    <?php endif; ?>

    <?php $this->paginate(".\?page=comingsoon", $pageNumber, $pageSize, $recordCount); ?>
    </div>
  </div>


