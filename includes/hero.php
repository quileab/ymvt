<section id="hero-section" class="mt-20">
  <!--img src="images/header.webp" class="w-full"-->
  <div id='hero-slider'></div>
  <script>
    var containerId = 'hero-slider';

    var options = {
      transitionTime: 500,
      transitionZoom: 'random',
      bullets: true,
      arrows:true,
      arrowsHide: true,
      swipe: true,
      auto: true,
      autoTime: 5000,
      autoPauseOnHover: true,
      webp: true,
        images: [
            {
                imageUrl: 'images/header01.webp',
                textTitle: 'YerbaMate',
                textBody: 'Viajes y Turismo',
                textPosition: 'NE'
            },
            {
                imageUrl: 'images/header02.webp',
                textTitle: 'YerbaMate',
                textBody: 'Viajes y Turismo',
            }
        ]
    }

    var slider = createSlider(containerId, options);
</script>
</section>