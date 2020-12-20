<nav>
  <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-order-tab" data-toggle="tab" href="#nav-order" role="tab" aria-controls="nav-order" aria-selected="true"><h3>Order</h3></a>
    
    <a class="nav-item nav-link" id="nav-appointment-tab" data-toggle="tab" href="#nav-appointment" role="tab" aria-controls="nav-appointment" aria-selected="false"><h3>Appointment</h3></a>

    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><h3>Contact</h3></a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
    <?php echo do_shortcode('[contact-form-7 id="163" title="order"]'); ?>
  </div>

  <div class="tab-pane fade appointment-wrap" id="nav-appointment" role="tabpanel" aria-labelledby="nav-appointment-tab">
    <div class="tab-content">
      <?php echo do_shortcode('[ea_bootstrap width="100%" scroll_off="true" layout_cols="2"]'); ?>
    </div>    
  </div>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <?php echo do_shortcode('[contact-form-7 id="144" title="Contact form 1"]'); ?>
  </div>
</div>