import * as THREE from 'three'
import { TWEEN } from 'three/examples/jsm/libs/tween.module.min'
import { Settings } from '../settings/main_settings'


let light_animation
let moonLight

export function createMainLights(gui, scene) {
    const debugLigths = gui.addFolder("Lights0000")

    // Ambient light
    // const ambientLight = new THREE.AmbientLight('#b9d5ff', 0.75)
    // debugLigths.add(ambientLight, 'intensity').min(0).max(1).step(0.001)
    // scene.add(ambientLight)

    scene.add(new THREE.AmbientLight(0x404040))

    // Directional light
    moonLight = new THREE.DirectionalLight('#ffffff', 3.6)

    moonLight.position.set(0, -15, 10.6)

    debugLigths.add(moonLight, 'intensity').min(0).max(10).step(0.001)
    debugLigths.add(moonLight.position, 'x').min(-55).max(55).step(0.001)
    debugLigths.add(moonLight.position, 'y').min(-55).max(55).step(0.001)
    debugLigths.add(moonLight.position, 'z').min(-55).max(55).step(0.001)

    scene.add(moonLight)
}

export function moonLightGoToLevel1() {
    if (light_animation !== undefined) {
        light_animation.stop()
    }
    light_animation = new TWEEN.Tween(moonLight.position).to({
            x: Settings.moon_light_level_1_position_x,
            y: Settings.moon_light_level_1_position_y,
            z: Settings.moon_light_level_1_position_z,
        }, 3000)
        .easing(TWEEN.Easing.Sinusoidal.Out)
        .start()
        .onComplete(() => {
            console.log('moonLightGoToLevel1')
        })
}

export function moonLightGoToLevel2() {
    if (light_animation !== undefined) {
        light_animation.stop()
    }
    light_animation = new TWEEN.Tween(moonLight.position).to({
            x: Settings.moon_light_level_2_position_x,
            y: Settings.moon_light_level_2_position_y,
            z: Settings.moon_light_level_2_position_z,
        }, 3000)
        .easing(TWEEN.Easing.Sinusoidal.Out)
        .start()
        .onComplete(() => {
            console.log('moonLightGoToLevel2')
        })
}

export function moonLightGoToLevel3() {
    if (light_animation !== undefined) {
        light_animation.stop()
    }
    light_animation = new TWEEN.Tween(moonLight.position).to({
            x: Settings.moon_light_level_3_position_x,
            y: Settings.moon_light_level_3_position_y,
            z: Settings.moon_light_level_3_position_z,
        }, 3000)
        .easing(TWEEN.Easing.Sinusoidal.Out)
        .start()
        .onComplete(() => {
            console.log('moonLightGoToLevel3')
        })
}