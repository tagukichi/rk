/* ============================================
   株式会社オフィスＲＫ コーポレートサイト
   共通スクリプト
   ============================================ */

document.addEventListener('DOMContentLoaded', () => {
  // ---------- ヘッダー：スクロールで影を付ける ----------
  const header = document.querySelector('.site-header');
  const onScroll = () => {
    header.classList.toggle('is-scrolled', window.scrollY > 10);
  };
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  // ---------- ハンバーガーメニュー ----------
  const toggle = document.querySelector('.nav-toggle');
  const nav = document.querySelector('.global-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const isOpen = nav.classList.toggle('is-open');
      toggle.classList.toggle('is-open', isOpen);
      toggle.setAttribute('aria-expanded', String(isOpen));
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });
    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        nav.classList.remove('is-open');
        toggle.classList.remove('is-open');
        toggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
  }

  // ---------- スクロールリビール ----------
  const reveals = document.querySelectorAll('.reveal');
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: '0px 0px -40px 0px' }
    );
    reveals.forEach((el) => observer.observe(el));
  } else {
    reveals.forEach((el) => el.classList.add('is-visible'));
  }

  // ---------- お問い合わせフォーム バリデーション ----------
  const form = document.querySelector('#contact-form');
  if (form) {
    const showError = (field, message) => {
      field.classList.add('is-error');
      const error = field.closest('.form-group').querySelector('.error-message');
      if (error) {
        error.textContent = message;
        error.classList.add('is-visible');
      }
    };
    const clearError = (field) => {
      field.classList.remove('is-error');
      const error = field.closest('.form-group').querySelector('.error-message');
      if (error) error.classList.remove('is-visible');
    };

    form.querySelectorAll('.form-control').forEach((field) => {
      field.addEventListener('input', () => clearError(field));
    });

    form.addEventListener('submit', (e) => {
      e.preventDefault();
      let valid = true;

      const name = form.querySelector('#name');
      const email = form.querySelector('#email');
      const message = form.querySelector('#message');

      if (!name.value.trim()) {
        showError(name, 'お名前を入力してください。');
        valid = false;
      }
      if (!email.value.trim()) {
        showError(email, 'メールアドレスを入力してください。');
        valid = false;
      } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value.trim())) {
        showError(email, 'メールアドレスの形式が正しくありません。');
        valid = false;
      }
      if (!message.value.trim()) {
        showError(message, 'お問い合わせ内容を入力してください。');
        valid = false;
      }

      if (!valid) return;

      // 静的サイト段階では送信処理は行わず完了メッセージのみ表示。
      // WordPress化の際に Contact Form 7 等へ置き換える。
      const result = form.querySelector('.form-result');
      form.reset();
      if (result) {
        result.classList.add('is-visible');
        result.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }
    });
  }
});
