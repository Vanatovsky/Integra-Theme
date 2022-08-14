import * as THREE from 'three'
import { Settings } from '../settings/main_settings'
import { Water } from 'three/examples/jsm/objects/Water'
import { Sky } from 'three/examples/jsm/objects/Sky'
import { cristalMaterial, mainWallMaterial, rockMaterial } from '../inc/materials';
import { createRGBString16, goToInitNumber } from '../inc/extra_functions';



let rock, wall, cristal, cristalLight1, cristalLight2, cristalLight3
let sun, sky, water, pmremGenerator


export function createMainDecoration(gui, settings, scene, main_scene_decoration, backgroundContactsTexture) {


    //Create contact plane
    const contact_plane_background_geometry = new THREE.PlaneBufferGeometry(60, 20)
    const contact_plane_background_material = new THREE.MeshStandardMaterial({ map: backgroundContactsTexture });
    const contact_plane_background_mesh = new THREE.Mesh(contact_plane_background_geometry, contact_plane_background_material);
    contact_plane_background_mesh.position.set(settings.sky_background_position_x, settings.sky_background_position_y, settings.sky_background_position_z)
    contact_plane_background_mesh.scale.x = settings.sky_background_position_scale
    contact_plane_background_mesh.scale.y = settings.sky_background_position_scale
    contact_plane_background_mesh.scale.z = settings.sky_background_position_scale
    scene.add(contact_plane_background_mesh)

    let background_sky_debug = gui.addFolder("backgroundSky")
    background_sky_debug.add(settings, "sky_background_position_x").min(-100).max(100).step(0.01).onChange(() => { contact_plane_background_mesh.position.x = settings.sky_background_position_x })
    background_sky_debug.add(settings, "sky_background_position_y").min(-100).max(100).step(0.01).onChange(() => { contact_plane_background_mesh.position.y = settings.sky_background_position_y })
    background_sky_debug.add(settings, "sky_background_position_z").min(-100).max(100).step(0.01).onChange(() => { contact_plane_background_mesh.position.z = settings.sky_background_position_z })

    background_sky_debug.add(settings, "sky_background_position_scale").min(-10).max(10).step(0.01).onChange(() => {
        contact_plane_background_mesh.scale.x = settings.sky_background_position_scale
        contact_plane_background_mesh.scale.y = settings.sky_background_position_scale
        contact_plane_background_mesh.scale.z = settings.sky_background_position_scale
    })

    //Main Scene (Rock & Wall)
    main_scene_decoration.traverse(function(object) {
        if (object.name === 'mainbox') {
            wall = object
        }
        if (object.name === 'mainrock') {
            rock = object

            //console.log('mainrock', object.layers)
        }
        if (object.name === 'cristal') {
            cristal = object
            cristal.layers.enable(settings.layer_bloom_scene)
            console.log('cristal', cristal.layers)
        }
    })

    wall.position.z = 0
    wall.position.x = -4
    wall.position.y = -28
    wall.material = mainWallMaterial
    scene.add(wall)

    //Wall Debug
    const wallDebugFolder = gui.addFolder("Main Wall")
    wallDebugFolder.addColor(settings, 'main_wall_color').onChange(() => {
        wall.material.color.set(settings.main_wall_color)
    })


    rock.position.z = -8
    rock.position.x = -4
    rock.position.y = -28
    rock.material = rockMaterial
    scene.add(rock)

    //Rock debug
    const rockDebugFolder = gui.addFolder("Rock")
    rockDebugFolder.addColor(settings, 'rock_color').onChange(() => {
        rock.material.color.set(settings.rock_color)
    })


    //Cristal
    cristal.position.z = rock.position.z
    cristal.position.x = rock.position.x
    cristal.position.y = rock.position.y
    cristal.material = cristalMaterial
    scene.add(cristal)

    //Cristal Lights

    // //Light 1
    // cristalLight1 = new THREE.PointLight(settings.cristal_color, 8, 5, 2)
    // cristalLight1.position.x = settings.cristal_light_1_position_x
    // cristalLight1.position.y = settings.cristal_light_1_position_y
    // cristalLight1.position.z = settings.cristal_light_1_position_z
    // scene.add(cristalLight1)
    //     // const helper_light_1 = new THREE.PointLightHelper(cristalLight1, 1)
    //     // scene.add(helper_light_1)

    // //Light 2
    // cristalLight2 = new THREE.PointLight(settings.cristal_color, 8, 3, 2)
    // cristalLight2.position.x = settings.cristal_light_2_position_x
    // cristalLight2.position.y = settings.cristal_light_2_position_y
    // cristalLight2.position.z = settings.cristal_light_2_position_z
    // scene.add(cristalLight2)
    //     // const helper_light_2 = new THREE.PointLightHelper(cristalLight2, 1)
    //     // scene.add(helper_light_2)

    //Light 3
    // cristalLight3 = new THREE.PointLight(settings.cristal_color, 8, 12, 2)
    // cristalLight3.position.x = settings.cristal_light_3_position_x
    // cristalLight3.position.y = settings.cristal_light_3_position_y
    // cristalLight3.position.z = settings.cristal_light_3_position_z
    // scene.add(cristalLight3)
    // const helper_light_3 = new THREE.PointLightHelper(cristalLight3, 1)
    // scene.add(helper_light_3)

    //Cristal debug
    const cristalDebugFolder = gui.addFolder('Cristal')
    cristalDebugFolder.addColor(settings, 'cristal_color').onChange(() => {
        cristal.material.color.set(settings.cristal_color)
            // cristalLight1.color.set(settings.cristal_color)
            // cristalLight2.color.set(settings.cristal_color)
            // cristalLight3.color.set(settings.cristal_color)
    })
    cristalDebugFolder.add(settings, 'cristal_roughness').min(0).max(1).step(0.001).onChange(() => {
        cristal.material.roughness = settings.cristal_roughness
    })
    cristalDebugFolder.add(settings, 'cristal_metalness').min(0).max(1).step(0.001).onChange(() => {
        cristal.material.metalness = settings.cristal_metalness
    })

    // const cristalLight1DebugFolder = cristalDebugFolder.addFolder("Light 1")
    // cristalLight1DebugFolder.add(settings, 'cristal_light_1_position_x').min(-100).max(100).step(0.001).name('x')
    //     .onChange(() => { cristalLight1.position.x = settings.cristal_light_1_position_x })
    // cristalLight1DebugFolder.add(settings, 'cristal_light_1_position_y').min(-100).max(100).step(0.001).name('y')
    //     .onChange(() => { cristalLight1.position.y = settings.cristal_light_1_position_y })
    // cristalLight1DebugFolder.add(settings, 'cristal_light_1_position_z').min(-100).max(100).step(0.001).name('z')
    //     .onChange(() => { cristalLight1.position.z = settings.cristal_light_1_position_z })

    // const cristalLight2DebugFolder = cristalDebugFolder.addFolder("Light 2")
    // cristalLight2DebugFolder.add(settings, 'cristal_light_2_position_x').min(-100).max(100).step(0.001).name('x')
    //     .onChange(() => { cristalLight2.position.x = settings.cristal_light_2_position_x })
    // cristalLight2DebugFolder.add(settings, 'cristal_light_2_position_y').min(-100).max(100).step(0.001).name('y')
    //     .onChange(() => { cristalLight2.position.y = settings.cristal_light_2_position_y })
    // cristalLight2DebugFolder.add(settings, 'cristal_light_2_position_z').min(-100).max(100).step(0.001).name('z')
    //     .onChange(() => { cristalLight2.position.z = settings.cristal_light_2_position_z })

    // const cristalLight3DebugFolder = cristalDebugFolder.addFolder("Light 3")
    // cristalLight3DebugFolder.add(settings, 'cristal_light_3_position_x').min(-100).max(100).step(0.001).name('x')
    //     .onChange(() => { cristalLight3.position.x = settings.cristal_light_3_position_x })
    // cristalLight3DebugFolder.add(settings, 'cristal_light_3_position_y').min(-100).max(100).step(0.001).name('y')
    //     .onChange(() => { cristalLight3.position.y = settings.cristal_light_3_position_y })
    // cristalLight3DebugFolder.add(settings, 'cristal_light_3_position_z').min(-100).max(100).step(0.001).name('z')
    //     .onChange(() => { cristalLight3.position.z = settings.cristal_light_3_position_z })

}

export function cristalColorAnimateOn(settings) {

    const speed_coeficient = 2

    let red = goToInitNumber(settings.cristal_color_red_now, settings.cristal_color_red_target, speed_coeficient)
    if (red) {
        settings.cristal_color_red_now = red
    } else {
        red = settings.cristal_color_red_now
    }

    let green = goToInitNumber(settings.cristal_color_green_now, settings.cristal_color_green_target, speed_coeficient)
    if (green) {
        settings.cristal_color_green_now = green
    } else {
        green = settings.cristal_color_green_now
    }

    let blue = goToInitNumber(settings.cristal_color_blue_now, settings.cristal_color_blue_target, speed_coeficient)
    if (blue) {
        settings.cristal_color_blue_now = blue
    } else {
        blue = settings.cristal_color_blue_now
    }

    const rgb_str = createRGBString16(red, green, blue)
    cristal.material.color.set(rgb_str)

}



export function cristalColorAnimationOff(settings) {

    const speed_coeficient = 2

    let red = goToInitNumber(settings.cristal_color_red_now, settings.cristal_color_red, speed_coeficient)
    if (red) {
        settings.cristal_color_red_now = red
    } else {
        red = settings.cristal_color_red_now
    }

    let green = goToInitNumber(settings.cristal_color_green_now, settings.cristal_color_green, speed_coeficient)
    if (green) {
        settings.cristal_color_green_now = green
    } else {
        green = settings.cristal_color_green_now
    }

    let blue = goToInitNumber(settings.cristal_color_blue_now, settings.cristal_color_blue, speed_coeficient)
    if (blue) {
        settings.cristal_color_blue_now = blue
    } else {
        blue = settings.cristal_color_blue_now
    }

    const rgb_str = createRGBString16(red, green, blue)
    cristal.material.color.set(rgb_str)
        //cristalLight1.color.set(rgb_str)
        //cristalLight2.color.set(rgb_str)
        //cristalLight3.color.set(rgb_str)
}


export function createWater() {

    const waterGeometry = new THREE.PlaneGeometry(85, 60)

    water = new Water(
        waterGeometry, {
            textureWidth: 512,
            textureHeight: 512,
            waterNormals: new THREE.TextureLoader().load('/wp-content/themes/rns/assets/textures/waternormals.jpg', function(texture) {
                texture.wrapS = texture.wrapT = THREE.RepeatWrapping;
            }),
            sunDirection: new THREE.Vector3(),
            sunColor: 0x00ffff,
            waterColor: Settings.water_color,
            distortionScale: 3.7,
            //fog: false
        }
    )

    water.rotation.x = -Math.PI / 2;
    water.position.y = Settings.water_position_y


    return water
}



// Skybox
export function createSky(settings, scene, renderer, water) {

    sun = new THREE.Vector3();

    sky = new Sky()
    sky.scale.setScalar(10000)
    scene.add(sky)

    const skyUniforms = sky.material.uniforms

    skyUniforms['turbidity'].value = 10
    skyUniforms['rayleigh'].value = 2
    skyUniforms['mieCoefficient'].value = 0.005
    skyUniforms['mieDirectionalG'].value = 0.8

    pmremGenerator = new THREE.PMREMGenerator(renderer)

    updateSun(settings, scene)

}



export function updateSun(settings, scene) {

    const phi = THREE.MathUtils.degToRad(90 - settings.sun_elevation)
    const theta = THREE.MathUtils.degToRad(settings.sun_azimuth)

    sun.setFromSphericalCoords(1, phi, theta)

    sky.material.uniforms['sunPosition'].value.copy(sun)
    water.material.uniforms['sunDirection'].value.copy(sun).normalize()

    scene.environment = pmremGenerator.fromScene(sky).texture

}