<?php

/**
 * @var string $auth_key
 * @var array $place_marks
 */

?>
<?php $img_map = wp_get_attachment_image_src($design['img'], 'medium', false); ?>
<?php $img_map_hover = wp_get_attachment_image_src($design['img_hover'], 'medium', false); ?>

<div id="map"></div>

<div class='rf-container'>
	<?php $c_a = 0; ?>
	<?php foreach ($place_marks as $mark) { ?>
		<div id="rf-address_map_box_<?= $c_a ?>" class="address_map_box light_box_hover_effect">
			<div class="rf-item">
				<p class="rf_name"><?= $mark['company_name'] ?></p>
				<span class="rf_type_address">
					<?php
					if ($mark['address_type'] == "partner") {
						echo "Партнер";
					}
					if ($mark['address_type'] == "distrib") {
						echo "Дистрибьютор";
					}
					?>
				</span>
			</div>
			<div class="rf-item rf_contacts">
				<p><img class="rf_img_geo" alt="иконка" src="/wp-content/themes/rns/image/icons/GEO.svg" /> <?= $mark['address'] ?></p>
				<p><img class="rf_img_time" alt="иконка" src="/wp-content/themes/rns/image/icons/Clock.svg" /> <?= $mark['work_time'] ?></p>
			</div>
			<div class="rf-item rf_contacts">
				<p><img class="rf_img_phone" alt="иконка" src="/wp-content/themes/rns/image/icons/iPhone1.svg" /><?= $mark['phone'] ?></p>
				<p><img class="rf_img_email" alt="иконка" src="/wp-content/themes/rns/image/icons/iLetter.svg" /><?= $mark['email'] ?></p>
			</div>
		</div>
		<?php $c_a++; ?>
	<?php } ?>
</div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<?= $auth_key ?>" type="text/javascript"></script>
<script>
	ymaps.ready(function() {
		var myMap = new ymaps.Map('map', {
				center: [<?= $coordinates['latitude'] ?>, <?= $coordinates['longitude'] ?>],
				zoom: <?= $coordinates['zoom'] ?>,
			}, {
				searchControlProvider: 'yandex#search'
			}),

			// Создаём макет содержимого.
			MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
				'<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
			),

			<?php $i = 0; ?>
		<?php foreach ($place_marks as $mark) { ?>
			<?php $name_i = 'rf_Placemark_' . $i; ?>

			<?= $name_i ?> = new ymaps.Placemark([<?= $mark['latitude'] ?>, <?= $mark['longitude'] ?>], {


				<?php
				$typ = '';
				if ($mark['address_type'] == "partner") {
					$typ = "Партнер";
				}
				if ($mark['address_type'] == "distrib") {
					$typ = "Дистрибьютор";
				}
				?>

				hintContent: '<b style="font-size: 18px;"><?= $mark['company_name'] ?></b><br/><?= $typ ?><br/><br/><?= $mark['address'] ?><br/><b><?= $mark['phone'] ?></b>',
				//balloonContent: '',
				//iconContent: '12'
			}, {
				// Опции.
				// Необходимо указать данный тип макета.
				iconLayout: 'default#imageWithContent',
				// Своё изображение иконки метки.
				iconImageHref: '<?= $img_map[0] ?>',
				// Размеры метки.
				iconImageSize: [100, 100],
				// Смещение левого верхнего угла иконки относительно
				// её "ножки" (точки привязки).
				iconImageOffset: [0, 0],
				// Смещение слоя с содержимым относительно слоя с картинкой.
				iconContentOffset: [0, 0],
				// Макет содержимого.
				iconContentLayout: MyIconContentLayout,
			});


			myMap.geoObjects.add(<?= $name_i ?>);

			$("#rf-address_map_box_<?= $i ?>").hover(e => {
				<?= $name_i ?>.options.unset('iconImageHref');
				<?= $name_i ?>.options.set('iconImageHref', "<?= $img_map_hover[0] ?>");
			}, e => {
				<?= $name_i ?>.options.unset('iconImageHref');
				<?= $name_i ?>.options.set('iconImageHref', "<?= $img_map[0] ?>");
			});


			<?php $i++; ?>
		<?php } ?>
		myMap.behaviors.disable('scrollZoom');
	});
</script>

<style>
	#map {
		width: 100%;
		height: 450px;
		padding: 0;
		margin: 0;

		z-index: 1000;
	}

	@media screen and (min-width:768px) {
		#map {
			position: sticky;
			top: 0;
			height: 50vh;
		}
	}

	@media screen and (max-width:768px) {
		#map {
			height: 50vh;
		}
	}
</style>