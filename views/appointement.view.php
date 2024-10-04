<div class="flex flex-col gap-6 pb-20">
  <div>
    <h1 class="text-2xl sm:text-4xl font-bold mb-1">Welcome 👋</h1>
    <p class="text-base sm:text-lg">Let us know more about yourself.</p>
  </div>
  <form class="flex flex-col gap-6" method="POST">
    <div class="w-full">
      <?= renderInputField([
        'label' => 'Fullname',
        'id' => 'fullname',
        'type' => 'text',
        'icon' => '/user.svg',
        'placeholder' => 'Enter your fullname'
      ]) ?>
      <?= renderTextError($errors['fullname'] ?? '') ?>
    </div>
    <div class="w-full">
      <?= renderInputField([
        'label' => 'Fullname',
        'id' => 'fullname',
        'type' => 'text',
        'icon' => '/user.svg',
        'placeholder' => 'Enter your fullname'
      ]) ?>
      <?= renderTextError($errors['fullname'] ?? '') ?>
    </div>
    <div class="w-full">
      <?= renderInputField([
        'label' => 'Fullname',
        'id' => 'fullname',
        'type' => 'text',
        'icon' => '/user.svg',
        'placeholder' => 'Enter your fullname'
      ]) ?>
      <?= renderTextError($errors['fullname'] ?? '') ?>
    </div>
  </form>

  <a href="/success">Next</a>
</div>