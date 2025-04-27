<?php 
    session_start();
    require_once "admin-chopdown/head.php";
    require_once "../classes/faculty&staff.class.php";
    require_once "admin-chopdown/sidebar.php";
    require_once '../tools/clean.php';
?>

<style>
  .preview-container {
    width: 200px;
    height: 200px;
    margin: 0 auto;
    border-radius: 50%;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  #previewImage {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  input[type="file"] {
    cursor: pointer;
  }
</style>
  
<div class="container mt-5" style="width: 77%; margin-right: 40px; shadow-lg">
  <div class="card shadow-lg p-4">
    <h4 class="mb-4 text-center">Add Profile Picture</h4>
    <form action="uploads.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3 text-center">
        <!-- <label for="profilePic" class="form-label fw-semibold">Profile Picture</label> -->
        <div class="preview-container mb-3">
          <img id="previewImage" src="../imgs/profile.png" alt="Preview" class="img-thumbnail rounded-circle shadow-sm" style="object-fit: cover;">
        </div>
        <div class="d-flex justify-content-center">
        <input class="form-control w-auto" style="max-width: 500px;" type="file" id="profilePic" name="profilepicture" accept="image/*">
        </div>

      </div>
      <div class="d-flex justify-content-center mt-5">
      <button type="submit" name="submit" class="btn btn-success px-4" style="max-width: 150px; width: 100%;">Add Profile</button>

    </div>
    </form>
  </div>
</div>

  <script>
  const profileInput = document.getElementById('profilePic');
  const previewImage = document.getElementById('previewImage');

  profileInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file && file.type.startsWith("image/")) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewImage.src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  });
</script>