
let widgetId1;
export default function () {
  function onloadCallback () {
    widgetId1 = grecaptcha.render('example1', {
      'sitekey': '6Lc7hMIUAAAAADe09QkSQEH1j4q3fqt7KEjDI-Mr',
      'theme': 'light'
    });
  }
  onloadCallback();
}

