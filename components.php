<?php

/**
 * Échappe les caractères spéciaux pour être utilisés dans les attributs HTML.
 *
 * @param string $value La valeur à échapper.
 * @return string La valeur échappée.
 */
function escapeHtml($value)
{
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/*============================================================================*/

/**
 * Génère un champ de formulaire en fonction des paramètres spécifiés.
 *
 * Cette fonction permet de rendre un champ de formulaire personnalisé, 
 * avec un type d'entrée spécifié (par défaut, un champ texte), une icône, 
 * un libellé, un espace réservé (placeholder), une valeur par défaut, et un
 * indicateur spécifique pour les numéros de téléphone.
 *
 * @param array $params Tableau associatif contenant les informations nécessaires pour rendre le champ de formulaire :
 *   - 'label' (string) : Le texte du libellé du champ.
 *   - 'id' (string) : L'identifiant unique pour le champ de formulaire.
 *   - 'type' (string) [facultatif] : Le type d'entrée HTML (ex : 'text', 'tel', 'textarea'). Par défaut : 'text'.
 *   - 'icon' (string) [facultatif] : Chemin vers l'icône à afficher à côté du champ. Par défaut : '/user.svg'.
 *   - 'placeholder' (string) [facultatif] : Le texte à afficher comme espace réservé dans le champ de saisie. Par défaut : ''.
 *   - 'defaultValue' (string) [facultatif] : La valeur par défaut du champ de saisie. Par défaut : ''.
 *   - 'isPhone' (bool) [facultatif] : Si le champ est destiné à être un numéro de téléphone. Utilisé uniquement lorsque 'type' est 'tel'. Par défaut : false.
 *
 * @return string Le code HTML du champ de formulaire rendu.
 */

function renderInputField(array $params)
{
  $label = $params['label'];
  $id = $params['id'];
  $type = $params['type'] ?? 'text';
  $icon = $params['icon'] ?? '';
  $placeholder = $params['placeholder'] ?? '';
  $defaultValue = $params['defaultValue'] ?? '';
  $isPhone = $params['isPhone'] ?? false;

  if ($type === 'textarea') {
    return renderTextareaField(compact('label', 'id', 'placeholder', 'defaultValue'));
  } elseif ($type === 'tel' && $isPhone) {
    return renderPhoneField(compact('label', 'id', 'icon', 'placeholder', 'defaultValue'));
  } else {
    return renderStandardInput(compact('label', 'id', 'type', 'icon', 'placeholder', 'defaultValue'));
  }
}


/*-----------------------------------------------------------------------*/

function renderStandardInput(array $params)
{
  $inputAttributes = sprintf(
    'type="%s" id="%s" placeholder="%s" class="h-[48px] w-full bg-transparent outline-none" value="%s"',
    escapeHtml($params['type']),
    escapeHtml($params['id']),
    escapeHtml($params['placeholder']),
    escapeHtml($params['defaultValue'])
  );

  // Vérifier si une icône est fournie
  $iconHtml = '';
  if (!empty($params['icon'])) {
    $iconHtml = sprintf(
      '<img src="%s" alt="icon" class="cursor-pointer">',
      escapeHtml(resolveAssetUrl($params['icon']))
    );
  }

  return sprintf(
    '<div class="relative flex flex-col gap-3">
            <label for="%s" class="text-[#ABB8C4]">%s</label>
            <div class="input-container flex gap-3 items-center w-full rounded-[8px] border border-[#363A3D] bg-[#1A1D21] pl-3 overflow-hidden">
                %s
                <input name="%s" %s>
            </div>
        </div>',
    escapeHtml($params['id']),
    escapeHtml($params['label']),
    $iconHtml,  // Insérer l'HTML de l'icône ici
    escapeHtml($params['id']),
    $inputAttributes
  );
}


/*-----------------------------------------------------------------------*/

function renderTextareaField(array $params)
{
  return sprintf(
    '<div class="relative flex flex-col gap-3">
            <label for="%s" class="text-[#ABB8C4] text-nowrap">%s</label>
            <textarea id="%s" name="%s" placeholder="%s" class="h-[100px] w-full bg-[#1A1D21] outline-none border border-[#363A3D] rounded-[8px] p-3">%s</textarea>
        </div>',
    escapeHtml($params['id']),
    escapeHtml($params['label']),
    escapeHtml($params['id']),
    escapeHtml($params['id']),
    escapeHtml($params['placeholder']),
    escapeHtml($params['defaultValue'])
  );
}

/*-----------------------------------------------------------------------*/

function renderPhoneField(array $params)
{
  $inputAttributes = sprintf(
    'type="tel" id="%s" placeholder="%s" class="h-[48px] w-full bg-transparent outline-none" value="%s"',
    escapeHtml($params['id']),
    escapeHtml($params['placeholder']),
    escapeHtml($params['defaultValue'])
  );

  return sprintf(
    '<div class="relative flex flex-col gap-3">
            <label for="%s" class="text-[#ABB8C4] text-nowrap">%s</label>
            <div class="input-container flex gap-3 items-center w-full rounded-[8px] border border-[#363A3D] bg-[#1A1D21] pl-3 overflow-hidden">
                <img src="%s" alt="icon" class="cursor-pointer" onclick="toggleCountryCodeList(\'%s\')">
                <input name="%s" %s>
            </div>
            <div id="countryCodeList-%s" class="absolute top-full left-0 w-[200px] hidden bg-[#1A1D21]/80 backdrop-blur-lg rounded text-white z-10 max-h-48 overflow-y-auto">
                %s
            </div>
        </div>',
    escapeHtml($params['id']),
    escapeHtml($params['label']),
    resolveAssetUrl($params['icon']),
    escapeHtml($params['id']),
    escapeHtml($params['id']),
    $inputAttributes,
    escapeHtml($params['id']),
    renderCountryCodeList($params['id'])
  );
}

/*-----------------------------------------------------------------------*/

/**
 * Génère la liste des codes de pays à afficher.
 *
 * @return string Le code HTML de la liste des indicatifs téléphoniques.
 */
function renderCountryCodeList($id)
{
  $countryCodes = [
    ['code' => '+221', 'country' => 'Sénégal'],
    ['code' => '+225', 'country' => 'Côte d&apos;Ivoire'],
    ['code' => '+226', 'country' => 'Burkina Faso'],
    ['code' => '+227', 'country' => 'Niger'],
    ['code' => '+228', 'country' => 'Togo'],
    ['code' => '+229', 'country' => 'Bénin'],
    ['code' => '+223', 'country' => 'Mali'],
    ['code' => '+220', 'country' => 'Guinée-Bissau'],
  ];

  $listHtml = '';
  foreach ($countryCodes as $country) {
    $listHtml .= '
        <div class="px-4 py-2 hover:bg-gray-600 cursor-pointer text-nowrap" onclick="selectCountryCode(\'' . $id . '\', \'' . $country['code'] . '\')">'
      . $country['code'] . ' (' . $country['country'] . ')
        </div>';
  }

  return $listHtml;
}

/*-----------------------------------------------------------------------*/

function renderButton($label, $name)
{
  return sprintf(
    '<button type="submit" name="%s" class="relative flex gap-3 items-center justify-center w-full h-[48px] rounded-[8px] bg-[#24AE7C] duration-300 overflow-hidden">
            %s
        </button>',
    escapeHtml($name),
    escapeHtml($label)
  );
}

/*-----------------------------------------------------------------------*/

function renderTextError($error)
{
  return $error ? '<small class="text-xs text-red-400">' . htmlspecialchars($error) . '</small>' : '';
}

/*-----------------------------------------------------------------------*/

function renderRadioButtonGroup($name, $options)
{
  $radioButtons = '';
  foreach ($options as $value => $label) {
    $radioButtons .= sprintf(
      '<ul class="radio-group flex-1 flex items-center h-[48px] px-3 rounded-[8px] border border-[#363A3D] bg-[#1A1D21]">
                <li class="relative pl-10 flex items-center">
                    <input class="radio" type="radio" name="%s" id="%s" />
                    <label class="mt-px inline-block ps-[0.15rem] hover:cursor-pointer" for="%s">%s</label>
                    <div class="bullet"><div class="line zero"></div><div class="line one"></div></div>
                </li>
            </ul>',
      escapeHtml($name),
      escapeHtml($value),
      escapeHtml($value),
      escapeHtml($label)
    );
  }
  return $radioButtons;
}

/*-----------------------------------------------------------------------*/

function renderSelectField(array $params)
{
  $optionsHtml = '';
  foreach ($params['options'] as $value => $label) {
    $optionsHtml .= sprintf(
      '<option value="%s">%s</option>',
      escapeHtml($value),
      escapeHtml($label)
    );
  }

  return sprintf(
    '<div class="relative flex flex-col gap-3 text-[#ABB8C4]">
            <label for="%s">%s</label>
            <select id="%s" name="%s" class="h-[48px] w-full bg-[#1A1D21] border border-[#363A3D] rounded-[8px] px-3">
                %s
            </select>
        </div>',
    escapeHtml($params['id']),
    escapeHtml($params['label']),
    escapeHtml($params['id']),
    escapeHtml($params['id']),
    $optionsHtml
  );
}

/*-----------------------------------------------------------------------*/

function renderCheckbox($name, $label, $checked = false)
{
  $checkedAttribute = $checked ? 'checked' : '';
  return sprintf(
    '<div class="flex gap-2 items-center">
            <label class="checkbox path">
                <input name="%s" type="checkbox" %s>
                <svg viewBox="0 0 21 21"><path d="M5,10.75 L8.5,14.25 L19.4,2.3"></path></svg>
            </label>
            <label class="text-[#ABB8C4]" for="%s">%s</label>
        </div>',
    escapeHtml($name),
    $checkedAttribute,
    escapeHtml($name),
    escapeHtml($label)
  );
}
