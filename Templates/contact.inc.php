

{{-- <div class="row">
      <div class="col-xs-12">
        <img class="homepageimg" src="images/contactimg.jpg" 
        alt="Homepage image">
        <img class="contact_logo" src="images/contact.png" alt="seven jays logo, welcome">
      </div>
    </div> --}}

    <div class="row">
      <div class="col-xs-12 text-center address">
        <h4>SE7ENJAYS STUDIO / 7 TARANAKI ST / WELLINGTON / NEW ZEALAND</h4>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-6 text-right">
      	<h4>0800 1234567</h4>
      </div>
      <div class="col-xs-6 text-left">
      	<h4>se7enjaysfm@mail.com</h4>
      </div>
    </div>

<hr>


  <div class="container my_form">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form method="post" id="contactform" action=".\?page=contactform">

          <div class="form-group <?php if($contactform['errors']['name']):?>
          has-error <?php endif; ?>">
            <label class="control-label " for="name">Name:</label>
            <input class="form-control" id="name" name="name" placeholder="Joe Blogs"
            value="<?php echo $contactform['name']; ?>">
            <span class="help-block"><?php echo $contactform['errors']['name']; ?></span>
            </div>

          <div class="form-group <?php if($contactform['errors']['email']):?>
          has-error <?php endif; ?>">
            <label class="control-label requiredField" for="email">Email:
            </label>
            <input class="form-control" id="email" name="email" type="text" placeholder="example@mail.co.nz"
            value="<?php echo $contactform['email']; ?>">
            <span class="help-block"><?php echo $contactform['errors']['email']; ?></span>
          </div>

          <div class="form-group <?php if($contactform['errors']['subject']):?>
          has-error <?php endif; ?>">
            <label class="control-label " for="subject">Subject:</label>
            <input class="form-control" id="subject" name="subject" type="text" placeholder="Music"
            value="<?php echo $contactform['subject']; ?>">
            <span class="help-block"><?php echo $contactform['errors']['subject']; ?></span>
          </div>

          <div class="form-group <?php if($contactform['errors']['message']):?>
          has-error <?php endif; ?>">
            <label class="control-label " for="message">Message:</label>
            <textarea class="form-control" cols="40" id="message" name="message" rows="7" 
            placeholder="Enter your message here..."
            value="<?php echo $contactform['message']; ?>"></textarea>
            <span class="help-block"><?php echo $contactform['errors']['message']; ?></span>
          </div>

          <div class="form-group">
              <button class="btn btn-primary " name="submit" type="submit">Submit</button>

          </div>
        </form>
      </div>
    </div>
  </div>
