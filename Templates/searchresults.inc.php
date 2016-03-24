	<div class="row">
      <div class="col-lg-12">
        <img class="homepageimg" src="images/search.jpg" alt="search image">
        <img class="main-logo" src="images/search.png" alt="search results">
      </div>
    </div>

  <div class="container">
		<h1 class="search_title">Search Results:</h1>

		  <div class="row">
		    <div class="col-xs-12">
		      <ol class="breadcrumb">
		        <li><a href=".\">Home</a></li>
		        <li class="active">Search Result</li>
		      </ol>

          <?php if(count($songs) > 0): ?>
		      <ol>
            <?php foreach ($songs as $song): ?>
				    <li>
					  <h4>
						<a href="./?page=comingsoonsingle&amp;id=<?= $song->id; ?>">
						<?=$song->title; ?> (<?=$song->artist; ?>)</a>
					  </h4>
					  <p><?=$song->description; ?></p>

					<ul class="list-inline">
						<?php foreach ($song->getTags() as $tag): ?>
							<li><span class="label label-primary"><?= $tag->tag; ?></span></li>
						<?php endforeach; ?>
					</ul>
				      </li>
			      <?php endforeach; ?>			
		      </ol>
	   	      <?php else: ?>
			<p>Weirdly enough, there are no songs to display. Spooky!!!</p>
		<?php endif; ?>
	    </div>
	  </div>
  </div>