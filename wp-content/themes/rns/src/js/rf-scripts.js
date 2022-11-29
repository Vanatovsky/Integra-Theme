import * as SpriteSpin from "spritespin";
import { $ } from "spritespin/release/src/utils";
import Inputmask from "inputmask";

jQuery(function () {
  //input Mascs
  const selector_imt = document.getElementsByClassName("rf-phone");
  const imt = new Inputmask("+7(999)999-99-99");
  imt.mask(selector_imt);

  //Materialize Initializations
  $(".modal").modal();
  $(".rf-btn").addClass("waves-effect");
  $("select").formSelect();

  setTimeout(() => {
    $("#rf_loader_box").addClass("loaded");
  }, 8000);

  $(".leftside label").each((ind, elem) => {
    const t = $(elem).text();
    const html = $(elem).html();
    const new_html = html.replace(t, "<span>" + t + "</span>");
    $(elem).html(new_html);
  });

  $(".button").addClass("btn");
  $(".single_add_to_cart_button").removeClass("btn").addClass("btn-large");

  // $('.spritespin').spritespin({
  //     source: [
  //         '/wp-content/uploads/360_lib/folder_17/frame_1.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_2.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_3.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_4.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_5.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_6.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_7.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_8.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_9.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_10.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_11.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_12.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_13.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_14.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_15.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_16.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_17.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_18.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_19.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_20.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_21.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_22.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_23.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_24.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_25.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_26.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_27.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_28.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_29.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_30.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_31.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_32.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_33.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_34.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_35.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_36.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_37.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_38.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_39.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_40.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_41.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_42.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_43.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_44.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_45.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_46.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_47.jpg',
  //         '/wp-content/uploads/360_lib/folder_17/frame_48.jpg',
  //     ],
  //     width: 980,
  //     height: 540,
  //     sizeMode: 'fit',
  //     frames: 48,
  //     responsive: true,
  //     sence: 0
  // })

  // <<< Слайдеры OWL Carousel

  const objects_slider = $(".rf_object_slider_content");
  objects_slider.owlCarousel({
    items: 4,
    loop: false,
    autoplay: false,
    navigation: false,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 3,
      },
      992: {
        items: 4,
      },
    },
  });

  const slider_product_gallery = $(".owl-carousel-product-page");
  slider_product_gallery.owlCarousel({
    items: 1,
    loop: false,
    autoplay: true,
    navigation: true,
    dots: true,
  });

  const youtube_slider = $(".rf_youtube_slider_previews");
  youtube_slider.owlCarousel({
    items: 4,
    loop: false,
    autoplay: false,
    navigation: true,
    nav: true,
    navText: [
      '<img alt="Стрелка влево" src="/wp-content/themes/rns/assets/images/icons/Left.svg" />',
      '<img alt="Стрелка вправо" src="/wp-content/themes/rns/assets/images/icons/Right.svg" />',
    ],
    dots: false,
  });

  //клики по слайдеру
  $(".rf_youtube_slider_previews img").on("click", function () {
    let v =
      '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' +
      $(this).data("youid") +
      '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    $(".rf_youtube_video_box").html(v);
  });

  youtube_slider.on("changed.owl.carousel", (event) => {
    // console.log(event.item.index)
    const curentUrl = $(".rf_youtube_slider_previews img")
      .eq(event.item.index)
      .data("youid");
    let v =
      '<iframe width="100%" height="315" src="https://www.youtube.com/embed/' +
      curentUrl +
      '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    $(".rf_youtube_video_box").html(v);
  });

  const slider_product_gallery_nav = $(".owl-carousel-product-page-navigation");
  slider_product_gallery_nav.owlCarousel({
    //items: 5,
    loop: false,
    autoplay: false,
    nav: false,
    dots: false,
    margin: 10,
    autoWidth: false,
    responsive: {
      0: {
        items: 3,
      },
      768: {
        items: 3,
      },
      769: {
        items: 5,
      },
    },
  });

  slider_product_gallery.on("changed.owl.carousel", function (event) {
    //console.log('после изменения карусель - ', event.page.index);
  });

  const gallery_previews = $(".owl-carousel-product-page-navigation");

  gallery_previews
    .children(".owl-stage-outer")
    .children(".owl-stage")
    .children(".owl-item")
    .on("click", function () {
      slider_product_gallery.trigger("to.owl.carousel", [$(this).index(), 500]);
    });

  $(".main-carousel").owlCarousel({
    center: true,
    loop: true,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 3,
      },
      769: {
        items: 7,
      },
    },
  });

  $(".owl-carousel-main-slider").owlCarousel({
    //center: true,
    loop: true,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 3,
      },
      769: {
        items: 3,
      },
    },
  });

  $(".owl-carousel-with-navigation").owlCarousel({
    //center: true,
    loop: true,
    nav: true,
    navText: [
      '<img alt="Стрелка влево" src="/wp-content/themes/rns/assets/images/icons/Left.svg" />',
      '<img alt="Стрелка вправо" src="/wp-content/themes/rns/assets/images/icons/Right.svg" />',
    ],
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 3,
      },
      769: {
        items: 3,
      },
    },
  });

  // $('.top-slider').slick({
  //     slidesToShow: 1,
  //     arrows: true,
  //     dots: true,
  //     infinite: true,
  //     speed: 500,
  //     fade: true,
  //     cssEase: 'linear',
  //     responsive: [{
  //         breakpoint: 768,
  //         settings: {
  //             adaptiveHeight: true
  //         }
  //     }]
  // });

  $(".owl-carousel-logos").owlCarousel({
    items: 4,
    loop: true,
    autoWidth: true,
    autoplay: true, //Автозапуск слайдера
    smartSpeed: 1000, //Время движения слайда
    autoplayTimeout: 4000, //Время смены слайда
    margin: 100,
    dots: false,
    responsive: {
      0: {
        items: 3,
        margin: 20,
      },
      768: {
        items: 4,
      },
      960: {
        items: 6,
      },
    },
  });

  $(".owl-carousel-post").owlCarousel({
    autoplay: true, //Автозапуск слайдера
    smartSpeed: 1000, //Время движения слайда
    autoplayTimeout: 5000, //Время смены слайда
    loop: true,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      960: {
        items: 3,
      },
    },
  });

  $(".owl-carousel-inner-dots").owlCarousel({
    items: 1,
    loop: true,
    dots: true,
    autoplay: true, //Автозапуск слайдера
    smartSpeed: 1000, //Время движения слайда
    autoplayTimeout: 4000, //Время смены слайда
  });
  // >>>

  const boxes_slider = $(".rf_boxes_slider").owlCarousel({
    items: 1,
    loop: false,
    dots: false,
    nav: false,
    autoplay: false, //Автозапуск слайдера
    smartSpeed: 1000, //Время движения слайда
    autoplayTimeout: 4000, //Время смены слайда
  });

  boxes_slider.on("changed.owl.carousel", function (event) {
    const num_slide = event.item.index + 1;
    $(".rf_boxes_slider_topper .rf_count .rf_active_num").text(num_slide);
    //console.log('после изменения карусель - ', event.item.index + 1)
  });

  $(".rf_boxes_slider_topper .rf_arrow_btns .rf_left_btn").click(function () {
    boxes_slider.trigger("prev.owl.carousel");
  });

  $(".rf_boxes_slider_topper .rf_arrow_btns .rf_right_btn").click(function () {
    boxes_slider.trigger("next.owl.carousel");
  });

  const horisontal_slider = $(".rf_horisontal_one_image_slider").owlCarousel({
    items: 1,
    loop: false,
    dots: false,
    nav: false,
    autoplay: false, //Автозапуск слайдера
    smartSpeed: 1000, //Время движения слайда
    autoplayTimeout: 4000, //Время смены слайда
  });

  horisontal_slider.on("changed.owl.carousel", function (event) {
    $(".rf_horisontal_slider_bottom_navigation .rf_item").removeClass(
      "rf_active"
    );
    $(
      ".rf_horisontal_slider_bottom_navigation .rf_item:nth-of-type(" +
        (event.item.index + 1) +
        ")"
    ).addClass("rf_active");
  });

  $(".rf_horisontal_slider_bottom_navigation .rf_item").on(
    "click",
    function (event) {
      $(".rf_horisontal_slider_bottom_navigation .rf_item").removeClass(
        "rf_active"
      );
      $(this).addClass("rf_active");
      horisontal_slider.trigger("to.owl.carousel", $(this).index());
    }
  );

  // <<< Компонент - открытие изображения
  let mouse_x = 0;
  let mouse_y = 0;
  $(".rf-can-open-image").mousedown(function (e) {
    mouse_x = e.clientX;
    mouse_y = e.clientY;
  });
  $(".rf-can-open-image").mouseup(function (e) {
    const mouse_x_next = e.clientX;
    const mouse_y_next = e.clientY;
    const move =
      mouse_x - mouse_x_next > 10 ||
      mouse_x_next - mouse_x > 10 ||
      mouse_y - mouse_y_next > 10 ||
      mouse_y_next - mouse_y > 10;
    if (!move) {
      openImageWindow($(this));
    }
  });

  $(".rf-open-image .rf-close").click(function () {
    closeImageWindow();
  });

  // >>>

  $(".rf_tabs_in_product .rf_item .rf_header").on("click", function () {
    const item_box = $(this).parent(".rf_item");
    if (item_box.hasClass("active")) {
      $(this).parent(".rf_item").removeClass("active");
    } else {
      $(this).parent(".rf_item").addClass("active");
    }
  });

  //<<<<<ФОРМЫ ПОКУПКИ
  $(".rf-page-url").val(document.location.href);

  const inputs_phones = document.querySelectorAll("input[name=rf-phone]");

  var maskOptions = {
    mask: "+{7}(000)000-00-00",
  };
  inputs_phones.forEach((el_i) => {
    IMask(el_i, maskOptions);
  });

  //$("#rf_name_good_for_form").text($('h1').text());
  // $(".rf_col_item.rf_variation").on('click', function() {
  //     const desc_var = $(this).data('desc');
  //     const h1_text = $('h1').text();
  //     const str_for_replace = h1_text + " " + desc_var;
  //     $("#rf_name_good_for_form").text(str_for_replace);
  //     openModal('#sale_form');
  // });

  //>>>>>>>>>

  // <<< Виджет Tabs
  // $('.rf-tabs-header ul li').on('click', function () {
  //     $('.rf-tabs-header ul li').removeClass('active');
  //     $(this).addClass('active');
  //     const index = $(this).index() + 1;
  //     $('.rf-tabs-items .rf-item').removeClass('visible');
  //     $('.rf-tabs-items .rf-item:nth-of-type(' + index + ')').addClass('visible');
  // });
  // >>>

  // $('.over-hide-box').click(function() {
  //     openHiddenContact($(this).parent('div'));
  // });

  // $("#rf_by_1_click_btn").on("click", () => {
  //     $("#rf_name_good_for_form").text($("h1").text());
  //     console.log($("h1").text(), "by 1 click");
  //     openModal("#sale_form");
  // });

  $(".rf_know_price").on("click", function () {
    $("#rf_product_name_cf").val($(this).data("product"));
  });

  $(".grid_toggle i").click(function () {
    $(".card-product-list").removeClass("grid");
    $(".card-product-list").removeClass("no-grid");
    $(".card-product-list").addClass($(this).data("grid"));
    $(".grid_toggle i").removeClass("active");
    $(this).addClass("active");
  });

  // $(".rf_header_burger").click(function(){
  //     openMenu();
  // });

  $(".rf_header_burger_mobile").click(function () {
    if ($(this).hasClass("open")) {
      closeMobileMenu();
      $(this).removeClass("open");
    } else {
      openMobileMenu();
      $(this).addClass("open");
    }
  });

  $(".rf_accordion .rf_item .rf_item_header").click(function () {
    const item_box = $(this).parent(".rf_item");
    openAccordionItem(item_box);
  });

  $(".wc-proceed-to-checkout a").addClass(["btn-large", "success"]);
  $(
    ".checkout_coupon.woocommerce-form-coupon .button[name=apply_coupon]"
  ).addClass(["btn", "primary"]);
  $("#place_order").addClass(["btn", "success", "btn_order_complete"]);
  $(".button.wc-backward").addClass(["btn", "success"]);

  $("body").on("updated_checkout", function () {
    $("#place_order").addClass(["btn-large", "success", "btn_order_complete"]);
  });

  // let x_ext_4897 = 0;
  // $(".ivpa-opt.ivpa_custom_option.ivpa_text").each(function() {
  //     if (x_ext_4897 < 1) {
  //         $(this).addClass('rf_first_option');
  //         $(this).prepend('<p class="rf_start_extra_option">Вы можете настроить дополнительные опции:</p>');
  //     }
  //     x_ext_4897++;
  // });

  // $(".single_variation_wrap").on("show_variation", function(event, variation) {

  //Меняем цену
  // const variation_price = variation.display_price;
  // let total_price = variation_price;

  // const price_box = $('span.rf_price:not(.diler) span');
  // const price_diler_box = $('span.rf_price.diler span');
  // const options_bundle = $('.ivpa_custom');

  // for (let i = 0; i < options_bundle.length; i++){
  //     if ($(options_bundle[i]).children('input').hasClass('ivpa_clicked')){
  //         total_price += $(options_bundle[i]).children('.ivpa-addprice').data('add');
  //     }
  // }

  // price_box.text(total_price);
  // price_diler_box.text(total_price);

  //Добавление классов кнопке в корзину
  //     $('.single_add_to_cart_button').addClass(['btn-large', 'waves-effect', 'teal', 'lighten-1']);

  //     //Прокручиваем галлерею до нужного файла
  //     const image_var = variation.image.full_src;
  //     const carousel = $("#k234d");
  //     let arr_src = [];
  //     const arr_items_in_carousel = carousel.children('.owl-stage-outer').children('.owl-stage').children('.owl-item').children('div').children('img');
  //     for (let i = 0; i < arr_items_in_carousel.length; i++) {
  //         arr_src.push($(arr_items_in_carousel[i]).attr('src'));
  //     }
  //     const num_slide = arr_src.indexOf(image_var);
  //     carousel.trigger('to.owl.carousel', [num_slide, 300]);
  // });

  // getWooHiddenPrice();

  // $('.ivpa_select_wrapper .ivpa_select_wrapper_inner .ivpa-terms span').on('click', function() {
  //     let chenge_price_after = setTimeout(function() {
  //         getWooHiddenPrice();
  //     }, 200);
  // });

  // $('.ivpa-opt.ivpa_custom_option .ivpa-terms .ivpa_term').on('click', function() {
  //     let clone_this = $(this).clone();
  //     clone_this.children('span').remove();
  //     let option_name = clone_this.text().trim();
  //     if ($(this).hasClass('ivpa_clicked')) {
  //         option_name = "Не выбрано";
  //     }
  //     $(this).parent('.ivpa-terms').parent('.ivpa_custom_option').children('.rf_ivpa_custom_option_choice').text(option_name);
  //     $(this).parent('.ivpa-terms').addClass('rf_hidden');
  //     let chenge_price_after = setTimeout(function() {
  //         getWooHiddenPrice();
  //     }, 200);
  // });

  // //добавим новые элементы для показа выбранного
  // $('.ivpa-opt.ivpa_custom_option.ivpa_text').each(function() {
  //     $(this).append('<div class="rf_ivpa_custom_option_choice">Не выбрано</div>');
  //     $(this).append('<span class="rf_filter_arrow"></span>');
  //     $(this).children('.ivpa-terms').append('<span class="rf_close"></span>');
  //     $(this).children('.ivpa-terms').addClass('rf_hidden');
  //     $(this).children('.ivpa-terms').children('.rf_close').on('click', function() {
  //         $(this).parent('.ivpa-terms').addClass('rf_hidden');
  //     });
  //     $(this).children('.rf_ivpa_custom_option_choice').on('click', function() {
  //         $('.ivpa-opt.ivpa_custom_option.ivpa_text').each(function() {
  //             $(this).children('.ivpa-terms').addClass('rf_hidden');
  //         });
  //         $(this).parent('.ivpa-opt').children('.ivpa-terms').removeClass('rf_hidden');
  //     });
  //     $(this).children('.rf_filter_arrow').on('click', function() {
  //         $('.ivpa-opt.ivpa_custom_option.ivpa_text').each(function() {
  //             $(this).children('.ivpa-terms').addClass('rf_hidden');
  //         });
  //         $(this).parent('.ivpa-opt').children('.ivpa-terms').removeClass('rf_hidden');
  //     });
  // });

  //Меняем цену при клике по опциям
  // $('.ivpa_custom input[type=checkbox]').change(function (event) {
  //     const price_box = $('span.rf_price:not(.diler) span');
  //     const price_diler_box = $('span.rf_price.diler span');
  //     const add_price = $(this).parent('.ivpa_term').children('.ivpa-addprice').data('add');
  //     let total_price = Number(price_box.text());
  //     if (event.target.checked){
  //         total_price += add_price;
  //     } else {
  //         total_price -= add_price
  //     }
  //     price_box.text(total_price);
  //     price_diler_box.text(total_price);
  // });

  // ______________========Для вариаций финал========______________

  //Дополнительные опции в товарах

  // if ($('.rf_product_page_top .rf_right form.cart .wccpf-fields-container > div table.wccpf_fields_table .wccpf_label').length) {
  //     $('.rf_product_page_top .rf_right .rf_header').removeClass("rf_hide")
  // }

  // $('.rf_extra_options .rf_one_pop p').on('click', function() {
  //     if ($(this).hasClass('active')) {
  //         $(this).removeClass('active');
  //     } else {
  //         $(this).addClass('active');
  //     }
  // });

  //Работа с корзиной
  $(".rf_cart_row .rf_item.product-name").each(function (ind, elem) {
    // Variations list
    const box_list_vars = $(elem).children(".variation");
    if (box_list_vars.length) {
      box_list_vars.after("<span class='rf_open_variations'>Развернуть</span>");
    }
  });

  $(".rf_cart_row .rf_item.product-name .rf_open_variations").on(
    "click",
    function () {
      const var_box = $(this).parent(".rf_item").children(".variation");
      if (var_box.hasClass("rf_open")) {
        var_box.removeClass("rf_open");
        $(this).text("Развернуть");
      } else {
        var_box.addClass("rf_open");
        $(this).text("Свернуть");
      }
    }
  );

  //Open loader
  // $('a').on("click", (el) => {
  //     //console.log($(el.target).attr('href').includes("#"))
  //     // if (!$(el.target).attr('href')) {
  //     //     return
  //     // }
  //     // if (!$(el.target).attr('href').includes("#")) {
  //     //     $("#rf_loader_box").removeClass("loaded")
  //     //     $("#rf_loader_box .preloader-wrapper").removeClass("loaded")
  //     // }
  // })
}); // >>> Close document ready

//Функция которая достанет цену из скрытой цены
// function getWooHiddenPrice() {
//     const box_with_price = $('.ivpa-prices-add .price');
//     const price_elements = box_with_price.children('.woocommerce-Price-amount');
//     const box_for_people_price = $('.rf_product_price .rf_item .rf_price:not(.diler) span');
//     const box_for_diler_price = $('.rf_product_price .rf_item .rf_price.diler span');
//     const diler_tax = $('#rf_diler_tax').val();

//     let str_price_people = '';
//     let str_price_diler = '';

//     let x = 0;
//     price_elements.each(function() {
//         let str_price = $(this).text();
//         let num_price = parseInt(str_price.replace(/[^0-9]/g, ""));
//         const separ = x > 0 ? ' – ' : '';
//         str_price_people += separ + num_price;
//         if (diler_tax > 0) {
//             let num_price_diler = num_price - num_price / 100 * diler_tax;
//             str_price_diler += separ + num_price_diler;
//         }
//         x++;
//     });

//     box_for_people_price.text(str_price_people);
//     if (diler_tax > 0) {
//         box_for_diler_price.text(str_price_diler);
//     }

// }

// <<<<<<<< Functions for RF Accordion
function openAccordionItem(item) {
  if (!item.hasClass("active")) {
    $(".rf_accordion .rf_item.active .rf_item_body").slideUp();
    $(".rf_accordion .rf_item.active").removeClass("active");
    item.children(".rf_item_body").slideDown();
    item.addClass("active");
  }
}
// >>>>>>>>>>

// function openMenu() {
//     $("#top_outside_menu").animate({ "top": 0 }, 300, function() {
//         $("#top_outside_menu").removeClass("rf_hide");
//     });
// }

// function closeMenu() {
//     closeMenuLvl2();
//     $("#top_outside_menu").addClass("rf_hide");
//     $("#top_outside_menu").animate({ "top": "-100vh" }, 300);

// }

// function clearMenuLvl2() {
//     $('.rf_menu_box_simulator .rf_item .rf_cat_show_lvl_2').empty();
// }

// function openMenuLvl2(menu_str, img) {
//     if (!$("#top_outside_menu").hasClass("rf_hide")) {
//         $('.rf_menu_box_simulator .rf_item .rf_cat_show_lvl_2').append(menu_str).prepend(img);
//         $('.rf_menu_box_simulator .rf_item .rf_cat_show_lvl_2').stop(true, false).animate({ "top": '100vh', }, 300);
//     }
// }

// function closeMenuLvl2() {
//     clearMenuLvl2();
//     $('.rf_menu_box_simulator .rf_item .rf_cat_show_lvl_2').stop(true, false).animate({ "top": '0', }, 300);
// }

// function openMobileMenu() {
//     $(".rf_mobile_menu_wrapper").slideDown();
// }

// function closeMobileMenu() {
//     $(".rf_mobile_menu_wrapper").slideUp();
// }

// <<< Функции для компонента - открытия изображения
function closeImageWindow() {
  $(".rf-open-image").animate(
    {
      opacity: 0,
    },
    400,
    function () {
      $(".rf-open-image").css({
        display: "none",
      });
    }
  );
}

function openImageWindow(e) {
  $(".rf-open-image").css({
    display: "block",
  });

  $(".rf-open-image").animate(
    {
      opacity: 1,
    },
    400
  );

  let open_src = e.data("full");
  if (!open_src) {
    open_src = e.attr("src");
  }
  let parent_box = e.parent("div").parent("div").parent("div");
  let num = e.parent("div").parent("div").index();
  if (!parent_box.hasClass("owl-stage")) {
    parent_box = e.parent("div").parent("div");
    num = e.parent("div").index();
  }

  if (parent_box.hasClass("owl-stage") || parent_box.hasClass("rf_like_owl")) {
    //Это owl-carousel слайдер

    const arr_imgs = parent_box.children();

    let owl_items = [];

    if (parent_box.hasClass("owl-stage")) {
      const id_box = parent_box.parent("div").parent("div").attr("id");
      owl_items = $("#" + id_box)
        .children(".owl-stage-outer")
        .children(".owl-stage")
        .children(".owl-item")
        .children("div")
        .children(".rf-item-slider");
    }

    if (parent_box.hasClass("rf_like_owl")) {
      const id_box = parent_box.attr("id");
      owl_items = $("#" + id_box)
        .children(".rf_item")
        .children(".rf_image_ground");
    }

    let arr_string_items = "";
    owl_items.each(function (ind, elem) {
      const src = $(elem).data("full");
      arr_string_items +=
        "<div><div class='rf_owl_imgground' style='background-image:url(" +
        src +
        ")' ></div></div>";
    });

    $("#rf_img_show_wrapper").html(
      "<div id='rf_asdf8kjks8' class='owl-carousel owl_show_img'>" +
        arr_string_items +
        "</div>"
    );

    $(".owl_show_img").owlCarousel({
      autoplay: false, //Автозапуск слайдера
      smartSpeed: 100, //Время движения слайда
      nav: true,
      navigation: true,
      navText: [
        '<img alt="Стрелка влево" src="/wp-content/themes/rns/assets/images/icons/Left.svg" />',
        '<img alt="Стрелка вправо" src="/wp-content/themes/rns/assets/images/icons/Right.svg" />',
      ],
      //autoplayTimeout: 5000, //Время смены слайда
      loop: true,
      items: 1,
      startPosition: num,
    });
  } else {
    $("#rf_img_show").attr("src", open_src);
  }
}
// >>>

// <<< Функции для компонента - модальные окна
function closeModal(id) {
  $(id).animate(
    {
      opacity: 0,
    },
    400,
    function () {
      $(id).css({
        display: "none",
      });
    }
  );
}

function openModal(id) {
  $(id).css({
    display: "block",
  });
  $(id).animate(
    {
      opacity: 1,
    },
    400
  );
}
// >>>

function openHiddenContact(box) {
  box.children(".help-hide-box").fadeOut(400);
  box.children(".over-hide-box").fadeOut(400);
  box.children("a").children(".blur-hidden").addClass("show");
}

// //Если с английского на русский, то передаём вторым параметром true.
// transliterate = (
//     function() {
//         var
//             rus = "щ   ш  ч  ц  ю  я  ё  ж  ъ  ы  э  а б в г д е з и й к л м н о п р с т у ф х ь".split(/ +/g),
//             eng = "shh sh ch cz yu ya yo zh `` q ee a b v g d e z i j k l m n o p r s t u f x `".split(/ +/g);
//         return function(text, engToRus) {
//             var x;
//             for (x = 0; x < rus.length; x++) {
//                 text = text.split(engToRus ? eng[x] : rus[x]).join(engToRus ? rus[x] : eng[x]);
//                 text = text.split(engToRus ? eng[x].toUpperCase() : rus[x].toUpperCase()).join(engToRus ? rus[x].toUpperCase() : eng[x].toUpperCase());
//             }
//             return text;
//         }
//     }
// )();
//var txt = "Съешь ещё этих мягких французских булок, да выпей же чаю!";
// alert(transliterate(txt));
// alert(transliterate(transliterate(txt), true));
