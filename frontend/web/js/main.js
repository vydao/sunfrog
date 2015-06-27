$(function() {
     $("img.lazy").lazyload({
        data_attribute: "original",
        effect : "fadeIn",
        effectspeed: 1000,
        threshold : 100
    });
});