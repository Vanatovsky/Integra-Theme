import { $ } from "spritespin/release/src/utils";
import * as Swal from "./sweetalert";

$(document).ready(function () {
  $("#rf_custom_add_to_cart_box").append(
    $(".woocommerce-variation-add-to-cart .quantity")
  );
  $("#rf_custom_add_to_cart_box").append(
    $(".woocommerce-variation-add-to-cart .single_add_to_cart_button")
  );

  //Удалим блок с выбором аттрибутов вариативного товара из DOM
  // $("table.variations").remove()
  // $('.woocommerce-variation-add-to-cart-disabled').removeClass("woocommerce-variation-add-to-cart-disabled").addClass("woocommerce-variation-add-to-cart-enabled")

  $(".rf_add_to_cart:not(.not_added)").on("click", function (e) {
    e.preventDefault(); // Prevent the click from going to the link

    const product_id = $(this).data("product_id");
    const variation_id = $(this).data("variation_id");
    const quantity = $(this).data("quantity");
    const this_button = $(this);

    $.ajax({
      url: wc_add_to_cart_params.ajax_url,
      method: "post",
      data: {
        action: "rf_add_to_cart",
        product_id: product_id,
        variation_id: variation_id,
        quantity: quantity,
      },
      beforeSend: function () {
        console.log(product_id, variation_id, quantity);
        this_button.text("Добавляем...");
      },
      success: function (returnData) {
        this_button.text("В корзине");
        this_button.addClass("rf_added");
        console.log(returnData);
        if (returnData["error"]) {
          Swal.fire({
            icon: "error",
            title: "Товар не добавлен",
            text: "Что-то пошло не так, мы не смогли добавить этот товар в корзину",
            footer: '<a href="/shop/">Каталог товаров</a>',
          });
        } else {
          Swal.fire({
            icon: "success",
            title: "Товар добавлен в корзину",
            text: "Вы успешно добавили товар в вашу конзину. Закройте это окно для продолжения покупок или перейдите к оформлению заказа",
            footer: '<a href="/oformlenie-zakaza/">Оформить заказ</a>',
          });
        }
      },
      error: function (xhr, textStatus, errorThrown) {
        alert("Ошибка на сервере");
      },
    });
  });

  //Изменение данных о вариации в карточке товара
  $(".rf_col_item.rf_variation").on("click", function (event) {
    //Изменияем данные
    const add_to_cart_btn = $(this)
      .children(".rf_row_item")
      .children("span.rf_add_to_cart");
    const var_desc = add_to_cart_btn.data("variation-desc");
    const var_price = add_to_cart_btn.data("price-prod");
    const var_id = add_to_cart_btn.data("variation_id");
    $(".woocommerce-variation-add-to-cart .variation_id").val(Number(var_id));
    $(".rf_choose_product_str").html("<b>Выбрано: </b>" + var_desc);
    $(".rf_product_price").html(var_price);

    //Изменим данные в селектах таблицы вариации
    const json_attrs = add_to_cart_btn.data("json-attributes");
    for (let key in json_attrs) {
      $("#" + key).val(json_attrs[key]);
    }

    //Поменяем класс активной вариации в списке
    $(".rf_col_item.rf_variation").removeClass("rf_first_col_variation");
    $(this).addClass("rf_first_col_variation");
  });

  $("#rf_add_to_cart_trigger").on("click", () => {
    $(".single_add_to_cart_button").trigger("click");
  });

  $("#quantity_trigger").on("change", function (el) {
    const val_this = el.target.value;
    const input_quantity = $(
      ".woocommerce-variation-add-to-cart input[name=quantity]"
    );
    input_quantity.val(val_this);
    input_quantity.change();
  });
});
