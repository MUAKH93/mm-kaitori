(function () {
  var toggle = document.querySelector('.nav-toggle');
  var nav = document.querySelector('#primary-nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      var open = nav.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
    });

    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'メニューを開く');
      });
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && nav.classList.contains('is-open')) {
        nav.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        toggle.setAttribute('aria-label', 'メニューを開く');
        toggle.focus();
      }
    });
  }

  // Automobile tax refund estimator (ordinary cars, monthly prorate to March).
  var run = document.getElementById('mma-refund-run');
  if (run) {
    run.addEventListener('click', function () {
      var band = document.getElementById('mma-refund-band');
      var month = document.getElementById('mma-refund-month');
      var result = document.getElementById('mma-refund-result');
      var amountEl = document.getElementById('mma-refund-amount');
      if (!band || !month || !result || !amountEl) return;

      var annual = parseInt(band.value, 10);
      var m = parseInt(month.value, 10);
      if (!annual || !m) {
        result.hidden = false;
        amountEl.textContent = '—';
        return;
      }

      // Remaining months after scrap month through March (fiscal year end).
      var remaining = m >= 4 ? (3 + 12 - m) : (3 - m);
      if (remaining < 0) remaining = 0;
      var estimate = Math.floor((annual * remaining) / 12);
      amountEl.textContent = estimate.toLocaleString('ja-JP');
      result.hidden = false;
    });
  }

  // Two-step quote forms (Haishall-like numbered rows).
  document.querySelectorAll('form.quote-form--steps').forEach(function (form) {
    var step1 = form.querySelector('.quote-step[data-step="1"]');
    var step2 = form.querySelector('.quote-step[data-step="2"]');
    var nextBtn = form.querySelector('.quote-form__next');
    var backBtn = form.querySelector('.quote-form__back');
    var err = form.querySelector('.quote-form__step-error');
    var labels = form.querySelectorAll('.quote-steps__item');

    if (!step1 || !step2 || !nextBtn || !backBtn) return;

    function showError(msg) {
      if (!err) return;
      if (msg) {
        err.textContent = msg;
        err.hidden = false;
      } else {
        err.textContent = '';
        err.hidden = true;
      }
    }

    function bindFocusRows(stepEl) {
      stepEl.querySelectorAll('.quote-line').forEach(function (line) {
        var field = line.querySelector('input, select, textarea');
        if (!field) return;
        field.addEventListener('focus', function () {
          stepEl.querySelectorAll('.quote-line').forEach(function (l) {
            // Keep required rows highlighted; optional rows highlight on focus only.
            if (!l.querySelector('[required]')) l.classList.remove('is-focus');
          });
          line.classList.add('is-focus');
        });
      });
    }

    bindFocusRows(step1);
    bindFocusRows(step2);

    function setStep(n) {
      form.setAttribute('data-mma-steps', String(n));
      var onFirst = n === 1;
      step1.classList.toggle('is-active', onFirst);
      step2.classList.toggle('is-active', !onFirst);
      step1.hidden = !onFirst;
      step2.hidden = onFirst;
      labels.forEach(function (el) {
        el.classList.toggle('is-active', el.getAttribute('data-step-label') === String(n));
      });
      showError('');
      var focusEl = (onFirst ? step1 : step2).querySelector('select, input, textarea, button');
      if (focusEl) focusEl.focus({ preventScroll: true });
    }

    function validateStep(stepEl) {
      var fields = stepEl.querySelectorAll('input, select, textarea');
      for (var i = 0; i < fields.length; i++) {
        var field = fields[i];
        if (field.disabled || field.type === 'hidden') continue;
        if (!field.checkValidity()) {
          field.reportValidity();
          return false;
        }
      }
      return true;
    }

    nextBtn.addEventListener('click', function () {
      if (!validateStep(step1)) {
        showError('必須項目を入力してください。');
        return;
      }
      setStep(2);
    });

    backBtn.addEventListener('click', function () {
      setStep(1);
    });

    form.addEventListener('submit', function (e) {
      if (form.getAttribute('data-mma-steps') !== '2') {
        e.preventDefault();
        setStep(2);
        return;
      }
      if (!validateStep(step2)) {
        e.preventDefault();
        showError('必須項目をご確認ください。');
      }
    });
  });
})();
