  // Sticky nav shadow
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 40);
  });

  // Scroll reveal
  const reveals = document.querySelectorAll('.reveal');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        // stagger siblings
        const siblings = [...e.target.parentElement.querySelectorAll('.reveal')];
        const idx = siblings.indexOf(e.target);
        setTimeout(() => e.target.classList.add('visible'), idx * 80);
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.12 });
  reveals.forEach(r => obs.observe(r));

  // Animated counters
  function animateCounter(el, target, suffix) {
    let start = 0;
    const step = target / 60;
    const timer = setInterval(() => {
      start += step;
      if (start >= target) { start = target; clearInterval(timer); }
      el.innerHTML = (Number.isInteger(target) ? Math.floor(start) : start.toFixed(1)) + `<span>${suffix}</span>`;
    }, 22);
  }
  const statsObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        const nums = document.querySelectorAll('.stat-num');
        animateCounter(nums[0], 500, '+');
        animateCounter(nums[1], 10, 'k+');
        animateCounter(nums[2], 98, '%');
        animateCounter(nums[3], 4.9, '★');
        statsObs.disconnect();
      }
    });
  }, { threshold: 0.5 });
  const strip = document.querySelector('.stats-strip');
  if (strip) statsObs.observe(strip);
