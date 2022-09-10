import * as THREE from 'three'

import { TextGeometry } from 'three/examples/jsm/geometries/TextGeometry'
import { textHoverMaterial, textMaterial } from '../inc/materials'
import { TWEEN } from 'three/examples/jsm/libs/tween.module.min'
import { TW } from '../inc/extra_functions'
import { Settings } from '../settings/main_settings'

let level_2_text_group
let text_objs_for_raycaster = []
let active_text_group = new THREE.Group()
let animate_rotation_texts, animate_scale_texts
let animate_cursor_move
let camera_animation

const text_group_names = ["text", "text_2", "text_3", "text_4", "text_5"]
let old_active_group_place = {}
let old_active_group_name



export function raycasterListenerTextesLevel2(settings, scene, camera, raycaster, pointCursorGroup, level_2_group) {

    let intersects = raycaster.intersectObjects(text_objs_for_raycaster)

    for (const planes_helper_text of text_objs_for_raycaster) {
        planes_helper_text.parent.children[0].material = textMaterial
    }

    if (intersects.length > 0) {

        $('canvas').css('cursor', 'pointer');

        for (const intersect_group of intersects) {

            intersect_group.object.parent.children[0].material = textHoverMaterial

            if (settings.active_text_group_level_2_name !== intersect_group.object.parent.name && settings.whale_home) {

                settings.active_text_group_level_2_name = intersect_group.object.parent.name

                if (settings.cursor_can_move) {
                    animate_cursor_move = new TWEEN.Tween(pointCursorGroup.position).to({
                        x: intersect_group.object.parent.position.x - .2,
                        y: intersect_group.object.parent.position.y + 0.05,
                        z: intersect_group.object.parent.position.z
                    }, 1000).easing(TWEEN.Easing.Circular.Out).start()
                }

                console.log(settings.cursor_can_move)

                active_text_group = intersect_group.object.parent

            }

            if (!settings.mobile_version) {
                document.querySelector("canvas.webgl").addEventListener("click", () => {
                    settings.cursor_can_move = false
                    openLevel2Page(settings, scene, camera, level_2_group)
                })
            } else {
                if (!settings.opening_page_level_2) {
                    settings.cursor_can_move = false
                    settings.opening_page_level_2 = true
                    openLevel2Page(settings, scene, camera, level_2_group)
                }
            }


        }

    } else {
        $('canvas').css('cursor', 'default');
        settings.active_text_group_level_2_name = ''
        if (!settings.mobile_version) {
            settings.cursor_can_move = true
            document.querySelector("canvas.webgl").removeEventListener("click", openLevel2Page(settings, scene, camera, level_2_group))
        }

    }




}




export async function createLevel2Texts(gui, settings, text_font, level_2_group) {

    /**
     * Fonts
     */
    const materialPlaneHelterText = new THREE.MeshStandardMaterial({
        visible: false,
    })





    /**
     * Text 1
     */
    const text_1_group = new THREE.Group()
    const textGeometry = new TextGeometry(
            `Системы
автоматизации`, {
                font: text_font,
                size: 0.15,
                height: .01,
                curveSegments: 2,
                bevelEnabled: true,
                bevelThickness: 0,
                bevelSize: 0,
                bevelOffset: 0,
                bevelSegments: 5
            }
        )
        //textGeometry.center()
    const text = new THREE.Mesh(textGeometry, textMaterial)
        //text.layers.enable(settings.layer_bloom_scene)
    const text_1_plane_helper_mesh = new THREE.Mesh(new THREE.PlaneBufferGeometry(2, 0.5, 2), materialPlaneHelterText)
        //text_1_plane_helper_mesh.layers.enable(settings.layer_bloom_scene)
    text_1_plane_helper_mesh.position.x += 1
    text_1_group.position.x = settings.text_position_x
    text_1_group.position.y = settings.text_position_y
    text_1_group.position.z = settings.text_position_z
    text_1_group.rotation.y = Math.PI * settings.text_rotation_coeficent
    text_1_group.add(text)
    text_1_group.name = 'text'
    text_1_group.add(text_1_plane_helper_mesh)

    /**
     * Text 2
     */

    const text_2_group = new THREE.Group()
    const textGeometry_2 = new TextGeometry(
            `СИСТЕМЫ
ОЧИСТКИ СТОКОВ`, {
                font: text_font,
                size: 0.12,
                height: .01,
                curveSegments: 2,
                bevelEnabled: true,
                bevelThickness: .001,
                bevelSize: .0001,
                bevelOffset: 0,
                bevelSegments: 5
            }
        )
        //textGeometry_2.center()
    const text_2 = new THREE.Mesh(textGeometry_2, textMaterial)
    text_2.layers.enable(settings.layer_bloom_scene)
    const text_2_plane_helper_mesh = new THREE.Mesh(new THREE.PlaneBufferGeometry(1.2, 0.4, 2), materialPlaneHelterText)
        //text_2_plane_helper_mesh.layers.enable(settings.layer_bloom_scene)
    text_2_plane_helper_mesh.position.x += 0.6
    text_2_group.position.x = settings.text_2_position_x
    text_2_group.position.y = settings.text_2_position_y
    text_2_group.position.z = settings.text_2_position_z
    text_2_group.rotation.y = Math.PI * settings.text_2_rotation_coeficent
    text_2_group.add(text_2)
    text_2_group.name = 'text_2'
    text_2_group.add(text_2_plane_helper_mesh)


    /**
     * Text 3
     */

    const text_3_group = new THREE.Group()
    const textGeometry_3 = new TextGeometry(
            `НАСОСНОЕ
ОБОРУДОВАНИЕ`, {
                font: text_font,
                size: 0.15,
                height: .01,
                curveSegments: 2,
                bevelEnabled: true,
                bevelThickness: .001,
                bevelSize: .0001,
                bevelOffset: 0,
                bevelSegments: 5
            }
        )
        //textGeometry_3.center()
    const text_3 = new THREE.Mesh(textGeometry_3, textMaterial)
    text_3.layers.enable(settings.layer_bloom_scene)
    const text_3_plane_helper_mesh = new THREE.Mesh(new THREE.PlaneBufferGeometry(1.8, 0.5, 2), materialPlaneHelterText)
        //text_3_plane_helper_mesh.layers.enable(settings.layer_bloom_scene)
    text_3_plane_helper_mesh.position.x += 0.9
    text_3_group.position.x = settings.text_3_position_x
    text_3_group.position.y = settings.text_3_position_y
    text_3_group.position.z = settings.text_3_position_z
    text_3_group.rotation.y = Math.PI * settings.text_3_rotation_coeficent
        //text_3_group.rotation.x = Math.PI / 16
    text_3_group.add(text_3)
    text_3_group.name = 'text_3'
    text_3_group.add(text_3_plane_helper_mesh)



    /**
     * Text 4
     */

    const text_4_group = new THREE.Group()
    const textGeometry_4 = new TextGeometry(
            `СИСТЕМЫ
ОЧИСТКИ ВОДЫ`, {
                font: text_font,
                size: 0.12,
                height: .01,
                curveSegments: 2,
                bevelEnabled: true,
                bevelThickness: .001,
                bevelSize: .0001,
                bevelOffset: 0,
                bevelSegments: 5
            }
        )
        //textGeometry_4.center()
    const text_4 = new THREE.Mesh(textGeometry_4, textMaterial)
        //text_4.layers.enable(settings.layer_bloom_scene)
    const text_4_plane_helper_mesh = new THREE.Mesh(new THREE.PlaneBufferGeometry(1.5, 0.5, 2), materialPlaneHelterText)
        //text_4_plane_helper_mesh.layers.enable(settings.layer_bloom_scene)
    text_4_plane_helper_mesh.position.x += 0.75
    text_4_group.position.x = settings.text_4_position_x
    text_4_group.position.y = settings.text_4_position_y
    text_4_group.position.z = settings.text_4_position_z
    text_4_group.rotation.y = Math.PI * settings.text_4_rotation_coeficent
    text_4_group.add(text_4)
    text_4_group.name = 'text_4'
        //console.log(text_4_group)
    text_4_group.add(text_4_plane_helper_mesh)


    /**
     * Text 5
     */

    const text_5_group = new THREE.Group()
    const textGeometry_5 = new TextGeometry(
            `ОТОПЛЕНИЕ И
КОТЕЛЬНЫЕ`, {
                font: text_font,
                size: 0.18,
                height: .005,
                curveSegments: 2,
                bevelEnabled: true,
                bevelThickness: .001,
                bevelSize: .0001,
                bevelOffset: 0,
                bevelSegments: 5
            }
        )
        //textGeometry_5.center()
    const text_5 = new THREE.Mesh(textGeometry_5, textMaterial)
        //text_5.layers.enable(settings.layer_bloom_scene)
    const text_5_plane_helper_mesh = new THREE.Mesh(new THREE.PlaneBufferGeometry(1.5, 0.5, 2), materialPlaneHelterText)
        //text_5_plane_helper_mesh.layers.enable(settings.layer_bloom_scene)
    text_5_plane_helper_mesh.position.x += 0.75
    text_5_group.position.x = settings.text_5_position_x
    text_5_group.position.y = settings.text_5_position_y
    text_5_group.position.z = settings.text_5_position_z
    text_5_group.rotation.y = Math.PI * settings.text_5_rotation_coeficent
    text_5_group.add(text_5)
    text_5_group.name = 'text_5'
    text_5_group.add(text_5_plane_helper_mesh)



    /**
     * Text grouping
     */
    text_objs_for_raycaster = [
        text_1_plane_helper_mesh,
        text_2_plane_helper_mesh,
        text_3_plane_helper_mesh,
        text_4_plane_helper_mesh,
        text_5_plane_helper_mesh
    ]


    level_2_text_group = new THREE.Group()
    level_2_text_group.scale.set(0.004, 0.004, 0.004)

    level_2_text_group.rotation.y = Math.PI * 6

    level_2_text_group.add(text_1_group)
    level_2_text_group.add(text_2_group)
    level_2_text_group.add(text_3_group)
    level_2_text_group.add(text_4_group)
    level_2_text_group.add(text_5_group)

    level_2_group.add(level_2_text_group)

    /**
     * Texts Animations
     */

    if (animate_scale_texts !== undefined) {
        animate_scale_texts.stop()
    }
    animate_scale_texts = new TWEEN.Tween(level_2_text_group.scale).delay(4000).to({ x: 1, y: 1, z: 1 }, 1500).easing(TWEEN.Easing.Sinusoidal.Out).start()

    if (animate_rotation_texts !== undefined) {
        animate_rotation_texts.stop()
    }
    animate_rotation_texts = new TWEEN.Tween(level_2_text_group.rotation).delay(4000).to({ y: 0 }, 1500).easing(TWEEN.Easing.Sinusoidal.Out).start()


    /**
     * Text DEBUG Positions
     */
    const text1DebugFolder = gui.addFolder("Text 1")
    text1DebugFolder.add(settings, 'text_position_x').min(-10).max(10).step(0.01).name('x').onChange(() => {
        text_1_group.position.x = settings.text_position_x
    })
    text1DebugFolder.add(settings, 'text_position_y').min(-10).max(10).step(0.01).name('y').onChange(() => {
        text_1_group.position.y = settings.text_position_y
    })
    text1DebugFolder.add(settings, 'text_position_z').min(-10).max(10).step(0.01).name('z').onChange(() => {
        text_1_group.position.z = settings.text_position_z
    })
    text1DebugFolder.add(settings, 'text_rotation_coeficent').min(-10).max(10).step(0.01).name('rotate_coef').onChange(() => {
        text_1_group.rotation.y = Math.PI * settings.text_rotation_coeficent
    })

    const text2DebugFolder = gui.addFolder("Text 2")
    text2DebugFolder.add(settings, 'text_2_position_x').min(-10).max(10).step(0.01).name('x').onChange(() => {
        text_2_group.position.x = settings.text_2_position_x
    })
    text2DebugFolder.add(settings, 'text_2_position_y').min(-10).max(10).step(0.01).name('y').onChange(() => {
        text_2_group.position.y = settings.text_2_position_y
    })
    text2DebugFolder.add(settings, 'text_2_position_z').min(-10).max(10).step(0.01).name('z').onChange(() => {
        text_2_group.position.z = settings.text_2_position_z
    })
    text2DebugFolder.add(settings, 'text_2_rotation_coeficent').min(-10).max(10).step(0.01).name('rotate_coef').onChange(() => {
        text_2_group.rotation.y = Math.PI * settings.text_2_rotation_coeficent
    })

    const text3DebugFolder = gui.addFolder("Text 3")
    text3DebugFolder.add(settings, 'text_3_position_x').min(-10).max(10).step(0.01).name('x').onChange(() => {
        text_3_group.position.x = settings.text_3_position_x
    })
    text3DebugFolder.add(settings, 'text_3_position_y').min(-10).max(10).step(0.01).name('y').onChange(() => {
        text_3_group.position.y = settings.text_3_position_y
    })
    text3DebugFolder.add(settings, 'text_3_position_z').min(-10).max(10).step(0.01).name('z').onChange(() => {
        text_3_group.position.z = settings.text_3_position_z
    })
    text3DebugFolder.add(settings, 'text_3_rotation_coeficent').min(-10).max(10).step(0.01).name('rotate_coef').onChange(() => {
        text_3_group.rotation.y = Math.PI * settings.text_3_rotation_coeficent
    })

    const text4DebugFolder = gui.addFolder("Text 4")
    text4DebugFolder.add(settings, 'text_4_position_x').min(-10).max(10).step(0.01).name('x').onChange(() => {
        text_4_group.position.x = settings.text_4_position_x
    })
    text4DebugFolder.add(settings, 'text_4_position_y').min(-10).max(10).step(0.01).name('y').onChange(() => {
        text_4_group.position.y = settings.text_4_position_y
    })
    text4DebugFolder.add(settings, 'text_4_position_z').min(-10).max(10).step(0.01).name('z').onChange(() => {
        text_4_group.position.z = settings.text_4_position_z
    })
    text4DebugFolder.add(settings, 'text_4_rotation_coeficent').min(-10).max(10).step(0.01).name('rotate_coef').onChange(() => {
        text_4_group.rotation.y = Math.PI * settings.text_4_rotation_coeficent
    })

    const text5DebugFolder = gui.addFolder("Text 5")
    text5DebugFolder.add(settings, 'text_5_position_x').min(-10).max(10).step(0.01).name('x').onChange(() => {
        text_5_group.position.x = settings.text_5_position_x
    })
    text5DebugFolder.add(settings, 'text_5_position_y').min(-10).max(10).step(0.01).name('y').onChange(() => {
        text_5_group.position.y = settings.text_5_position_y
    })
    text5DebugFolder.add(settings, 'text_5_position_z').min(-10).max(10).step(0.01).name('z').onChange(() => {
        text_5_group.position.z = settings.text_5_position_z
    })
    text5DebugFolder.add(settings, 'text_5_rotation_coeficent').min(-10).max(10).step(0.01).name('rotate_coef').onChange(() => {
        text_5_group.rotation.y = Math.PI * settings.text_5_rotation_coeficent
    })





    const groupGuiTexts = gui.addFolder('Colors Text')
    groupGuiTexts.addColor(settings, "text_helper_color").onChange(() => {
        text_4_plane_helper_mesh.material.color.set(settings.text_helper_color)
    })
    groupGuiTexts.addColor(settings, "text_color").onChange(() => {
        text_4.material.color.set(settings.text_color)
    })


}



export function openLevel2Page(settings, scene) {

    document.removeEventListener("click", openLevel2Page)

    if (settings.active_text_group_level_2_name) {

        /**
         * Scroll to place
         */
        window.scrollTo(0, 200)
        document.querySelector("body").classList.add("rf_disable_scroll")

        if (animate_cursor_move) {
            animate_cursor_move.stop()
        }


        const page_to_show = document.querySelector('#' + settings.active_text_group_level_2_name)

        document.querySelector('.pages_level_2').classList.add('open')
        document.querySelector('#bottom_buttons_whale').classList.add('close')

        page_to_show.classList.add('open')

        /**
         * Camera move
         */
        if (!settings.mobile_version) {
            settings.camera_look_at_center = false
            const camera = scene.getObjectByName("camera1")
            if (camera_animation) {
                camera_animation.stop()
            }
            camera_animation = new TWEEN.Tween(camera.position).to({ x: 2, y: camera.position.y, z: camera.position.z }, 500).easing(TWEEN.Easing.Sinusoidal.Out).start()
        }

        //const canvas_element = document.getElementById('whalecanvas')
        //canvas_element.classList.add('opened_page_form_level_2')

        // old_active_group_place = scene.getObjectByName(settings.active_text_group_level_2_name).position.copy()
        const text_active_obj = scene.getObjectByName(settings.active_text_group_level_2_name)

        const name_x_position = settings.active_text_group_level_2_name + "_position_x"
        const name_y_position = settings.active_text_group_level_2_name + "_position_y"
        const name_z_position = settings.active_text_group_level_2_name + "_position_z"

        old_active_group_place = { x: settings[name_x_position], y: settings[name_y_position], z: settings[name_z_position] }
        old_active_group_name = text_active_obj.name

        new TWEEN.Tween(text_active_obj.scale).to({ x: 2, y: 2, z: 2 }, 300).start()
        new TWEEN.Tween(text_active_obj.position).to({ x: -1.5, y: -1, z: 1 }, 300).start()

        text_group_names.forEach(name_el => {
            if (name_el !== settings.active_text_group_level_2_name) {
                const text_el = scene.getObjectByName(name_el)
                new TWEEN.Tween(text_el.scale).to({ x: 0, y: 0, z: 0 }, 300).start()
            }
        });


        /**
         * out cursor
         */
        const cursor_group = scene.getObjectByName('cursor_group')
        new TWEEN.Tween(cursor_group.position).to({ x: -0.1, y: -0.3, z: 0.8 }, 500).start()

        setTimeout(() => {
            settings.opening_page_level_2 = false
        }, 1000)

    }


}

export function closeLevel2Page(settings, camera, scene, level_2_group) {

    document.querySelector('.pages_level_2').classList.remove('open')
    document.querySelector('#bottom_buttons_whale').classList.remove('close')

    const elements = document.querySelectorAll('.pages_level_2 .rf_item')
    for (const el of elements) {
        el.classList.remove('open')
    }

    /**
     * Scroll
     */
    document.querySelector("body").classList.remove("rf_disable_scroll")


    /**
     * Camera move
     */
    if (!settings.mobile_version) {
        if (camera_animation) {
            camera_animation.stop()
        }
        camera_animation = new TWEEN.Tween(camera.position).to({ x: 0, y: camera.position.y, z: camera.position.z }, 500).start().onComplete(() => {
            settings.camera_look_at_center = true
        })
    }

    const canvas_element = document.getElementById('whalecanvas')
    canvas_element.classList.remove('opened_page_form_level_2')

    const text_active_obj = scene.getObjectByName(old_active_group_name)

    text_group_names.forEach(name_el => {
        if (name_el !== settings.active_text_group_level_2_name) {
            const text_el = scene.getObjectByName(name_el)
            new TWEEN.Tween(text_el.scale).to({ x: 1, y: 1, z: 1 }, 300).start()
        }
    });

    new TWEEN.Tween(text_active_obj.position).to(old_active_group_place, 300).start().onComplete(() => {
        settings.cursor_can_move = true
    })

}