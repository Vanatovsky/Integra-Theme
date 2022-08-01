import { TWEEN } from 'three/examples/jsm/libs/tween.module.min'
import { moonLightGoToLevel1, moonLightGoToLevel2, moonLightGoToLevel3 } from '../main_scene/main_lights'
import { particlesGoToLevel2, particlesGoToLevel3 } from '../main_scene/particles'
import { setActiveButtonByID, TW } from './../inc/extra_functions'
import { cursor_level_1_material, cursor_level_3_meterial, whale_material_3 } from './../inc/materials'


let animate_position_camera, animate_rotation_camera,
    animate_position_cursor, animate_rotation_cursor, animate_scale_cursor,
    animate_position_whale_model, animate_rotation_whale_model,
    animate_level_2_group_rotation, animate_scene_fog_far


/**
 * First animation
 */

export function firstAnimationWhaleAndCamera(settings, whale_model, scene, mixer, animations) {


    /**
     * Play sceleton whale animation
     */
    mixer.clipAction(animations[1]).play()


    /**
     * Whale position
     */
    if (animate_position_whale_model !== undefined) {
        animate_position_whale_model.stop()
    }

    animate_position_whale_model = new TWEEN.Tween(whale_model.position).to({ x: 0, y: 0, z: 0 }, 7000).easing(TWEEN.Easing.Sinusoidal.Out).start()
        .onComplete(() => {
            document.querySelector('h1').classList.add("hide")
            mixer.clipAction(animations[1]).stop()
            mixer.clipAction(animations[0]).play()
            document.querySelector("#bottom_buttons_whale").classList.add('open')
            settings.whale_home = true
            settings.camera_look_at_center = true
        })



    /**
     * Whale rotation
     */
    if (animate_rotation_whale_model !== undefined) {
        animate_rotation_whale_model.stop()
    }
    animate_rotation_whale_model = new TWEEN.Tween(whale_model.rotation).delay(5000).to({ y: .8, }, 5500).easing(TWEEN.Easing.Sinusoidal.Out).start()



    /**
     * Fog scene far
     */
    if (animate_scene_fog_far !== undefined) {
        animate_scene_fog_far.stop()
    }
    animate_scene_fog_far = new TWEEN.Tween(scene.fog).delay(2600).to({ far: settings.scene_fog_far_level_2 }, 1000).easing(TWEEN.Easing.Elastic.In).start()


    /**
     * Close loader
     */

    setTimeout(() => {
        const loader_box = document.getElementById("rf_loader_box")
        loader_box.classList.add("loaded")
        const loader_round_box = document.querySelector("#rf_loader_box .preloader-wrapper")
        loader_round_box.classList.add("loaded")
    }, 500)


}





/**
 * Level 1
 */

export function goToLevel1(settings, scene, camera, whale_model,
    whale_mesh, level_2_group, mixer, animations, pointCursorGroup) {


    if (settings.level_animation_start || settings.active_level == 1) {
        return false
    }


    /**
     * Defaults
     */

    settings.level_animation_start = true
    document.querySelector('.listing_uslug_level_3').classList.remove('open')
    setActiveButtonByID('button_to_level_1')


    /**
     * MoonLight
     */
    moonLightGoToLevel1()


    /**
     * Camera position
     */
    if (animate_position_camera !== undefined) {
        animate_position_camera.stop()
    }
    animate_position_camera = new TWEEN.Tween(camera.position).to({ x: 0, y: 6, z: 5 }, 1000).easing(TWEEN.Easing.Sinusoidal.Out).start()

    /**
     * Whale sceleton animations
     */
    mixer.clipAction(animations[0]).stop()
    mixer.clipAction(animations[1]).play()

    /**
     * Whale position
     */
    if (animate_position_whale_model !== undefined) {
        animate_position_whale_model.stop()
    }
    animate_position_whale_model = new TWEEN.Tween(whale_model.position).to({ y: 2.6, z: -1.5 }, 2500).easing(TWEEN.Easing.Sinusoidal.Out).start()

    /**
     * Whale rotation
     */
    if (animate_rotation_whale_model !== undefined) {
        animate_rotation_whale_model.stop()
    }
    animate_rotation_whale_model = new TWEEN.Tween(whale_model.rotation).to({ y: Math.PI * 1.15 }, 1000).easing(TWEEN.Easing.Cubic.In).start()
        .onComplete(() => {
            //animate_rotation_whale_model = new TWEEN.Tween(whale_model.rotation).to({ x: 0 }, 1500).easing(TWEEN.Easing.Back.Out).start()
            settings.active_level = 1
            pointCursorGroup.scale.set(3, 3, 3)
            pointCursorGroup.rotation.y = Math.PI * -0.35
            settings.level_animation_start = false
            mixer.clipAction(animations[1]).stop()
            mixer.clipAction(animations[0]).play()
        })


    /**
     * Fog sceen
     */
    if (animate_scene_fog_far !== undefined) {
        animate_scene_fog_far.stop()
    }
    animate_scene_fog_far = new TWEEN.Tween(scene.fog).delay(1000).to({ far: settings.scene_fog_far_level_1 }, 1000).easing(TWEEN.Easing.Sinusoidal.Out).start()


}







/**
 * Level 2
 */

export function goToLevel2(settings, camera, scene,
    mixer, animations, whale_model,
    level_2_group, whale_mesh, pointCursorGroup) {

    if (settings.level_animation_start || settings.active_level == 2) {
        return false
    }

    /**
     * Defaults
     */
    settings.level_animation_start = true
    document.querySelector('.listing_uslug_level_3').classList.remove('open')
    setActiveButtonByID('button_to_level_2')

    /**
     * MoonLight
     */
    moonLightGoToLevel2()


    /**
     * Cursor
     */
    if (animate_position_cursor !== undefined) {
        animate_position_cursor.stop()
    }
    animate_position_cursor = new TWEEN.Tween(pointCursorGroup.position).to({ x: 0, y: 14, z: 0 }, 1000).start()




    /**
     * Camera position
     */
    if (animate_position_camera !== undefined) {
        animate_position_camera.stop()
    }

    animate_position_camera = new TWEEN.Tween(camera.position).to({ x: 0, y: 0.1, z: 5 }).easing(TWEEN.Easing.Sinusoidal.Out).start()
        .onComplete(() => {

            settings.level_animation_start = false,
                settings.active_level = 2,
                pointCursorGroup.scale.set(1, 1, 1)

            pointCursorGroup.traverse((obj) => {
                if (obj.isMesh) {
                    obj.material = cursor_level_1_material
                }
            })
        })


    /**
     * Whale position
     */
    if (animate_position_whale_model !== undefined) {
        animate_position_whale_model.stop()
    }
    animate_position_whale_model = new TWEEN.Tween(whale_model.position).to({ x: 0, y: 0, z: 0 }, 1000).easing(TWEEN.Easing.Sinusoidal.Out).start().onComplete(() => {
        mixer.clipAction(animations[1]).stop()
        mixer.clipAction(animations[0]).play()
    })

    /**
     * Whale rotation
     */
    if (animate_rotation_whale_model !== undefined) {
        animate_rotation_whale_model.stop()
    }
    animate_rotation_whale_model = new TWEEN.Tween(whale_model.rotation).to({ y: 0.8 }, 1000).easing(TWEEN.Easing.Sinusoidal.Out).start()

    particlesGoToLevel2()


    /**
     * Fog scene
     */
    if (animate_scene_fog_far !== undefined) {
        animate_scene_fog_far.stop()
    }
    animate_scene_fog_far = new TWEEN.Tween(scene.fog).to({ far: settings.scene_fog_far_level_2 }, 1000).start()

}










/**
 * Level 3
 */

export function goToLevel3(settings, camera, scene,
    whale_model, pointCursorGroup, mixer, animations) {

    if (settings.level_animation_start || settings.active_level == 3) {
        return false
    }

    /**
     * Defaults
     */

    settings.level_animation_start = true
    setActiveButtonByID('button_to_level_3')
    settings.active_level = 3

    /**
     * MoonLight
     */
    moonLightGoToLevel3()

    whale_model.position.set(-5, -18, -15)
    whale_model.rotation.set(-Math.PI, 0, 0)
    pointCursorGroup.position.set(-10, -18, -15)
    pointCursorGroup.scale.set(3, 3, 3)

    settings.cursor_level_3_position_z = -45


    /**
     * Camera position
     */

    if (animate_position_camera !== undefined) {
        animate_position_camera.stop()
    }

    animate_position_camera = new TWEEN.Tween(camera.position).to({ y: -18.5 }, 2000).easing(TWEEN.Easing.Sinusoidal.Out).start()
        .onComplete(() => {
            settings.level_animation_start = false
            document.querySelector('.listing_uslug_level_3').classList.add('open')
            animate_position_camera = new TWEEN.Tween(camera.position).delay(4000).to({ z: 1.5 }, 1000).easing(TWEEN.Easing.Sinusoidal.Out).start()
        })



    /**
     * Whale sceleton animation
     */

    mixer.clipAction(animations[0]).stop()
    mixer.clipAction(animations[1]).play()


    /**
     * Whale rotation
     */

    if (animate_rotation_whale_model !== undefined) {
        animate_rotation_whale_model.stop()
    }
    animate_rotation_whale_model = new TWEEN.Tween(whale_model.rotation).to({ x: 0 }, 1000).easing(TWEEN.Easing.Back.Out).start()


    /**
     * Whale position
     */

    if (animate_position_whale_model !== undefined) {
        animate_position_whale_model.stop()
    }
    animate_position_whale_model = new TWEEN.Tween(whale_model.position).delay(1000).to({ x: -2, y: -20, z: 7 }, 5000).easing(TWEEN.Easing.Sinusoidal.Out).start()
        .onComplete(() => {

            whale_model.position.set(50, -20, 0)

            if (animate_rotation_whale_model !== undefined) {
                animate_rotation_whale_model.stop()
            }
            animate_rotation_whale_model = new TWEEN.Tween(whale_model.rotation).to({ y: Math.PI * 1.3 }, 3000).easing(TWEEN.Easing.Sinusoidal.Out).start()

            if (animate_position_whale_model !== undefined) {
                animate_position_whale_model.start()
            }
            animate_position_whale_model = new TWEEN.Tween(whale_model.position).delay(1000).to({ x: 2, y: -20, z: -3 }, 3000).easing(TWEEN.Easing.Quintic.Out).start()
                .onComplete(() => {
                    mixer.clipAction(animations[1]).stop()
                    mixer.clipAction(animations[0]).play()
                })

            settings.cursor_level_3_position_z = -8.94
        })


    /**
     * Cursor
     */

    pointCursorGroup.traverse((obj) => {
        if (obj.isMesh) {
            obj.material = cursor_level_3_meterial
        }
    })

    if (animate_position_cursor !== undefined) {
        animate_position_cursor.stop()
    }

    animate_position_cursor = new TWEEN.Tween(pointCursorGroup.position).to({ z: 7 }, 5500).easing(TWEEN.Easing.Sinusoidal.Out).start()
        .onComplete(() => {

            pointCursorGroup.position.set(4, -18.5, 15)

            animate_position_cursor = new TWEEN.Tween(pointCursorGroup.position).to({ x: settings.cursor_level_3_position_x, y: settings.cursor_level_3_position_y, z: -8 }, 4000).easing(TWEEN.Easing.Elastic.InOut).start()

            if (animate_scale_cursor !== undefined) {
                animate_scale_cursor.stop()
            }
            animate_scale_cursor = new TWEEN.Tween(pointCursorGroup.scale).delay(1000).to({ x: 3, y: 3, z: 3 }, 1000).easing(TWEEN.Easing.Elastic.InOut).start()
                .onComplete(() => {
                    animate_scale_cursor = new TWEEN.Tween(pointCursorGroup.scale).to({ x: 10, y: 10, z: 10 }, 2000).easing(TWEEN.Easing.Elastic.InOut).start()
                })

        })


    /**
     * Fog scene
     */
    if (animate_scene_fog_far !== undefined) {
        animate_scene_fog_far.stop()
    }
    animate_scene_fog_far = new TWEEN.Tween(scene.fog).to({ far: settings.scene_fog_far_level_3 }, 1000).start()


    particlesGoToLevel3()

}



// let animate_whale_hover_level_3, animate_hover_cursor_level_3

export function hoverOnUslugaLevel3(settings, whale_model, pointCursorGroup) {
    settings.animate_hover_cursor_level_3 = true
    settings.cristal_animate_up = true
    settings.cristal_animate_down = false
}

export function hoverOutUslugaLevel3(settings, whale_model, pointCursorGroup) {
    settings.animate_hover_cursor_level_3 = false
    settings.cristal_animate_up = false
    settings.cristal_animate_down = true
}