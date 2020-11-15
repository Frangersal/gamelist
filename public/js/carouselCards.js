
//   Otra version

const buildSlideMarkup = (count) => {
	let slideMarkup = '';
  for (var i = 1; i <= count; i++) {
      slideMarkup += '\
      <slide> \
        <div class="card" style="width: 10rem;"> \
            <img src="https://s1.gaming-cdn.com/images/products/2616/271x377/the-legend-of-zelda-breath-of-the-wild-switch-cover.jpg" style="width: 300px; max-width: 100%;" class="card-img-top" alt="..."> \
            <div class="card-body"> \
                <h5 class="card-title">The Legend of Zelda</h5> \
                <p class="card-text">Some quick example text.</p> \
                <a href="#" class="btn btn-primary">+GameList</a> \
            </div>\
        </div> \
      </slide>'
  }
  return slideMarkup;
};

var carouselCards = new Vue({
	el: '#carouselCards',
    components: {
        'carousel': VueCarousel.Carousel,
        'slide': VueCarousel.Slide
    },
    template: '<div><carousel :scrollPerPage="true" :perPageCustom="[[480, 2], [768, 3]]">' + buildSlideMarkup(9) + '</carousel></div>'
});




Vue.config.devtools = true