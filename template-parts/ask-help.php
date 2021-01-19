<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-appointment-tab" data-toggle="tab" href="#nav-appointment" role="tab" aria-controls="nav-appointment" aria-selected="true"><h3>Appointment</h3></a>
    
    <a class="nav-item nav-link" id="nav-idea-tab" data-toggle="tab" href="#nav-idea" role="tab" aria-controls="nav-idea" aria-selected="false"><h3>Your Idea</h3></a>

    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><h3>Contact</h3></a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade appointment-wrap show active" id="nav-appointment" role="tabpanel" aria-labelledby="nav-appointment-tab">
    <?php echo do_shortcode('[ea_bootstrap width="100%" scroll_off="true" layout_cols="1"]'); ?>    
  </div>

  <div class="tab-pane fade" id="nav-idea" role="tabpanel" aria-labelledby="nav-idea-tab">
    <div class="tab-content">
      <?php echo do_shortcode('[contact-form-7 id="163" title="your idea"]'); ?>
    </div>    
  </div>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <?php echo do_shortcode('[contact-form-7 id="144" title="Contact form 1"]'); ?>
  </div>
</div>