<div class="flex flex-col gap-6 pb-20">
  <div>
    <h1 class="text-2xl sm:text-4xl font-bold mb-1">Welcome 👋</h1>
    <p class="text-base sm:text-lg">Let us know more about yourself.</p>
  </div>

  <form class="flex flex-col gap-6" method="POST">
    <h2 class="text-xl sm:text-3xl font-bold mt-2">Personal Information</h2>
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

    <div class="flex flex-col sm:flex-row gap-4">
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
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Date of birth',
          'id' => 'birth',
          'type' => 'text',
          'icon' => '/calendar.svg',
          'placeholder' => 'Select your date of birth'
        ]) ?>
        <?= renderTextError($errors['birth'] ?? '') ?>
      </div>

      <div class="w-full gap-3 flex flex-col">
        <label for="gender" class="text-[#ABB8C4]">Gender</label>
        <div class="flex justify-between gap-4">
          <?= renderRadioButtonGroup('gender', $options) ?>
        </div>
        <?= renderTextError($errors['gender'] ?? '') ?>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Address',
          'id' => 'address',
          'type' => 'text',
          'placeholder' => 'ex: 14 street, New York, NY - 5101'
        ]) ?>
        <?= renderTextError($errors['address'] ?? '') ?>
      </div>
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Occupation',
          'id' => 'occupation',
          'type' => 'text',
          'placeholder' => 'Software Engineer'
        ]) ?>
        <?= renderTextError($errors['occupation'] ?? '') ?>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Emergency contact name',
          'id' => 'emergency_contact',
          'type' => 'text',
          'placeholder' => 'Guardian’s name'
        ]) ?>
        <?= renderTextError($errors['emergency_contact'] ?? '') ?>
      </div>

      <div class="w-full">
        <?= renderInputField([
          'label' => 'Emergency Phone number',
          'id' => 'emergency_phone',
          'type' => 'tel',
          'icon' => '/phone.svg',
          'placeholder' => 'ex: +1 (868) 579-9831',
          'isPhone' => true
        ]) ?>
        <?= renderTextError($errors['emergency_phone'] ?? '') ?>
      </div>
    </div>

    <h2 class="text-xl sm:text-3xl font-bold mt-2">Medical Information</h2>
    <div class="w-full">
      <?= renderSelectField([
        'label' => 'Primary care physician',
        'id' => 'primary_physician',
        'options' => [
          'dr_smith' => 'Dr. Smith',
          'dr_jones' => 'Dr. Jones',
          'dr_brown' => 'Dr. Brown',
        ]
      ]) ?>
      <?= renderTextError($errors['primary_physician'] ?? '') ?>
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Insurance provider',
          'id' => 'insurance_provider',
          'placeholder' => 'Dr. Adam Smith'
        ]) ?>
        <?= renderTextError($errors['insurance_provider'] ?? '') ?>
      </div>

      <div class="w-full">
        <?= renderInputField([
          'label' => 'Insurance policy number',
          'id' => 'insurance_policy',
          'placeholder' => 'ex: ABC1234567'
        ]) ?>
        <?= renderTextError($errors['insurance_policy'] ?? '') ?>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Allergies (if any)',
          'id' => 'allergies',
          'type' => 'textarea',
          'placeholder' => 'ex: BlueCross'
        ]) ?>
        <?= renderTextError($errors['allergies'] ?? '') ?>

      </div>
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Current medications',
          'id' => 'medications',
          'type' => 'textarea',
          'placeholder' => 'ex: Ibuprofen 200mg, Levothyroxine 50mcg'
        ]) ?>
        <?= renderTextError($errors['medications'] ?? '') ?>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
      <div class="w-full">
        <?= renderInputField([
          'label' => 'Family medical history (if relevant)',
          'id' => 'family_medical_history',
          'type' => 'textarea',
          'placeholder' => 'ex: Mother had breast cancer'
        ]) ?>
        <?= renderTextError($errors['family_medical_history'] ?? '') ?>
      </div>

      <div class="w-full">
        <?= renderInputField([
          'label' => 'Past medical history',
          'id' => 'past_medical_history',
          'type' => 'textarea',
          'placeholder' => 'ex: Asthma diagnosis in childhood'
        ]) ?>
        <?= renderTextError($errors['past_medical_history'] ?? '') ?>
      </div>
    </div>

    <h2 class="text-xl sm:text-3xl font-bold mt-2">Identification and Verification</h2>
    <div class="w-full">
      <?= renderSelectField([
        'label' => 'Identification type',
        'id' => 'identification_type',
        'options' => [
          'birth_certificate' => 'Birth Certificate',
          'national_id' => 'National ID',
          'passport' => 'Passport',
        ]
      ]) ?>
      <?= renderTextError($errors['identification_type'] ?? '') ?>
    </div>

    <div class="w-full">
      <?= renderInputField([
        'label' => 'Identification Number',
        'id' => 'id_number',
        'type' => 'text',
        'placeholder' => 'ex: 1234567'
      ]) ?>
      <?= renderTextError($errors['id_number'] ?? '') ?>
    </div>

    <h2 class="text-xl sm:text-3xl font-bold mt-2">Consent and Privacy</h2>
    <div class="w-full">
      <?= renderCheckbox('consent_treatment', 'I consent to receive treatment for my health condition.', $formData['consent_treatment']) ?>
      <?= renderTextError($errors['consent_treatment'] ?? '') ?>
    </div>

    <div class="w-full">
      <?= renderCheckbox('consent_use_info', 'I consent to the use and disclosure of my health information for treatment purposes.', $formData['consent_use_info']) ?>
      <?= renderTextError($errors['consent_use_info'] ?? '') ?>
    </div>

    <div class="w-full">
      <?= renderCheckbox('consent_privacy_policy', 'I acknowledge that I have reviewed and agree to the privacy policy.', $formData['consent_privacy_policy']) ?>
      <?= renderTextError($errors['consent_privacy_policy'] ?? '') ?>
    </div>

    <?php require "partials/Dropzone.php" ?>

    <div class="w-full my-3">
      <?= renderButton('Submit and continue', "getStarted") ?>
    </div>
  </form>
</div>