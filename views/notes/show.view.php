
<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<div class="min-h-full">

  
  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <p class="mb-6">
        <a href="/notes" class="text-blue-400 hover:underline">
          Go Back...
        </a>
      </p>
      <? foreach($notes as $note) ?>
        <p><?=htmlspecialchars($note['body'])  ?></p> 
       
    </div>
  </main>

  
  <?php require base_path('views/partials/footer.php') ?>