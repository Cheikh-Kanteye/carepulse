  <script>
    function toggleCountryCodeList(inputId) {
      const countryCodeList = document.getElementById('countryCodeList-' + inputId);
      if (countryCodeList) {
        countryCodeList.classList.toggle('hidden');
      }
    }

    function selectCountryCode(inputId, code) {
      const inputField = document.getElementById(inputId);
      if (inputField) {
        inputField.value = code + ' ' + inputField.value.replace(/^\+\d+\s*/, '');
        toggleCountryCodeList(inputId);
      }
    }
  </script>

  </body>

  </html>