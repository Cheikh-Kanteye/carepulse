<?php require("header.php"); ?>



<main class="flex h-screen">
  <div class="flex-1 px-4 sm:px-8 max-w-screen-md mx-auto py-8">
    <img src="<?= resolveAssetUrl("/logo-full.svg") ?>" alt="logo" class="mb-20" />
    <?php require($formView); ?>
  </div>

  <div class="<?= $size ? 'max-w-[' . $size . '] w-full' : 'w-1/2' ?> h-screen hidden sm:block">
    <div class="fixed top-0 right-0
    <?= $size ? 'max-w-[' . $size . '] w-full' : 'w-1/2' ?>
    <?= $bgUrl ? 'bg-[url(' . $bgUrl . ')]' : 'bg-gray-900' ?>
    h-full bg-cover bg-no-repeat rounded-l-xl overflow-hidden bg-center
  "></div>
  </div>
</main>

<?php require("footer.php"); ?>