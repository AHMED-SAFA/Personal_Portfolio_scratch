const upButton = document.getElementById("upButton");

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    upButton.classList.add("fadeInUp");
    upButton.style.display = "block";
  } else {
    upButton.classList.remove("fadeInUp");
    upButton.style.display = "none";
  }
}

upButton.addEventListener("click", () => {
  scrollToTop(900);
});

function scrollToTop(duration) {
  const start = window.pageYOffset;
  const startTime =
    "now" in window.performance ? performance.now() : new Date().getTime();

  function scroll() {
    const currentTime =
      "now" in window.performance ? performance.now() : new Date().getTime();
    const timeElapsed = currentTime - startTime;
    const run = ease(timeElapsed, start, -start, duration);
    window.scrollTo(0, run);
    if (timeElapsed < duration) {
      requestAnimationFrame(scroll);
    }
  }

  function ease(t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
  }

  requestAnimationFrame(scroll);
}
