// ValaisIT.ch — contact form: send in the background, answer in place.
// Without JavaScript the form still works: contact.php then shows a plain confirmation page.
(function () {
  var form = document.querySelector('[data-contact-form]');
  if (!form || !window.fetch) return;

  var status = form.querySelector('.form-status');
  var button = form.querySelector('button[type="submit"]');

  function say(state, text) {
    status.dataset.state = state;
    status.textContent = text;
  }

  form.addEventListener('submit', function (event) {
    event.preventDefault();
    button.disabled = true;
    say('sending', form.dataset.sending);

    fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
      headers: { 'Accept': 'application/json' }
    })
      .then(function (response) { return response.json(); })
      .then(function (result) {
        if (!result.ok) throw new Error('not sent');
        form.reset();
        say('ok', form.dataset.ok);
      })
      .catch(function () { say('error', form.dataset.error); })
      .then(function () { button.disabled = false; });
  });
})();
