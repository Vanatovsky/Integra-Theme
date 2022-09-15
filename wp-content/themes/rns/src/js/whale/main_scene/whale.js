import * as THREE from 'three'
import { TW } from '../inc/extra_functions';
import { TWEEN } from 'three/examples/jsm/libs/tween.module.min'
// import { firstAnimationWhaleAndCamera } from '../levels_animations/levels_animations';




export function createWhale(settings, mixer, animations, scene, level_2_group, whale_gltf, whale_model, whale_mesh, whaleNormalTexture, whaleColorTexture) {

    whale_model = whale_gltf.scene

    // Whale
    const whale_material = new THREE.MeshStandardMaterial({
        metalness: 0.1,
        roughness: .5,
        normalMap: whaleNormalTexture,
        map: whaleColorTexture,
        toneMapped: THREE.ACESFilmicToneMapping
    })

    whale_mesh.material = whale_material
    whale_model.position.z = -20
    whale_model.position.y = 2.5
    level_2_group.add(whale_model)



    // firstAnimationWhaleAndCamera(settings, whale_model, scene, mixer, animations)


}