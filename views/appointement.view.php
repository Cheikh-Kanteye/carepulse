<?php
$errors =[];
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if(empty($_POST['Fullname']))
  {
    $errors['Fullname']='fullname is required';
  }

  if(empty($_POST['age']))
  {
    $errors['age']='age is required';
  }

  if(empty($_POST['phone']))
  {
    $errors['phone']='phone is required';
  }

  if(empty($_POST['email']))
  {
    $errors['email']='email is required';
  }

}

?>

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
        'label' => 'Age',
        'id' => 'age',
        // 'type' => 'number',
        'icon' => '/user.svg',
        'placeholder' => 'Enter your age'
    ]) ?>
    <?= renderTextError($errors['age'] ?? '') ?>
</div>

<div class="w-full">
        <?= renderInputField([
          'label' => 'Phone',
          'id' => 'phone',
          'type' => 'tel',
          'icon' => '/phone.svg',
          'placeholder' => '123-456-7890',
          'isPhone' => true
        ]) ?>
        <?= renderTextError($errors['phone'] ?? '') ?>
      </div>

      <!-- <div class="flex flex-col sm:flex-row gap-4"> -->
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Email Address',
          'id' => 'email',
          'type' => 'email',
          'icon' => '/email.svg',
          'placeholder' => 'Enter your email address'
        ]) ?>
        <?= renderTextError($errors['email'] ?? '') ?>

      </div>
      <!-- <button type="submit">Submit</button> -->
      <?= renderButton('Submit', "getStarted") ?>
  </form>

  <a href="/success">Next</a>
</div>