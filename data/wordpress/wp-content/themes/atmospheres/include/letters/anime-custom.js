jQuery('.ml2').each(function(){
  jQuery(this).html(jQuery(this).text().replace(/\S/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: false})
  .add({
    targets: '.ml2 .letter',
    scale: [14,1],
    opacity: [0,1],
    easing: "easeOutCirc",
    duration: 900,
    delay: (el, i) => 200 * i
  });
