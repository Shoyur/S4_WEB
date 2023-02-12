<?php include "includes/header.php"; ?>

<?php

  $name = $email = $body = "";
  $nameErr = $emailErr = $bodyErr = "";

  if (isset($_POST['submit'])) {
    // Confirmer que le champ "nom" est correct :
    if (empty($_POST['name'])) { $nameErr = "Le nom est requis."; }
    else { $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); }
    // Confirmer que le champ "email" est correct :
    if (empty($_POST['email'])) { $emailErr = "Le courriel est requis."; }
    else { $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL); }
    // Confirmer que le champ "body" est correct :
    if (empty($_POST['name'])) { $bodyErr = "Le texte de feeback est requis."; }
    else { $body = filter_input(INPUT_POST, "body", FILTER_SANITIZE_FULL_SPECIAL_CHARS); }
    if (empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
      $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";
    }
    if (mysqli_query($conn, $sql)) {
      header("Location: feedback.php");
    }
    else {
      echo "Erreur: " . mysqli_error($conn);
    }
  }

?>

    <img src="/S4_WEB/TraversyTuto/feedback/img/logo.png" class="w-25 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Traversy Media</p>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label <?php echo $nameErr ? 'is-invalid' : null; ?>">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback"><?php echo $nameErr; ?></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label <?php echo $emailErr ? 'is-invalid' : null; ?>">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback"><?php echo $emailErr; ?></div>
      </div>
      <div class="mb-3">
        <label for="body" class="form-label <?php echo $bodyErr ? 'is-invalid' : null; ?>">Feedback</label>
        <textarea class="form-control" id="body" name="body" placeholder="Enter your feedback"></textarea>
        <div class="invalid-feedback"><?php echo $bodyErr; ?></div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>

<?php include "includes/footer.php"; ?>