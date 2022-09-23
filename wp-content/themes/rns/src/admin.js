import "./sass/admin/style.scss";

//Unlock xforwoo

setTimeout(() => {
  const lock_el = document.querySelector("#xforwoocommerce-page .svx-license");
  if (lock_el.classList.contains("locked")) {
    lock_el.classList.remove("locked");
  }
}, 1600);

jQuery(function ($) {
  const tyni_settings = {
    tinymce: {
      wpautop: true,
      formats: {
        alignleft: [
          {
            selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li",
            styles: { textAlign: "left" },
          },
          { selector: "img,table,dl.wp-caption", classes: "alignleft" },
        ],
        aligncenter: [
          {
            selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li",
            styles: { textAlign: "center" },
          },
          { selector: "img,table,dl.wp-caption", classes: "aligncenter" },
        ],
        alignright: [
          {
            selector: "p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li",
            styles: { textAlign: "right" },
          },
          { selector: "img,table,dl.wp-caption", classes: "alignright" },
        ],
        strikethrough: { inline: "del" },
      },
      relative_urls: false,
      remove_script_host: false,
      convert_urls: false,
      browser_spellcheck: true,
      fix_list_elements: true,
      entities: "38,amp,60,lt,62,gt",
      entity_encoding: "raw",
      keep_styles: false,
      paste_webkit_styles: "font-weight font-style color",
      preview_styles:
        "font-family font-size font-weight font-style text-decoration text-transform",
      tabfocus_elements: ":prev,:next",
      plugins:
        "charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview",
      resize: "vertical",
      menubar: false,
      indent: false,
      toolbar1:
        "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv",
      toolbar2:
        "formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help",
      toolbar3: "",
      toolbar4: "",
      body_class: "id post-type-post post-status-publish post-format-standard",
      wpeditimage_disable_captions: false,
      wpeditimage_html5_captions: true,
    },
    quicktags: true,
    mediaButtons: true,
  };

  $(document).ready(function () {
    //Первичная инициализация
    let tab_boxes = $(".rf_admin_tab_box");

    //Перебираем блоки для инициализации редактора
    for (let i = 0; i < tab_boxes.length; i++) {
      let area_left_id = $(tab_boxes[i])
        .children("p")
        .children(".rf_left")
        .attr("id");
      let area_right_id = $(tab_boxes[i])
        .children("p")
        .children(".rf_right")
        .attr("id");
      wp.editor.initialize(area_left_id, tyni_settings);
      wp.editor.initialize(area_right_id, tyni_settings);
    }

    //Повесим функции после инициализации
    productsTabsInit();

    //Кнопка добавления нового таба
    $("#rf_add_new_tab").bind("click", function () {
      let new_el = createNewTabEl();
      $("#rf_tabs_wrap").append(new_el);
      let id_left = $(new_el).children("p").children(".rf_left").attr("id");
      let id_right = $(new_el).children("p").children(".rf_right").attr("id");
      wp.editor.initialize(id_left, tyni_settings);
      wp.editor.initialize(id_right, tyni_settings);
      //Повесим функции после инициализации
      productsTabsInit();
    });

    //Удаление таба
    $(".rf_tab_delete").on("click", function () {
      const parent = $(this).parent("p").parent(".rf_admin_tab_box");
      parent.remove();
      let tab_boxes = $(".rf_admin_tab_box");
      let all_data = agregateData(tab_boxes);
      $("#rf_tabs_json").val(JSON.stringify(all_data));
    });

    //Добавление новой опции
    $("#rf_add_product_option").on("click", function () {
      const parent = $(this).parent(".rf_product_options_wrapper");
      let new_el = createNewOption();
      parent.append(new_el);
      productOptionssInit();
    });

    productOptionssInit();

    //Удаление опции
    $(".rf_remove_option").on("click", function () {
      const parent = $(this).parent(".rf_one_product_option_box");
      parent.remove();
      let opt_boxes = $(".rf_one_product_option_box");
      let all_data = agregateProductOptions(opt_boxes);
      $("#rf_product_options_json").val(JSON.stringify(all_data));
    });
  });

  function productsTabsInit() {
    let tab_boxes = $(".rf_admin_tab_box");
    if (tab_boxes.length > 0) {
      for (let i = 0; i < tab_boxes.length; i++) {
        const left_editor_id = "left" + $(tab_boxes[i]).data("rand");
        const right_editor_id = "right" + $(tab_boxes[i]).data("rand");
        let left_editor = tinyMCE.get(left_editor_id);
        let right_editor = tinyMCE.get(right_editor_id);

        left_editor.on("keyup paste", function () {
          let all_data = agregateData(tab_boxes);
          $("#rf_tabs_json").val(JSON.stringify(all_data));
        });

        right_editor.on("keyup paste", function () {
          let all_data = agregateData(tab_boxes);
          $("#rf_tabs_json").val(JSON.stringify(all_data));
        });
      }
    }
  }

  function agregateData(tab_boxes) {
    let final_tab_json = [];
    for (let i = 0; i < tab_boxes.length; i++) {
      let num_for_id = $(tab_boxes[i]).data("rand");
      let one_tab_obj = {};
      one_tab_obj.name = $(tab_boxes[i])
        .children("p")
        .children(".rf_name")
        .val();
      one_tab_obj.left = tinyMCE.get("left" + num_for_id).getContent();
      one_tab_obj.right = tinyMCE.get("right" + num_for_id).getContent();
      final_tab_json.push(one_tab_obj);
    }

    return final_tab_json;
  }

  function createNewTabEl() {
    const rand_num = Math.floor(Math.random() * (999999 - 1 + 1)) + 1;
    const new_el =
      '<div data-rand="' +
      rand_num +
      '" class="rf_admin_tab_box">' +
      '<p  style="padding:10px;font-size:18px;background:#ccc;color:#fff;"><label>Название таба</label></p>' +
      '<p><button style="float:right;text-align:right;" class="rf-btn rf-btn-primary rf_tab_delete">Удалить таб</button></p>' +
      '<p><input class="rf_name" type="text" name="title" value="" style="width:45%" /></p>' +
      "<p><label>Содержание таба</label></p>" +
      "<p>" +
      '<textarea id="left' +
      rand_num +
      '" class="rf_left" type="text" name="left" style="width:100%;height:100px;float:left;margin-right: 20px;"></textarea><br/><br/>' +
      '<textarea id="right' +
      rand_num +
      '" class="rf_right" type="text" name="right" style="width:100%;height:100px;"></textarea>' +
      "</p>" +
      "</div>";
    return new_el;
  }

  //Опции товаров
  //rf_product_options_json
  function createNewOption() {
    return (
      '<div class="rf_one_product_option_box">' +
      "<label>Название</label>" +
      '<input type="text" class="rf_name" value="" />' +
      "<label>Добавить к стоимости</label>" +
      '<input type="number" class="rf_option_price" value="" />' +
      '<span class="rf_remove_option">- Удалить опцию</span>' +
      "</div>"
    );
  }

  function agregateProductOptions(options_boxes) {
    let final_options_json = [];
    for (let i = 0; i < options_boxes.length; i++) {
      let one_option_obj = {};
      one_option_obj.name = $(options_boxes[i]).children("input.rf_name").val();
      one_option_obj.price = $(options_boxes[i])
        .children("input.rf_option_price")
        .val();
      final_options_json.push(one_option_obj);
    }
    return final_options_json;
  }

  function productOptionssInit() {
    let options_boxes = $(".rf_one_product_option_box");

    console.log(options_boxes);

    if (options_boxes.length > 0) {
      options_boxes.each(function () {
        $(this)
          .children(".rf_name")
          .on("keyup paste", function () {
            let all_data = agregateProductOptions(options_boxes);
            console.log(all_data);
            $("#rf_product_options_json").val(JSON.stringify(all_data));
          });
        $(this)
          .children(".rf_option_price")
          .on("keyup paste", function () {
            let all_data = agregateProductOptions(options_boxes);
            console.log(all_data);
            $("#rf_product_options_json").val(JSON.stringify(all_data));
          });
      });
    }
  }
});
