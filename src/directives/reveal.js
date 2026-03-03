export default {
  mounted(el, binding) {
    const opts = binding.value || {};
    const delay = opts.delay ?? 0;
    const once = opts.once ?? true;

    el.style.setProperty("--reveal-delay", `${delay}ms`);
    el.classList.add("reveal");
    // Fallback: prevent blank pages if IntersectionObserver does not fire
    requestAnimationFrame(() => el.classList.add("is-visible"));

    const io = new IntersectionObserver(
      (entries) => {
        for (const e of entries) {
          if (e.isIntersecting) {
            el.classList.add("is-visible");
            if (once) io.unobserve(el);
          } else if (!once) {
            el.classList.remove("is-visible");
          }
        }
      },
      { threshold: 0.15 }
    );

    io.observe(el);
    el._revealIO = io;
  },
  unmounted(el) {
    el._revealIO?.disconnect?.();
  },
};
