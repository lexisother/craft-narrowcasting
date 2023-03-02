import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.esm.browser.min.js';

// Notes {{{
// TODO: Introduce the LocalStorage manager
// TODO: Introduce the entity system and use that for controlling handlers
// TODO: Introduce the dynamic data system and store the state in localStorage
// }}}

/** @type {import("swiper").Swiper} */
export let swiper;

swiper = new Swiper('.swiper', {
  direction: 'horizontal',
  loop: true,
});

// Controls the left-right functionality
let ArrowLeft = () => swiper.slidePrev();
let ArrowRight = () => swiper.slideNext();
const handler = { ArrowLeft, ArrowRight };
document.addEventListener('keydown', (e) => {
  const k = e.key;
  // This notation stops ESLint from complaining about `no-prototype-builtins`.
  if (Object.prototype.hasOwnProperty.call(handler, k)) {
    handler[k](k);
  }
});
