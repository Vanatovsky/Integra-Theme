import * as THREE from "three"
import { Settings } from "../settings/main_settings"





export const whale_material_2 = new THREE.MeshStandardMaterial({
    flatShading: true,
    color: 0xd8fa9b,
    metalness: .41,
    roughness: 0.9,
})


export const whale_material_3 = new THREE.MeshStandardMaterial({
    wireframe: false,
    metalness: 0.9,
    roughness: 0.1,
    flatShading: true,
    color: Settings.color_material_whale_level_3,
    fog: false,
    emissive: 40,
})


//Main Scene
export const ground_material = new THREE.MeshStandardMaterial({
    color: Settings.half_sphere_color,
    //fog: false,
    side: THREE.BackSide,
    //flatShading: true
})

//Cursor
export const cursor_level_1_material = new THREE.MeshStandardMaterial({
    metalness: 0.1,
    roughness: 0.5,
    color: Settings.cursor_level_1_color,
    fog: true,
    toneMapped: THREE.ACESFilmicToneMapping
})


export const cursor_level_3_meterial = new THREE.MeshStandardMaterial({
    metalness: 0.1,
    roughness: 0.5,
    color: Settings.cursor_level_1_color,
    fog: true,
    //flatShading: true,
})



// Text Material
export const textMaterial = new THREE.MeshStandardMaterial({
    //color: 0x38b2ff,
    color: 0x677484,
    fog: true,
    //opacity: 0.9,
    transparent: true,
    roughness: 1,
    metalness: 0
})


export const textHoverMaterial = new THREE.MeshStandardMaterial({
    color: Settings.text_color_hover,
    opacity: 1,
    transparent: true,
    fog: false,
    roughness: 1,
    metalness: 0.5,
    transparent: true,
})


export const mainWallMaterial = new THREE.MeshBasicMaterial({
    color: Settings.main_wall_color,
    //roughness: 1,
})

export const rockMaterial = new THREE.MeshStandardMaterial({
    color: Settings.rock_color,
    roughness: 1,
    metalness: 0
})

export const cristalMaterial = new THREE.MeshPhysicalMaterial({
    color: Settings.cristal_color,
    roughness: Settings.cristal_roughness,
    fog: false,
    metalness: Settings.cristal_metalness,
    //fog: false
})