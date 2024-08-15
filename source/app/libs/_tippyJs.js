import tippy from 'tippy.js';

export function tippyJs () {
  tippy('[data-tippy-content]', {
    theme: 'tomato',
		allowHTML: true,
  });
}