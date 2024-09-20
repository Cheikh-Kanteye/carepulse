<div class="flex flex-col gap-4">
  <div>
    <h1 class="text-2xl sm:text-4xl font-bold mb-1">Hi there...</h1>
    <p class="text-base sm:text-lg">Get Started with Appointments.</p>
  </div>

  <form class="flex flex-col gap-6" method="POST">
    <div>
      <?= renderInputField(['label' => 'Fullname', 'id' => 'fullname', 'type' => 'text', 'icon' => '/user.svg', 'placeholder' => 'Enter your fullname']) ?>
      <?= renderTextError($fullnameErr) ?>
    </div>

    <div>
      <?= renderInputField(['label' => 'Email Address', 'id' => 'email', 'type' => 'email', 'icon' => '/email.svg', 'placeholder' => 'Enter your email address']) ?>
      <?= renderTextError($emailErr) ?>
    </div>

    <div>
      <?= renderInputField(['label' => 'Phone', 'id' => 'phone', 'type' => 'tel', 'icon' => '/phone.svg', 'placeholder' => '123-456-7890', 'isPhone' => true]) ?>
      <?= renderTextError($phoneErr) ?>
    </div>

    <?= renderButton('Get started', 'getStarted') ?>
  </form>
</div>