
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>


<div class="min-h-full">

  
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <ul>
      <?php foreach($notes as $note): ?>
        <li>
            <a href="note?id=<?= $note['id'] ?>" class="text-blue-400 hover:underline"> 
            <?= htmlspecialchars($note['body'])  ?>
          </a>
        </li>
     
      <?php endforeach ?>
      </ul>
      <p class="mt-8">
        <a href="/note-create" class="text-blue-400 hover:underline">Create Note</a>
      </p>
    </div>
  </main>

  
  <?php require base_path('views/partials/footer.php') ?>