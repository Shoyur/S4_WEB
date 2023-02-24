<?php include "includes/header.php"; ?>

<?php 
  $sql = "SELECT * FROM feedback";
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
   
    <h2>Feedback</h2>

    <?php if (empty($feedback)) : ?>
      <p class="lead mt3">Il n'y a aucun feedback...</p>
    <?php else : ?>
    <?php foreach($feedback as $item) : ?>
    <div class="card my-3">
     <div class="card-body">
     <?php echo $item['body']; ?>
     <div class="text-secondary mt-2">
      Par <?php echo $item['name']; ?>, le <?php echo $item['date']; ?>.
     </div>
     </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>

  
<?php include "includes/footer.php"; ?>