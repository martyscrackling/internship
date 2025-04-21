<?php
  require_once "../classes/inquire.class.php";
  require_once '../tools/clean.php';

  $objInquire = new Inquire;
  $firstname = $lastname = $email = $message = "";
  $current_date = date('F j, Y');

  // Flag for success
  $isSuccess = false;

  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = isset($_POST['firstname']) ? clean_input($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? clean_input($_POST['lastname']) : '';
    $email = isset($_POST['email']) ? clean_input($_POST['email']) : '';
    $message = isset($_POST['message']) ? clean_input($_POST['message']) : '';
    
    if (empty($firstname) || empty($lastname) || empty($email) || empty($message)) {
        echo "All fields are required!";
        exit; 
    }

    $objInquire->date = $current_date;
    $objInquire->firstname = $firstname;
    $objInquire->lastname = $lastname;
    $objInquire->email = $email;
    $objInquire->message = $message;

    // Insert the data
    if ($objInquire->newInquiries()) {
        $isSuccess = true;
    } else {
        $isSuccess = false;
    }
  }
?>

<!-- Success Modal -->
<?php if ($isSuccess): ?>
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Your message has been sent successfully!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  // Show the modal after page load if the form was successfully submitted
  window.onload = function() {
    var successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();
  };
</script>
<?php endif; ?>

<!-- Contact Section -->
<section id="contact" class="fourth relative section">
  <!-- Section Title -->
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="container section-title" data-aos="fade-up">
      <h2 class="courses">Contact Us</h2>
    </div>

    <div class="row gy-4">
      <div class="col-lg-5">
        <div class="info-wrap">
          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <i class="bi bi-geo-alt flex-shrink-0"></i>
            <div>
              <h3>Address</h3>
              <p>Western Mindanao State University, Normal Road Baliwasan, Zamboanga City, Philippines, 7000</p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
            <i class="bi bi-telephone flex-shrink-0"></i>
            <div>
              <h3>Call Us</h3>
              <p>+1 5589 55488 55</p>
            </div>
          </div>

          <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
            <i class="bi bi-envelope flex-shrink-0"></i>
            <div>
              <h3>Email Us</h3>
              <p>info@example.com</p>
            </div>
          </div>

          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.3735482103425!2d122.06084003046664!3d6.913571417896019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x325041dd7a24816f%3A0x51af215fb64cc81a!2sWestern%20Mindanao%20State%20University!5e1!3m2!1sen!2sph!4v1734773665670!5m2!1sen!2sph" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

      <div class="col-lg-7">
        <form action="" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
          <div class="row gy-4">
            <div class="col-md-6">
              <label for="name-field" class="pb-2">First Name</label>
              <input type="text" name="firstname" id="name-field" class="form-control" required="">
            </div>
            <div class="col-md-6">
              <label for="name-field" class="pb-2">Last Name</label>
              <input type="text" name="lastname" id="name-field" class="form-control" required="">
            </div>

            <div class="col-md-12">
              <label for="email-field" class="pb-2">Your Email</label>
              <input type="email" class="form-control" name="email" id="email-field" required="">
            </div>

            <div class="col-md-12">
              <label for="message-field" class="pb-2">Message</label>
              <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
            </div>
            <div class="text-center">
                <i class="note text-muted" style="font-size: 0.85rem;">
                    <span class="text-danger">* </span>We will respond via Gmail using the email you provided within 3–4 business days.
                </i>
            </div>
            <div class="col-md-12 text-center">
              <button class="btn btn-success" type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
